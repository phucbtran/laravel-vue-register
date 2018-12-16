<template>
    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">IN+</h1>
            </div>
            <h3>Register to SRF SOFTWARE MEMBER</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" method="POST" v-on:submit="register()">
                <div class="form-group">
                    <input type="text" class="form-control" v-model="user.name" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" v-model="user.email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" v-model="user.password" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" v-model="user.password_confirmation" placeholder="Confirm Password" required="">
                </div>
                <div class="form-group">
                    <select class="form-control m-b" v-model="user.role_id">
                        <option value="">Choose Role</option>
                        <option v-for="role in roles" v-bind:value="role.id">{{ role.name }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control m-b" v-model="user.department_id">
                        <option value="">Choose Department</option>
                        <option v-for="department in departments" v-bind:value="department.id">{{ department.name }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button class="btn btn-primary block full-width m-b" type="submit">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="">Login</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2018</small> </p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {
                    name: "",
                    email: "",
                    password: "",
                    password_confirmation: "",
                    role_id: "",
                    department_id: "",
                },
                roles: [],
                departments: [],
                errors: [],
            }
        },
        mounted() {
            axios.get('api/register')
                .then(response => {
                    this.roles = response.data.roles;
                    this.departments = response.data.departments;
                })
                .catch(error => {
                    console.log(error);
                    alert("Could not load resource");
                });
        },
        methods: {
            register() {
                event.preventDefault();
                if (this.user.password === this.user.password_confirmation) {
                    var newUser = this.user;
                    axios.post('api/register', newUser)
                        .then(response => {
                            localStorage.setItem('user',JSON.stringify(response.data.user));
                            localStorage.setItem('jwt',response.data.token);

                            if (localStorage.getItem('jwt') != null){
                                // this.$emit('loggedIn');
                                // if(this.$route.params.nextUrl != null){
                                //     this.$router.push(this.$route.params.nextUrl)
                                // }
                                // else{
                                //     this.$router.push('/home')
                                // }
                                this.$router.push('/welcome');
                            }
                        })
                        .catch(error => {
                            console.log(error + "loi roi");
                            this.errors = error.data.error;
                            alert(this.errors)
                        })
                } else {
                    this.user.password = "";
                    this.user.password_confirmation = "";
                    return alert('Passwords do not match')
                }
            }
        }
    }
</script>
<style lang="scss" scoped>
</style>