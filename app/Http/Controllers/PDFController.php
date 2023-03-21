<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Perijinanprint;
use App\Models\Perijinan;
use App\Models\Kelompok;
use App\Models\Golongan;
use App\Models\SerTa;
use carbon\carbon;
use Auth;
use File;


use App\classes\PDF_Rotate;

class PDFController extends Controller
{
    public function generatePDF(Request $request, $id)

    {

        if ($request->cJenis == '1') {
            $document = DB::table('T_PERIJINAN')
                ->select(['pdf_files', 'namafile'])
                ->where('column_id', $id)
                ->first(); //Perijinan
            $file_contents = ($document->pdf_files);
            $nama_file = ($document->namafile);
        } elseif ($request->cJenis == '2') {
            $document = DB::table('T_PERIJINAN_TANAH')
                ->select(['PDF_FILES', 'FILES'])
                ->where('Column_ID', $id)
                ->first(); //Sertifikat
            $file_contents = ($document->PDF_FILES);
            $nama_file = ($document->FILES);
        }

        if (isset($file_contents)) {
            // download  file.
            $nama_files = str_replace('/', '.', $nama_file);
            Storage::disk('local')->put($nama_files, $file_contents);
            $outputFile = Storage::disk('local')->path($nama_files);

            $nama_file_temp = $nama_files;
            $request->session()->put('temp_pdf', $nama_file_temp);

            //ambil ukuran kertas
            if ($request->checkbox_a4 == '1') {
                $uk = 'A4';
            } elseif ($request->checkbox_f4 == '1') {
                $uk = 'Legal';
            } else {
                return back()->with('warning', 'Pilih Ukuran Kertas dulu!');
            }

            //pilih jenis watermark gambar atau text
            if ($request->checkbox_small == '1') {
                $status = '1';
            } elseif ($request->checkbox_large == '1') {
                $status = '2';
            } else {
                return back()->with('warning', 'Pilih Logo/Text Watermark dulu!');
            }

            $option_wm = $request->option_wm;
            $checkbox_text = $request->checkbox_text;

            // fill data
            if ($status == 1) {
                $this->fillPDF(Storage::disk('local')->path($nama_files), $outputFile, $uk);
            } else {
                $this->fillPDF2(Storage::disk('local')->path($nama_files), $outputFile, $checkbox_text, $uk, $status, $option_wm);
            }
            //save data cetak--------------------------------------------------------------------------------------

            $periode = session('pPeriode');
            if ($request->cJenis == '1') {
                $kodemst = $request->input('kodemaster');
            } else {
                $kodemst = $request->input('kodemaster2');
            }

            /** Konversi tanggal dari nvarchar ke datetime pake Carbon */
            $tgl = Carbon::parse($request->tgl)->toDateString();

            $user = Auth::user()->username;
            $fulldate = date("Ymd His");
            $rt = $request->ip();
            $who = $fulldate . '|' . $rt . '|' . $user;

            $tambah = new Perijinanprint;
            $tambah->periode = $periode;
            $tambah->tgl = $tgl;
            $tambah->kode = $kodemst;
            $tambah->no = $request->no;
            $tambah->nama = $request->nama;
            $tambah->jenis = $request->cJenis;
            $tambah->keterangan = $request->keterangan_wm;
            $tambah->c_append = $who;
            $tambah->save();

            //output to browser-------------------------------------------------------------------------------------------
            return response()->file($outputFile);
        } else {
            return back()->with('Info', 'File Tidak Ada/blm diupload!');
        }
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
                $text = ('D:/Wm_A4.png');
                $width_uk = 210;
                $height_uk = 297;
            } else {
                $text = ('D:/Wm_legal.png');
                $width_uk = 216;
                $height_uk = 356;
            }
            $fpdi->SetAlpha(0.1);

            $xxx_final = ($size['width'] - $width_uk);
            $yyy_final = ($size['height'] - $height_uk);
            $fpdi->Image($text, $xxx_final, $yyy_final, 0, 0, 'png');
        }
        return $fpdi->Output($outputFile, 'F');
    }

    public function fillPDF2($file, $outputFile, $checkbox_text, $uk, $status, $option_wm)
    {
        $fpdi = new PDF_Rotate('P', 'mm', $uk);
        // watermark text
        if ($uk == 'A4' && $status == '2') {

            if ($option_wm == 'CONFIDENTIAL' && strLen(trim($checkbox_text)) <= 5) {
                $fs = 65;
                $x1 =  35;
                $y1 = 230;
                $x2 = 110;
                $y2 = 190;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 6 && strLen($checkbox_text) <= 9)) {
                $fs = 65;
                $x1 =  25;
                $y1 = 230;
                $x2 =  65;
                $y2 = 240;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 10 && strLen($checkbox_text) <= 11)) {
                $fs = 65;
                $x1 =  35;
                $y1 = 230;
                $x2 =  75;
                $y2 = 245;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 12)) {
                $fs = 65;
                $x1 =  35;
                $y1 = 230;
                $x2 =  55;
                $y2 = 250;
            } elseif ($option_wm == 'COPY') {
                $fs = 180;
                $x1 =  55;
                $y1 = 250;
            } elseif ($option_wm == 'DRAFT') {
                $fs = 160;
                $x1 =  50;
                $y1 = 250;
            } elseif ($option_wm == 'TOP SECRET') {
                $fs = 80;
                $x1 =  35;
                $y1 = 230;
            }
        } elseif ($uk == 'Legal' && $status == '2') {
            if ($option_wm == 'CONFIDENTIAL' && strLen(trim($checkbox_text)) <= 5) {
                $fs = 65;
                $x1 =  35;
                $y1 = 230;
                $x2 = 110;
                $y2 = 190;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 6 && strLen($checkbox_text) <= 9)) {
                $fs = 65;
                $x1 =  25;
                $y1 = 230;
                $x2 =  65;
                $y2 = 240;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 10 && strLen($checkbox_text) <= 11)) {
                $fs = 65;
                $x1 =  35;
                $y1 = 230;
                $x2 =  75;
                $y2 = 230;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 12)) {
                $fs = 65;
                $x1 =  35;
                $y1 = 230;
                $x2 =  55;
                $y2 = 250;
            } elseif ($option_wm == 'COPY') {
                $fs = 180;
                $x1 =  55;
                $y1 = 250;
            } elseif ($option_wm == 'DRAFT') {
                $fs = 160;
                $x1 =  50;
                $y1 = 250;
            } elseif ($option_wm == 'TOP SECRET') {
                $fs = 80;
                $x1 =  35;
                $y1 = 230;
            }
        }

        $count = $fpdi->setSourceFile($file);
        for ($i = 1; $i <= $count; $i++) {
            $template   = $fpdi->importPage($i);
            $size       = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $left = 0;
            $top = 200;
            $text = wordwrap(strtoupper($option_wm), 1, " ", true);
            $text2 = wordwrap(strtoupper($checkbox_text), 1, " ", true);
            $fpdi->SetFont("ARIAL", "B", $fs);
            $fpdi->SetTextColor(0, 0, 0);
            $fpdi->SetAlpha(0.2);
            $fpdi->RotatedText($x1, $y1, $text, 50);
            if (strlen(trim($text2)) > 1) {
                $fpdi->RotatedText2($x2, $y2, $text2, 50);
            }
        }
        return $fpdi->Output($outputFile, 'F');
    }

    public function watermarkPDF()
    {
        return view('watermark.index');
    }

    public function readwatermark()
    {
        if (session()->has('temp_pdf')) {
            $temp = session('temp_pdf');
            Storage::disk('local')->delete($temp);
        }
        return view('watermark.mainpage');
    }

    public function generatePDF_plus(Request $request)

    {

        if ($request->file('file_pdf')) {
            if ($request->checkbox_small !== '1' && $request->checkbox_large !== '1') {
                return back()->with('warning', 'Pilih Logo/Text Watermark dulu!');
            } elseif ($request->checkbox_a4 !== '1' && $request->checkbox_f4 !== '1') {
                return back()->with('warning', 'Pilih Ukuran Kertas dulu!');
            } else {

                $file = $request->file('file_pdf');
                $originalName = $file->getClientOriginalName();
                //$path = "watermark_pdf/" . $originalName;
                Storage::disk('local')->put($originalName, file_get_contents($file));
                $outputFile = Storage::disk('local')->path($originalName);

                $nama_file_temp = $originalName;
                $request->session()->put('temp_pdf', $nama_file_temp);
                //ambil ukuran kertas
                if ($request->checkbox_a4 == '1') {
                    $uk = 'A4';
                } elseif ($request->checkbox_f4 == '1') {
                    $uk = 'Legal';
                }

                //pilih jenis watermark gambar atau text
                if ($request->checkbox_small == '1') {
                    $status = '1';
                } elseif ($request->checkbox_large == '1') {
                    $status = '2';
                }

                $option_wm = $request->option_wm;
                $checkbox_text = $request->checkbox_text;
                $font_wm = $request->font_wm;
                $opacity_wm = $request->opacity_wm;

                // fill data
                if ($status == '1') {
                    $this->fillPDF_plus(Storage::disk('local')->path($originalName), $outputFile, $uk);
                } else {
                    $this->fillPDF2_plus(Storage::disk('local')->path($originalName), $outputFile, $checkbox_text, $uk, $status, $option_wm, $font_wm, $opacity_wm);
                }

                //output to browser-------------------------------------------------------------------------------------------
                return response()->file($outputFile);
            }
        } else {
            return back()->with('info', 'File PDF Masih Kosong');
        }
    }
    public function fillPDF_plus($file, $outputFile, $uk)
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
                $text = ('D:/Wm_A4.png');
                $width_uk = 210;
                $height_uk = 297;
            } else {
                $text = ('D:/Wm_legal.png');
                $width_uk = 216;
                $height_uk = 356;
            }
            $fpdi->SetAlpha(0.1);

            $xxx_final = ($size['width'] - $width_uk);
            $yyy_final = ($size['height'] - $height_uk);
            $fpdi->Image($text, $xxx_final, $yyy_final, 0, 0, 'png');
        }
        return $fpdi->Output($outputFile, 'F');
    }

    public function fillPDF2_plus($file, $outputFile, $checkbox_text, $uk, $status, $option_wm, $font_wm, $opacity_wm)
    {

        $fpdi = new PDF_Rotate('P', 'mm', $uk);
        // watermark text
        if ($uk == 'A4' && $status == '2') {

            if ($option_wm == 'CONFIDENTIAL' && strLen(trim($checkbox_text)) <= 6) {
                $fs = 65;
                $x1 =  35;
                $y1 = 230;
                $x2 = 110;
                $y2 = 190;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 7 && strLen($checkbox_text) <= 9)) {
                $fs = 65;
                $x1 =  25;
                $y1 = 230;
                $x2 =  65;
                $y2 = 240;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 10 && strLen($checkbox_text) <= 11)) {
                $fs = 65;
                $x1 =  35;
                $y1 = 230;
                $x2 =  75;
                $y2 = 245;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 12 && strlen($checkbox_text) <= 15)) {
                $fs = 55;
                $x1 =  35;
                $y1 = 230;
                $x2 =  55;
                $y2 = 250;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 16 && strlen($checkbox_text) <= 20)) {
                $fs = 45;
                $x1 =  35;
                $y1 = 230;
                $x2 =  45;
                $y2 = 260;
            } elseif ($option_wm == 'COPY') {
                $fs = 180;
                $x1 =  55;
                $y1 = 250;
            } elseif ($option_wm == 'DRAFT') {
                $fs = 160;
                $x1 =  50;
                $y1 = 250;
            } elseif ($option_wm == 'TOP SECRET') {
                $fs = 80;
                $x1 =  35;
                $y1 = 230;
            }
        } elseif ($uk == 'Legal' && $status == '2') {
            if ($option_wm == 'CONFIDENTIAL' && strLen(trim($checkbox_text)) <= 6) {
                $fs = 65;
                $x1 =  35;
                $y1 = 230;
                $x2 = 110;
                $y2 = 190;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 7 && strLen($checkbox_text) <= 9)) {
                $fs = 65;
                $x1 =  25;
                $y1 = 230;
                $x2 =  65;
                $y2 = 240;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 10 && strLen($checkbox_text) <= 11)) {
                $fs = 65;
                $x1 =  35;
                $y1 = 230;
                $x2 =  75;
                $y2 = 230;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 12 && strlen($checkbox_text) <= 15)) {
                $fs = 55;
                $x1 =  35;
                $y1 = 230;
                $x2 =  55;
                $y2 = 250;
            } elseif ($option_wm == 'CONFIDENTIAL' && (strLen($checkbox_text) >= 16 && strlen($checkbox_text) <= 20)) {
                $fs = 45;
                $x1 =  35;
                $y1 = 230;
                $x2 =  45;
                $y2 = 260;
            } elseif ($option_wm == 'COPY') {
                $fs = 180;
                $x1 =  55;
                $y1 = 250;
            } elseif ($option_wm == 'DRAFT') {
                $fs = 160;
                $x1 =  50;
                $y1 = 250;
            } elseif ($option_wm == 'TOP SECRET') {
                $fs = 80;
                $x1 =  35;
                $y1 = 230;
            }
        }

        $count = $fpdi->setSourceFile($file);
        for ($i = 1; $i <= $count; $i++) {
            $template   = $fpdi->importPage($i);
            $size       = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $left = 0;
            $top = 200;
            $text = wordwrap(strtoupper($option_wm), 1, " ", true);
            $text2 = wordwrap(strtoupper($checkbox_text), 1, " ", true);
            if ($font_wm == 'Arial') {
                $fpdi->SetFont("Arial", "", $fs);
            } elseif ($font_wm == 'ArialBOLD') {
                $fpdi->SetFont("Arial", "B", $fs);
            } elseif ($font_wm == 'Courier') {
                $fpdi->SetFont("Courier", "", $fs);
            } elseif ($font_wm == 'Times New Roman') {
                $fpdi->SetFont("Times", "", $fs);
            } else {
                $fpdi->SetFont("Arial", "B", $fs);
            }

            $fpdi->SetTextColor(0, 0, 0);

            if ($opacity_wm == '1') {
                $fpdi->SetAlpha(0.1);
            } elseif ($opacity_wm == '2') {
                $fpdi->SetAlpha(0.2);
            } elseif ($opacity_wm == '3') {
                $fpdi->SetAlpha(0.3);
            } elseif ($opacity_wm == '4') {
                $fpdi->SetAlpha(0.4);
            } elseif ($opacity_wm == '5') {
                $fpdi->SetAlpha(0.5);
            } else {
                $fpdi->SetAlpha(0.2);
            }
            //$fpdi->SetAlpha(0.5);
            $fpdi->RotatedText($x1, $y1, $text, 50);
            if (strlen(trim($text2)) > 1) {
                $fpdi->RotatedText2($x2, $y2, $text2, 50);
            }
        }
        return $fpdi->Output($outputFile, 'F');
    }

    public function lihat_pdf(Request $request, $id)
    {
        $dt = Perijinan::findorFail($id);
        $kodemaster = $request->kdmstr;
        $kelompok = Kelompok::All();
        $golongan = Golongan::All();
        return view('Ijin_detail.lihatpdf', compact('dt', 'kodemaster', 'kelompok', 'golongan'));
    }
    public function tanah_lihat_pdf(Request $request, $id)
    {
        $data = SerTa::findOrFail($id);
        $kodemaster = $data->pluck('kode')->first();
        return view('SerTa_detail.lihatpdf', compact('data', 'kodemaster'));
    }

    public function open_PDF(Request $request, $id)
    {

        if ($request->cJenis == '1') {
            $document = DB::table('T_PERIJINAN')
                ->select(['pdf_files', 'namafile'])
                ->where('column_id', $id)
                ->first(); //Perijinan
            $file_contents = ($document->pdf_files);
            $nama_file = ($document->namafile);
        } elseif ($request->cJenis == '2') {
            $document = DB::table('T_PERIJINAN_TANAH')
                ->select(['PDF_FILES', 'FILES'])
                ->where('Column_ID', $id)
                ->first(); //Sertifikat
            $file_contents = ($document->PDF_FILES);
            $nama_file = ($document->FILES);
        }

        if (isset($file_contents)) {
            // download  file.
            $nama_files = str_replace('/', '.', $nama_file);
            Storage::disk('local')->put($nama_files, $file_contents);
            $outputFile = Storage::disk('local')->path($nama_files);

            $nama_file_temp = $nama_files;
            $request->session()->put('temp_pdf', $nama_file_temp);

            //ambil ukuran kertas
            $uk = 'A4';
            //pilih jenis watermark 
            $this->nofillPDF(Storage::disk('local')->path($nama_files), $outputFile, $uk);
            //output to browser-------------------------------------------------------------------------------------------
            return response()->file($outputFile);
        } else {
            return back()->with('info', 'File Tidak Ada/blm diupload!');
        }
    }
    public function nofillPDF($file, $outputFile, $uk)
    {
        $fpdi = new PDF_Rotate('P', 'mm', $uk);
        // watermark text
        $fs = 1;
        $x1 =  1;
        $y1 = 1;
        $count = $fpdi->setSourceFile($file);
        for ($i = 1; $i <= $count; $i++) {
            $template   = $fpdi->importPage($i);
            $size       = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $text = '';
            $fpdi->SetFont("ARIAL", "", $fs);
            $fpdi->SetTextColor(0, 0, 0);
            $fpdi->SetAlpha(0.0);
        }

        return $fpdi->Output($outputFile, 'I');
    }
    public function hapus_temp_pdf()
    {
        if (session()->has('temp_pdf')) {
            $temp = session('temp_pdf');
            Storage::disk('local')->delete($temp);
        }
    }
}
