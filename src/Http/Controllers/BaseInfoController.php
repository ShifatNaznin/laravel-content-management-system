<?php

namespace Cms\Cmsblog\Http\Controllers;

use App\Http\Controllers\Controller;
use Cms\Cmsblog\Http\Controllers\BaseController;
use Cms\Cmsblog\Models\BaseTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BaseInfoController extends Controller
{

    public function basic_info()
    {
        return view('cmsblog::admin.pages.basic');
    }

    public function add_allbasic(Request $request)
    {

        $basic = [];
        $add = BaseTable::first();
        if ($add->all_basic != null) {
            $basic = (array) (json_decode($add->all_basic));
            // dd('get', (array) (json_decode($add->all_basic)), $basic);

        }
        $basic['f_name'] = $request->f_name;
        $basic['l_name'] = $request->l_name;
        $basic['email'] = $request->email;
        $basic['mobile_one'] = $request->mobile_one;
        $basic['mobile_two'] = $request->mobile_two;
        $basic['country'] = $request->country;
        $basic['address'] = $request->address;
        $basic['state'] = $request->state;

        if ($request->hasFile('header_logo')) {
            $file = $request->file('header_logo');
            $path = Storage::put('images/', $file);
            $basic['header_logo'] = $path;
        }
        if ($request->hasFile('footer_logo')) {
            $file = $request->file('footer_logo');
            $path = Storage::put('images/', $file);
            $basic['footer_logo'] = $path;
        }
        // $add = BaseTable::first();
        $add->all_basic = json_encode($basic);
        // dd($add->save());
        $add->save();

        if ($add) {
            return back()->with('success', 'value');
        } else {
            return back()->with('error', 'value');
        }
        // dd(json_encode($info),$table);
    }

    public function theme_info()
    {
        return view('cmsblog::admin.pages.theme');
    }

    public function add_alltheme(Request $request)
    {
        $theme = [];
        $add = BaseTable::first();
        if ($add->all_theme != null) {
            $theme = (array) (json_decode($add->all_theme));
            // dd('get', (array) (json_decode($add->all_basic)), $basic);

        }

        $theme['color'] = $request->color;
        $theme['heading_color'] = $request->heading_color;
        $theme['sub_heading_color'] = $request->sub_heading_color;
        $theme['paragraph_color'] = $request->paragraph_color;
        $theme['background_color'] = $request->background_color;
        $theme['section_heading_size'] = $request->section_heading_size;
        $theme['section_sub_heading_size'] = $request->section_sub_heading_size;

        if ($request->hasFile('background_image')) {
            $file = $request->file('background_image');
            $path = Storage::put('images/', $file);
            $theme['background_image'] = $path;
        }

        $add->all_theme = json_encode($theme);
        // dd($add);
        // dd($add->save());
        $add->save();

        if ($add) {
            return back()->with('success', 'value');
        } else {
            return back()->with('error', 'value');
        }
        // dd(json_encode($info),$table);
    }
    public function social_info()
    {
        return view('cmsblog::admin.pages.social');
    }

    public function add_allsocial(Request $request)
    {

        $social = [];
        $add = BaseTable::first();
        if ($add->social_info != null) {
            $social = (array) (json_decode($add->social_info));
            // dd('get', (array) (json_decode($add->all_basic)), $basic);

        }

        $social['facebook_link'] = $request->facebook_link;
        $social['facebook_status'] = $request->facebook_status;
        $social['instagram_link'] = $request->instagram_link;
        $social['instagram_status'] = $request->instagram_status;
        $social['twitter_link'] = $request->twitter_link;
        $social['twitter_status'] = $request->twitter_status;


        if ($request->hasFile('facebook_image')) {
            $file = $request->file('facebook_image');
            $path = Storage::put('images/', $file);
            $social['facebook_image'] = $path;
        }
        if ($request->hasFile('facebook_icon')) {
            $file = $request->file('facebook_icon');
            $path = Storage::put('images/', $file);
            $social['facebook_icon'] = $path;
        }
        if ($request->hasFile('instagram_image')) {
            $file = $request->file('instagram_image');
            $path = Storage::put('images/', $file);
            $social['instagram_image'] = $path;
        }
        if ($request->hasFile('instagram_icon')) {
            $file = $request->file('instagram_icon');
            $path = Storage::put('images/', $file);
            $social['instagram_icon'] = $path;
        }
        if ($request->hasFile('twitter_image')) {
            $file = $request->file('twitter_image');
            $path = Storage::put('images/', $file);
            $social['twitter_image'] = $path;
        }
        if ($request->hasFile('twitter_icon')) {
            $file = $request->file('twitter_icon');
            $path = Storage::put('images/', $file);
            $social['twitter_icon'] = $path;
        }

        $add->social_info = json_encode($social);

        $add->save();

        if ($add) {
            return back()->with('success', 'value');
        } else {
            return back()->with('error', 'value');
        }
        // dd(json_encode($info),$table);
    }

    public function menu()
    {
        return view('cmsblog::admin.pages.menu');
    }

    public function add_allmenu(Request $request)
    {

        $add = BaseTable::first();
        $menu = json_decode(BaseTable::first()->menu);

        for ($i = 0; $i < count($request->menu) - 1; $i++) {

            // dd($menu, $request->request);
            $key = 'category' . ($i + 1);
            if (isset($menu->$key)) {
                // dd($menu->$key);
                $menu->$key->name = $request->menu[$i];

            } else {
                $menu->$key = [
                    'name' => $request->menu[$i],
                    'subcategory' => [],
                ];
            }

        }
        // dd($request, $menu);

        // $menu = [
        //     'category3' => [
        //         'sports',
        //         'subcategory' => [
        //             'bangladesh',
        //             'antorjatic',
        //             'other',
        //         ],
        //     ],
        // ];

        $add->menu = json_encode($menu);

        $add->save();

        if ($add) {
            return back()->with('success', 'value');
        } else {
            return back()->with('error', 'value');
        }
        // dd(json_encode($info),$table);
    }
    public function sub_menu()
    {
        return view('cmsblog::admin.pages.sub-menu');
    }

    public function add_submenu(Request $request)
    {
        $menus = BaseController::show_all_menu();
        foreach ($menus as $key => $item) {

            // count submenu
            $category_key = str_replace(' ', '_', $item->name) . '_sub';
            $length = count($request[$category_key]);

            //check if each menu has more than 0ne submenu
            if ($request->has($category_key) && $length > 1) {
                //reset submenu
                $cat_no = $request[$category_key][0];
                $menus->$cat_no->subcategory = [];

                //save submenu
                for ($i = 1; $i < $length; $i++) {
                    $menus->$cat_no->subcategory[] = $request[$category_key][$i];
                }
            }
        }

        $add = BaseTable::first();
        $add->menu = json_encode($menus);
        $add->save();

        if ($add) {
            return back()->with('success', 'value');
        } else {
            return back()->with('error', 'value');
        }

        // dd($request->request, $menus);
    }

    // public function blog_post()
    // {
    //     return view('cmsblog::admin.pages.blog-post');
    // }

    // public function add_blog_post(Request $request)
    // {
    //     $post = new Blog;
    //     $post->category = $request->category;
    //     $post->subcategory = $request->subcategory;
    //     $post->title = $request->title;
    //     $post->sub_title = $request->sub_title;
    //     $post->author = $request->author;
    //     $post->description = $request->description;
    //     $post->post_color = $request->post_color;
    //     $post->post_status = $request->post_status;
    //     $post->post_tag = $request->post_tag;

    //     if ($request->hasFile('photo')) {
    //         $file = $request->file('photo');
    //         $path = Storage::put('images/', $file);
    //         $post->photo = $path;
    //     }

    //     $post->save();

    //     if ($post) {
    //         return back()->with('success', 'value');
    //     } else {
    //         return back()->with('error', 'value');
    //     }
    // }

    public function blog_post_key(Request $request, $key)
    {

        $menu = BaseTable::first()->menu;
        $menu = json_decode($menu);
// dd($menu->$key->subcategory);
        $category = $menu->$key->subcategory;
        $options = '';
        foreach ($category as $item) {
            // dd($item);
            $options .= "<option value={$item}>$item</option>";
        }
        return response()->json($options);

    }

    public function cms(){
        return view('cmsblog::admin.pages.cms');
    }
    public function cms_two(){
        return view('cmsblog::admin.pages.cms-two');
    }
    public function cms_three(){
        return view('cmsblog::admin.pages.cms-three');
    }
}
