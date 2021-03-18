@extends('cmsblog::layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">View Blog Post</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">View Blog Post</li>
                </ol>
                <a href="{{route('all_blog_post')}}" class="btn btn-info d-none d-lg-block m-l-15"> <i
                        class="ti-arrow-left "></i> Back</a>
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
                    <h4 class="card-title">View Blog Post</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">


                            <tr>
                                <td>Category</td>
                                <td>:</td>
                                <td>{{$data->category}}</td>
                            </tr>
                            <tr>
                                <td>Sub Category</td>
                                <td>:</td>
                                <td>{{$data->subcategory}}</td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td>:</td>
                                <td>{{$data->title}}</td>
                            </tr>
                            <tr>
                                <td>Sub Title</td>
                                <td>:</td>
                                <td>{{$data->sub_title}}</td>
                            </tr>
                            <tr>
                                <td>Author</td>
                                <td>:</td>
                                <td>{{$data->author}}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>:</td>
                                <td>{!!$data->description!!}</td>
                            </tr>
                            <tr>
                                <td>Post Color</td>
                                <td>:</td>
                                <td>
                                    <div class="row">
                                        <div>{{$data->post_color}}</div>
                                        <div style="width: 100px; height: 30px; background: {{$data->post_color}}; margin: 0px 0px 0px 10px;">
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>Post Status</td>
                                <td>:</td>
                                <td>{{$data->post_status}}</td>
                            </tr>
                            <tr>
                                <td>Post Tag</td>
                                <td>:</td>
                                <td>{{$data->post_tag}}</td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>:</td>
                                <td><img src="{{ asset(''.$data->photo) }}" alt=""
                                        style="width:112px; margin: 0px 0px 0px 0px;"></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection