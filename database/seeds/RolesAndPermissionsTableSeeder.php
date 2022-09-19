<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsTableSeeder extends Seeder
{
    private $permissions_admin , $user_permissions, $vendedor_permissions, $encargado_permissions,$super_admin_permissions;


    public function __construct()
    {


         /*
        set the default permissions
        */
        $this->super_admin_permissions =  [
                                /* Usuarios */
                                'Ver Usuario',
                                'Registrar Usuario',
                                'Editar Usuario',
                                'Eliminar Usuario',
                                
                                /* Asignar permisos */
                                'AsignarPermisos',                              
                               
                               
                                'Ver Permisos',
                                'CrearPermisos',
                                'Editar Permisos',
                                'Eliminar Permisos',
                                
                                /* Logins */
                                'Ver Logins',
                                'Ver LogSistema',

                                /* Roles */
                                'Ver Role',
                                'Registrar Role',
                                'Editar Role',
                                'Eliminar Role',

                                    /*Módulos*/

                                 'Modulo de Seguridad',
                                





                               


                              ];



        
        $this->permissions_admin =  [

                                            
                                 /* Usuarios */
                                'Ver Usuario',
                                'Registrar Usuario',
                                'Editar Usuario',
                                'Eliminar Usuario',


                              ];




    }




        public function run()
        {
            // Reset cached roles and permissions
            app()['cache']->forget('spatie.permission.cache');

            // create permissions
            foreach ($this->super_admin_permissions as $permission)
            {
                Permission::create(['name' => $permission]);
            }


            // create the admin role and set all default permissions
            $role = Role::create(['name' => 'Super Administrador']);
            $role->givePermissionTo($this->super_admin_permissions);


            // create the admin role and set all default permissions
            $role = Role::create(['name' => 'Administrador']);
            $role->givePermissionTo($this->permissions_admin);

           

        }
}
