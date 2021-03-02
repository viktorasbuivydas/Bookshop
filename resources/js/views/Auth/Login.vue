<template>
    <div class="container">
        <div class="login mt-5">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                v-model="details.email"
                            />
                            <Error :error="$store.state.errors.email"/>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                v-model="details.password"
                            />
                            <Error :error="$store.state.errors.password"/>
                        </div>
                        <button type="button" @click="login" class="btn btn-primary">
                            Sign in
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import Error from '../../components/Error.vue'
export default {
    name: "Login",
    components: {
        Error,
    },
    data: function() {
        return {
            details: {
                email: '',
                password: ''
            },
        };
    },
    computed: {
        ...mapGetters(["errors"])
    },
    mounted() {
        this.$store.commit("setErrors", []);
    },
    methods: {
        ...mapActions("auth", ["sendLoginRequest"]),
        async login() {
            this.$store.commit("setErrors", []);
            this.sendLoginRequest(this.details).then(() => {
                window.location.href = "/home";
            })
                .catch(error => {
                   console.log('error')
                    console.log(error.response.status)
                });
        }
    }
};
</script>
