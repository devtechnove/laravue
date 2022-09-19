<template>
  <div>
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">Usuarios</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bandes</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Seguridad</a></li>
                            <li class="breadcrumb-item active">Listado de usuarios</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
      <!-- end page title -->
     <!-- Start page content-wrapper -->
   <div class="page-content-wrapper ">
    <div class="row">
      <div class="card">
        <div class="card-title">

        <!-- Button trigger modal -->
        <button type="button" class="mt-3 btn btn-primary float-left animate__animated animate__fadeIn " @click="abrirModalCrear">
          <i class="fa fa-user-plus"></i>
          Nuevo usuario
        </button>

      <!-- Modal formulario -->
      <div class="modal fade" id="modalForm">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header ">
              <h5 class="modal-title">
                <i class="fa fa-user-plus"></i> {{titulo}}
              </h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
              <div class="modal-body">
                  <div class="form-group">
                    <label for="nombre">Nombre del usuario</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre. Ejemplo (Pepito Pérez)" required="" v-model="datoUsuario.name">
                  </div>
                  <div class="form-group mt-2">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" placeholder="Correo electrónico. Ejemplo (peperez@gmail.com)" required="" v-model="datoUsuario.email">
                  </div>
                  <div class="form-group mt-2">
                    <label for="clave">Contraseña</label>
                    <input type="password" class="form-control" id="clave" placeholder="Clave mínimo de 8 dígitos." v-model="datoUsuario.password" name="password">
                  </div>
                  <div class="form-group mt-2">
                    <label for="clave">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="confirm_clave" placeholder="Clave mínimo de 8 dígitos." v-model="datoUsuario.password_confirmation" name="password_confirmation">
                  </div>
                    <div class="form-group mt-2">
                        <label for="status">Roles</label>
                         <div class="checkbox icheck">

                      <select class="form-control" v-model="datoUsuario.role" id="roles">
                         <option v-for="data in roles" :value=" data.name ">{{ data.name }}</option>
                    </select>

                    </div>

                    </div>

                    <div class="form-group mt-2">
                        <label for="status">Acceso al sistema</label>
                         <div class="checkbox icheck">
                      <label>
                        <input class="form-check-input" type="radio" v-model="datoUsuario.status" name="status" value="1" checked> Activo&nbsp;&nbsp;
                        <input class="form-check-input" type="radio" v-model="datoUsuario.status" name="status" value="0"> Deshabilitado
                      </label>
                    </div>

                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" @click.prevent="crear" v-if="btnCrear">Crear usuario</button>
                <button type="submit" class="btn btn-primary" @click.prevent="editar" v-if="btnEditar">Editar usuario</button>
              </div>
            </form>
          </div>
        </div>
      </div>
        <!-- Modal ver detalles -->
      <div id="modalDetalle" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><i class="mdi mdi-male"></i> Detalles del usuario</h5>
                <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered table-striped">
                    <tbody>
                      <tr>
                        <th scope="row">Nombre</th>
                        <td>{{info.name}}</td>
                      </tr>
                      <tr>
                        <th scope="row">E-Mail</th>
                        <td>{{info.email}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Estado del usuario</th>
                        <td v-if="(info.status == 1)">
                        <span class="badge bg-success" >Activo</span>
                        </td>
                          <td v-else="(info.status !== 1)">
                        <span class="badge bg-danger" >Inactivo</span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Tipo de usuario</th>
                        <td v-if="(info.type == 'Super Administrador')">
                        <span class="text-uppercase font-weight-bold green-text">Super Administrador</span>
                        </td>
                          <td v-else="(info.type !== 'Super Administrador')">
                        <span class="text-uppercase font-weight-bold green-text">Administrador del sistema</span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Fecha creación</th>
                        <td>{{$fecha(info.created_at)}}</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body animate__animated animate__fadeIn animate__delay-1s">
        <div class="table-responsive">
          <table class="table table-hover table-bordered table-striped table-sm" id="sampleTable">
            <thead>
              <tr>
                <th>Id</th>
                <th>Tipo de usuario</th>
                <th>Nombre completo</th>
                <th>E-Mail</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center" v-for="user in usuarios">
                <td>{{user.id}}</td>
                <td v-if="(user.type == 'Super Administrador')">
                <span class="text-capitalize font-weight-bold">Administrador</span>
                </td>
                <td v-else="(user.type !== 'Administrador')">
                <span class="text-capitalize " >Usuario general</span>
                </td>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td v-if="(user.status == 1)">
                <span class="badge bg-success" >Activo</span>
                </td>
                  <td v-else="(user.status !== 1)">
                <span class="badge bg-danger" >Inactivo</span>
                </td>
                <td>
                  <button class="btn btn-info btn-sm" type="button" @click="detalles(user)"><i class="mdi mdi-folder fa-1x"></i> </button>
                  <button class="btn btn-primary btn-sm" type="button" @click="abrirModalEditar(user)"><i class="mdi mdi-pencil fa-1x"></i> </button>
                  <button class="btn btn-danger btn-sm" type="button" @click="eliminar(user)"><i class="mdi mdi-delete fa-1x"></i> </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
        </div>
      </div>
  </div>
</template>

<script>
import swa from '~/assets/libs/sweetalert2/sweetalert2.min.js';
import fontawesome from '~/assets/libs/@fortawesome/fontawesome-free/css/all.css';
 import AuthMiddleware from "~/mixins/AuthMiddleware";
  import authenticated from "~/mixins/authenticated";
  export default {
    mounted() {
      this.getUser()
      this.getRoles()
      this.setDocumentTitle("Bandes - Usuarios");
    },
    mixins: [ AuthMiddleware, authenticated ],
    data(){
      return {
        usuarios: [],
        role: [],
        info: [],
        datoUsuario: {
          name:'',
          email:'',
          password:'',
          password_confirmation:'',
          role:'',
          status:''
        },
        titulo:'',
        btnCrear:false,
        btnEditar:false,
        idUser:''
      }
    },
    methods:{
      getUser(){
        axios.get('/api/user').then(res=>{
          $('#sampleTable').DataTable().destroy()
          this.usuarios = res.data
          console.log(res.data);
          this.$tablaGlobal('#sampleTable')
        });
      },
       getRoles(){
        axios.get('/api/roles').then(res=>{
          this.roles = res.data
          console.log(res.data);
        });
      },
      crear(){
        axios.post('api/user',this.datoUsuario).then(res=>{
          this.getUser()
          $('#modalForm').modal('hide')
          swa.fire("Felicidades!", "Usuario creado correctamente!", "success");
        }).catch(function (error) {
          var array = Object.values(error.response.data.errors)
          array.forEach(element => swa.fire(String(element),"error"))
        });
      },
      abrirModalCrear(){
        this.datoUsuario= {name:'', email:'', password:''}
        this.titulo=' Crear usuario'
        this.btnCrear=true
        this.btnEditar=false
        $('#modalForm').modal('show')
      },
      abrirModalEditar(datos){
        this.datoUsuario= {name: datos.name, email:datos.email, roles:datos.type,status:datos.status }
        this.titulo=' Editar usuario'
        this.btnCrear=false
        this.btnEditar=true
        this.idUser=datos.id
        $('#modalForm').modal('show')
      },
      detalles(datos){
        this.info=datos
        console.log(datos.roles.name)
        $('#modalDetalle').modal('show')
      },
      editar(){
        axios.put('api/user/'+this.idUser,this.datoUsuario).then(res=>{
          this.idUser=''
          this.getUser()
          $('#modalForm').modal('hide')

              swa.fire("Felicidades!", "Usuario editado correctamente!", "success");


        }).catch(function (error) {
          var array = Object.values(error.response.data.errors)
          array.forEach(element => swa.fire(String(element),"error"))
        });
      },
      eliminar(datos){
        swa.fire({
        title: '¿Estás seguro(a)?',
        text: "¡No podrás revertir esto.!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, ¡elimínalo!'
      }).then((result) => {
        console.log((result.value))
        if (result.value) {
          axios.delete('api/user/'+datos.id).then(res=>{
              this.getUser()
              swa.fire("Felicidades!", "Usuario eliminado correctamente!", "success");
            }).catch(function (error) {
              var array = Object.values(error.response.data.errors)
              array.forEach(element => swa.fire(String(element),"error"))
            });
        // swa.fire("Felicidades!", "Usuario editado correctamente!", "success");
        }
      })
      },

    }

  }
</script>
