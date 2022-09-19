import Dashboard from "~/Pages/Admin/Dashboard";
import Usuarios from "~/Pages/Admin/Usuarios/User";
import Roles from "~/Pages/Admin/Roles/Role";
import Permisos from "~/Pages/Admin/Permisos/Permiso";
import Login from "~/Pages/Auth/Login";


const routes = [
    {
        path: "/admin",
        component: Dashboard,
        name: "admin.dashboard",
        meta: {
            layout: "admin-layout"
        }
    },
     {
        path: "/users",
        component: Usuarios,
        name: "admin.users",
        meta: {
            layout: "admin-layout"
        }
    },
     {
        path: "/roles",
        component: Roles,
        name: "admin.roles",
        meta: {
            layout: "admin-layout"
        }
    },
     {
        path: "/permisos",
        component: Permisos,
        name: "admin.permisos",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/",
        component: Login,
        name: "login",
        meta: {
            layout: "login-layout"
        }
    },
];

export default routes;