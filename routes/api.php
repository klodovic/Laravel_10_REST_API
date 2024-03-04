<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Student End-points
Route::get('student', [StudentController::class, 'getAllStudents']);
Route::get('student/{id}', [StudentController::class,'getStudent']);
Route::post('student', [StudentController::class, 'create']);
Route::put('student/edit/{id}', [StudentController::class, 'update']);
Route::delete('student/edit/{id}', [StudentController::class, 'delete']);

