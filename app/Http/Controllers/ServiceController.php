<?php

namespace App\Http\Controllers;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('type','=','S')->orderBy('nro_order','desc')->paginate(10);
        return view('admin.service.index',compact('services'));
    }
    public function indice()
    {
        $services = Service::where('type','=','M')->orderBy('nro_order','desc')->paginate(10);
        return view('admin.service.indice',compact('services'));
    }
    public function create()
    {
        return view('admin.service.create');
    }
    public function crear()
    {
        return view('admin.service.crear');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string|max:255|unique:services',            
            'info'=>'required|string',
            'nro_order'=>'required|numeric',
            'url_img'=>'required|mimes:jpg,png,jpeg|max:150'
        ]);
        if($request->hasFile('url_img')){
            $url_img = $request -> file('url_img');
            $nombrefinal = $this->str_unico(8).'.'.$url_img->getClientOriginalExtension();
            $destino = public_path('assets/uploads');
            $request->url_img->move($destino, $nombrefinal);
        }
        $service=new Service();
        $service->title=$request->title;
        $service->info=$request->info;
        $service->nro_order=$request->nro_order;
        $service->url_img=$nombrefinal;
        $service->type=$request->type;
        $service->save();
        return redirect('panel/service')->with('Mensaje','Servicio agregado correctamente');
    }
    public function almacenar(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string|max:255|unique:services',            
            'info'=>'required|string',
            'nro_order'=>'required|numeric',
            'url_img'=>'required|mimes:jpg,png,jpeg|max:150'
        ]);
        if($request->hasFile('url_img')){
            $url_img = $request -> file('url_img');
            $nombrefinal = $this->str_unico(8).'.'.$url_img->getClientOriginalExtension();
            $destino = public_path('assets/uploads');
            $request->url_img->move($destino, $nombrefinal);
        }
        $service=new Service();
        $service->title=$request->title;
        $service->info=$request->info;
        $service->nro_order=$request->nro_order;
        $service->url_img=$nombrefinal;
        $service->type=$request->type;
        $service->save();
        return redirect('panel/medida')->with('Mensaje','Medida agregada correctamente');
    }
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.service.edit',compact('service'));
    }
    public function editar($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.service.editar',compact('service'));
    }
    public function update(Request $request,$id)
    {
        //Validación
        $this->validate($request,[
            'title'=>'string|max:255',
            'info'=>'required|string',
            'nro_order'=>'required|numeric'    
        ]);
        $service = Service::find($id);
        if($request->hasFile('url_img')){
            //Validando el archivo
            $this->validate($request,[
            'url_img'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior
            if(file_exists('/assets/uploads/'.$service->url_img)){
                unlink(public_path().'/assets/uploads/'.$service->url_img);
            }            
            //Recuperando extensión de la nueva imagen
            $url_img = $request->file('url_img');
            $nombrefinal = $this->str_unico(8).'.'.$url_img->getClientOriginalExtension();
            //Definiendo ruta de subida            
            $destino = public_path('assets/uploads');
            $request->url_img->move($destino, $nombrefinal);
            //Asignando el nuevo nombre a guardar
            $service->url_img=$nombrefinal;
        }
        $service->title=$request->title;
        $service->info=$request->info;
        $service->nro_order=$request->nro_order;
        $service->save();
        return redirect('panel/service')->with('Mensaje','Servicio actualizado correctamente');
    }
    public function actualizar(Request $request,$id)
    {
        //Validación
        $this->validate($request,[
            'title'=>'string|max:255',
            'info'=>'required|string',
            'nro_order'=>'required|numeric'    
        ]);
        $service = Service::find($id);
        if($request->hasFile('url_img')){
            //Validando el archivo
            $this->validate($request,[
            'url_img'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior
            if(file_exists('/assets/uploads/'.$service->url_img)){
                unlink(public_path().'/assets/uploads/'.$service->url_img);
            }
            //Recuperando extensión de la nueva imagen
            $url_img = $request->file('url_img');
            $nombrefinal = $this->str_unico(8).'.'.$url_img->getClientOriginalExtension();
            //Definiendo ruta de subida            
            $destino = public_path('assets/uploads');
            $request->url_img->move($destino, $nombrefinal);
            //Asignando el nuevo nombre a guardar
            $service->url_img=$nombrefinal;
        }
        $service->title=$request->title;
        $service->info=$request->info;
        $service->nro_order=$request->nro_order;
        $service->save();
        return redirect('panel/medida')->with('Mensaje','Medida actualizada correctamente');
    }
    public function destroy($id)
    {
        $service = Service::find($id);
        //Eliminando el archivo
        if(file_exists('/assets/uploads/'.$service->url_img)){
            unlink(public_path().'/assets/uploads/'.$service->url_img);
        }
        $service->delete();
        return redirect('panel/service')->with('Mensaje','Servicio eliminado correctamente');
    }
    public function destruir($id)
    {
        $service = Service::find($id);
        //Eliminando el archivo
        if(file_exists('/assets/uploads/'.$service->url_img)){
            unlink(public_path().'/assets/uploads/'.$service->url_img);
        }   
        $service->delete();
        return redirect('panel/medida')->with('Mensaje','Medida eliminada correctamente');
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
