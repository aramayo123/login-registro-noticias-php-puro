<?php
    class conexion{
        private $servidor = "localhost";
        private $usuario = "root";
        private $dbname = "album";
        private $password = "";
        private $conexion;
        /* creamos un objeto conexion */
        public function __construct(){
            /* iniciamos el constructor */
            try{
                /* accedemos al atributo conexion y le instanciamos un objeto PDO */
                $this->conexion = new PDO("mysql:host=$this->servidor;dbname=$this->dbname",$this->usuario,$this->password);
                /* con esto accedemos a metodos estaticos de la clase( creo que es de la clase ) y */
                /* activamos el modo error para que nos informe y activamos las excepcciones */
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                }catch(PDOException $e){
                    return "falla de conexion".$e;
            }
        }
        /* esto ejecuta una instruccion sql y nos devuelve */
        /* un id de inserccion */
        public function ejecutar($sql){ // Insertar/Delete/Actualizar
            $this->conexion->exec($sql);
            return $this->conexion->lastInsertId();
        }
        public function consultar($sql){
            $sentencia = $this->conexion->prepare($sql); // preparamos la instruccion
            $sentencia->execute();
            return $sentencia->fetchAll(); // retorna todos los registros que se puede consultar con la sentencia sql
        }
    };
?>