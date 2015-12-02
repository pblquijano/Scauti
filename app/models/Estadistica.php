<?php
class Estadistica extends Eloquent
{
	
     public function user()
    {
        return $this->belongsTo('User');
    }
}
?>