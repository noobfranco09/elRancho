<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;

class VentasPdfController extends Controller
{

    public function generarPdf()
    {
        $ventas = Venta::all();

        $pdf = Pdf::loadView("pdf.ventas", compact("ventas"))
            ->setPaper("a4", "portrait")
            ->setWarnings(false);

        return $pdf->stream("lista_ventas.pdf");
    }
}
