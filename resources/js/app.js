require('./bootstrap');

import Vue from 'vue'
import Vuex from 'vuex'
import VueRouter from 'vue-router'
import App from './App.vue';
import router from './router';
import store from './store'
import axios from 'axios';
Vue.use(VueRouter)
Vue.use(Vuex)
axios.interceptors.response.use(
    response => response,
    error => {
        if (error.response.status === 422) {
            store.commit("setErrors", error.response.data.errors);
        } else if (error.response.status === 401) {
            store.commit("auth/setUserData", null);
            localStorage.removeItem("authToken");
            router.push({ name: "login" });
        } else {
            return Promise.reject(error);
        }
    }
);

axios.interceptors.request.use(function(config) {
    config.headers.common = {

        Authorization: `Bearer ${localStorage.getItem("authToken")}`,
        "Content-Type": "application/json",
        Accept: "application/json"
    };

    return config;
});

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app');
