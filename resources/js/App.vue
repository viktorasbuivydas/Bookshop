<template>
    <div>

            <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
                 data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

            <Header/>
                <div v-if="isLoggedIn">logged in</div>

                <router-view></router-view>
        </div>
    </div>
</template>
<script>
import Header from './components/Header.vue'
import {mapGetters, mapActions} from 'vuex'
export default{
    components: {
        Header,
    },
    created(){
        this.getUserData()
    },
    computed : {
        isLoggedIn : function(){
            return this.$store.getters["auth/user"]
        }
    },
    methods: {
        ...mapActions("auth", ["getUserData"]),
    }

}
</script>
