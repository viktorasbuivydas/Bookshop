@auth
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic"><img src="../../assets/images/users/1.jpg" alt="users"
                                                   class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu m-l-10">
                            <p>
                                <h5 class="m-b-0 user-name font-medium">{{  Auth::user()->name }} </h5>
                                <span class="op-5 user-email">{{  Auth::user()->email }}</span>
                            </p>

                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <li class="p-15 m-t-10"><a href="{{route('user.books.create')}}"
                                           class="btn d-block w-100 create-btn text-white no-block d-flex align-items-center"><i
                            class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Create New Book</span> </a>
                </li>
                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="{{ route('user.books.index') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">My Books</span></a></li>
                @admin
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="{{ route('admin.books.approve') }}" aria-expanded="false"><i class="mdi mdi-notification-clear-all"></i><span
                            class="hide-menu">Approve books</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="{{ route('admin.genres.index')}}" aria-expanded="false"><i
                            class="mdi mdi-account-network"></i><span class="hide-menu">Genres</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="{{route('admin.authors.index')}}" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                            class="hide-menu">Authors</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="{{route('admin.reviews.index')}}" aria-expanded="false"><i class="mdi mdi-face"></i><span
                            class="hide-menu">Reviews</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="{{route('admin.reports.index')}}" aria-expanded="false"><i class="mdi mdi-file"></i><span
                            class="hide-menu">Reports</span></a></li>
                @endadmin
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
@endauth
