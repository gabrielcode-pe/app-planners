<?php

namespace App\Http\Controllers;

use App\Course;
use App\Instructor;
use App\Institution;
use App\Price;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $cursos= DB::table('courses as c')
    ->join('instructors as d','c.instructor_id','=','d.id')
    ->join('institutions as i','c.institution_id','=','i.id')
    ->join('course_prices as p','p.course_id','=','c.id')
    ->select('c.id','c.name as curso','d.name as instructor','i.name as institution','p.amount','c.is_free','c.url_portrait','c.date_start')
    ->where('p.is_active','=',1)->paginate(5);

    // $cursos = Course::with(['instructor', 'institution', 'prices' => function($query){
    //     $query->where('is_active', 1);
    // }])->paginate(5);

    return view('admin.courses.index',compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $instructors=Instructor::all();
        $institutions=Institution::all();
        return view('admin.courses.create', compact('instructors', 'institutions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
    		'name'=>'required|string|max:255|unique:courses',
            'summary'=>'required|string|max:120|',
            'info'=>'required|string|max:255',
            'url_portrait'=>'required|mimes:jpg,png,jpeg|max:150'	
        ]);
        
        //return response()->json($request);

    	if($request->hasFile('url_portrait')){
            $slug=\Str::slug($request->name);
            $url_portrait = $request -> file('url_portrait');
            $nombrefinal = $this->str_unico(8).'.'.$url_portrait->getClientOriginalExtension();
            $destino = public_path('assets/uploads');
            $request->url_portrait->move($destino, $nombrefinal);
            $data['url_portrait']=$nombrefinal;
        }

    	// Course::create([
    	// 	'url_portrait'=>$nombrefinal,
        //     'name'=>$request->name,
        //     'slug'=>$slug,
        //     'seo'=>$request->summary,
        //     'is_free'=>$request->status,
        //     'instructor_id'=>$request->instructor,
        //     'institution_id'=>$request->institution,
        //     'date_start'=>$request->date_start,
        //     'info'=>$request->info
        // ]);

        $course=new Course();
        $course->url_portrait=$nombrefinal;
        $course->name = $request->name;
        $course->slug=$slug;
        $course->seo=$request->summary;
        $course->is_free=$request->status;
        $course->instructor_id=$request->instructor;
        $course->institution_id=$request->institution;
        $course->date_start=$request->date_start;
        $course->info=$request->info;
        $course->save();

        $precio=new Price();
        $precio->course_id= $course->id;
        $precio->amount=0;
        $precio->price_info='Precio';
        $precio->is_active=1;
        $precio->save();

    	return redirect('panel/courses')->with('Mensaje','Curso agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instructors=Instructor::all();
        $institutions=Institution::all();
        $curso= DB::table('courses as c')
        ->join('instructors as d','c.instructor_id','=','d.id')
        ->join('institutions as i','c.institution_id','=','i.id')
        ->select('c.id','c.name as curso','c.info','c.seo','d.id as docente_id','d.name as docente','i.id as institucion_id','i.name as institucion','c.is_free','c.url_portrait','c.date_start')
        ->where('c.id','=',$id)->first();
        return view('admin.courses.edit',compact('curso','instructors','institutions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return response()->json($request);
        //Validación
        $this->validate($request,[
    		'name'=>'required|string|max:255',
            'summary'=>'required|string|max:120|',
            'info'=>'required|string|max:255'
        ]);
        $curso = Course::find($id);
        if($request->hasFile('url_portrait')){
            //Validando el archivo
            $this->validate($request,[
            'url_portrait'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior
            unlink(public_path().'/assets/uploads/'.$curso->url_portrait);
            //Recuperando extensión de la nueva imagen
            $url_portrait = $request->file('url_portrait');
            $nombrefinal = $this->str_unico(8).'.'.$url_portrait->getClientOriginalExtension();
            //Definiendo ruta de subida            
            $destino = public_path('assets/uploads');
            $request->url_portrait->move($destino, $nombrefinal);
            //Asignando el nuevo nombre a guardar
            $curso->url_portrait=$nombrefinal;
            //$curso->save();
        }

        if ($request->name !=$curso->name) {
            $slugupdate=\Str::slug($request->name);
            $curso->name=$request->titulo;
            $curso->slug =$slugupdate;
        }

        $curso->name=$request->name;
        $curso->seo=$request->summary;
        $curso->info=$request->info;
        $curso->is_free=$request->status;
        $curso->date_start=$request->date_start;
        $curso->instructor_id=$request->instructor;
        $curso->institution_id=$request->institution;        
        $curso->save();

        return redirect('panel/courses')->with('Mensaje','Curso actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Course::find($id);
        //Eliminando el archivo
        unlink(public_path().'/assets/uploads/'.$curso->url_portrait);
        $curso->delete();
        return redirect('panel/courses')->with('Mensaje','Curso eliminado correctamente');
    }

    private function str_unico($l)
    {
        $keychars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $length = $l;
        $randkey = "";
        $max=strlen($keychars)-1;

        for ($i=0;$i<$length;$i++) {

        $randkey .= substr($keychars, rand(0, $max), 1);
        }
        return time().$randkey;
    }

    //******************** Funciones Extras para administrar extras en los cursos ******************************
    //Precios
    public function managePrice($id)
    {
        $curso = Course::find($id);
        $prices= DB::table('courses as c')
        ->join('course_prices as p','p.course_id','=','c.id')
        ->select('c.id','p.id as precio_id','p.price_info','p.amount','p.is_active')
        ->where('c.id','=',$id)->get();
        //return response()->json($prices);
        return view('admin.courses.add-price',compact('curso','prices'));
    }
    public function addPrice(Request $request)
    {
        $this->validate($request,[
    		'price'=>'required|integer',
            'description'=>'required|string|max:25|'
        ]);

        $id=$request->course_id;

        Price::create([
    		'price_info'=>$request->description,
            'amount'=>$request->price,
            'is_active'=>$request->status,
            'course_id'=>$id
    	]);
    	return redirect('panel/courses/'.$id.'/addprice')->with('Mensaje','Precio agregado correctamente');
    }
    public function destroyPrice($id, $precio_id)
    {
        $price=Price::find($precio_id);
        $price->delete();
        return redirect('panel/courses/'.$id.'/addprice')->with('Mensaje','Precio eliminado correctamente');
    }
    public function activatePrice($id, $precio_id)
    {
        //Reactualizando Activos
        $all = DB::table('course_prices')
              ->where('course_id', $id)
              ->update(['is_active' => 0]);
        $price=Price::find($precio_id);
        $price->is_active=1;
        $price->save();
        return redirect('panel/courses/'.$id.'/addprice')->with('Mensaje','Nuevo precio activado como visible');
    }
    //Módulos
    public function manageModule($id)
    {
        $curso = Course::find($id);
        $modules= DB::table('courses as c')
        ->join('course_modules as m','m.course_id','=','c.id')
        ->select('c.id as course_id','m.id','m.name','m.info','m.url_img', 'm.duration','m.position')
        ->where('c.id','=',$id)->orderBy('m.position','desc')->paginate(10);

        //return response()->json($prices);
        return view('admin.courses.add-module',compact('curso','modules'));
    }

    public function addModule(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:120|',
            'info'=>'required|string|max:255',
            'duration'=>'string|max:20',
            'url_img'=>'mimes:jpg,png,jpeg|max:150',
            'position'=>'required|integer'
        ]);
        $id=$request->course_id;

        if($request->hasFile('url_img')){
            $url_img = $request -> file('url_img');
            $nombrefinal = $this->str_unico(8).'.'.$url_img->getClientOriginalExtension();
            $destino = public_path('assets/uploads');
            $request->url_img->move($destino, $nombrefinal);
        }
        Module::create([
    		'name'=>$request->name,
            'info'=>$request->info,
            'duration'=>$request->duration,
            'position'=>$request->position,
            'url_img'=>$nombrefinal,
            'course_id'=>$id
    	]);
    	return redirect('panel/courses/'.$id.'/addmodule')->with('Mensaje','Módulo agregado correctamente');
    }
    public function destroyModule($id, $module_id)
    {
        $module=Module::find($module_id);
        unlink(public_path().'/assets/uploads/'.$module->url_img);
        $module->delete();
        return redirect('panel/courses/'.$id.'/addmodule')->with('Mensaje','Modulo eliminado correctamente');
    }
}
