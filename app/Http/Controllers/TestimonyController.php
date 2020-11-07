<?php

namespace App\Http\Controllers;

use App\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Testimony::orderBy('name','asc')->paginate(10);
        return view('admin.testimony.index',compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimony.create');
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
            'name'=>'required|string|max:255|unique:testimonies',
            'body'=>'required|string',
            'jobtitle'=>'required|string|max:60',
            'company'=>'required|string|max:60',
            'url_portrait'=>'required|mimes:jpg,png,jpeg|max:150'
        ]);
        if($request->hasFile('url_portrait')){
            $url_portrait = $request -> file('url_portrait');
            $nombrefinal = $this->str_unico(8).'.'.$url_portrait->getClientOriginalExtension();
            $destino = public_path('assets/uploads');
            $request->url_portrait->move($destino, $nombrefinal);
        }
        $testimony=new Testimony();
        $testimony->name=$request->name;
        $testimony->description=$request->body;
        $testimony->url_img=$nombrefinal;
        $testimony->jobtitle=$request->jobtitle;
        $testimony->company=$request->company;
        $testimony->save();
        return redirect('panel/testimony')->with('Mensaje','Testimonio agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function show(Testimony $testimony)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimony = Testimony::findOrFail($id);
        return view('admin.testimony.edit',compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validación
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'body'=>'required|string',
            'jobtitle'=>'required|string|max:60',
            'company'=>'required|string|max:60'           
        ]);
        $testimony = Testimony::find($id);
        if($request->hasFile('url_portrait')){
            //Validando el archivo
            $this->validate($request,[
            'url_portrait'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior
            unlink(public_path().'/assets/uploads/'.$testimony->url_img);
            //Recuperando extensión de la nueva imagen
            $url_portrait = $request->file('url_portrait');
            $nombrefinal = $this->str_unico(8).'.'.$url_portrait->getClientOriginalExtension();
            //Definiendo ruta de subida            
            $destino = public_path('assets/uploads');
            $request->url_portrait->move($destino, $nombrefinal);
            //Asignando el nuevo nombre a guardar
            $testimony->url_img=$nombrefinal;
        }
        $testimony->name=$request->name;
        $testimony->description=$request->body;
        $testimony->jobtitle=$request->jobtitle;
        $testimony->company=$request->company;
        $testimony->save();
        return redirect('panel/testimony')->with('Mensaje','Testimonio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimony = Testimony::find($id);
        //Eliminando el archivo
        unlink(public_path().'/assets/uploads/'.$testimony->url_img);
        $testimony->delete();
        return redirect('panel/testimony')->with('Mensaje','Testimonio eliminado correctamente');
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
