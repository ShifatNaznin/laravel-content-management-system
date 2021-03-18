@extends('cmsblog::layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Add Menu Information</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add Menu Information</li>
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
                    <form action="{{route('add_allmenu')}}" method="POST" enctype="multipart/form-data"
                        class="form p-t-20">
                        @csrf

                        <div class="form-group  increment">
                            <label for="exampleInputuname">Menu</label>
                            @php
                            // dd(Base::show_all_menu());

                            @endphp
                            @if (BlogPackage::show_all_menu())

                            @foreach (BlogPackage::show_all_menu() as $item)
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="menu[]" placeholder="Menu"
                                    value="{{ $item->name }}">

                                <div class="input-group-append">
                                    <button class="btn btn-info" type="button"><i class="ti-plus"></i> Add</button>
                                </div>
                            </div>

                            @endforeach

                            @else
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="menu[]" placeholder="Menu" value="">

                                <div class="input-group-append">
                                    <button class="btn btn-info" type="button"><i class="ti-plus"></i> Add</button>
                                </div>
                            </div>
                            @endif



                        </div>

                        <div class="input-group mb-3 clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="text" name="menu[]" class="form-control" placeholder="Menu">
                                <div class="input-group-append">
                                    <button class="btn btn-danger" type="button"><i
                                            class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
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



</script>
@endpush