<?php

    require_once "conexion.php";

    class ModelEventos{

        static public function mdlAgregarEvento($tabla,$datos){

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(title,descripcion,color,start,end) VALUES(:title,
            :descripcion,:color,:start,:end)");

            $stmt->bindParam(":title",$datos["title"],PDO::PARAM_STR);
            $stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
            $stmt->bindParam(":color",$datos["color"],PDO::PARAM_STR);
            $stmt->bindParam(":start",$datos["start"],PDO::PARAM_STR);
            $stmt->bindParam(":end",$datos["end"],PDO::PARAM_STR);

            if($stmt->execute()){
                return "ok";
            }else{
                return "error";
            }

            $stmt->close();
            $stmt = null;
            
        }

        static public function mdlEliminarEvento($tabla,$item){
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

            $stmt->bindParam(":id", $item, PDO::PARAM_STR);

            if($stmt->execute()){
                return "ok";
            }else{
                return "error";
            }

            $stmt -> close();
            $stmt = null;
        }
    }
