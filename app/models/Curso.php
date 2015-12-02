<?php
class Curso extends Eloquent
{
	
    protected $fillable = array('nombre','descripción','img', 'activo', 'id_user');
     public function recursos(){
        return $this->hasMany('Recurso', 'id_curso');        
    }
}
?>