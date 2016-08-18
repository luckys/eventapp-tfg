<template>
    <form method="POST" @submit.prevent="registerUser" role="form">
        <fieldset>
            <div class="form-group ">
                <input class="form-control" v-model="user.id" name="id" type="hidden" id="email">
            </div>

            <div class="form-group ">
                <label for="email">Correo</label>
                <input class="form-control" v-model="user.email" name="email" type="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input class="form-control " v-model="user.password" name="password" type="password" id="password"
                       required>
            </div>

            <div class="form-group">
                <label for="password">Nombre</label>
                <input class="form-control " v-model="user.firstname" name="firstname" type="text" id="firstname"
                       required>
            </div>

            <div class="form-group">
                <label for="password">Apellidos</label>
                <input class="form-control " v-model="user.lastname" name="lastname" type="text" id="lastname" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><i class="fa fa-check fa-fw" aria-hidden="true"></i>Registrarse
                </button>
            </div>
        </fieldset>
    </form>
</template>

<script>

    export default{
        data(){
            return {
                user: {
                    id: null,
                    email: null,
                    password: null,
                    firstname: null,
                    lastname: null
                }
            }
        },
        methods: {
            registerUser: function (e) {
                var that = this;
                this.$http.post('/api/admin/users', this.user).then(function (response) {
                    that.$router.go('/events');
                    console.log(response);
                }, function (response) {
                    that.$router.go('/login');
                });
            }
        }
    }
</script>
