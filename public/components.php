<?php

function generarAlertaExito($texto)
{
    $alerta = '<div id="alerta" class="alert alert-success slide-fade-enter-from tostada" role="alert">'.$texto.'</div>';
    return $alerta;
}

function generarAlertaError($texto)
{
    $alerta = '<div id="alerta" class="alert alert-danger slide-fade-enter-from tostada" role="alert">'.$texto.'</div>';
    return $alerta;
}

function modal($nombre, $id, $mensaje)
{
    $borrarUrl = borrarUrl($nombre, $id);

    return "<dialog data-modal id=\"delete-modal-$id\"><p>$mensaje</p>
            <div>
                <button class=\"btn\" onclick=\"cerrar('$id')\">Cancelar</button>
                <a class=\"btn\" href=\"$borrarUrl\">Confirmar</a>
            </div>
        </dialog>
    ";
}
