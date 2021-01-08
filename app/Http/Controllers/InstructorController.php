<?php

namespace App\Http\Controllers;
use App\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::orderBy('name','asc')->paginate(10);
        return view('admin.instructor.index',compact('instructors'));
        //return response()->json($instructors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instructor.create');
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
            'name'=>'required|string|max:255|unique:instructors',
            'summary'=>'required|string|',
            'info'=>'required|string|',
            'url_portrait'=>'required|mimes:jpg,png,jpeg|max:150'
        ]);

        //return response()->json($request);

        $slug=\Str::slug($request->name);
        if($request->hasFile('url_portrait')){
            $url_portrait = $request -> file('url_portrait');
            $nombrefinal = $this->str_unico(8).'.'.$url_portrait->getClientOriginalExtension();
            $destino = public_path('assets/uploads');
            $request->url_portrait->move($destino, $nombrefinal);
        }
        $instructor=new Instructor();
        $instructor->name=$request->name;
        $instructor->slug=$slug;
        $instructor->url_img=$nombrefinal;
        $instructor->description=$request->summary;
        $instructor->info=$request->info;
        
        $instructor->save();
        return redirect('panel/instructor')->with('Mensaje','Docente agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('admin.instructor.edit',compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Validación
         $this->validate($request,[
            'name'=>'required|string|max:255',
            'summary'=>'required|string|',
            'info'=>'required|string|',        
        ]);
        $instructor = Instructor::find($id);
        if($request->hasFile('url_portrait')){
            //Validando el archivo
            $this->validate($request,[
            'url_portrait'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior

            if(file_exists(public_path().'/assets/uploads/'.$instructor->url_img)){
                unlink(public_path().'/assets/uploads/'.$instructor->url_img);   
            }           
            //Recuperando extensión de la nueva imagen
            $url_portrait = $request->file('url_portrait');
            $nombrefinal = $this->str_unico(8).'.'.$url_portrait->getClientOriginalExtension();
            //Definiendo ruta de subida            
            $destino = public_path('assets/uploads');
            $request->url_portrait->move($destino, $nombrefinal);
            //Asignando el nuevo nombre a guardar
            $instructor->url_img=$nombrefinal;
        }
        if ($request->name !=$instructor->name) {
            $slugupdate=\Str::slug($request->name);
            $instructor->slug =$slugupdate;
        }
        $instructor->name=$request->name;
        $instructor->description=$request->summary;
        $instructor->info=$request->info;
        //return response()->json($instructor); 
        $instructor->save();
        return redirect('panel/instructor')->with('Mensaje','Docente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructor = Instructor::find($id);
        //Eliminando el archivo
        if(file_exists(public_path().'/assets/uploads/'.$instructor->url_img)){
            unlink(public_path().'/assets/uploads/'.$instructor->url_img);   
        }
        $instructor->delete();
        return redirect('panel/instructor')->with('Mensaje','Docente eliminado correctamente');
    }
    //Extras
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
}
