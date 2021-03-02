import Vue from 'vue'
import Vuex from 'vuex'
import auth from './auth'
Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        errors: [],
        success: null
    },

    getters: {
        errors: state => state.errors,
        success: state => state.success
    },

    mutations: {
        setErrors(state, errors) {
            state.errors = errors;
        },
        setSuccess(state, success) {
            state.success = success;
        }
    },

    actions: {},

    modules: {
        auth,
    }
});
