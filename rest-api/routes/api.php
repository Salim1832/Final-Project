<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\StudentController;
use App\Models\Patient;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# method GET
Route::get('/animals', [AnimalController::class, "index"]);

#method POST
Route::post('/animals', [AnimalController::class, "store"]);

#method PUT
Route::put('/animals/{id}', [AnimalController::class, "update"]);

#method DELETE
Route::delete('/animals/{id}', [AnimalController::class, "destroy"]);

# Routes Student
Route::get('/students', [StudentController::class, "index"]);
Route::post('/students', [StudentController::class, "Store"]);
Route::put('/students/{id}', [StudentController::class, "update"]);
Route::delete('/students/{id}', [StudentController::class, "destroy"]);
Route::get('/students/{id}', [StudentController::class, "show"]);


# Routes PasienCovid
# Get All Resource
Route::get('/patients', [PatientsController::class, 'index']);
# Add Patient Resource
Route::post('/patients', [PatientsController::class, 'store']);
# Get Detail Data Patient 
Route::get('/patients/{id}', [PatientsController::class, 'show']);
# Update Patien Resource
Route::put('/patients/{id}', [PatientsController::class, 'update']);
# Delete Patient Resource
Route::delete('patients/{id}', [PatientsController::class, 'destroy']);
# Get Search by Name Resource
Route::get('/patients/search/{name}', [PatientsController::class, 'search']);
# Get Status positive patients resource
Route::get('/patients/status/positive', [PatientsController::class, 'positive']);
# Get Status recovered patients resource
Route::get('/patients/status/recovered', [PatientsController::class, 'recovered']);
# Get Status dead patients resource
Route::get('/patients/status/dead', [PatientsController::class, 'dead']);