@extends('cmsblog::layouts.admin')
@section('content')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Loan Deatils</h4>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{route('user_index')}}"><i
                        class="feather dripicons-arrow-thin-left mr-2"></i>Back</a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Updated Successfully</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        Error
    </div>
    @endif
    <!-- Start row -->
    <div class="row justify-content-center">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form class="form-validate" method="post" action="{{route('user_update')}}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group row{{$errors->has('role_id')? ' has-error':''}}">
                            <label class="col-sm-3 col-form-label">User-Role:</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="role_id">
                                    @php
                                    $group=DB::table('user_roles')->where('id',$data->role_id)->first();

                                    @endphp
                                <option value="{{$data->role_id}}">{{$group->role_name ?? Null}}</option>
                                    @php
                                    $allRole=DB::table('user_roles')->where('role_status',1)->orderBy('id','ASC')->get();

                                    @endphp
                                    @foreach($allRole as $urole)
                                    <option value="{{$urole->id}}">{{$urole->role_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="name" value="{{$data->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Phone </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="phone" value="{{$data->phone}}">
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('email')? ' has-error':''}}">
                            <label class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="email" value="{{$data->email}}">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row custom_form{{$errors->has('photo')? ' has-error':''}}">
                            <label class="col-sm-3 col-form-label">Photo:</label>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-8">
                                        <input type="file" id="input-file-now-custom-1" name="photo" class="dropify" />
                                    </div>
                                    <div class="col-4">
                                        <img src="{{ asset('uploads/user/'.$data->photo) }}" style="width: 182px;"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row{{$errors->has('password')? ' has-error':''}}">
                            <label class="col-sm-3 col-form-label">Password:</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="password" value="">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Confirm-Password:</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="password_confirmation" value="">
                            </div>
                        </div>


                        <div class="form-group row text-center">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary alert-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
@endsection