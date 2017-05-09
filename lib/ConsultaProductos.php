<?php
include Producto;
class ConsultaProductos{
    
    private function Conexion(){
        $miconn = new mysqli("localhost","root", "avaras08", "ventas");
        if($miconn->connect_errno) {
            return "Fallo al conectar a MySQL: (" .$miconn->connect_errno . ") " . $miconn->connect_errno;
        }
    }


    public function Lista(){
        $sql="SELECT * FROM producto";
        /*Uso del método conexión*/
        $resultado = $this->Conexion()->query($sql);
        /*Obtención de los elementos*/
        $i=0;
        while($fila = $resultado->fetch_assoc()){
            $oProducto = new Producto($fila["nombre"], $fila["precio"], $fila["codigo"]);
            $aProductos[$i]=$oProducto;
        }
        return $aProductos;
        
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

