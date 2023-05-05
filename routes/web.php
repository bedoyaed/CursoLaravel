<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return "Hola desde la pagina de inicio de danny";
    //return view('welcome');
});


Route::get('/contacto', function () {
    return "hola desde la pagina contactos usando el metodo get";

});


Route::post('/contacto', function () {
    return "hola desde la pagina contactos usando el metodo post";

});


Route::match(['get', 'post'],'/contacto', function () {
    return "hola desde la pagina contactos usando el metodo get o post";

});


Route::get('/cursos/informacion', function() {
    return "Aqui podras encontrar toda la informacion de los cursos";

});


Route::get('/cursos/{curso}', function($curso) {
    return "Bienvenido al curso: $curso";
});



Route::get('/cursos/{curso}/{category}', function($curso, $category){
    return "Bienvenido al curso: $curso de la categoria: $category";

});

//para el caso que uno de los parametros sean opcionales

Route::get('/cursos/{curso}/{category?}', function($curso, $category = null){

    if($category){
        return "Bienvenido al curso: $curso de la categoria: $category";
    }else{
        return "Bienvenido al curso: $curso";
    }
    

});



//para proteger los datos que se ingresan con expresiones regulares

Route::get('/cursos/{curso}/{category}', function($curso, $category){
    return "Bienvenido al curso: $curso de la categoria: $category";
})->where ('curso', '[a-zA-Z]+');

// este solo para letras

Route::get('/cursos/{curso}/{category}', function($curso, $category){
    return "Bienvenido al curso: $curso de la categoria: $category";
})->whereAlpha ('curso');




// este es para letras y numeros excluye los caracteres especiales

Route::get('/cursos/{curso}/{category}', function($curso, $category){
    return "Bienvenido al curso: $curso de la categoria: $category";
})->whereAlphaNumeric ('curso');


// con id en las rutas

Route::get('/cursos/{id}', function($id){
    return "Bienvenidos al curso con id: $id";

});