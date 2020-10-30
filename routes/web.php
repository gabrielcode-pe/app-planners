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


Route::post('contacto', 'FrontController@contactStore')->name('contact.store');


// Reservar plaza al curso
Route::get('reservar-curso/{slug}', 'FrontController@saveCourseView')->name('save.course');
Route::post('save-course', 'FrontController@saveCourse')->name('save.course.post');


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
Route::post('process-charge/{token}', 'TransactionController@processCharge')->name('process.charge');

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

        // Route::get('/', 'PanelController@home')->name('panel.home'); //TODO:
        
        Route::get('/', function(){
            return redirect('/panel/courses');
        });

        // Todas las rutas de panel aqui------------
        Route::get('courses', 'CourseController@index'); //Listado de Cursos
        Route::get('courses/create', 'CourseController@create'); //Agregar nuevo Curso
        Route::post('courses', 'CourseController@store'); //Graba un nuevo curso
        Route::get('courses/{id}/edit', 'CourseController@edit'); //Editar curso
        Route::put('courses/{id}', 'CourseController@update'); //Graba actualización de curso
        Route::delete('courses/{id}/destroy', 'CourseController@destroy'); //Eliminar el curso

        Route::get('courses/{id}/addprice', 'CourseController@managePrice'); //Listado de Precio por Curso
        Route::post('courses/addprice', 'CourseController@addPrice'); //Agregar Precio por Curso
        Route::delete('courses/{id}/addprice/{precio_id}', 'CourseController@destroyPrice'); //Eliminar Precio del Curso
        Route::put('courses/{id}/addprice/{precio_id}', 'CourseController@activatePrice'); //Graba actualización de curso

        Route::get('courses/{id}/addmodule', 'CourseController@manageModule'); //Listado de Módulos por Curso
        Route::post('courses/addmodule', 'CourseController@addModule'); //Agregar Módulo a Curso
        Route::delete('courses/{id}/addmodule/{module_id}', 'CourseController@destroyModule'); //Eliminar Modulo del Curso

        Route::get('courses/{id}/addfeature', 'CourseController@manageFeature'); //Listado de Características por Curso
        Route::post('courses/addfeature', 'CourseController@addFeature'); //Agregar Característica Curso
        Route::delete('courses/{id}/addfeature/{feature_id}', 'CourseController@destroyFeature'); //Eliminar Característica del Curso
          
        Route::get('category', 'CategoryController@index'); //Listado de categorías
        Route::get('category/create', 'CategoryController@create'); //Agregar nueva categoría
        Route::post('category', 'CategoryController@store'); //Graba una nueva categoría
        Route::get('category/{id}/edit', 'CategoryController@edit'); //Editar categoría
        Route::put('category/{id}', 'CategoryController@update'); //Graba actualización de categoría
        Route::delete('category/{id}/destroy', 'CategoryController@destroy'); //Eliminar la categoría

        Route::get('institution', 'InstitutionController@index'); //Listado de clientes
        Route::get('institution/create', 'InstitutionController@create'); //Agregar nueva cliente
        Route::post('institution', 'InstitutionController@store'); //Graba un nuevo cliente
        Route::get('institution/{id}/edit', 'InstitutionController@edit'); //Editar cliente
        Route::put('institution/{id}', 'InstitutionController@update'); //Graba actualización de cliente
        Route::delete('institution/{id}/destroy', 'InstitutionController@destroy'); //Eliminar cliente

        Route::get('instructor', 'InstructorController@index'); //Listado de docentes
        Route::get('instructor/create', 'InstructorController@create'); //Agregar nuevo docente
        Route::post('instructor', 'InstructorController@store'); //Graba una nueva categoría
        Route::get('instructor/{id}/edit', 'InstructorController@edit'); //Editar docente
        Route::put('instructor/{id}', 'InstructorController@update'); //Graba actualización de docente
        Route::delete('instructor/{id}/destroy', 'InstructorController@destroy'); //Eliminar docente        

        Route::get('testimony', 'TestimonyController@index'); //Listado de testimonios
        Route::get('testimony/create', 'TestimonyController@create'); //Agregar nuevo testimonio
        Route::post('testimony', 'TestimonyController@store'); //Graba un nuevo testimonio
        Route::get('testimony/{id}/edit', 'TestimonyController@edit'); //Editar testimonio
        Route::put('testimony/{id}', 'TestimonyController@update'); //Graba actualización de testimonio
        Route::delete('testimony/{id}/destroy', 'TestimonyController@destroy'); //Eliminar testimonio

        Route::get('post', 'PostController@index'); //Listado de publicaciones
        Route::get('post/create', 'PostController@create'); //Agregar nueva publicación
        Route::post('post', 'PostController@store'); //Graba una nueva publicación
        Route::get('post/{id}/edit', 'PostController@edit'); //Editar publicación
        Route::put('post/{id}', 'PostController@update'); //Graba actualización de testimonio
        Route::delete('post/{id}/destroy', 'PostController@destroy'); //Eliminar testimonio

        Route::get('picture', 'PictureController@index'); //Listado de imágenes
        Route::get('picture/create', 'PictureController@create'); //Agregar nueva imagen
        Route::post('picture', 'PictureController@store'); //Graba una nueva imagen
        Route::delete('picture/{id}/destroy', 'PictureController@destroy'); //Eliminar imagen

        Route::get('user', 'UserController@index'); //Listado de usuarios
        Route::get('user/create', 'UserController@create'); //Agregar nuevo usuario
        Route::post('user', 'UserController@store'); //Registra un nuevo usuario
        Route::get('user/{id}/edit', 'UserController@edit'); //Editar usuario
        Route::put('user/{id}', 'UserController@update'); //Graba actualización de usuario
        Route::delete('user/{id}/destroy', 'UserController@destroy'); //Eliminar imagen
    });

});