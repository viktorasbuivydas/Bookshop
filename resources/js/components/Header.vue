<template>

    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="/">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <i class="ti-book text-white"></i>
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                    Bookshop
                </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-start me-auto">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item search-box">
                        <form class="d-flex" method="GET" action="">
                            <input type="text" name="search" class="form-control" value=""placeholder="Search for book">
                            <button class="btn btn-primary mx-2">Search</button>
                        </form>
                    </li>
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-end align-items-center">
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <router-link v-if="!isLoggedIn" :to="{ name: 'login' }" class="btn btn-primary mx-1"><i class="ti-user m-r-5 m-l-5"></i>
                        Login</router-link>
                    <router-link v-if="!isLoggedIn" :to="{ name: 'register' }" class="btn btn-primary mx-1"><i class="ti-plus m-r-5 m-l-5"></i>
                        Register</router-link>
                    <li v-if="isLoggedIn">
                        <router-link :to="{ name: 'user.books.create' }" class="btn btn-primary mx-1">Add Book to Listing</router-link>
                    </li>

                    <li v-if="isLoggedIn" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">

                            <router-link class="dropdown-item" :to="{ name: 'home' }"><i class="ti-home m-r-5 m-l-5"></i>
                                Dashboard</router-link>
                            <router-link class="dropdown-item" :to="{ name: 'user.settings.index' }"><i class="ti-user m-r-5 m-l-5"></i>
                                Settings</router-link>
                            <router-link class="dropdown-item" :to="{ name: 'logout' }" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-5 m-l-5"></i>
                                Log out</router-link>
                            <form id="logout-form" action="logout" method="POST" style="display: none;">
                            </form>
                        </ul>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>

</template>
<script>
export default {

    computed : {
        isLoggedIn : function(){
            return this.$store.getters["auth/user"]
        }
    },
}
</script>
