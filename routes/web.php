<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * --------------------------------------------------------------------------
 *  RUTAS SIN AUTENTICACIÓN
 * -----------------------------------------------------------------------
 */


Route::get('/', 'FrontController@index')->name('home');

Route::get('contacto', 'FrontController@contactView')->name('contact');

Route::get('testimonios', 'FrontController@getTestimonies')->name('testimonies');

Route::get('blog', 'FrontController@getPosts')->name('posts');

Route::get('cursos', 'FrontController@getCoursesOwner')->name('courses');

Route::get('cursos-institucionales', 'FrontController@getInstitutionlCourses')->name('courses.institutionls');

Route::get('preguntas-frecuentes', 'FrontController@frecuentQuestions')->name('frequent.questions');

Route::get('carrito', 'FrontController@shopCartView')->name('shop.cart');

Route::get('js-consultores', 'FrontController@jsConsultores')->name('js.consultores');

Route::get('post/{slug}', 'FrontController@getPostDetail')->name('post.detail');

Route::get('curso/{slug}', 'FrontController@getCourseDetail')->name('course.detail');

Route::get('acerca-de-nosotros', 'FrontController@about')->name('about');

Route::get('autor/{name}', 'FrontController@getAuthorInfo')->name('author');



Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('post.register');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('post.login');


// Mostrar formulario: Ingrese correo para recuperar
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Enviar el formulario
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Ruta para mostrar el formulario desde para restablece contraseña
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Ruta para guardar cambios de nueva contraseña
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



// Rutas de prueba
Route::get('checkout', 'TransactionController@showCheckoutForm')->name('checkout');
Route::post('process-charge', 'TransactionController@processCharge')->name('process.charge');

Route::get('/admin', function () {
    return view('admin.home');
});

//Rutas del Panel



/**
 * ----------------------------------------------------------------------------------
 * RUTAS QUE REQUIEREN AUTENTICACIÓN
 * ----------------------------------------------------------------------------------
 */

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    // Grupo de rutas para panel administrativo
    Route::group(['prefix' => 'panel'], function () {

        Route::get('/', 'PanelController@home')->name('panel.home');

        // Todas las rutas de panel aqui------------
        Route::get('courses', 'CourseController@index'); //Listado de Cursos
        Route::get('courses/create', 'CourseController@create'); //Agregar nuevo Curso
        Route::post('courses', 'CourseController@store'); //Graba un nuevo curso
        Route::get('courses/{id}/edit', 'CourseController@edit'); //Editar curso
        Route::put('courses/{id}', 'CourseController@udpate'); //Graba actualización de curso
        Route::delete('courses/{id}/destroy', 'CourseController@destroy'); //Eliminar el curso

        Route::get('courses/{id}/assignment/', function () { return view('admin.courses.instructor-assignment'); });
        Route::get('courses/addmodule/', function () { return view('admin.courses.add-module'); });
        Route::get('courses/addprice/', function () { return view('admin.courses.add-price'); });
        Route::get('courses/addfeature/', function () { return view('admin.courses.add-feature'); });

        // Route::get('category', 'CategoryController@index');
        // Route::get('category/create', 'CategoryController@create');

        Route::resource('category', 'CategoryController');
        //Route::get('category', function () { return view('admin.category.index'); });
        //Route::get('category/create', function () { return view('admin.category.create'); });

        Route::get('instructor', function () { return view('admin.instructor.index'); });
        Route::get('instructor/create', function () { return view('admin.instructor.create'); });
        Route::get('customer', function () { return view('admin.customer.index'); });
        Route::get('customer/create', function () { return view('admin.customer.create'); });
        Route::get('testimony', function () { return view('admin.testimony.index'); });
        Route::get('testimony/create', function () { return view('admin.testimony.create'); });
        Route::get('post/create', function () { return view('admin.post.create'); });
        Route::get('post', function () { return view('admin.post.index'); });
        Route::get('picture', function () { return view('admin.picture.index'); });
        Route::get('picture/create', function () { return view('admin.picture.create'); });
        Route::get('user', function () { return view('admin.user.index'); });
        Route::get('user/create', function () { return view('admin.user.create'); });
    });

});