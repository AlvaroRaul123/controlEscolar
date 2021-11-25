<?php

use App\Http\Controllers\TutorControlller;
use App\Models\Administrativo;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('admin/index', 'AdministrativoController@index')->name('admin.index');
// ----------------------------------------------------------------------------------

Route::get('admin/index/tutores', 'TutorController@index')->name('admin.indexTutores');

Route::get('admin/created/tutores', 'TutorController@create')->name('admin.createdTutores');

Route::post('admin/store/tutores', 'TutorController@store')->name('admin.storeTutores');

Route::get('admin/show-tutor/{tutor}', 'TutorController@show')->name('admin.showTutores');

Route::get('admin/edit-tutor/{tutor}', 'TutorController@edit')->name('admin.editTutores');

Route::put('admin/tutores/{tutor}/update', 'TutorController@update')->name('admin.updateTutores');

Route::delete('admin/tutores/destroy/{tutor}', 'TutorController@destroy')->name('admin.destroyTutores');
// ----------------------------------------------------------------------------------------------------------------

Route::get('admin/index/estudiantes', 'EstudianteController@index')->name('admin.indexEstudiantes');

Route::get('admin/created/estudiantes', 'EstudianteController@create')->name('admin.createdEstudiantes');

Route::post('admin/store/estudiantes', 'EstudianteController@store')->name('admin.storeEstudiantes');

Route::get('admin/show-estudiantes/{estudiante}', 'EstudianteController@show')->name('admin.showEstudiantes');

Route::get('admin/edit-estudiantes/{estudiante}', 'EstudianteController@edit')->name('admin.editEstudiantes');

Route::put('admin/estudiantes/{estudiante}/update', 'EstudianteController@update')->name('admin.updateEstudiantes');

Route::delete('admin/estudiantes/destroy/{estudiante}', 'EstudianteController@destroy')->name('admin.destroyEstudiantes');
// ----------------------------------------------------------------------------------------------------------------

Route::get('admin/index/docentes', 'DocenteController@index')->name('admin.indexDocentes');

Route::get('admin/created/docentes', 'DocenteController@create')->name('admin.createdDocentes');

Route::post('admin/store/docentes', 'DocenteController@store')->name('admin.storeDocentes');

Route::get('admin/show-docentes/{docentes}', 'DocenteController@show')->name('admin.showDocentes');

Route::get('admin/edit-docentes/docentes', 'DocenteController@edit')->name('admin.editDocentes');

Route::put('admin/docentes-update/{docentes}', 'DocenteController@update')->name('admin.updateDocentes');

Route::delete('admin/docentes/destroy/{docentes}', 'DocenteController@destroy')->name('admin.destroyDocentes');
// ----------------------------------------------------------------------------------------------------------------

Route::get('admin/crear/grupo', function () {
    return view('administrativo.crearGrupo');
})->name('admin.crearGrupo');

Route::get('admin/docentes', function () {
    return view('administrativo.docentes');
})->name('admin.indexDocentes');

Route::get('admin/registrar/docentes', function () {
    return view('administrativo.registrarDocentes');
})->name('admin.registrarDocentes');


Route::get('menu/docente', function () {
    return view('docente.menuDocente');
})->name('menuDocente');

Route::get('menu/tutor', function () {
    return view('tutor.menuTutor');
})->name('menuTutor');

Route::get('menu/tutor/observaciones', function () {
    return view('tutor.observaciones');
})->name('menuTutorObservaciones');

Route::get('menu/contador', function () {
    return view('contador.menuContador');
})->name('menuContador');

Route::get('menu/contador/historial/Pagos', function () {
    return view('contador.historialDePagos');
})->name('menuContadorHistorialDePagos');

Route::get('menu/contador/historial/Pagos/recientes', function () {
    return view('contador.historialDePagosReciente');
})->name('menuContadorHistorialDePagosReciente');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
