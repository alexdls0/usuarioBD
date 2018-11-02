<?php

namespace izv\managedata;

use \izv\data\Usuario;
use \izv\database\Database;

class ManageUsuario {

    private $db;

    function __construct(Database $db) {
        $this->db = $db;
    }

    function add(Usuario $usuario) {
        $resultado = 0;
        echo 'entra en add';
        if($this->db->connect()) {
            $sql = 'insert into usuario values(null, :correo, :alias, :nombre, :clave, :fechalt, :activo)';
            if($usuario->getAlias()==''){
                $findme   = '@';
                $pos = strpos($usuario->getCorreo(), $findme);
                $usuario->setAlias(substr($usuario->getCorreo(), 0, $pos));
            }
            $array = array(
                'correo' => $usuario->getCorreo(), 
                'alias' => $usuario->getAlias(), 
                'nombre' => $usuario->getNombre(), 
                'clave' => $usuario->getClave(), 
                'fechalt' => $usuario->getFechalt(),
                'activo' => $usuario->getActivo()
            );
            if($this->db->execute($sql, $array)) {
                $resultado = $this->db->getConnection()->lastInsertId();
            }
            var_export($usuario);
        }
        return $resultado;
    }

    function edit(Usuario $usuario) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'update usuario set correo = :correo, alias = :alias, nombre = :nombre, clave = :clave, fechalt = :fechalt, activo = :activo where id = :id';
            if($this->db->execute($sql, $usuario->get())) {
                $resultado = $this->db->getSentence()->rowCount();
            }
        }
        return $resultado;
    }

    function get($id) {
        $usuario = null;
        if($this->db->connect()) {
            $sql = 'select * from usuario where id = :id';
            $array = array('id' => $id);
            if($this->db->execute($sql, $array)) {
                if($fila = $this->db->getSentence()->fetch()) {
                    $usuario = new Usuario();
                    $usuario->set($fila);
                }
            }
        }
        return $usuario;
    }

    function getAll() {
        $array = array();
        if($this->db->connect()) {
            $sql = 'select * from usuario order by nombre';
            if($this->db->execute($sql)) {
                while($fila = $this->db->getSentence()->fetch()) {
                    $usuario = new Usuario();
                    $usuario->set($fila);
                    $array[] = $usuario;
                }
            }
        }
        return $array;
    }

    function remove($id) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'delete from usuario where id = :id';
            $array = array('id' => $id);
            if($this->db->execute($sql, $array)) {
                $resultado = $this->db->getSentence()->rowCount();
            }
        }
        return $resultado;
    }
}