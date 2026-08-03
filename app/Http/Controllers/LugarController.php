<?php

namespace App\Http\Controllers;

use App\Models\Lugar;

class LugarController extends Controller
{
    public function index()
    {
        $lugares = Lugar::all();

        return view('lugares.index', compact('lugares'));
    }

    public function show(int $id)
    {
        $lugar = Lugar::find($id);

        abort_if($lugar === null, 404);

        return view('lugares.show', compact('lugar'));
    }
}
