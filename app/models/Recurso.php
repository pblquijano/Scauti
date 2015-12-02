<?php
class Recurso extends Eloquent
{
    protected $fillable = array('nombre','descripción','URL', 'activo', 'id_user','id_curso', 'tipo');
    public function curso()
    {
        return $this->belongsTo('Curso');
    }
    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }
}
?>