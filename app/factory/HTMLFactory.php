<?php


abstract class CustomHTMLElement {
    public $id;
    public $class_names;
    public function __construct(?string $id, ?string $class_names)
    {
        $this->id = isset($id) ?? "";
        $this->class_names = isset($class_names) ?? "";
    }
}



class CustomInputElement extends CustomHTMLElement {
    public $type;
    public $name;

    public function __construct($data)
    {
        parent::__construct($data["id"], $data["class_names"]);
        $this->type = $data["type"] ?? "button";

        if(isset($data["name"])) {
            throw new InvalidArgumentException("the name argument must be defined");
        }

        $this->name = $data["name"] ?? "";

    }
}

class CustomButtonElement extends CustomHTMLElement
{
    public $text_content;
 
    public $type;

    public function __construct($data)
    {
        parent::__construct($data["id"], $data["class_names"]);
        $this->text_content = $data["text_content"] ?? "Aucun contenu";
        $this->type = $data["type"] ?? "button";

    }
}

class HTMLFactory
{

    public static function createElement(string $element_tag_name, $data): ?CustomButtonElement
    {

        if (!is_array($data)) {
            throw new InvalidArgumentException("La variable data doit être un tableau");
        }

        switch ($element_tag_name) {
            case "button":
                return new CustomButtonElement($data);
            default:
                break;
        }
    }
}
