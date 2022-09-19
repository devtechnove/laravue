<template>
  <div data-simplebar class="h-100">
                    <div class="user-details">
                        <div class="d-flex">
                            <div class="me-2">
                                <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-md rounded-circle">
                            </div>
                            <div class="user-info w-100">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       {{user.name}}
                                    </a>
                                </div> 

                                <td v-if="(user.type == 'admin')">
                                <span class="text-capitalize font-weight-bold green-text">Administrador</span>
                                </td>
                                <td v-else="{{ user.type !== 'admin' }}">
                                <span class="text-capitalize green-text " >Usuario general</span>
                                </td>
                            </div>
                        </div>
                    </div>
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Main</li>

                            <li>
                                <a href="/admin" class="waves-effect">
                                    <i class="mdi mdi-home"></i>
                                    <span>Inicio</span>

                                </a>
                            </li>

                            <li v-if="can('Modulo de Seguridad') ">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-shield"></i>
                                    <span>Seguridad</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li v-if="can('Ver Usuario')">
                                    <router-link to="users" class="d-flex align-items-center">
                                        Usuarios
                                    </router-link>
                                    </li>
                                     <li v-if="can('Ver Role')"> 
                                     <router-link to="roles" class="d-flex align-items-center">
                                        Roles
                                    </router-link>
                                    </li>
                                     <li v-if="can('Ver Permisos')"> 
                                     <router-link to="permisos" class="d-flex align-items-center">
                                        Permisos
                                    </router-link>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
</template>

<script>
 import auth from '~/mixins/auth'
 
    export default {
       
        mixins: [auth],
        name: "Sidebar",
    }
</script>

