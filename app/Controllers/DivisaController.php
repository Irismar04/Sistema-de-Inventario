<?php

namespace App\Controllers;

use App\Models\Divisa;

class DivisaController extends Controller
{
    public function index()
    {
        $divisaActual = (new Divisa())->ultima();
        return parent::ver('divisa', [
            'divisa' => $divisaActual,
        ], 'Inversiones Zormar - Divisa');
    }

    public function guardar()
    {
        $modelo = new Divisa();
        $success = false;
        if(isset($_POST['id'])) {
            $success = $modelo->actualizar($_POST);
        } else {
            $success = $modelo->guardar($_POST);
        }

        if($success) {
            parent::redirigir('divisa?success=crear');
        } else {
            parent::redirigir('divisa?error=crear');
        }
    }
}
