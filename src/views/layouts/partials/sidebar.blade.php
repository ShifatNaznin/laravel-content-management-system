<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img
                            src="{{asset('package_assets/admin')}}/assets/images/users/1.jpg" alt="user-img"
                            class="img-circle"><span class="hide-menu">Mark Jeckson</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>

                <li> <a class="waves-effect waves-dark" href="{{route('home')}}" aria-expanded="false"><i
                            class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                    <!-- <ul aria-expanded="false" class="collapse">
                        <li><a href="index.html">Minimal </a></li>
                        <li><a href="index2.html">Analytical</a></li>
                        <li><a href="index3.html">Demographical</a></li>
                        <li><a href="index4.html">Modern</a></li>
                    </ul> -->
                </li>

                <li> <a class="waves-effect waves-dark" href="{{route('basic_info')}}" aria-expanded="false"><i
                            class="ti-layout-grid2"></i><span class="hide-menu">Basic Info</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{route('theme_info')}}" aria-expanded="false"><i
                            class="ti-menu"></i><span class="hide-menu">Theme Info</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{route('social_info')}}" aria-expanded="false"><i
                            class="ti-light-bulb"></i><span class="hide-menu">Social Info</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{route('menu')}}" aria-expanded="false"><i
                            class="ti-view-list"></i><span class="hide-menu">Menu</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{route('sub_menu')}}" aria-expanded="false"><i
                            class="ti-view-list"></i><span class="hide-menu">Sub Menu</span></a></li>
                {{-- <li> <a class="waves-effect waves-dark" href="{{route('blog_post')}}" aria-expanded="false"><i
                            class="ti-pencil-alt"></i><span class="hide-menu">Blog Post</span></a></li> --}}
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-pencil-alt"></i><span class="hide-menu">Blog Post</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('all_blog_post')}}">All Post</a></li>
                        <li><a href="{{route('blog_post')}}">Add</a></li>
                    </ul>
                </li>
                {{-- <li> <a class="waves-effect waves-dark" href="{{route('cms')}}" aria-expanded="false"><i
                    class="ti-view-list"></i><span class="hide-menu">CMS OLD</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{route('cms_two')}}" aria-expanded="false"><i
                    class="ti-view-list"></i><span class="hide-menu">CMS TWO</span></a></li> --}}
                <li> <a class="waves-effect waves-dark" href="{{route('cms_three')}}" aria-expanded="false"><i
                    class="ti-view-list"></i><span class="hide-menu">CMS</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>