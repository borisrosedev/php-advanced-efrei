class BaseHTMLElement {
    #element;

    constructor(id, classNames = []){
        this.#element.id = id ?? "";
        if(classNames.length){
            classNames.forEach(el => this.#element.classList.add(el));
        }
    }

    get element () {
        return this.#element;
    }

    set element (data) {
        if(data.classNames){
            this.#element.class = "";
            for(const className of data.classNames) {
                this.#element.classList.add(className);
            }
        }

        if(id in data) {
            this.#element.id = data.id
        }

        if(type in data) {
            this.#element.setAttribute("type", data.type);
        }

        if(placeholder in data){
            this.#element.setAttribute("placeholder", data.type); 
        }

        if(name in data){
            this.#element.setAttribute("name", data.name); 
        }
        
    }

}