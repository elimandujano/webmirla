<?php 
	/*Implementacion de la clase producto*/
	class Producto{
		/*Atributos de clase*/
		private $descripcion = '';
		private $cantidad = 0;
            public function setDescripcion(){
                $this->descripcion = $descripcion;
                             
            }
            public function getDescripcion() {
                return $this->descripcion;
            }
            public function setCantidad() {
                $this->cantidad=$cantidad;
            }
            public function getCantidad() {
                return $this->cantidad;
            }
	}



?>