import HomeContainer from "../containers/home/home.container.js";


class Router {


    static onNavigate (param) {
        window.history.pushState({}, "", document.location.pathname + "?=" + param);
        window.location.href = document.location.pathname + "?=" + param;
        Router.route(param);
    }

    static route($name) {
        switch($name){
            case "dashboard/index":
                console.log("dashboard")
                break;
            case "home/index":
                console.log("home")
                new HomeContainer(Router.onNavigate)
                break;
            case "login/index":
                console.log("login")
                break;
            case "register/index":
                console.log("register")
                break;
            default:
                console.log("404")
                break;
        }
    }
}

export default Router;