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
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills bg-dark p-3" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                            role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <div class="row justify-content-between">
                                <span>Home</span>
                                <div class="bt-switch">
                                    <input type="checkbox" checked data-size="mini" />
                                </div>
                            </div>

                        </a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                            role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                            role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                            role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="nav flex-column nav-pills bg-dark p-2" id="v-pills-tab"
                                                role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="v-pills-subhome-tab" data-toggle="pill"
                                                    href="#v-pills-subhome" role="tab" aria-controls="v-pills-subhome"
                                                    aria-selected="true">subHome</a>
                                                <a class="nav-link" id="v-pills-subprofile-tab" data-toggle="pill"
                                                    href="#v-pills-subprofile" role="tab"
                                                    aria-controls="v-pills-subprofile" aria-selected="false">asdf</a>
                                                <a class="nav-link" id="v-pills-submessages-tab" data-toggle="pill"
                                                    href="#v-pills-submessages" role="tab"
                                                    aria-controls="v-pills-submessages"
                                                    aria-selected="false">Hoasdfmasdfasdfe</a>
                                                <a class="nav-link" id="v-pills-subsettings-tab" data-toggle="pill"
                                                    href="#v-pills-subsettings" role="tab"
                                                    aria-controls="v-pills-subsettings" aria-selected="false">asdf</a>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="d-flex justify-content-end bg-dark p-2">
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
                                                <div class="tab-pane fade show active" id="v-pills-subhome"
                                                    role="tabpanel" aria-labelledby="v-pills-subhome-tab">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae,
                                                    consequuntur?
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-subprofile" role="tabpanel"
                                                    aria-labelledby="v-pills-subprofile-tab">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum et
                                                    voluptatem iure non, facilis deleniti.
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-submessages" role="tabpanel"
                                                    aria-labelledby="v-pills-submessages-tab">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea,
                                                    doloremque. Dolor ullam facere ab optio sapiente labore corporis
                                                    modi ad.
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-subsettings" role="tabpanel"
                                                    aria-labelledby="v-pills-subsettings-tab">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum
                                                    expedita, maiores alias excepturi et voluptatibus explicabo impedit
                                                    fugit dignissimos, quidem perspiciatis similique quod repudiandae
                                                    possimus?
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="row">
                                <div class="col-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-subhome2-tab" data-toggle="pill"
                                            href="#v-pills-subhome2" role="tab" aria-controls="v-pills-subhome2"
                                            aria-selected="true">subHome2</a>
                                        <a class="nav-link" id="v-pills-subprofile2-tab" data-toggle="pill"
                                            href="#v-pills-subprofile2" role="tab" aria-controls="v-pills-subprofile2"
                                            aria-selected="false">asdf</a>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-subhome2" role="tabpanel"
                                            aria-labelledby="v-pills-subhome2-tab">
                                            2Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae,
                                            consequuntur?
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-subprofile2" role="tabpanel"
                                            aria-labelledby="v-pills-subprofile2-tab">
                                            2Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum et
                                            voluptatem iure non, facilis deleniti.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">...</div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">...</div>
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