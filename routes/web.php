<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;


Route::get('/', [CvController::class, 'cv2']); // Ahora `cv2` será la página principal
Route::get('/cv', [CvController::class, 'index']); // Mantiene la ruta para `cv`
Route::get('/cv2', [CvController::class, 'cv2']); // Sigue disponible en `/cv2`

Route::get('/cv/download', [CvController::class, 'downloadPdf']);