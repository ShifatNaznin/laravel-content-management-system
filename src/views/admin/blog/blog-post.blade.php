@extends('cmsblog::layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">All Blog Post</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Blog Post</li>
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
    @if(Session::has('success-two'))
    <div class="alert alert-danger" role="alert">
        Delete Successfully
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
                    <h4 class="card-title">All Post</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Author</th>
                                    <th>Description</th>
                                    <th>Post Color</th>
                                    <th>Post Status</th>
                                    <th>Post Tag</th>
                                    <th>Image</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (BlogPackage::get_all_post(['orderBy'=>'DESC','paginate'=>10]) as $data)
                                <tr>
                                    <td>{{$data->category}}</td>
                                    <td>{{$data->subcategory}}</td>
                                    <td>{{ BlogPackage::find_post($data->id,'title') }}</td>
                                    <td>{{$data->sub_title}}</td>
                                    <td>{{$data->author}}</td>
                                    <td>{{ Str::limit(BlogPackage::find_post($data->id,'description'),100,'..') }}</td>
                                    <td>{{$data->post_color}}</td>
                                    <td>{{$data->post_status}}</td>
                                    <td>{{$data->post_tag}}</td>
                                    <td><img src="{{ asset(''.BlogPackage::find_post($data->id,'photo')) }}" alt=""
                                            style="width:112px; margin: 0px 0px 0px 0px;"></td>
                                    <td>
                                        <a href="{{route('view_blog_post',$data->id)}}" title="View"><i
                                                class="ti-eye"></i></a>
                                        <a href="{{route('edit_blog_post',$data->id)}}" title="Edit"><i
                                                class="ti-pencil"></i></a>
                                        <a href="{{route('delete_blog_post',$data->id)}}" title="Delete"><i
                                                class="ti-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection