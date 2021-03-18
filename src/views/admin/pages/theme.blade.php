@extends('cmsblog::layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Add Theme Information</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add Theme Information</li>
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
                    <form action="{{route('add_alltheme')}}" method="POST" enctype="multipart/form-data"
                        class="form p-t-20">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputuname">Color</label>
                            <div class="input-group mb-3">

                                <input type="color" class="form-control" name="color" placeholder="FirstName"
                                    value="{{ BlogPackage::show_all_theme() != NULL ? BlogPackage::show_all_theme()->color : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Heading Color</label>
                            <div class="input-group mb-3">

                                <input type="color" class="form-control" name="heading_color"
                                    placeholder="Heading Color"
                                    value="{{ BlogPackage::show_all_theme() != NULL ? BlogPackage::show_all_theme()->heading_color : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sub Heading Color</label>
                            <div class="input-group mb-3">

                                <input type="color" class="form-control" name="sub_heading_color"
                                    placeholder="Sub Heading Color"
                                    value="{{ BlogPackage::show_all_theme() != NULL ? BlogPackage::show_all_theme()->sub_heading_color : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Paragraph Color</label>
                            <div class="input-group mb-3">

                                <input type="color" class="form-control" name="paragraph_color"
                                    placeholder="Paragraph Color"
                                    value="{{ BlogPackage::show_all_theme() != NULL ? BlogPackage::show_all_theme()->paragraph_color : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Background Image</label>
                            <div class="input-group mb-3">

                                <input type="file" class="form-control" name="background_image">
                                @if(BlogPackage::show_all_theme()->background_image)
                                <img src="{{asset(''.BlogPackage::show_all_theme()->background_image)}}" alt="" style="width:112px; margin: 0px 0px 0px 35px;">
                                @else
                                <img src="">
                                @endif
  
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Background Color</label>
                            <div class="input-group mb-3">

                                <input type="color" class="form-control" name="background_color"
                                    placeholder="Background Color"
                                    value="{{ BlogPackage::show_all_theme() != NULL ? BlogPackage::show_all_theme()->background_color : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Section Heading Size</label>
                            <div class="input-group mb-3">

                                <input type="number" class="form-control" name="section_heading_size"
                                    placeholder="Section Heading Size"
                                    value="{{ BlogPackage::show_all_theme() != NULL ? BlogPackage::show_all_theme()->section_heading_size : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Section Sub Heading Size</label>
                            <div class="input-group mb-3">

                                <input type="number" class="form-control" name="section_sub_heading_size"
                                    placeholder="Section Sub Heading Size"
                                    value="{{ BlogPackage::show_all_theme() != NULL ? BlogPackage::show_all_theme()->section_sub_heading_size : '' }}">
                            </div>
                        </div>



                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                        {{-- <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button> --}}
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection