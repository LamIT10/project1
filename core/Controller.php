<?php
class Controller
{
    
    public function __construct(){

    }
    public function loadModel($modelPath)
    {
        require 'models/' . $modelPath . '.php';
    }
    
    public function view($layoutPath, $content = '', $data = [])
    {
        extract($data);
        $content = 'views/' . $content . '.php';
        require 'views/layout/' . $layoutPath . '.php';
    }
}
