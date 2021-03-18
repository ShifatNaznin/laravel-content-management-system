@extends('cmsblog::layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Add Blog Post</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add Blog Post</li>
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
                    <form action="{{route('add_blog_post')}}" method="POST" enctype="multipart/form-data"
                        class="form p-t-20">
                        @csrf


                        <div class="form-group">
                            <label for="exampleInputuname">Category</label>
                            <div class="input-group mb-3">
                                <select class="form-control get-key" name="category" id="">
                                    <option value="">Select Category</option>
                                    @if (BlogPackage::show_all_menu())
                                    @foreach (BlogPackage::show_all_menu() as $key=>$item)

                                    <option value="{{ $key }}">{{ $item->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Sub Category</label>
                            <div class="input-group mb-3">
                                <select class="form-control get-key subcategory" name="subcategory" id="">

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Title</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="title" placeholder="Title"
                                    value="{{old('title')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Sub Title</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="sub_title" placeholder="Sub Title"
                                    value="{{old('sub_title')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Author</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="author" placeholder="Author"
                                    value="{{old('author')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Image</label>
                            <div class="input-group mb-3">

                                <input type="file" class="form-control" name="photo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputuname">Description</label>
                            <div class="input-group mb-3">
                                <textarea id="" name="description" class="form-control" cols="30"
                                    rows="10">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Post Color</label>
                            <div class="input-group mb-3">

                                <input type="color" class="form-control" name="post_color" placeholder="Post Color"
                                    value="{{old('post_color')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Post Status</label>
                            <div class="input-group mb-3">
                                <select class="form-control get-key" name="post_status" id="">
                                    <option value="">Select Status</option>
                                    <option value="active" selected="">Active</option>
                                    <option value="inactive">Inctive</option>


                                </select>
                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Post Tag</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="post_tag" placeholder="Post Tag"
                                    value="{{old('post_tag')}}">
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
@push('js')
<script type="text/javascript">
    $(document).ready(function () {
    $(".btn-info").click(function () {
        var html = $(".clone").html();
        $(".increment").after(html);
    });

    $("body").on("click", ".btn-danger", function () {
        $(this).parents(".control-group").remove();
    });
});

$('.get-key').on('change',function(){
    let value  = $(this).children("option:selected").val();
            $.get(location.origin+'/blog-post-key/'+value,function(response){
                $('.subcategory').html(response);
            })


});

</script>
@endpush