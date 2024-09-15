<?php 
    function meuautoload($class){
        if(file_exists('class/' . $class. '.php')){
            include ('class/' . $class . '.php');
        }
    }

    spl_autoload_register('meuautoload');


    
?>