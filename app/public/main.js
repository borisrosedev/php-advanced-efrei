import Router from "./js/core/router.js";


const path = document.location.href.split("=")[1] ?? "home/index";
Router.route(path);