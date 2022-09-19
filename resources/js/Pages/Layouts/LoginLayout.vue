<template>
    <router-view></router-view>
</template>

<script>
    export default {
        name: "LoginLayout.vue",
        mounted()
        {
        	this.setDocumentTitle("Bandes - Login");

        }
    }
</script>
