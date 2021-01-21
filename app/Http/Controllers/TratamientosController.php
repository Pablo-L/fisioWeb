<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tratamientos;

class TratamientosController extends Controller
{
    public function obtenerTratamientosFisioterapia()
    {	
        $tratamientos = \DB::table('tratamientos')
                ->where('categoria', '=', 'Fisioterapia')
                ->get();
        return view('Fisioterapia', ['tratamientos' => $tratamientos]);
    }    
	
	public function obtenerTratamientosAcupuntura()
    {	
        $tratamientos = \DB::table('tratamientos')
                ->where('categoria', '=', 'Acupuntura')
                ->get();
        return view('Acupuntura', ['tratamientos' => $tratamientos]);
    }	
	
	public function obtenerTratamientosOsteopatia()
    {	
        $tratamientos = \DB::table('tratamientos')
                ->where('categoria', '=', 'Osteopatia')
                ->get();
        return view('Osteopatia', ['tratamientos' => $tratamientos]);
    }
	
	public function create(Request $request)
	{
		
		$nombre = $request->input('nombreTratamiento');
		$descripcion = $request->input('descripcionTratamiento');
		$tarifa = $request->input('tarifaTratamiento');
		$categoria = $request->input('eleccioncategoria');

		$t = new Tratamientos();
		
		$t->nombre = $nombre;
		$t->descripcion =$descripcion;
		$t->tarifa = $tarifa;
		$t->categoria = $categoria;

		$t->save();
		
		return redirect()->route('admin_tratamientos')->with('success','Tratamiento creado.');
	}
	
	public function update(Request $request)
	{
		$nombre = $request->input('nombreTratamiento');
		$descripcion = $request->input('descripcionTratamiento');
		$tarifa = $request->input('tarifaTratamiento');
		$tratamientoID = $request->input('idTratamiento');
		$categoria = $request->input('eleccioncategoria');
		

		$t = Tratamientos::findorFail($tratamientoID);
		
		$t->nombre = $nombre;
		$t->descripcion =$descripcion;
		$t->tarifa = $tarifa;
		$t->categoria = $categoria;
		
		$t->update();
		
		return redirect()->route('admin_tratamientos')->with('success','Datos del tratamiento cambiados con éxito.');
	}
	
		public function delete(Request $request)
	{
		
		$tratamiento_id = $request->input('idTratamiento');
		
		$t = Tratamientos::findOrFail($tratamiento_id);
		
		$t->delete();
		
		return redirect()->route('admin_tratamientos')->with('success','Tratamiento eliminado.');
	}
}
