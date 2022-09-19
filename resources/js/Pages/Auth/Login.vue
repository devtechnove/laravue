<template>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                  <div class="auth-wrapper auth-v3 ">
                        <div class="auth-content">
                            <div class="card">
                                <div class="row align-items-stretch ">
                                    <div class="col-md-6 img-card-side">
                                        <img :src="ImgFondoLogin" alt="" class="img-fluid">
                                        <div class="img-card-side-content">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                           <div>
                                                <h5 class="text-primary">¡Bienvenidos!</h5>
                                                <p class="text-muted">Ingresa tu usuario y contraseña para continuar.</p>
                                            </div>
                                            <form class="auth-login-form"
                                              method="POST"
                                              @submit.prevent="login"
                                              autocomplete="off">

                                              <div >
                                                <div class="">
                                                  <label for="username" class="form-label">Usuario</label>
                                                         <input
                                                          type="text"
                                                          class="form-control"
                                                          v-model="form.email"
                                                          name="username"
                                                          placeholder="Correo electrónico"
                                                          aria-describedby="login-username"
                                                          tabindex="1"
                                                          autofocus
                                                          value="" />

                                                        </div>
                                                      </div>

                                                      <div class=" mt-2">

                                                          <label for="password-input">Contraseña</label>
                                                          <div class="position-relative auth-pass-inputgroup mb-3">
                                                              <input
                                                                type="password"
                                                                class="form-control"
                                                                v-model="form.password"
                                                                name="password"
                                                                placeholder="Ingresa la contraseña"
                                                                aria-describedby="login-password"
                                                                tabindex="1"
                                                                autofocus
                                                                 />

                                                          </div>
                                                      </div>
                                                      <div class="mt-5">
                                                          <div class="row">
                                                            <div class="col-sm-12">
                                                             <button class="btn btn-primary form-control w-lg waves-effect waves-light green darken-4"  type="submit">Ingresar</button>
                                                            </div>
                                                          </div>
                                                      </div>
                                                       <div class="text-center">
                                                          <div class="text-center mt-5 mb-4 ">
                                                            <span id="day" class="mt-5 mb-4"></span>
                                                            <span id="month" class="month">
                                                            </span>
                                                            <span id="year" class="mt-5 mb-4">
                                                            </span>
                                                            <span id="hours" class="hours"></span>
                                                            <span id="minutes" class="minutes"></span>
                                                            <span id="seconds" class="seconds"></span>
                                                          </div>

                                                      </div>
                                                  </form>
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
    import Errors from "../../Utilities/Errors";
    import authenticated from "../../mixins/authenticated";
    import RedirectIfAuthenticated from "../../mixins/RedirectIfAuthenticated";
    import swa from '../../lib/sweetalert/sweetalert';

    export default {
        name: "Login",
        data() {
            return {
                form : {
                    email: '',
                    password: "",
                },
                endpoint: "/login",
                date : '',
                ImgFondoLogin: require('~/assets/images/auth-img-3.jpg'),
                urlHome :'/admin'
            }
        },
        mixins: [authenticated, RedirectIfAuthenticated],
        created() {
            setInterval(this.getNow, 1000);
        },
        methods: {
             login()
        {
            axios.post(this.endpoint, this.form)
            .then(response =>
            {
                if (response.status == 200)
                {

                     this.$store.dispatch("alert", {
                            message: "Has iniciado satisfactoriamente"
                        });

                    localStorage.setItem("auth", response.data.auth)
                    localStorage.setItem("user", JSON.stringify(response.data.user))
                    window.location = this.urlHome
                }else
                {

                    this.loading = false
                    this.showError(response)
                }
            })
            .catch(error =>
            {
                //this.reset()
                this.loading = false
                 swa.fire("¡Opps!", "Los datos ingresados no son correctos!", "error");
            })
        },
            redirect(route) {
                this.$router.push({
                    name: route
                })
            },
            getNow: function() {
                    const today = new Date();
                    const date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                    const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                    const dateTime = date +' '+ time;
                    this.timestamp = dateTime;
                }
        }
    }
</script>

<style lang="scss">
    /*@import "../../../sass/login";*/
    #app {
        width: 100%;
        height: 100%;
    }
    html,
    body {
        height: 100%;
    }
</style>
