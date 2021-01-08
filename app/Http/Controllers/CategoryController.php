<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat['categorias']=Category::paginate(5);
        return view('admin.category.index', $cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
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
            'name'=>'required|string|max:255|unique:categories',
            'url_portrait'=>'required|mimes:jpg,png,jpeg|max:150'
        ]);

        $datosCategorias=request()->except('_token');
        $datosCategorias['slug']=\Str::slug($datosCategorias['name']);
        if($request->hasFile('url_portrait')){
            $url_portrait = $request -> file('url_portrait');
            $nombrefinal = $this->str_unico(8).'.'.$url_portrait->getClientOriginalExtension();
            $destino = public_path('assets/uploads');
            $request->url_portrait->move($destino, $nombrefinal);
            $datosCategorias['url_portrait']=$nombrefinal;
        }       
        Category::create($datosCategorias);
        return redirect('panel/category')->with('Mensaje','Categoría agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Category::findOrFail($id);
        return view('admin.category.edit',compact('categoria'));
        //return response()->json($categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validación
        $this->validate($request,[
    		'name'=>'string|max:255'
        ]);
        $category = Category::find($id);
        if($request->hasFile('url_portrait')){
            //Validando el archivo
            $this->validate($request,[
            'url_portrait'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior
            if(file_exists('/assets/uploads/'.$category->url_portrait)){
                unlink(public_path().'/assets/uploads/'.$category->url_portrait);
            }            
            //Recuperando extensión de la nueva imagen
            $url_portrait = $request->file('url_portrait');
            $nombrefinal = $this->str_unico(8).'.'.$url_portrait->getClientOriginalExtension();
            //Definiendo ruta de subida            
            $destino = public_path('assets/uploads');
            $request->url_portrait->move($destino, $nombrefinal);
            //Asignando el nuevo nombre a guardar
            $category->url_portrait=$nombrefinal;
        }
        if ($request->name !=$category->name) {
            $slugupdate=\Str::slug($request->name);
            $category->name=$request->titulo;
            $category->slug =$slugupdate;
        }
        $category->name=$request->name;
        //return response()->json($category); 
        $category->save();
        return redirect('panel/category')->with('Mensaje','Categoría actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        //Eliminando el archivo
        if(file_exists('/assets/uploads/'.$category->url_portrait)){
            unlink(public_path().'/assets/uploads/'.$category->url_portrait);
        }
        $category->delete();
        return redirect('panel/category')->with('Mensaje','Categoría eliminada correctamente');
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
}
