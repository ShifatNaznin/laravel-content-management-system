@extends('layouts.admin') @section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">List Media</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">One</a></li>
                    <li class="breadcrumb-item active">List Media</li>
                </ol>
                <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>
                    Create New</button>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills bg-dark p-3" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        @php
                            $i = 1;
                        @endphp
                        @foreach (Base::cms() as $key=>$Sections)
                            <a class="nav-link {{ $i==1?'active':'' }}" 
                                id="v-pills-{{ $key }}-tab" 
                                data-toggle="pill" 
                                href="#v-pills-{{ $key }}"
                                role="tab" aria-controls="v-pills-{{ $key }}" aria-selected="true">
                                <div class="row justify-content-between">
                                    <span>{{ $key }}</span>
                                    <div class="bt-switch">
                                        <input type="checkbox" checked data-size="mini" />
                                    </div>
                                </div>
                            </a>
                            {{-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                                role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                                role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a> --}}
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        @php
                            $i = 1;
                        @endphp
                        
                        {{-- 
                            1.  $key representing like banner section

                            2.  $main_sections representing all sections as array 
                                'banner' => [
                                    'banner1' => [...],
                                    'banner1' => [...],
                                    'banner1' => [...],
                                ]
                        --}}
                        @foreach (Base::cms() as $key=>$main_sections)
                            {{-- 
                                checking loop elements like banner has multiple banner contents
                                'banner'=>[
                                    'banner1' => [...],
                                    'banner1' => [...],
                                    'banner1' => [...], 
                                ]    
                            --}}
                            @if (Base::array_depth($main_sections) > 2) 
                                <div class="tab-pane fade {{ $i==1?'show active':'' }}" id="v-pills-{{ $key }}" role="tabpanel"
                                    aria-labelledby="v-pills-{{ $key }}-tab">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3">

                                                    <div class="nav flex-column nav-pills bg-dark p-2" id="v-pills-tab2"
                                                        role="tablist" aria-orientation="vertical">
                                                        @php
                                                            $j = 1;
                                                        @endphp
                                                        {{-- 
                                                            1.  $key2 representing like each banner in banners section
                                                                $key2 = 'banner1',
                                                                $key2 = 'banner2',
                                                                $key2 = 'banner3',

                                                            2.  $subSections representing each banner data
                                                                'banner1' => [
                                                                    'title' => [
                                                                        'field_type' => 'text',
                                                                            'value' => null,
                                                                        ],
                                                                    'image' => [
                                                                        'field_type' => 'file',
                                                                        'value' => null,
                                                                    ],
                                                                    ...... 
                                                                ]
                                                        --}}
                                                        @foreach ($main_sections as $key2=>$subSections)
                                                            
                                                            {{-- here printing each banner heading like banner1, banner2, .. --}}
                                                            <a class="nav-link tab_link_btn {{ $j==1?'active':'' }}"
                                                                id="v-pills-{{ $key.$key2 }}" data-toggle="pill"
                                                                href="#v-pills-{{$key.$key2}}-tab" role="tab"
                                                                aria-controls="v-pills-{{$key.$key2}}"
                                                                aria-selected="{{ $j==1?'true':'' }}">
                                                                {{$key2}}
                                                            </a>

                                                            @php
                                                                $j++;
                                                            @endphp
                                                        @endforeach

                                                        <a  data-section="{{ $key }}" 
                                                            data-items="{{ count((array) $main_sections) }}" 
                                                            class="nav-link tab_link_add_btn text-light btn-warning">
                                                            Add New
                                                        </a>

                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <ul class="d-flex justify-content-end bg-dark p-2">
                                                                <style>
                                                                    ul li {
                                                                        list-style-type: none;
                                                                    }
                                                                </style>
                                                                <li><a href="#" class="btn btn-danger mr-3">Reset</a></li>
                                                                <li><a href="#" class="btn btn-warning">Save</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="tab-content" id="v-pills-tabContent2">
                                                        @php
                                                            $jj = 1;
                                                        @endphp
                                                        {{-- 
                                                            1.  $key2 representing like each banner in banners section
                                                                $key2 = 'banner1',
                                                                $key2 = 'banner2',
                                                                $key2 = 'banner3',

                                                            2.  $subSections representing each banner data
                                                                'banner1' => [
                                                                    'title' => [
                                                                        'field_type' => 'text',
                                                                            'value' => null,
                                                                        ],
                                                                    'image' => [
                                                                        'field_type' => 'file',
                                                                        'value' => null,
                                                                    ],
                                                                    ...... 
                                                                ]
                                                        --}}
                                                        @foreach ($main_sections as $key2=>$subSections)
                                                            <div class="tab-pane tab-pane2 fade  {{ $jj==1?'show active':'' }}" 
                                                                id="v-pills-{{$key.$key2}}-tab" role="tabpanel"
                                                                aria-labelledby="v-pills-{{$key.$key2}}">
                                                                
                                                                <div class="card mb-3 shadow-sm border ">
                                                                    <div class="card-body">
                                                                        @php
                                                                            // dd($subSections);
                                                                        @endphp
                                                                        {{-- 
                                                                            1.  $label representing each field name
                                                                                $label = 'title',
                                                                                $label = 'btn_url',

                                                                            2.  $block representing each fild type and value
                                                                                
                                                                                'title' => [
                                                                                    'field_type' => 'text',
                                                                                        'value' => null,
                                                                                    ],
                                                                                'image' => [
                                                                                    'field_type' => 'file',
                                                                                    'value' => null,
                                                                                ],
                                                                                ...... 
                                                                                
                                                                        --}}
                                                                        @foreach ($subSections as $label=>$block)

                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="exampleInputuname">{{ strtoupper( str_replace('_',' ',$label)) }}</label>
                                                                                <div class="input-group mb-3">

                                                                                    @if (isset($block['field_type']))
                                                                                        
                                                                                        @php
                                                                                            // dd($label, $block, $block['field_type'],Base::get_cms_data()->$key->$key2);
                                                                                            // $key = 'banner',
                                                                                            // $key2 = 'banner1',
                                                                                            // $lable = 'title' or 'btn_url' or 'image' ....
                                                                                            // value = actual data;

                                                                                            $value = '';
                                                                                            if(isset(Base::get_cms_data()->$key)
                                                                                                &&
                                                                                                isset(Base::get_cms_data()->$key->$key2)
                                                                                                &&
                                                                                                isset(Base::get_cms_data()->$key->$key2->$label)
                                                                                            ){
                                                                                                $value = Base::get_cms_data()->$key->$key2->$label->value;
                                                                                            }
                                                                                        @endphp
                                                                                        @if ($block['field_type'] == 'text')

                                                                                            <input type="text" class="form-control"
                                                                                                name="{{$key2.'_'.$label}}"
                                                                                                placeholder="{{ strtoupper( str_replace('_',' ',$label)) }}"
                                                                                                value="{{ $value }}">
                                                                                        
                                                                                        @elseif($block['field_type'] == 'file')

                                                                                            <input type="hidden" name="{{$key2.'_'.$label}}_image_old"
                                                                                                value="{{$value}}">

                                                                                            <input type="file" class="form-control"
                                                                                                name="{{$key2.'_'.$label}}"
                                                                                                placeholder="{{ strtoupper( str_replace('_',' ',$label)) }}">

                                                                                            <img style="height:50px; margin:0px 0px 0px 10px;"
                                                                                                value="" src="/{{ $value }}" alt="">

                                                                                        @elseif($block['field_type'] == 'text_area')

                                                                                            <textarea class="form-control" name="{{$key2.'_'.$label}}">{{ $value }}</textarea>
                                                                                        
                                                                                        @endif
                                                                                    @endif
                                                                                </div>
                                                                            </div>

                                                                        @endforeach

                                                                        
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            @php
                                                                $jj++;
                                                            @endphp
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @else
                                <div class="tab-pane fade {{ $i==1?'show active':'' }}" id="v-pills-{{ $key }}" role="tabpanel"
                                aria-labelledby="v-pills-{{ $key }}-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 class="text-uppercase">{{ $key }}</h4>
                                                    <ul class="d-flex justify-content-end bg-dark p-2">
                                                        <style>
                                                            ul li {
                                                                list-style-type: none;
                                                            }
                                                        </style>
                                                        
                                                        <li><a href="#" class="btn btn-danger mr-3">Reset</a></li>
                                                        <li><a href="#" class="btn btn-warning">Save</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @foreach ($main_sections as $label=>$block)

                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputuname">{{ strtoupper( str_replace('_',' ',$label)) }}</label>
                                                    <div class="input-group mb-3">

                                                        @if (isset($block['field_type']))
                                                            
                                                            @php
                                                                // dd($label, $block, $block['field_type'],Base::get_cms_data()->$key->$key2);
                                                                // $key = 'banner',
                                                                // $key2 = 'banner1',
                                                                // $lable = 'title' or 'btn_url' or 'image' ....
                                                                // value = actual data;

                                                                $value = '';
                                                                if(isset(Base::get_cms_data()->$key)
                                                                    &&
                                                                    isset(Base::get_cms_data()->$key->$label)
                                                                ){
                                                                    $value = Base::get_cms_data()->$key->$label->value;
                                                                }
                                                            @endphp
                                                            @if ($block['field_type'] == 'text')

                                                                <input type="text" class="form-control"
                                                                    name="{{$key.'_'.$label}}"
                                                                    placeholder="{{ strtoupper( str_replace('_',' ',$label)) }}"
                                                                    value="{{ $value }}">
                                                            
                                                            @elseif($block['field_type'] == 'file')

                                                                <input type="hidden" name="{{$key.'_'.$label}}_image_old"
                                                                    value="{{$value}}">

                                                                <input type="file" class="form-control"
                                                                    name="{{$key.'_'.$label}}"
                                                                    placeholder="{{ strtoupper( str_replace('_',' ',$label)) }}">

                                                                <img style="height:50px; margin:0px 0px 0px 10px;"
                                                                    value="" src="/{{ $value }}" alt="">

                                                            @elseif($block['field_type'] == 'text_area')

                                                                <textarea class="form-control" name="{{$key.'_'.$label}}">{{ $value }}</textarea>
                                                            
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @php
                                $i++;
                            @endphp

                        @endforeach

                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="row">
                                <div class="col-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-subhome2-tab" data-toggle="pill"
                                            href="#v-pills-subhome2" role="tab" aria-controls="v-pills-subhome2"
                                            aria-selected="true">subHome2</a>
                                        <a class="nav-link" id="v-pills-subprofile2-tab" data-toggle="pill"
                                            href="#v-pills-subprofile2" role="tab" aria-controls="v-pills-subprofile2"
                                            aria-selected="false">asdf</a>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-subhome2" role="tabpanel"
                                            aria-labelledby="v-pills-subhome2-tab">
                                            2Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae,
                                            consequuntur?
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-subprofile2" role="tabpanel"
                                            aria-labelledby="v-pills-subprofile2-tab">
                                            2Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum et
                                            voluptatem iure non, facilis deleniti.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">...</div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script type="text/javascript">
        //     $(".list-group-one a").click(function (e) {
        //     // alert('ok');
        //   e.preventDefault();  
        //     $(this).tab('show');
        // });

        $(function(){
            $('.tab_link_add_btn').on('click',function(){
                let count = $('#v-pills-tab2').children().length - 1;
                let section = $(this).data('section');
                let btn = `
                    <a class="nav-link"
                        id="v-pills-${section}${section}${count+1}" data-toggle="pill"
                        href="#v-pills-${section}${section}${count+1}-tab" role="tab"
                        aria-controls="v-pills-${section}${section}${count+1}"
                        aria-selected="false">
                        ${section}${count+1}
                    </a>
                `;
                console.log();
                $(this).before(btn);

                let tab = `
                    <div class="tab-pane tab-pane2 fade" 
                         id="v-pills-${section}${section}${count+1}-tab" role="tabpanel" 
                         aria-labelledby="v-pills-${section}${section}${count+1}">

                        <div class="card mb-3 shadow-sm border">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputuname">IMAGE</label>
                                    <div class="input-group mb-3">
                                        <input type="hidden" name="${section}${count}_image_image_old" value="" />
                                        <input type="file" class="form-control" name="${section}${count}_image" placeholder="IMAGE" />
                                        <img style="height: 50px; margin: 0px 0px 0px 10px;" value="" src="" alt="" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputuname">TITLE</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="${section}${count}_title" placeholder="TITLE" value="" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputuname">SUB TITLE</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="${section}${count}_sub_title" placeholder="SUB TITLE" value="" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputuname">SLIDING TEXT</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="${section}${count}_sliding_text" placeholder="SLIDING TEXT" value="" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputuname">DESCRIPTION</label>
                                    <div class="input-group mb-3">
                                        <textarea class="form-control" name="${section}${count}_description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputuname">BTN URL</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="${section}${count}_btn_url" placeholder="BTN URL" value="#2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                `;
                
                $(`#v-pills-${section} .tab-content`).append(tab);
            })
        })



    </script>
@endpush