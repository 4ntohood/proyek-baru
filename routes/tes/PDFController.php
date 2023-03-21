<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\classes\PDF_Rotate;


class PDFController extends Controller
{
    public function generatePDF(Request $request, $id)

    {
        $document = DB::table('T_PERIJINAN_TANAH')
            ->select(['PDF_FILES', 'FILES'])
            ->where('Column_ID', $id)
            ->first();

        $file_contents = ($document->PDF_FILES);
        $nama_file = ($document->FILES);
        // download  file.
        Storage::disk('local')->put($nama_file, $file_contents);
        $outputFile = Storage::disk('local')->path($nama_file);

        //storage::put('public/pdf-files/' . $nama_file . '.pdf', $file_contents);
        //$outputFile = Storage::disk('local')->path($nama_file);

        //ambil ukuran kertas
        $ukurankertas = $request->checkbox_a4;
        $fs = $request->font_size;
        if ($ukurankertas == '1') {
            $uk = 'A4';
        } else {
            $uk = 'Legal';
        }
        //ambil nilai checkbox
        $status = $request->checkbox_small;
        $checkbox_text = wordwrap(strtoupper($request->checkbox_text), 1, " ", true);

        // fill data
        if ($status == 1) {
            $this->fillPDF(Storage::disk('local')->path($nama_file), $outputFile, $uk);
        } else {
            $this->fillPDF2(Storage::disk('local')->path($nama_file), $outputFile, $checkbox_text, $uk, $fs);
        }
        //output to browser
        return response()->file($outputFile);
    }
    public function fillPDF($file, $outputFile, $uk)
    {

        $fpdi = new PDF_Rotate('P', 'mm', $uk);
        // watermark image
        $count = $fpdi->setSourceFile($file);
        for ($i = 1; $i <= $count; $i++) {
            $template   = $fpdi->importPage($i);
            $size       = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            //$left = 0;
            //$top = 200;
            if ($uk == 'A4') {
                $text = url('assets/copy.png');
                $width_uk = 210;
                $height_uk = 297;
            } else {
                $text = url('assets/wm2.png');
                $width_uk = 215;
                $height_uk = 330;
            }
            $fpdi->SetAlpha(0.1);

            $xxx_final = ($size['width'] - $width_uk);
            $yyy_final = ($size['height'] - $height_uk);
            $fpdi->Image($text, $xxx_final, $yyy_final, 0, 0, 'png');
        }
        return $fpdi->Output($outputFile, 'F');
    }

    public function fillPDF2($file, $outputFile, $checkbox_text, $uk, $fs)
    {
        $fpdi = new PDF_Rotate('P', 'mm', $uk);
        // watermark text
        $count = $fpdi->setSourceFile($file);
        for ($i = 1; $i <= $count; $i++) {
            $template   = $fpdi->importPage($i);
            $size       = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $left = 0;
            $top = 200;
            $text = $checkbox_text;
            $fpdi->SetFont("times", "", $fs);
            $fpdi->SetTextColor(0, 0, 0);
            $fpdi->SetAlpha(0.1);
            $fpdi->RotatedText(35, 230, $text, 45);
        }
        return $fpdi->Output($outputFile, 'F');
    }

    //$pdf = new Fpdi();
    //$pdf->AddPage();
    //$pdf->SetFont('Arial', '', 20);
    //$pdf->RotatedImage('circle.png', 85, 60, 40, 16, 45);
    //$pdf->RotatedText(100, 60, 'Hello!', 45);
    //$pdf->Output();

    /**    $document = DB::table('T_PERIJINAN_TANAH')
     *        ->selectRaw('PDF')
     *        ->where('Column_ID', 94)
     *        ->first();

     *    $file_contents = ($document->PDF);

     *    //Storage::put('public/pdf-files/invoice.pdf', $file_contents);


     *     return response($pdf,200,$header)
     *         ->view('pstd-file', compact('pdf'))
     *         ->header('Content-type', 'application/pdf;base64')
     *         ->header('Content-Disposition', 'inline; filename=pstd.pdf');
         
        
     *    $data = [
     *        'file' => $file_contents
     *    ];
     *    $pdf = PDF::loadview('pstd-file', $data);
     *    //$customPaper = array(0, 0, 360pt, 360pt);
     *    //$pdf->loadhtml('tessssss');
     *    $pdf->setPaper('A4', 'Portrait');
     *    $pdf->output();
     *    $canvas = $pdf->getDomPDF()->getCanvas();
     *    $height = $canvas->get_height();
     *    $width = $canvas->get_width();
     *    $canvas->set_opacity(.2, "Multiply");
     *    $canvas->page_text($width / 5, $height / 2, 'C O P Y', null, 150, array(0, 0, 0), 2, 2, -30);
     *    //return $pdf->stream('pstd.pdf');
     *    // Storage::put('public/pdf-files/invoice.pdf', $pdf->output());
     *    return $pdf->stream('pstd.pdf');
     */
}
