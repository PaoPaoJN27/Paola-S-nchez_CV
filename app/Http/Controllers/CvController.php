<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;

class CvController extends Controller
{
    public function index()
    {
        // Carga los datos del CV desde un archivo
        $cv = include base_path('data/cv_data.php');
        return view('cv', compact('cv'));
    }
    public function cv2()
{
    $ruta = resource_path('data/cv_data.php');

    if (!file_exists($ruta)) {
        dd("❌ No se encontró el archivo: $ruta");
    }

    $cv = include $ruta;
    return view('cv2', compact('cv'));
}


    public function downloadPdf()
{
    $cv = include base_path('cv_data.php'); // Usamos el archivo correcto

    $pdf = SnappyPdf::loadView('cv_pdf', compact('cv')) // Usamos la vista para PDF
        ->setPaper('a4')
        ->setOption('encoding', 'UTF-8')
        ->setOption('enable-local-file-access', true);

    return $pdf->download('CV_Montserrat_Sanchez.pdf');
}
}
