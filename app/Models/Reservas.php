<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    protected $table = 'reservas';
	public $primarykey = 'id';
	public $incrementing = true;
	public $timestamps = true;
	protected $fillable = ['hora', 'dia', 'cliente_id', 'trabajador_id', 'tratamiento_id'];
	
	public function _clientes()
	{
		return $this->hasOne("App\User");
    }

    public function _trabajadores()
	{
		return $this->hasOne("App\Trabajadores");
	}
}
