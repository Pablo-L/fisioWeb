<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamientos extends Model
{
    use HasFactory;
	
	protected $table = 'tratamientos';
	public $primarykey = 'id';
	public $incrementing = true;
	public $timestamps = false;
	protected $fillable = ['categoria', 'nombre', 'descripcion', 'tarifa'];
	
	public function _categoria()
	{
		return $this->hasOne("App\Categorias");
	}
}
