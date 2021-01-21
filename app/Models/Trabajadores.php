<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajadores extends Model
{
    use HasFactory;
	
	protected $table = 'trabajadores';
	protected $primarykey = 'id';
	public $incrementing = true;
	public $timestamps = true;
	protected $fillable = ['DNI','nombre', 'edad', 'telefono', 'email', 'sexo', 'poblacion', 'numero_cuenta'];
	
	public function _poblacion()
	{
		return $this->hasOne("App\Poblacion");
	}
}
