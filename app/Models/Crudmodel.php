<?php namespace App\Models;
use CodeIgniter\Model;
class Crudmodel extends Model{
    
    public function listarnombres(){
       
        $Nombres=$this->db->query("SELECT *FROM t_personas");
        return $Nombres->getResult();

    }

    public function insertar($datos){
        $Nombres=$this->db->table('t_personas');
        $Nombres->insert($datos);

        return $this->db->insertId();
    }

    public function obtenerdatos($data){
        $Nombre =$this->db->table('t_personas');
        $Nombre->where($data);
return $Nombre->get()->getResultArray();

    }
    public function actualizar($data, $idnombre){
        $Nombre =$this->db->table('t_personas');
        $Nombre->set($data);
        $Nombre->where('id_nombre', $idnombre);
        return $Nombre->update();
    }

    public function eliminar($data){
        $Nombre =$this->db->table('t_personas');

        $Nombre->where($data);
        return $Nombre->delete();

    }
}