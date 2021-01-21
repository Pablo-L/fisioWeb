<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller
{
	
	public function create(Request $request)
	{
		
		$nombre = $request->input('nombreCategoria');

		$c = new Categorias();
		
		$c->nombre = $nombre;

		$c->save();
		
		return redirect()->route('admin_tratamientos')->with('success','Categoria creada.');
	}
	
	
	public function delete(Request $request)
	{
		
		$categoria_nombre = $request->input('categoria_nombre');
		
		Categorias::where('nombre', $categoria_nombre)->delete(); 
		
		return redirect()->route('admin_tratamientos')->with('success','Categoría eliminada.');
	}
}
