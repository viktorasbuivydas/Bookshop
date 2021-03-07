<template>
    <div>

            <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
                 data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

            <Header/>

                <router-view></router-view>
        </div>
    </div>
</template>
<script>
import Header from './components/Header.vue'
import { mapGetters, mapActions } from 'vuex';

export default{
    components: {
        Header,
    },

    computed : {

    },
    created() {
      this.isLoggedIn()
    },
    methods: {
        ...mapActions('auth', ['getUserData']),
        isLoggedIn(){
            if(localStorage.getItem('token')){
                this.getUserData();
            }
        }
    }

}
</script>
