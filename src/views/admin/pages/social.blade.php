@extends('cmsblog::layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Add Social Information</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add Social Information</li>
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
                    <form action="{{route('add_allsocial')}}" method="POST" enctype="multipart/form-data"
                        class="form p-t-20">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputuname">Facebook Image</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="facebook_image">
                                @if(BlogPackage::show_all_social()->facebook_image != '')
                                <img src="{{asset(''.BlogPackage::show_all_social()->facebook_image)}}" alt=""
                                    style="width:112px; margin: 0px 0px 0px 35px;">
                                @else
                                <img src="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Facebook Icon</label>
                            <div class="input-group mb-3">

                                <input type="file" class="form-control" name="facebook_icon">
                                @if(BlogPackage::show_all_social()->facebook_icon != '')
                                <img src="{{asset(''.BlogPackage::show_all_social()->facebook_icon)}}" alt=""
                                    style="width:112px; margin: 0px 0px 0px 35px;">
                                @else
                                <img src="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Facebook Link</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="facebook_link" placeholder="Facebook Link"
                                    value="{{ BlogPackage::show_all_social() != NULL ? BlogPackage::show_all_social()->facebook_link : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook Status</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="facebook_status"
                                    placeholder="Facebook Status"
                                    value="{{ BlogPackage::show_all_social() != NULL ? BlogPackage::show_all_social()->facebook_status : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Instagram Image</label>
                            <div class="input-group mb-3">

                                <input type="file" class="form-control" name="instagram_image">
                                @if(BlogPackage::show_all_social()->instagram_image != '')
                                <img src="{{asset(''.BlogPackage::show_all_social()->instagram_image)}}" alt=""
                                    style="width:112px; margin: 0px 0px 0px 35px;">
                                @else
                                <img src="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Instagram Icon</label>
                            <div class="input-group mb-3">

                                <input type="file" class="form-control" name="instagram_icon">
                                @if(BlogPackage::show_all_social()->instagram_icon != '')
                                <img src="{{asset(''.BlogPackage::show_all_social()->instagram_icon)}}" alt=""
                                    style="width:112px; margin: 0px 0px 0px 35px;">
                                @else
                                <img src="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Instagram Link</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="instagram_link"
                                    placeholder="Instagram Link"
                                    value="{{ BlogPackage::show_all_social() != NULL ? BlogPackage::show_all_social()->instagram_link : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Instagram Status</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="instagram_status"
                                    placeholder="Instagram Status"
                                    value="{{ BlogPackage::show_all_social() != NULL ? BlogPackage::show_all_social()->instagram_status : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Twitter Image</label>
                            <div class="input-group mb-3">

                                <input type="file" class="form-control" name="twitter_image">
                                @if(BlogPackage::show_all_social()->twitter_image != '')
                                <img src="{{asset(''.BlogPackage::show_all_social()->twitter_image)}}" alt=""
                                    style="width:112px; margin: 0px 0px 0px 35px;">
                                @else
                                <img src="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Twitter Icon</label>
                            <div class="input-group mb-3">

                                <input type="file" class="form-control" name="twitter_icon">
                                @if(BlogPackage::show_all_social()->twitter_icon != '')
                                <img src="{{asset(''.BlogPackage::show_all_social()->twitter_icon)}}" alt=""
                                    style="width:112px; margin: 0px 0px 0px 35px;">
                                @else
                                <img src="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Twitter Link</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="twitter_link" placeholder="Twitter Link"
                                    value="{{ BlogPackage::show_all_social() != NULL ? BlogPackage::show_all_social()->twitter_link : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Twitter Status</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="twitter_status"
                                    placeholder="Twitter Status"
                                    value="{{ BlogPackage::show_all_social() != NULL ? BlogPackage::show_all_social()->twitter_status : '' }}">
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