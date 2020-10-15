<?php

namespace App\Http\Controllers;
use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function index()
    {
        $institutions = Institution::orderBy('name','ASC')->paginate(10);
        return view('admin.institution.index',compact('institutions'));
    }
    public function create()
    {
        return view('admin.institution.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:255|unique:institutions',
            'url_web'=>'required|string|max:255',
            'url_portrait'=>'required|mimes:jpg,png,jpeg|max:150'
        ]);

        $slug=\Str::slug($request->name);
        if($request->hasFile('url_portrait')){
            $url_portrait = $request -> file('url_portrait');
            $nombrefinal = $this->str_unico(8).'.'.$url_portrait->getClientOriginalExtension();
            $destino = public_path('assets/uploads');
            $request->url_portrait->move($destino, $nombrefinal);
        }
        $institution=new Institution();
        $institution->name=$request->name;
        $institution->slug=$slug;
        $institution->url_logo=$nombrefinal;
        $institution->url_web=$request->url_web;
        //return response()->json($institution);
        $institution->save();
        return redirect('panel/institution')->with('Mensaje','Cliente agregado correctamente');
    }
    public function edit($id)
    {
        $institution = Institution::findOrFail($id);
        return view('admin.institution.edit',compact('institution'));
    }
    public function update(Request $request, $id)
    {
        //Validación
        $this->validate($request,[
            'name'=>'string|max:255',
            'url_web'=>'string|max:255'
        ]);
        $institution = Institution::find($id);
        if($request->hasFile('url_portrait')){
            //Validando el archivo
            $this->validate($request,[
            'url_portrait'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior
            unlink(public_path().'/assets/uploads/'.$institution->url_logo);
            //Recuperando extensión de la nueva imagen
            $url_portrait = $request->file('url_portrait');
            $nombrefinal = $this->str_unico(8).'.'.$url_portrait->getClientOriginalExtension();
            //Definiendo ruta de subida            
            $destino = public_path('assets/uploads');
            $request->url_portrait->move($destino, $nombrefinal);
            //Asignando el nuevo nombre a guardar
            $institution->url_logo=$nombrefinal;
        }
        if ($request->name !=$institution->name) {
            $slugupdate=\Str::slug($request->name);
            $institution->name=$request->titulo;
            $institution->slug =$slugupdate;
        }
        $institution->name=$request->name;
        $institution->url_web=$request->url_web;
        //return response()->json($institution); 
        $institution->save();
        return redirect('panel/institution')->with('Mensaje','Cliente actualizado correctamente');
    }
    public function destroy($id)
    {
        $institution = Institution::find($id);
        //Eliminando el archivo
        unlink(public_path().'/assets/uploads/'.$institution->url_logo);
        $institution->delete();
        return redirect('panel/institution')->with('Mensaje','Cliente eliminado correctamente');
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