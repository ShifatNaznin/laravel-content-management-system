@extends('cmsblog::layouts.admin') @section('content')
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
            <form method="POST" action="{{route('cms_save')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills bg-dark p-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            @php
                            $i = 1;
                            @endphp
                            @foreach (BlogPackage::cms() as $key=>$Sections)
                            <a class="nav-link {{ $i==1?'active':'' }}" id="v-pills-{{ $key }}-tab" data-toggle="pill"
                                href="#v-pills-{{ $key }}" role="tab" aria-controls="v-pills-{{ $key }}"
                                aria-selected="true">
                                <div class="row justify-content-between">
                                    <span>{{ $key }}</span>
                                    <div class="bt-switch">
                                        <input type="checkbox" checked data-size="mini" />
                                    </div>
                                </div>
                            </a>
                            <input type="hidden" name="section[]" value="{{$key}}">
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
                            @foreach (BlogPackage::get_cms_data() as $key=>$main_sections)
                            @php
                            $main_sections = (array) $main_sections;
                            $cms_data = (array) BlogPackage::get_cms_data();

                            // converting object to array
                            foreach ($main_sections as $tkey => $tvalue) {
                            $tvalue = (array) $tvalue;
                            if(!isset($tvalue['field_type'])){
                            foreach ($tvalue as $tkey2 => $tvalue2) {
                            $tvalue2 = (array) $tvalue2;
                            $tvalue[$tkey2] = $tvalue2;
                            }
                            }
                            $main_sections[$tkey] = $tvalue;
                            }

                            @endphp
                            {{-- 
                                    checking loop elements like banner has multiple banner contents
                                    'banner'=>[
                                        'banner1' => [...],
                                        'banner1' => [...],
                                        'banner1' => [...], 
                                    ]    
                                --}}

                            @if (BlogPackage::array_depth($main_sections) > 2)

                            <div class="tab-pane fade {{ $i==1?'show active':'' }}" id="v-pills-{{ $key }}"
                                role="tabpanel" aria-labelledby="v-pills-{{ $key }}-tab">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">

                                                <div class="nav flex-column nav-pills bg-dark p-2 v-pills-tab2"
                                                    id="v-pills-tab2" role="tablist" aria-orientation="vertical">
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

                                                    @php
                                                    $subSection = (array) $subSections;
                                                    @endphp
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

                                                    <a data-section="{{ $key }}" data-innerection="{{ $key2 }}"
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
                                                    @php
                                                    // counte content ammount

                                                    $count = 1;
                                                    $model_data = [];
                                                    $fields = BlogPackage::cms();
                                                    foreach ( $fields[$key] as $array_index => $array_value) {
                                                    $model_data = $array_value;
                                                    break;
                                                    }
                                                    @endphp
                                                    @foreach ($main_sections as $key2=>$subSections)

                                                    {{-- make every subsections each form body tab --}}
                                                    <div class="tab-pane tab-pane2 fade  {{ $jj==1?'show active':'' }}"
                                                        id="v-pills-{{$key.$key2}}-tab" role="tabpanel"
                                                        aria-labelledby="v-pills-{{$key.$key2}}">

                                                        <div class="card mb-3 shadow-sm border ">
                                                            <div class="card-body">
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

                                                                @php

                                                                // dd($main_sections,$subSections,$model_data);

                                                                if(
                                                                isset(BlogPackage::get_cms_data()->$key)
                                                                &&
                                                                isset(BlogPackage::get_cms_data()->$key->$key2)
                                                                ){
                                                                $data_blogpackage_data = BlogPackage::get_cms_data()->$key->$key2;
                                                                }

                                                                // copy new fields form cms if not existing
                                                                // on saved data at datablogpackage

                                                                // dd($subSections,$data_blogpackage_data );

                                                                if(count($subSections) != count($model_data)){

                                                                foreach ($model_data as $ttkey => $ttvalue) {
                                                                if(isset($subSections[$ttkey])){
                                                                $model_data[$ttkey]['value'] =
                                                                $subSections[$ttkey]['value'];
                                                                }

                                                                }
                                                                $subSections = $model_data;
                                                                }

                                                                // dd($subSections);

                                                                @endphp
                                                                @include('cmsblog::admin.pages.cms-three-make-field',[
                                                                'subSections' => $subSections,
                                                                'key' => $key,
                                                                'key2' => $key2,
                                                                'count' => $count++,
                                                                'data' => $data_blogpackage_data,
                                                                ])

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

                            <div class="tab-pane fade {{ $i==1?'show active':'' }}" id="v-pills-{{ $key }}"
                                role="tabpanel" aria-labelledby="v-pills-{{ $key }}-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="text-uppercase">{{ $key }}</h4>
                                                <ul class="d-flex justify-content-end bg-dark p-2">
                                                    <li><a href="#" class="btn btn-danger mr-3">Reset</a></li>
                                                    <li><a href="#" class="btn btn-warning">Save</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        @php
                                        $model_data = [];
                                        $fields = BlogPackage::cms();
                                        // dd($fields[$key],$key);

                                        $model_data = $fields[$key];

                                        if(count($Sections) != count($model_data)){
                                        foreach ($model_data as $ttkey => $ttvalue) {
                                        if(isset($Sections[$ttkey])){
                                        $model_data[$ttkey]['value'] = $Sections[$ttkey]['value'];
                                        }
                                        }
                                        $Sections = $model_data;
                                        }
                                        // if($key == 'about'){
                                        // dd($model_data,BlogPackage::get_cms_data()->$key);
                                        // }
                                        @endphp
                                        @include('cmsblog::admin.pages.cms-three-make-field',[
                                        'subSections' => $Sections,
                                        'key' => $key,
                                        'key2' => '',
                                        'count' => '',
                                        'data2' => BlogPackage::get_cms_data()->$key,
                                        ])

                                    </div>
                                </div>
                            </div>
                            @endif
                            @php
                            $i++;
                            @endphp

                            @endforeach

                        </div>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<style>
    ul li {
        list-style-type: none;
    }
</style>
<script type="text/javascript">
    //     $(".list-group-one a").click(function (e) {
        //     // alert('ok');
        //   e.preventDefault();  
        //     $(this).tab('show');
        // });

        $(function(){
            $('.tab_link_add_btn').on('click',function(){
                let count = $(this).parents('.v-pills-tab2').children().length - 1;
                let section = $(this).data('section');
                let innerection = $(this).data('innerection');
                let btn = `
                    <a class="nav-link"
                        id="v-pills-${section}${section}${count+1}" data-toggle="pill"
                        href="#v-pills-${section}${section}${count+1}-tab" role="tab"
                        aria-controls="v-pills-${section}${section}${count+1}"
                        aria-selected="false">
                        ${section}${count+1}
                    </a>
                `;
                // console.log(count,section,innerection);
                $(this).before(btn);

                $.get(`/get-inner-field/${section}/${innerection}/${count+1}`,function(response){
                    // console.log(response);
                    let tab = `
                        <div class="tab-pane tab-pane2 fade" 
                            id="v-pills-${section}${section}${count+1}-tab" role="tabpanel" 
                            aria-labelledby="v-pills-${section}${section}${count+1}">

                            <div class="card mb-3 shadow-sm border">
                                <div class="card-body">
                                    ${response}
                                </div>
                            </div>
                        </div>

                    `;
                    $(`#v-pills-${section} .tab-content`).append(tab);
                })

            })
        })


        // console.log('my age' + 20 +':'+'myname : ' + 'adsflk');
        // console.log(`my age ${20} : mayname : ${}`);

</script>
@endpush