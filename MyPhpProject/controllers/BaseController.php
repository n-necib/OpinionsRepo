<?php

class BaseController
{
    protected $viewRendered = false;

    public function renderView($controller, $action, $includeLayout = true){
        if(!$this->viewRendered){
            if($includeLayout){
                include_once ('views/layouts/header.php');
            }
            include_once ('views/'. $controller. '/'. $action . '.php');

            if($includeLayout){
                include_once ('views/layouts/footer.php');
            }
            $this->viewRendered = true;


        }

    }

    public function redirect($url){
        header("Location: $url");
        die;
    }



}