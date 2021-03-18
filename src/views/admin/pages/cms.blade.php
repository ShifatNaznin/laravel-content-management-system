@extends('cmsblog::layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">CMS</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">CMS</li>
                </ol>
                {{-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15">Create New</button> --}}
            </div>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        Added Successfully
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        Error
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">Sample Form with the Icons</h4>
                    <h6 class="card-subtitle">made with bootstrap elements</h6> --}}
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach (BlogPackage::cms() as $key=>$item)
                                    <a class="nav-link {{ $i==1?'active':'' }}" id="v-pills-{{ $key }}-tab"
                                        data-toggle="pill" href="#v-pills-{{ $key }}" role="tab"
                                        aria-controls="v-pills-{{ $key }}" aria-selected="true">{{ $key }}</a>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </div>
                        </div>
                        <div class="col-9">
                            <form method="POST" action="{{route('cms_save')}}" enctype="multipart/form-data" style="height: 70vh;overflow-y: scroll;margin:0;padding:0;">

                                <div class="tab-content" id="v-pills-tabContent">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @csrf
                                    @foreach (BlogPackage::cms() as $key=>$blocks)
                                        <div class="tab-pane fade {{ $i==1?'show active':'' }}" id="v-pills-{{ $key }}"
                                            role="tabpanel" aria-labelledby="v-pills-{{ $key }}-tab">
                                            {{-- {{ $key }} --}}
                                            <input type="text" name="section[]" value="{{$key}}">

                                            @if (is_array($blocks))
                                                
                                                {{-- @php
                                                    dd(BlogPackage::cms());
                                                @endphp --}}
                                                <div class="card mb-3 shadow-sm border ">
                                                    <div class="card-body">
                                                        @foreach ($blocks as $single_block_keys=>$single_blocks)
                                                            
                                                            @if (is_array($single_blocks))
                                                                @if (BlogPackage::array_depth($blocks) > 2)
                                                                    <div class="card mb-3 shadow-sm border ">
                                                                        <div class="card-body">
                                                                            @foreach ($single_blocks as $label=>$block)
                                                                                
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputuname">{{ strtoupper( str_replace('_',' ',$label)) }}</label>
                                                                                    <div class="input-group mb-3">

                                                                                        @if (isset($block['field_type']))
                                                                                            @php
                                                                                                $value = '';
                                                                                                // dd(BlogPackage::get_cms_data()->counter->counter1->icon);
                                                                                                if(
                                                                                                    isset(BlogPackage::get_cms_data()->$key) 
                                                                                                    && isset(BlogPackage::get_cms_data()->$key->$single_block_keys)
                                                                                                    && isset(BlogPackage::get_cms_data()->$key->$single_block_keys->$label)
                                                                                                    ){
                                                                                                    $value = BlogPackage::get_cms_data()->$key->$single_block_keys->$label->value;
                                                                                                }
                                                                                            @endphp
                                                                                            @if ($block['field_type'] == 'text')
                                                                                                <input type="text" class="form-control" name="{{$single_block_keys.'_'.$label}}"
                                                                                                    placeholder="{{ strtoupper( str_replace('_',' ',$label)) }}" 
                                                                                                    value="{{ $value }}"
                                                                                                    >
                                                                                            @elseif($block['field_type'] == 'file')
                                                                                                <img style="height:50px;margin:10px 0px;" value="" src="/{{ $value }}" alt="">
                                                                                                <input type="hidden" name="{{$single_block_keys.'_'.$label}}_image_old" value="{{$value}}">
                                                                                                <input type="file" class="form-control" name="{{$single_block_keys.'_'.$label}}"
                                                                                                    placeholder="{{ strtoupper( str_replace('_',' ',$label)) }}">
                                                                                            @elseif($block['field_type'] == 'text_area')
                                                                                                <textarea class="form-control" name="{{$single_block_keys.'_'.$label}}"></textarea>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                    
                                                                            @endforeach
                                                                        </div>
                                                                    </div>

                                                                @else
                                                                    <div class="form-group">
                                                                        <label for="exampleInputuname">{{ strtoupper( str_replace('_',' ',$single_block_keys)) }}</label>
                                                                        <div class="input-group mb-3">
                                                                            @php
                                                                                $value = BlogPackage::get_cms_data()->$key->$single_block_keys->value;
                                                                            @endphp
                                                                            @if ($single_blocks['field_type'] == 'text')
                                                                                <input type="text" class="form-control" name="{{ $key.'_'.$single_block_keys }}"
                                                                                    placeholder="{{ strtoupper( str_replace('_',' ',$single_block_keys))}}" 
                                                                                    value="{{$value  }}">
                                                                            @elseif($single_blocks['field_type'] == 'file')
                                                                                <img style="height:50px;margin:10px 0px;" value="" src="/{{ $value }}" alt="">
                                                                                <input type="hidden" name="{{$key.'_'.$single_block_keys}}_image_old" value="{{$value}}">
                                                                                <input type="file" class="form-control" name="{{ $key.'_'.$single_block_keys }}"
                                                                                    placeholder=" {{ strtoupper( str_replace('_',' ',$single_block_keys))}}" 
                                                                                    value="">
                                                                            @elseif($single_blocks['field_type'] == 'text_area')
                                                                                <textarea class="form-control" name="{{ $key.'_'.$single_block_keys }}">{{ $value }}</textarea>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                            
                                </div>

                                <button class="btn btn-success" type="submit">Submit</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection