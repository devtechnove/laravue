<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user" content="{{ \Auth::user() }}">
    <title>{{ config('app.name', 'SPA Blog') }}</title>

 
        <!-- App Css-->
        <link href="{{ asset('css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/all.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Styles -->
    
     <link href="{{ asset('css/system.css') }}" rel="stylesheet">
      
</head>

<body data-topbar="colored" data-layout="vetical" data-sidebar-user="true">
     <!-- Begin page -->
   
        <div id="app" >
            <App/>
        </div>



<!-- Scripts -->
     
    
   <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <script type="text/javascript">
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}",
            jsPermissions: {!! auth()->check()?auth()->user()->jsPermissions():null !!}
        }
    </script>
    
        <script src="{{ asset('js/app.js') }}" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
        <script>
            !function(t){"use strict";function s(){for(var e=document.getElementById("topnav-menu-content").getElementsByTagName("a"),t=0,n=e.length;t<n;t++)"nav-item dropdown active"===e[t].parentElement.getAttribute("class")&&(e[t].parentElement.classList.remove("active"),e[t].nextElementSibling.classList.remove("show"))}function n(e){1==t("#light-mode-switch").prop("checked")&&"light-mode-switch"===e?(t("html").removeAttr("dir"),t("#dark-mode-switch").prop("checked",!1),t("#rtl-mode-switch").prop("checked",!1),t("#bootstrap-style").attr("href","assets/css/bootstrap.min.css"),t("#app-style").attr("href","assets/css/app.min.css"),sessionStorage.setItem("is_visited","light-mode-switch")):1==t("#dark-mode-switch").prop("checked")&&"dark-mode-switch"===e?(t("html").removeAttr("dir"),t("#light-mode-switch").prop("checked",!1),t("#rtl-mode-switch").prop("checked",!1),t("#bootstrap-style").attr("href","assets/css/bootstrap-dark.min.css"),t("#app-style").attr("href","assets/css/app-dark.min.css"),sessionStorage.setItem("is_visited","dark-mode-switch")):1==t("#rtl-mode-switch").prop("checked")&&"rtl-mode-switch"===e&&(t("#light-mode-switch").prop("checked",!1),t("#dark-mode-switch").prop("checked",!1),t("#bootstrap-style").attr("href","assets/css/bootstrap-rtl.min.css"),t("#app-style").attr("href","assets/css/app-rtl.min.css"),t("html").attr("dir","rtl"),sessionStorage.setItem("is_visited","rtl-mode-switch"))}function e(){document.webkitIsFullScreen||document.mozFullScreen||document.msFullscreenElement||(console.log("pressed"),t("body").removeClass("fullscreen-enable"))}var a;t("#side-menu").metisMenu(),t("#vertical-menu-btn").on("click",function(e){e.preventDefault(),t("body").toggleClass("sidebar-enable"),992<=t(window).width()?t("body").toggleClass("vertical-collpsed"):t("body").removeClass("vertical-collpsed")}),t("#sidebar-menu a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&(t(this).addClass("active"),t(this).parent().addClass("mm-active"),t(this).parent().parent().addClass("mm-show"),t(this).parent().parent().prev().addClass("mm-active"),t(this).parent().parent().parent().addClass("mm-active"),t(this).parent().parent().parent().parent().addClass("mm-show"),t(this).parent().parent().parent().parent().parent().addClass("mm-active"))}),t(".navbar-nav a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&(t(this).addClass("active"),t(this).parent().addClass("active"),t(this).parent().parent().addClass("active"),t(this).parent().parent().parent().addClass("active"),t(this).parent().parent().parent().parent().addClass("active"),t(this).parent().parent().parent().parent().parent().addClass("active"),t(this).parent().parent().parent().parent().parent().parent().addClass("active"))}),t('[data-toggle="fullscreen"]').on("click",function(e){e.preventDefault(),t("body").toggleClass("fullscreen-enable"),document.fullscreenElement||document.mozFullScreenElement||document.webkitFullscreenElement?document.cancelFullScreen?document.cancelFullScreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen&&document.webkitCancelFullScreen():document.documentElement.requestFullscreen?document.documentElement.requestFullscreen():document.documentElement.mozRequestFullScreen?document.documentElement.mozRequestFullScreen():document.documentElement.webkitRequestFullscreen&&document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)}),document.addEventListener("fullscreenchange",e),document.addEventListener("webkitfullscreenchange",e),document.addEventListener("mozfullscreenchange",e),t(".right-bar-toggle").on("click",function(e){t("body").toggleClass("right-bar-enabled")}),t(document).on("click","body",function(e){0<t(e.target).closest(".right-bar-toggle, .right-bar").length||t("body").removeClass("right-bar-enabled")}),function(){if(document.getElementById("topnav-menu-content")){for(var e=document.getElementById("topnav-menu-content").getElementsByTagName("a"),t=0,n=e.length;t<n;t++)e[t].onclick=function(e){"#"===e.target.getAttribute("href")&&(e.target.parentElement.classList.toggle("active"),e.target.nextElementSibling.classList.toggle("show"))};window.addEventListener("resize",s)}}(),[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e){return new bootstrap.Tooltip(e)}),[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(e){return new bootstrap.Popover(e)}),window.sessionStorage&&((a=sessionStorage.getItem("is_visited"))?(t(".right-bar input:checkbox").prop("checked",!1),t("#"+a).prop("checked",!0),n(a)):sessionStorage.setItem("is_visited","light-mode-switch")),t("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch").on("change",function(e){n(e.target.id)}),t("#header-chart-1").sparkline([8,6,4,7,10,12,7,4,9,12,13,11,12],{type:"bar",height:"35",barWidth:"5",barSpacing:"3",barColor:"#35a989"}),t("#header-chart-2").sparkline([8,6,4,7,10,12,7,4,9,12,13,11,12],{type:"bar",height:"35",barWidth:"5",barSpacing:"3",barColor:"#f5b225"}),t(window).on("load",function(){t("#status").fadeOut(),t("#preloader").delay(350).fadeOut("slow")}),Waves.init()}(jQuery);
        </script>

  
      
     
   </body>
     
</html>
