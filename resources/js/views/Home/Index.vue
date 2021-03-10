<template>
    <div>
        <Aside></Aside>
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="container">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Stats</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Stats</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card text-white text-center bg-success mb-4">
                                    <div class="card-body">
                                        <h4 class="card-title">Approved books <b>{{ homeData.approved_book_count }}</b></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card text-white text-center bg-warning mb-4">
                                    <div class="card-body">
                                        <h4 class="card-title">Pending books <b>{{ homeData.pending_book_count }}</b></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card text-white text-center bg-danger mb-4">
                                    <div class="card-body">
                                        <h4 class="card-title">Rejected books <b>{{ homeData.rejected_book_count }}</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Aside from '../../components/Aside.vue'
import HomeData from '../../services/User/Home.js'
import {mapActions} from 'vuex'

export default {
    components: {
        Aside
    },
    data() {
        return {
            isLoggedIn: false,
            homeData: []
        }
    },
    created() {
        // this.loadUser()
    },
    mounted() {
        this.loadHomeData();
    },
    methods: {
        ...mapActions('auth', ['getUserData']),
        loadUser() {
            this.getUserData()
                .then(() => {
                    this.isLoggedIn = true
                });
        },
        loadHomeData() {
            HomeData.index()
                .then((response) => {
                    this.homeData = response.data;
                    console.log(response.data)
                })
        }
    }
}
</script>
