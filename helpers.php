<?php

    /**
     * 
     * Get the base path 
     * 
     * @param string $path
     * @return string
     */

    function basePath($path = ''){
        return __DIR__ . '/' . $path;
    }


    /**
     * 
     * @param string $name
     * @return void
     * 
     *
     */

     
     function loadView($name , $data = []){
        $path = basePath("App/views/{$name}.view.php");


        if(file_exists($path)){
            extract($data); //creaza in fisierul asta variabile din lista data, key-ul din array devine variabila si ia valorile la care pontuia.
            require $path;
        }else{
            echo "File {$name} not found";
        }
     }

  /**
     * 
     * @param string $name
     * @return void
     * 
     *
     */

     function loadPartials($name){
        $path = basePath("App/views/partials/{$name}.php");

        if(file_exists($path)){
            require $path;
        }else{
            echo "File {$name} not found";
        }
    
     }

     function loadContoller($name){

        $path = basePath("App/controllers/{$name}.php");

         if(file_exists($path)){
            require $path;
        }else{
            echo "File {$name} not found";
        }
    

     }


?>