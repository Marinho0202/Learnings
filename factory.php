<?php
   
   
    
   class cachorro
    {   
        public function __construct(){
            echo 'classe do doguinho';
        }
        
    }


    class gato
    {
        public function __construct(){
            echo 'classe gatinh fofo';
        }
    }
        //factory a classe abaixo
    class animal{
        public static function build($nomeclass){
            if(class_exists($nomeclass)){
                return new $nomeclass; 
            }   else{
                die ('sem classe mds, burr');
            }
            
        }
    }    

        animal::build('cachorr');
       
///////////////////////////////////////////////////////////////////
        
class pandeiro{
    public function Tocar(){
        echo 'toquei o pandeiro sou foda';
    }

    public function quebrar(){
        echo 'pandeiro quebrou..';
    }
}

$exibiracao = new pandeiro;
$exibiracao->Tocar();
echo '</br>';
$exibiracao = new pandeiro;
$exibiracao->quebrar();



?>