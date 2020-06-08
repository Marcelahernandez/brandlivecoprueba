<?php
    namespace App\Custom;
    
    class Nodo {
        public  $palabra;
        public  $disponible;
        
        public function __construct($palabra, $disponible){
            $this->palabra = $palabra;
            $this->disponible = $disponible;
        }
        

        public function esSolucion($length){
            return strlen($this->palabra) == $length;
        }
    }