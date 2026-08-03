<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactoController extends Controller
{
    protected string $archivo = 'contactos.json';

    public function create(Request $request)
    {
        $lugares = Lugar::all();

        $lugarSeleccionado = null;
        if ($request->filled('lugar_id')) {
            $lugarSeleccionado = Lugar::find((int) $request->query('lugar_id'));
        }

        return view('contacto.create', compact('lugares', 'lugarSeleccionado'));
    }

    public function store(Request $request)
    {
        $validado = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'lugar_id' => ['nullable', 'integer'],
            'mensaje' => ['required', 'string', 'max:1000'],
        ]);

        $validado['fecha'] = now()->toDateTimeString();

        $contactos = Storage::exists($this->archivo)
            ? json_decode(Storage::get($this->archivo), true)
            : [];

        $contactos[] = $validado;

        Storage::put($this->archivo, json_encode($contactos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return redirect()
            ->route('contacto.create')
            ->with('exito', '¡Gracias! Tu mensaje fue enviado correctamente.');
    }
}
