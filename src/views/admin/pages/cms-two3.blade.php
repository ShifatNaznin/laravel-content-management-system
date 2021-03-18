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
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-3 col-md-3" style="border-right: 1px solid #efefef;">
                        <div class="card-body inbox-panel">
                            <div class="nav flex-column nav-pills p-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                @php
                                $i = 1;
                                @endphp
                                @foreach (Base::cms() as $key=>$item)
                                {{-- @php

                                dd($i);
                                @endphp --}}
                                <a class="nav-link {{ $i==1?'active':'' }}" id="v-pills-{{ $key }}-tab"
                                    data-toggle="pill" href="#v-pills-{{ $key }}" role="tab"
                                    aria-controls="v-pills-{{ $key }}" aria-selected="true">{{ $key }}</a>
                                @php
                                $i++;
                                @endphp
                                @endforeach

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        {{-- <div class="card-body inbox-panel"> --}}
                        <div class="tab-content" id="v-pills-tabContent">
                            @php
                            $i = 1;
                            @endphp
                            @foreach (Base::cms() as $key=>$item)


                            <div class="tab-pane fade {{ $i==1?'show active':'' }}" id="v-pills-{{ $key }}"
                                role="tabpanel" aria-labelledby="v-pills-{{ $key }}-tab">

                                {{-- <div class="card"> --}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="card-body inbox-panel">
                                                <div class="nav flex-column nav-pills" id="v-pills-{{ $key }}"
                                                    role="tablist" aria-orientation="vertical">
                                                    @php
                                                    $j = 1;
                                                    @endphp
                                                    @foreach ($item as $key=>$itemtwo)
                                                    {{-- @php
                                                    dd($key);
                                                @endphp --}}
                                                    <a class="nav-link {{ $j==1?'active':'' }}"
                                                        id="v-pills-{{ $key }}-tab" data-toggle="pill"
                                                        href="#v-pills-{{$key}}-subhome" role="tab"
                                                        aria-controls="v-pills-subhome"
                                                        aria-selected="true">{{$key}}</a>
                                                    @php
                                                    $j++;
                                                    @endphp
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="d-flex justify-content-end p-2"
                                                        style="background-color: #e3e3e3 !important;">
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

                                            <div class="tab-content" id="v-pills-tabContent">
                                                @php
                                                $j = 1;
                                                @endphp

                                                @foreach (Base::cms() as $key=>$blocks)
                                                
                                                @php
                                                dd($key);
                                                @endphp
                                                <div class="tab-pane fade {{ $j==1?'show active':'' }}"
                                                    id="v-pills-{{$key}}-subhome" role="tabpanel"
                                                    aria-labelledby="v-pills-subhome-tab">
                                                    <h4 style="text-transform: capitalize;">{{$key}}</h4>
                                                    <input type="hidden" name="section[]" value="{{$key}}">
                                                    {{-- @if (is_array($blocks)) --}}

                                                    {{-- @php
                                                        dd(Base::cms());
                                                    @endphp --}}
                                                    {{-- <div class="card mb-3 shadow-sm border ">
                                                        <div class="card-body">
                                                            @foreach ($blocks as $single_block_keys=>$single_blocks)

                                                            @if (is_array($single_blocks))
                                                            @if (Base::array_depth($blocks) > 2)
                                                            <div class="card mb-3 shadow-sm border ">
                                                                <div class="card-body">
                                                                    @foreach ($single_blocks as $label=>$block)

                                                                    <div class="form-group">
                                                                        <label
                                                                            for="exampleInputuname">{{ strtoupper( str_replace('_',' ',$label)) }}</label>
                                                    <div class="input-group mb-3">

                                                        @if (isset($block['field_type']))
                                                        @php
                                                        $value = '';
                                                        //
                                                        // dd(Base::get_cms_data()->counter->counter1->icon);
                                                        if(
                                                        isset(Base::get_cms_data()->$key)
                                                        &&
                                                        isset(Base::get_cms_data()->$key->$single_block_keys)
                                                        &&
                                                        isset(Base::get_cms_data()->$key->$single_block_keys->$label)
                                                        ){
                                                        $value =
                                                        Base::get_cms_data()->$key->$single_block_keys->$label->value;
                                                        }
                                                        @endphp
                                                        @if ($block['field_type'] == 'text')
                                                        <input type="text" class="form-control"
                                                            name="{{$single_block_keys.'_'.$label}}"
                                                            placeholder="{{ strtoupper( str_replace('_',' ',$label)) }}"
                                                            value="{{ $value }}">
                                                        @elseif($block['field_type'] == 'file')
                                                        <input type="file" class="form-control"
                                                            name="{{$single_block_keys.'_'.$label}}"
                                                            placeholder="{{ strtoupper( str_replace('_',' ',$label)) }}">
                                                        <img style="height:50px;margin: 0px 0px 0px 10px;" value=""
                                                            src="/{{ $value }}" alt="">
                                                        <input type="hidden"
                                                            name="{{$single_block_keys.'_'.$label}}_image_old"
                                                            value="{{$value}}">

                                                        @elseif($block['field_type'] == 'text_area')
                                                        <textarea class="form-control"
                                                            name="{{$single_block_keys.'_'.$label}}"></textarea>
                                                        @endif
                                                        @endif
                                                    </div>
                                                </div>

                                                @endforeach
                                            </div>
                                        </div>

                                        @else
                                        <div class="form-group">
                                            <label
                                                for="exampleInputuname">{{ strtoupper( str_replace('_',' ',$single_block_keys)) }}</label>
                                            <div class="input-group mb-3">
                                                @php
                                                $value =
                                                Base::get_cms_data()->$key->$single_block_keys->value;
                                                @endphp
                                                @if ($single_blocks['field_type'] == 'text')
                                                <input type="text" class="form-control"
                                                    name="{{ $key.'_'.$single_block_keys }}"
                                                    placeholder="{{ strtoupper( str_replace('_',' ',$single_block_keys))}}"
                                                    value="{{$value  }}">
                                                @elseif($single_blocks['field_type'] == 'file')
                                                <img style="height:50px;margin:10px 0px;" value="" src="/{{ $value }}"
                                                    alt="">
                                                <input type="hidden" name="{{$key.'_'.$single_block_keys}}_image_old"
                                                    value="{{$value}}">
                                                <input type="file" class="form-control"
                                                    name="{{ $key.'_'.$single_block_keys }}"
                                                    placeholder=" {{ strtoupper( str_replace('_',' ',$single_block_keys))}}"
                                                    value="">
                                                @elseif($single_blocks['field_type'] == 'text_area')
                                                <textarea class="form-control"
                                                    name="{{ $key.'_'.$single_block_keys }}">{{ $value }}</textarea>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                        @endif
                                        @endforeach
                                    </div>
                                </div> --}}
                                {{-- @endif --}}
                            </div>
                            @php
                            $j++;
                            @endphp
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
        @php
        $i++;
        @endphp

        @endforeach

    </div>

    {{-- </div> --}}
</div>

</div>
</div>
</div>
</div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(".list-group-one a").click(function (e) {
    // alert('ok');
  e.preventDefault();  
    $(this).tab('show');
});



</script>
@endpush