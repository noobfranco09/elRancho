<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InventarioPdfController extends Controller
{
    public function generarPdf()
    {
        $inventarios = Inventario::all();

        $pdf = Pdf::loadView("pdf.inventarios", compact("inventarios"))
            ->setPaper("a4", "portrait")
            ->setWarnings(false);

        return $pdf->stream("lista_inventario.pdf");
    }
}
