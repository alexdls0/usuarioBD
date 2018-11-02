<?php

namespace izv\data;

class Usuario {
    
    use \izv\common\Common;

    private $id,
            $correo,
            $alias,
            $nombre,
            $clave,
            $fechalt,
            $activo;
    
    function __construct($id = null, $correo = null, $alias = null, $nombre = null, $clave = null, $fechalt = null, $activo = null) {
        $this->id = $id;
        $this->correo = $correo;
        $this->alias = $alias;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->fechalt = $fechalt;
        $this->activo = $activo;
    }

    function getId() {
        return $this->id;
    }
    
    function getCorreo() {
        return $this->correo;
    }
    
    function getAlias() {
        return $this->alias;
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getClave() {
        return $this->clave;
    }

    function getFechalt() {
        return $this->fechalt;
    }
    
    function getActivo() {
        return $this->activo;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function setCorreo($correo) {
        $this->correo = $correo;
    }
    
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setFechalt($fechalt) {
        $this->fechalt = $fechalt;
    }
    
    function setActivo($activo) {
        $this->activo = $activo;
    }

}