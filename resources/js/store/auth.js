import axios from 'axios'

const VUE_APP_API_URL = '/api/v1/'
export default {
    namespaced: true,

    state: {
        userData: null
    },

    getters: {
        user: state => state.userData
    },

    mutations: {
        setUserData(state, user) {
            state.userData = user;
        }
    },

    actions: {
        getUserData({commit}) {
            axios
                .get(VUE_APP_API_URL + 'user/me')
                .then(response => {
                    commit('setUserData', response.data);
                    console.log(response)
                })
                .catch(() => {
                    localStorage.removeItem('token');
                });
        },
        sendLoginRequest({commit}, data) {
            commit('setErrors', {}, {root: true})

            return axios
                .post(VUE_APP_API_URL + 'auth/login', data)
                .then(response => {

                    if (response.status == 200) {
                        const token = response.data.data.token
                        localStorage.setItem('token', token)
                        axios.defaults.headers.common['Authorization'] = token
                    }

                });

        },
        sendRegisterRequest({commit}, data) {
            commit('setErrors', {}, {root: true});
            return axios
                .post(VUE_APP_API_URL + 'auth/register', data)
                .then(response => {
                    if (response.status == 200) {
                        const token = response.data.data.token
                        commit('setUserData', response.data.user);
                        localStorage.setItem('token', token);
                        axios.defaults.headers.common['Authorization'] = token
                    }
                })

        },
        sendLogoutRequest({commit}) {
            commit('setUserData', null);
            return axios
                .post(VUE_APP_API_URL + 'auth/logout')
                .then(response => {
                    if (response.status == 200) {
                        localStorage.removeItem('token');
                        this.$router.push('/');
                    }
                })

        },

    }
};
