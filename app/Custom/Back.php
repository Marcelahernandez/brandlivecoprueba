<?php
    namespace App\Custom;
    use App\Custom\Nodo;
    use App\Palabra;
    class Back {
        
        private $pila;
        private $cantidad;
        private $letras;

        public function __construct($numero, $letras){
            $this->pila = new \SplStack();
            $this->cantidad = $numero;
            $this->letras = $letras;
        }

        private function str_replace_first($search, $replace, $subject) { 
            $pos = strpos($subject, $search); 
            
            if ($pos !== false) { 
                return substr_replace($subject, $replace, $pos, strlen($search)); 
            }
           
            return $subject;
        }

        public function init(){
            $letras = count_chars($this->letras, 3);
            $numLetras = strlen($letras);
            for($i = 0; $i < $numLetras; $i++){
                $letra = $letras[$i];
                $dispo = preg_replace('/' . $letra . '/', "", $this->letras,1, $count);
                $this->pila->push(new Nodo($letra, $dispo));
            }
        }
        
        public function backtracking() {
            $palabrasMostrar= [];
            while(count($this->pila)){
                $nd = $this->pila->top();
                $this->pila->pop();
                if($nd->esSolucion($this->cantidad)){
                   // Se imprime la respuesta
                    $palabrasMostrar[]= $nd->palabra;
                } else {
                    $disponibilidad = count_chars($nd->disponible, 3);
                    for($i = 0;$i<strlen($disponibilidad);$i++){
                        $nuevaPalabra = $nd->palabra.$disponibilidad[$i];
                        $disponible = $nd->disponible;
                        if(Palabra::palabras($this->cantidad,$nuevaPalabra)->count()){
                            //$nuevaDisponibilidad = $this->str_replace_first($disponible[$i], "", $disponible);
                            $nuevaDisponibilidad=  preg_replace('/' . $disponibilidad[$i] . '/', "", $disponible,1, $count);
                            //var_dump($count.'<br/>');
                            $this->pila->push(new Nodo($nuevaPalabra, $nuevaDisponibilidad));
                        }
                    }
                }
               
            }
            return  $palabrasMostrar;
            
        }

        
    }
?>