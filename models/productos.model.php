<?php

require_once "conexion.php";

class ModelProductos{

    static public function mdlMostrarProductos($tabla, $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch( );
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlIngresarProducto($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, nombre, codigo, descripcion,
        stock, precio) VALUES (:categoria, :nombre, :codigo, :descripcion, :stock, :precio)");
            $stmt->bindParam(":categoria",$datos["id_categoria"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":codigo",$datos["codigo"],PDO::PARAM_STR);
            $stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
            $stmt->bindParam(":stock",$datos["stock"],PDO::PARAM_STR);
            $stmt->bindParam(":precio",$datos["precio"],PDO::PARAM_STR);

            if($stmt->execute()){
                return "ok";
            }else{
                return "error";
            }

            $stmt->close();
            $stmt = null;
    }

    static public function mdlEditarProducto($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria = :id_categoria, nombre = :nombre,
        descripcion = :descripcion, stock = :stock, precio = :precio WHERE codigo = :codigo");

        $stmt->bindParam(":id_categoria",$datos["id_categoria"],PDO::PARAM_STR);
        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":codigo",$datos["codigo"],PDO::PARAM_STR);
        $stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
        $stmt->bindParam(":stock",$datos["stock"],PDO::PARAM_STR);
        $stmt->bindParam(":precio",$datos["precio"],PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt = null;

    }

    static public function mdlEliminarProducto($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id",$datos,PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlActualizarProducto($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}