<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajadores extends Model
{
    use HasFactory;
	
	protected $table = 'trabajadores';
	protected $primarykey = 'dni';
	public $incrementing = false;
	public $timestamps = true;
	protected $fillable = ['dni','nombre', 'edad', 'telefono', 'email', 'sexo', 'poblacion', 'numero_cuenta'];
	
	public function _poblacion()
	{
		return $this->hasOne("App\Poblacion");
	}
}
