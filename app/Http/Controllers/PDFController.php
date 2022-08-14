<?php

namespace App\Http\Controllers;

use App\Models\Deuda;
use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PDFController extends Controller
{
    
    public function pdfVentaPagada($venta_id)
    {
        $venta = Venta::find($venta_id);
        $cliente = Cliente::find($venta->cliente_id);
        if($venta->tipo==0)//contado
        {
        $pdf = PDF::loadView('pdf.ventaPagada',compact('venta','cliente'));
            return $pdf->stream('nv000'.$venta->id.'.pdf');
        }else
        {
            $deuda=Deuda::where('venta_id',$venta->id)->first();
            $abonos = $deuda->abonos()->get();
            $entrada = $abonos[0]->valor;
            $pdf = PDF::loadView('pdf.ventaPagada',compact('venta','cliente','entrada'));
            return $pdf->stream('nv000'.$venta->id.'.pdf');
        }
    }
}
