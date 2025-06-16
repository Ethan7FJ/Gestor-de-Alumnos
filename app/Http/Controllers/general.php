<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use App\Models\examen;
use App\Models\generos;
use App\Models\preguntas;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class general extends Controller
{
    public function alumnos()
    {
        $alumnos = alumnos::with('genero', 'examen')->get();

        return view('welcome', compact('alumnos'));
    }

    public function editar($id)
    {
        $alumno = alumnos::findOrFail($id);
        $generos = generos::all();

        return view('editar.editar', compact('alumno', 'generos'));
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'edad' => 'required|numeric|min:1|max:120',
            'genero_id' => 'required|exists:generos,id',
            'correo' => 'required|string|max:255',
            'direccion' => 'required|string|max:255'
        ]);

        $alumno = alumnos::findOrFail($id);
        $alumno->update($request->only('nombres', 'apellidos', 'edad', 'genero_id', 'correo', 'direccion'));

        return redirect()->route('index.alumnos')->with('success', 'Alumno actualizado');
    }

    public function crearExamen()
    {
        $preguntas = preguntas::all();
        return view('examen.crear', compact('preguntas'));
    }

    public function anadir(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'pregunta_id' => 'required|array|min:1',
        ]);


        // Crear examen con su nombre
        $examen = examen::create([
            'nombre' => $request->nombre,
        ]);

        // Guardar relación con preguntas en tabla pivote
        $examen->preguntas()->attach($request->pregunta_id);

        return redirect()->route('index.alumnos')->with('success', 'Examen fue creado');
    }

    public function eliminar($id)
    {
        $alumno = alumnos::findOrFail($id);
        $alumno->delete();

        return redirect()->route('index.alumnos')->with('succes', 'Alumno eliminado correctamente');
    }

    public function nuevo_alumno()
    {
        $generos = generos::all();
        return view('alumno.crear', compact('generos'));
    }

    public function anadir_nuevo_alumno(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'edad' => 'required|numeric|min:1|max:120',
            'genero_id' => 'required|exists:generos,id',
            'correo' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
        ]);

        alumnos::create($request->all());
        return redirect()->route('index.alumnos')->with('success', 'Alumno añadidio correctamente');
    }

    public function adjuntar_examen($id)
    {
        $alumno = alumnos::findOrFail($id);
        $examenes = examen::all();
        return view('examen.adjuntar', compact('examenes', 'alumno'));
    }

    public function anadir_examen(Request $request, $id)
    {

        \Log::info('This is some useful information.', ['data' => $request]);

        $request->validate([
            'examen_id' => 'required|exists:examens,id'
        ]);

        $alumno = alumnos::findOrFail($id);
        $alumno->update(attributes: $request->only('examen_id'));

        return redirect()->route('index.alumnos')->with('success', 'examen adjuntado');
    }
}
