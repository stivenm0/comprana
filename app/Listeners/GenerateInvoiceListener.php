<?php

namespace App\Listeners;

use App\Events\CreateOrderEvent;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class GenerateInvoiceListener
{
    /**
     * Create the event listener.
     */
    public function __construct(protected Fpdf $pdf)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateOrderEvent $event): void
    {
        // dd($event);        
   

        $this->pdf->SetMargins(4,6,4);
        $this->pdf->AddPage(size: array(80,258));

        # Encabezado y datos de la empresa #
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("COMPRANA")),0,'C',false);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","RUC: 0000000000"),0,'C',false);
        $this->pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Direccion comprana"),0,'C',false);
        $this->pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Teléfono: 00000000"),0,'C',false);
    
        $this->pdf->Ln(1);
        $this->pdf->Cell(0,5,iconv("UTF-8", "ISO-8859-1","------------------------------------------------------"),0,0,'C');
        $this->pdf->Ln(5);
    
        $this->pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Fecha: ".date("d/m/Y", strtotime("13-09-2022"))." ".date("h:s A")),0,'C',false);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("Ticket Nro: 1")),0,'C',false);
        $this->pdf->SetFont('Arial','',9);
    
        $this->pdf->Ln(1);
        $this->pdf->Cell(0,5,iconv("UTF-8", "ISO-8859-1","------------------------------------------------------"),0,0,'C');
        $this->pdf->Ln(5);
    
        $this->pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Cliente: Carlos Alfaro"),0,'C',false);
        $this->pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Teléfono: 00000000"),0,'C',false);
        $this->pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Dirección: San Salvador, El Salvador, Centro America"),0,'C',false);
    
        $this->pdf->Ln(1);
        $this->pdf->Cell(0,5,iconv("UTF-8", "ISO-8859-1","-------------------------------------------------------------------"),0,0,'C');
        $this->pdf->Ln(3);
    
        # Tabla de productos #
        $this->pdf->Cell(10,5,iconv("UTF-8", "ISO-8859-1","Cant."),0,0,'C');
        $this->pdf->Cell(19,5,iconv("UTF-8", "ISO-8859-1","Precio"),0,0,'C');
        $this->pdf->Cell(28,5,iconv("UTF-8", "ISO-8859-1","Total"),0,0,'C');
    
        $this->pdf->Ln(3);
        $this->pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","-------------------------------------------------------------------"),0,0,'C');
        $this->pdf->Ln(3);
    
    
    
        /*----------  Detalles de la tabla  ----------*/
        foreach($event->products as $product){
        $this->pdf->MultiCell(0,4,iconv("UTF-8", "ISO-8859-1",$product->name),0,'C',false);
        $this->pdf->Cell(10,4,iconv("UTF-8", "ISO-8859-1",$product->pivot->cant),0,0,'C');
        $this->pdf->Cell(19,4,iconv("UTF-8", "ISO-8859-1","$".$product->price),0,0,'C');
        $this->pdf->Cell(28,4,iconv("UTF-8", "ISO-8859-1","$".$product->price * $product->pivot->cant),0,0,'C');
        $this->pdf->Ln(7);
        /*----------  Fin Detalles de la tabla  ----------*/
        }
    
    
        $this->pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","-------------------------------------------------------------------"),0,0,'C');
    
        $this->pdf->Ln(5);
    
        # Impuestos & totales #
        $this->pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
        $this->pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","SUBTOTAL"),0,0,'C');
        $this->pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1","+ $70.00 USD"),0,0,'C');
    
        $this->pdf->Ln(5);
    
        $this->pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
        $this->pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","IVA (13%)"),0,0,'C');
        $this->pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1","+ $0.00 USD"),0,0,'C');
    
        $this->pdf->Ln(5);
    
        $this->pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","-------------------------------------------------------------------"),0,0,'C');
    
        $this->pdf->Ln(5);
        
        $this->pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
        $this->pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","TOTAL PAGADO"),0,0,'C');
        $this->pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1","$100.00 USD"),0,0,'C');
    
        $this->pdf->Ln(10);
    
        $this->pdf->SetFont('Arial','B',9);
        $this->pdf->Cell(0,7,iconv("UTF-8", "ISO-8859-1","Gracias por su compra"),'',0,'C');
    
        $this->pdf->Ln(9);
    
    # Nombre del archivo PDF #
         Storage::disk('invoices')->put('hola.pdf', $this->pdf->Output('S'));

         $this->pdf->close();
    }
}
