<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
	
	protected $table = 'clientes';
	public $primarykey = 'id';
	public $incrementing = true;
	public $timestamps = true;
	protected $fillable = ['nombre', 'telefono', 'email', 'sexo', 'poblacion', 'observaciones'];
	
	public function _poblacion()
	{
		return $this->hasOne("App\Poblacion");
	}
}

