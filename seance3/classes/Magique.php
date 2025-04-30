<?php

class Magique{
    public function getClassName(){
        return "Le nom de la classe est ".__CLASS__;
    }

    public function getLine(){
        return "La ligne numero ".__LINE__;
    }

    public function getFile(){
        return "Le nom du fichier est ".__FILE__;
    }

    public function getMethod(){
        return "Le nom de la methode ".__METHOD__;
    }

}

?>