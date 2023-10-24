<?php

namespace App\Controllers;

use App\Models\Historial;

class HistorialController extends Controller
{
    public function index()
    {
        $historial = (new Historial())->todos();

        return parent::ver('historial', [
            'historial' => $historial,
        ], 'Inversiones Zormar - Historial');
    }
}
