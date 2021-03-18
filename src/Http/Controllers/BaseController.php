<?php

namespace Cms\Cmsblog\Http\Controllers;


use Cms\Cmsblog\Models\Blog;
use Cms\Cmsblog\Models\BaseTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BaseController
{

    public static function show_all_basic()
    {
        $basic = BaseTable::first()->all_basic;
        $basic = json_decode($basic);

        return $basic;
    }
    public static function show_all_theme()
    {
        $theme = BaseTable::first()->all_theme;
        $theme = json_decode($theme);

        return $theme;
    }
    public static function show_all_social()
    {
        $social = BaseTable::first()->social_info;
        $social = json_decode($social);
        return $social;
    }
    public static function show_all_menu()
    {
        $menu = BaseTable::first()->menu;
        $menu = json_decode($menu);
        return $menu;
    }

    public static function get_all_post($param = [])
    {
        if (isset($param['limit']) && !isset($param['paginate']) && !isset($param['orderBy'])) {
            $b = Blog::limit($param['limit'])->get();
        } elseif (!isset($param['limit']) && isset($param['paginate']) && !isset($param['orderBy'])) {
            $b = Blog::latest()->paginate($param['paginate']);
        } elseif (!isset($param['limit']) && !isset($param['paginate']) && isset($param['orderBy'])) {
            $b = Blog::orderBy('id', $param['orderBy'])->get();
        } elseif (isset($param['limit']) && !isset($param['paginate']) && isset($param['orderBy'])) {
            $b = Blog::orderBy('id', $param['orderBy'])->limit($param['limit'])->get();
        } elseif (!isset($param['limit']) && isset($param['paginate']) && isset($param['orderBy'])) {
            $b = Blog::orderBy('id', $param['orderBy'])->paginate($param['paginate']);
        } else {
            $b = Blog::get();
        }

        return $b;
    }
    public static function find_post($id, $index = null)
    {
        $p = Blog::find($id);
        if ($index) {
            $p = $p->$index;
        }
        return $p;
    }

    public static function array_depth(array $array)
    {
        $max_depth = 1;
        foreach ($array as $value) {
            // $value = (array) $value;
            if (is_array($value)) {
                $depth = self::array_depth($value) + 1;

                if ($depth > $max_depth) {
                    $max_depth = $depth;
                }
            }
        }

        return $max_depth;
    }

    // make field
    public function cms_make_form_field($sections, $innersection, $count)
    {
        $key = $sections;
        $key2 = $innersection;
        $subSections  = self::cms()[$key][$key . '1'];
        return view('cmsblog::admin.pages.cms-three-make-field', compact('subSections', 'key', 'key2', 'count'));
    }

    // save cms data
    public function cms_save(Request $request)
    {
        // get model data
        $fields = self::cms();

        // get saved data array form database
        $data = self::get_cms_data();

        // get all sections
        $sections = $request->section;
        foreach ($sections as $key => $item) {

            $depth = self::array_depth($fields[$item]);
            if ($depth > 2) {

                $total_inner_section = $request['inner_sections_' . $item];
                $data->$item = (array) $data->$item;
                for ($inner_section_count = 1; $inner_section_count <= $total_inner_section; $inner_section_count++) {
                    $temp_request_data = $fields[$item][$item . '1'];

                    foreach ($temp_request_data as $single_field_key => $single_field) {
                        $request_field_name = $item . $inner_section_count . '_' . $single_field_key;

                        if (
                            $temp_request_data[$single_field_key]['field_type'] == 'text'
                            || $temp_request_data[$single_field_key]['field_type'] == 'text_area'
                        ) {
                            $temp_request_data[$single_field_key]['value'] = $request[$request_field_name];
                        } else {
                            $temp_request_data[$single_field_key]['value'] = $request[$request_field_name . '_image_old'];

                            if ($request->hasFile($request_field_name)) {
                                $path = Storage::put('uploads', $request->file($request_field_name));
                                $temp_request_data[$single_field_key]['value'] = $path;
                            }
                        }
                    }

                    $data->$item[$item . $inner_section_count] = $temp_request_data;
                }
            } else {
                $temp_request_data = $fields[$item];

                foreach ($temp_request_data as $index => $array_key) {

                    $request_field_name = $item . '_' . $index;

                    if ($temp_request_data[$index]['field_type'] == 'text' || $temp_request_data[$index]['field_type'] == 'text_area') {
                        $temp_request_data[$index]['value'] = $request[$request_field_name];
                    } else {
                        $temp_request_data[$index]['value'] = $request[$request_field_name . '_image_old'];
                        if ($request->hasFile($request_field_name)) {
                            $path = Storage::put('uploads/', $request->file($request_field_name));
                            $temp_request_data[$index]['value'] = $path;
                        }
                    }
                }
                $data->$item = $temp_request_data;
            }
        }

        $cms = BaseTable::find(1);
        $cms->cms = json_encode($data);
        $cms->save();
        return redirect()->back();
    }

    // get cms data
    public static function get_cms_data()
    {
        $fields = BaseTable::find(1)->cms;
        $cms = json_decode($fields);
        return $cms;
    }

    public static function cms()
    {
        $fields = [
            'banner' => [
                'banner1' => [
                    'image' => [
                        'field_type' => 'file',
                        'value' => null,
                    ],
                    'title' => [
                        'field_type' => 'text',
                        'value' => null,
                    ],
                    'sub_title' => [
                        'field_type' => 'text',
                        'value' => null,
                    ],
                    'sub_title2' => [
                        'field_type' => 'text',
                        'value' => null,
                    ],
                    'sliding_text' => [
                        'field_type' => 'text',
                        'value' => null,
                    ],
                    'description' => [
                        'field_type' => 'text_area',
                        'value' => null,
                    ],
                    'btn_url' => [
                        'field_type' => 'text',
                        'value' => null,
                    ],
                    'btn_url2' => [
                        'field_type' => 'text',
                        'value' => null,
                    ],
                ]
            ],
            'about' => [
                'title' => [
                    'field_type' => 'text',
                    'value' => null,
                ],
                'sub_title' => [
                    'field_type' => 'text',
                    'value' => null,
                ],
                'sub_title2' => [
                    'field_type' => 'text',
                    'value' => null,
                ],
                'description' => [
                    'field_type' => 'text_area',
                    'value' => null,
                ],
                'description2' => [
                    'field_type' => 'text_area',
                    'value' => null,
                ],
                'image' => [
                    'field_type' => 'file',
                    'value' => null,
                ],
                'cv' => [
                    'field_type' => 'text',
                    'value' => null,
                ],
            ],
            'service' => self::services(),

            'counter' => self::counter(),

            'portfolio' => self::portfolio(),

            'testimonial' => self::testimonial(),

        ];

        return $fields;
    }

    // forntend set services fields 
    public static function services()
    {
        $service['service1'] = [
            'title' => [
                'field_type' => 'text',
                'value' => null,
            ],
            'sub_title' => [
                'field_type' => 'text',
                'value' => null,
            ],
            'sub_title3' => [
                'field_type' => 'text',
                'value' => null,
            ],
            'description' => [
                'field_type' => 'text',
                'value' => null,
            ],
            'icon' => [
                'field_type' => 'text',
                'value' => null,
            ],
        ];
        return $service;
    }

    public static function counter()
    {

        $service['counter1'] = [
            'title' => [
                'field_type' => 'text',
                'value' => null,
            ],
            'ammount' => [
                'field_type' => 'text',
                'value' => null,
            ],
            'icon' => [
                'field_type' => 'text',
                'value' => null,
            ],

        ];
        return $service;
    }

    public static function portfolio()
    {
        $service['portfolio1'] = [
            'title' => [
                'field_type' => 'text',
                'value' => null,
            ],
            'image' => [
                'field_type' => 'file',
                'value' => null,
            ],

        ];
        return $service;
    }

    public static function testimonial()
    {
        $testimonial['testimonial1'] = [
            'name' => [
                'field_type' => 'text',
                'value' => null,
            ],
            'image' => [
                'field_type' => 'file',
                'value' => null,
            ],
            'designation' => [
                'field_type' => 'text_area',
                'value' => null,
            ],
            'description2' => [
                'field_type' => 'text_area',
                'value' => null,
            ],
            'description3' => [
                'field_type' => 'text_area',
                'value' => null,
            ],

        ];
        return $testimonial;
    }
}
