import Auth from "../Utilities/Auth";

export default {
    beforeRouteEnter(to, from, next) {
        next(vm => {
            if(! Auth.loggedIn) {
                vm.$store.dispatch("alert", {
                    message: "Debes ingresar al sistema.",
                    type: "danger"
                });
                vm.$router.push({
                    name: "login"
                })
            }
        })
    }
}