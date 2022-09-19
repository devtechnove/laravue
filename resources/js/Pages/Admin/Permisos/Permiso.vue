<template>
	<div>
	<!-- start page title -->
	<div class="row">
	    <div class="col-12">
	        <div class="page-title-box d-flex align-items-center justify-content-between">
	            <div class="page-title">
	                <h4 class="mb-0 font-size-18">Permisos</h4>
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="javascript: void(0);">Bandes</a></li>
	                    <li class="breadcrumb-item"><a href="javascript: void(0);">Seguridad</a></li>
	                    <li class="breadcrumb-item active">Listado de permisos</li>
	                </ol>
	            </div>
	        </div>
	    </div>
	</div>
         <!-- Start page content-wrapper -->
   <div class="page-content-wrapper ">
    <div class="row">
      <div class="card">
        <div class="card-title">

        <!-- Button trigger modal -->
        <button type="button" class="mt-3 btn btn-primary float-left animate__animated animate__fadeIn " @click="abrirModalCrear">
          <i class="fa fa-user-plus"></i>
          Nuevo Permiso
        </button>

      <!-- Modal formulario -->
      <div class="modal fade" id="modalForm">
        <div class="modal-dialog modal-lg">
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
                    <label for="nombre">Nombre del Permiso</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre. Ejemplo (Pepito Pérez)" required="" v-model="datoPermiso.name">
                  </div>

             
                 
		


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" @click.prevent="crear" v-if="btnCrear">Crear Permiso</button>
                <button type="submit" class="btn btn-primary" @click.prevent="editar" v-if="btnEditar">Editar Permiso</button>
              </div>
            </form>
          </div>
        </div>
      </div>
        <!-- Modal ver detalles -->
      <div id="modalDetalle" class="modal fade" tabindex="-1" Permiso="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog"> 
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><i class="mdi mdi-male"></i> Detalles del Permiso</h5>
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
      <div class="card-body animate__animated  animate__fadeIn animate__delay-1s">
        <div class="table-responsive">
          <table class="table table-hover table-bordered table-striped table-sm" id="sampleTable">
            <thead>
              <tr>
                <th>Id</th>
                <th>Descripción</th>
                
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center" v-for="permiso in permisos">
                <td>{{permiso.id}}</td>                
                <td>{{permiso.name}}</td>
                <td>
                  <div class="btn-group mt-2 mb-2">
                  	<button class="btn btn-info btn-md" type="button" @click="detalles(permiso)"><i class="mdi mdi-folder fa-1x"></i> </button>
                  <button class="btn btn-primary btn-md" type="button" @click="abrirModalEditar(permiso)"><i class="mdi mdi-pencil fa-1x"></i> </button>
                  <button class="btn btn-danger btn-md" type="button" @click="eliminar(permiso)"><i class="mdi mdi-delete fa-1x"></i> </button>
                  </div>
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
import select2 from '~/assets/libs/select2/js/select2.min.js'

  export default {
    mounted() {
      this.getPermiso()
      //this.getPermissions()
      this.setDocumentTitle("Bandes - Permisos");
      $(".select2").select2();
      
	  
    },
    mixins: [ AuthMiddleware, authenticated ],
    data(){
      return {
        //permisos: [],
        permisos: [],
        info: [],
        datoPermiso: {
          name:'',
         'permissions': [],
      
        },
        titulo:'',
        btnCrear:false,
        btnEditar:false,
        idPermiso:''
      }
    },
    methods:{      
      getPermiso(){
        axios.get('/api/permissions').then(res=>{
          $('#sampleTable').DataTable().destroy()
          this.permisos = res.data      
          this.$tablaGlobal('#sampleTable')
        });
      },
       getPermissions(){
        axios.get('/api/permission').then(response=>{
        	this.permisos = response.data  
	        
	    });
      },
     
      crear(){
        axios.post('api/permissions',this.datoPermiso).then(res=>{
          this.getPermiso()
          $('#modalForm').modal('hide')
          swa.fire("Felicidades!", "Permiso creado correctamente!", "success");
        }).catch(function (error) {
          var array = Object.values(error.response.data.errors)
          array.forEach(element => swa.fire(String(element),"error"))
        });
      },
      abrirModalCrear(){
        this.datoPermiso= {name:'', email:'', password:''}
        this.titulo=' Crear Permiso'
        this.btnCrear=true
        this.btnEditar=false
        $('#modalForm').modal('show')
      },
      abrirModalEditar(datos){
      	console.log(datos)
        this.datoPermiso= {name: datos.name, permissions: datos.permissions }
        this.titulo=' Editar Permiso'
        this.btnCrear=false
        this.btnEditar=true
        this.idPermiso=datos.id
        console.log(this.idPermiso)
        $('#modalForm').modal('show')
      },
      detalles(datos){
        this.info=datos
        $('#modalDetalle').modal('show')
      },
      editar(){
        axios.put('api/permissions/'+this.idPermiso,this.datoPermiso).then(res=>{          
          this.idPermiso=''
          this.getPermiso()
          $('#modalForm').modal('hide')
         
              swa.fire("Felicidades!", "Permiso editado correctamente!", "success");
      
         
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
          axios.delete('api/permissions/'+datos.id).then(res=>{                       
              this.getPermiso()
              swa.fire("Felicidades!", "Permiso eliminado correctamente!", "success");
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