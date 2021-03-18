@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Add Basic Information</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add Basic Information</li>
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
                    <form action="{{route('add_allbasic')}}" method="POST" enctype="multipart/form-data"
                        class="form p-t-20">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputuname">Fast Name</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="f_name" placeholder="FirstName"
                                    value="{{ Basic::show_all_basic() != NULL ? Basic::show_all_basic()->f_name : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Last Name</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="l_name" placeholder="LastName"
                                    value="{{ Basic::show_all_basic() != NULL ? Basic::show_all_basic()->l_name : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <div class="input-group mb-3">

                                <input type="email" class="form-control" name="email" placeholder="Email"
                                    value="{{ Basic::show_all_basic() != NULL ? Basic::show_all_basic()->email : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Mobile One</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="mobile_one" placeholder="Mobile One"
                                    value="{{ Basic::show_all_basic() != NULL ? Basic::show_all_basic()->mobile_one : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Mobile Two</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="mobile_two" placeholder="Mobile Two"
                                    value="{{ Basic::show_all_basic() != NULL ? Basic::show_all_basic()->mobile_two : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Country</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="country" placeholder="Country"
                                    value="{{ Basic::show_all_basic() != NULL ? Basic::show_all_basic()->country : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">State</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="state" placeholder="State"
                                    value="{{ Basic::show_all_basic() != NULL ? Basic::show_all_basic()->state : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputuname">Address</label>
                            <div class="input-group mb-3">
                                <textarea name="address" class="form-control" name="address" id="" cols="30" rows="10"
                                    value="">{{ Basic::show_all_basic() != NULL ? Basic::show_all_basic()->address : '' }}</textarea>
                                {{-- <input type="text" class="form-control" name="address" placeholder="Address" value="{{ Basic::show_all_basic() != NULL ? Basic::show_all_basic()->address : '' }}">
                                --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd1">Header Logo</label>
                            <div class="input-group mb-3">

                                <input type="file" class="form-control" name="header_logo">
                                <img src="{{asset(''.Basic::show_all_basic()->header_logo)}}" alt="" style="width:
                                112px;
                                margin: 0px 0px 0px 35px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd2">Footer Logo</label>
                            <div class="input-group mb-3">

                                <input type="file" class="form-control" name="footer_logo">
                                {{-- <img src="{{asset(''.Basic::show_all_basic()->footer_logo)}}" alt="" style="width:
                                112px;
                                margin: 0px 0px 0px 35px;"> --}}
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