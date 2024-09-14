import BaseContainer from "../../core/base.container.js";

class HomeContainer extends BaseContainer {
    constructor(onNavigate){
        super(onNavigate);
        const button = document.getElementById("home-store-button");
        button.addEventListener("click", this.onClick.bind(this));
    }

    onClick() {
        this.onNavigate("store/index");
    }
}

export default HomeContainer;