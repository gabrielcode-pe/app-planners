<?php

namespace App\Http\Controllers;

use App\Testimony;
use App\Post;
use App\Course;
use App\Institution;
use App\Instructor;
use App\Consultant;
use Illuminate\Http\Request;

use App\Mail\contactStore;
use App\Mail\saveCoursePlace;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::orderBy('created_at', 'desc')->limit(8)->get();

        $courses = Course::where('institution_id', 1)->where('is_free', 0)->orderBy('date_start', 'asc')->limit(9)->get();

        return view('pages.index', compact('testimonies', 'courses'));
    }

    public function contactView()
    {
        return view('pages.contact');
    }

    public function getTestimonies()
    {
        $testimonies = Testimony::orderBy('created_at', 'desc')->get();
        return view('pages.testimonies', compact('testimonies'));
    }

    public function getPosts()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('pages.posts', compact('posts'));
    }

    public function getCoursesOwner(Request $request)
    {
        $validMods = ['premium', 'gratuito'];
       

        if($request->has('mod')){

            $mod = $request->mod;

            if(in_array($mod, $validMods)){

                $isFree = $mod == 'gratuito' ? 1 : 0;

                $courses = Course::where('institution_id', 1)->with(['prices' => function($query){
                    $query->where('is_active', 1);
                }])
                ->where('is_free', $isFree)->orderBy('date_start', 'asc')->get();
                return view('pages.courses.esc-proyectistas', compact('courses', 'isFree'));
            }

            abort(404);

        }

        abort(404);
    }

    public function getInstitutionlCourses(Request $request)
    {
        $institutions = Institution::where('id', '<>', 1)->get();

        $courses = Course::where('institution_id', '<>', 1);

        $institucionSlug = '';

        if($request->has('institucion')){

            $institucionSlug = $request->institucion;

            $institution = Institution::where('slug', $institucionSlug)->first();


            if($institution){

                $courses = $courses->where('institution_id', $institution->id)->orderBy('date_start', 'asc')->get();

            }else{
                
                abort(404);
            }

            

        }else{

            $courses = $courses->orderBy('date_start', 'asc')->get();
        }

        

        return view('pages.courses.institutionals', compact('courses', 'institutions', 'institucionSlug'));
    }

    public function frecuentQuestions()
    {
        return view('pages.frequent-questions');
    }


    public function shopCartView()
    {
        return view('pages.shop-cart');
    }

    public function jsConsultores()
    {
        $consultants = Consultant::orderBy('nro_order', 'ASC')->get();
        return view('pages.js-consultores', compact('consultants'));
    }

    public function getPostDetail($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if($post){
            return view('pages.post-detail', compact('post'));
        }

        abort(404);
    }

    public function getCourseDetail($slug)
    {
        $course = Course::with(['prices' => function($query){
            $query->where('is_active', 1);
        }, 'instructor'])
        ->where('slug', $slug)->first();

        if($course){
            
            return view('pages.courses.course-detail', compact('course'));
        }

        abort(404);
    }

    public function about()
    {
        return view('pages.esc-proyectistas');
    }

    public function getAuthorInfo($authorSlug)
    {
        $instructor = Instructor::where('slug', $authorSlug)->first();

        if($instructor){

            return view('pages.author', compact('instructor'));
        }

        abort(404);
    }


    public function contactStore(Request $request)
    {
        
        $this->validate($request,[
            'name'=>'required|string|max:80',
            'company'=>'string|max:80',
            'email'=>'required|email',
    		'phone'=>'required|numeric',		
            'message'=>'string'
    	],[
    		'nombre.required'=>'Este campo es requerido',
    		'phone.required'=>'El teléfono es requerido',
    		'email.required'=>'El correo electrónico es requerido'
        ]);
        
        $data=[
    		'name'=>$request->name,
    		'company'=>$request->company,
    		'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message
        ];
        Mail::to('cursos@escueladeproyectistas.com')
    	->send(new contactStore($data));
        return back()->with('message', 'Gracias por contactarnos!');
    }



    public function saveCourseView($courseSlug)
    {
        $course = Course::where('slug', $courseSlug)->first();

        
        if($course){

            $availableCourse = $course->date_start >= date('Y-m-d');

            if($availableCourse){

                return view('pages.courses.save-course', compact('course'));
            }

            abort(404);

        }

        abort(404);
    }

    public function saveCourse(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:80',
            'company'=>'string|max:80',
            'email'=>'required|email',
    		'phone'=>'required|numeric',    		
            'message'=>'string'
    	],[
    		'nombre.required'=>'Este campo es requerido',
    		'phone.required'=>'El teléfono es requerido',
    		'email.required'=>'El correo electrónico es requerido'
        ]);
        $data=[
    		'name'=>$request->name,
    		'company'=>$request->company,
    		'email'=>$request->email,
            'phone'=>$request->phone,
            'course_name'=>$request->course_name,
            'message'=>$request->message
        ];
        Mail::to('cursos@escueladeproyectistas.com')
    	->send(new saveCoursePlace($data));
        // sen maile here TODO:
        return back()->with('message', 'Gracias por reservar el curso');
    }

}
