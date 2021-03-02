<template>
    <div class="container">
        <div class="login mt-5">
            <div class="card">
                <div class="card-header">
                    Registration
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="email">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="firstName"
                                v-model="details.name"
                            />
                        <Error :error="$store.state.errors.name"/>
                        </div>

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
                        <div class="form-group">
                            <label for="password_confirmation">Password confirmation</label>
                            <input
                                type="password"
                                class="form-control"
                                id="password_confirmation"
                                v-model="details.password_confirmation"
                            />
                        </div>
                        <div class="form-group">
                            <label for="password">Date of birth</label>
                            <input
                                type="date"
                                class="form-control"
                                id="date"
                                v-model="details.date_of_birth"
                            />
                            <Error :error="$store.state.errors.password"/>
                        </div>
                        <button type="button" @click="register" class="btn btn-primary">
                            Sign up
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import Error from '../../components/Error.vue'
export default {
    name: "Register",
    components: {
        Error,
    },
    data: function() {
        return {
            details: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                date_of_birth: '',
            },
            error: '',
        };
    },
    computed: {
        ...mapGetters(["errors"])
    },
    mounted() {
        this.$store.commit("setErrors", []);
    },
    methods: {
        ...mapActions("auth", ["sendRegisterRequest"]),
        async register() {
            console.log(this.details)
            this.$store.commit("setErrors", []);
            this.sendRegisterRequest(this.details).then(() => {
                window.location.href = "/home";
            })
                .catch(error => {
                    if (error.response && error.response.status === 422) {
                        console.log(error.response.data.errors)
                        this.$store.commit("setErrors", error.response.data.errors);
                    }
                });

        },
    }
};
</script>
