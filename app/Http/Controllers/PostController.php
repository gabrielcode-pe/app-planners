<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->orderBy('created_at', 'desc')->paginate(10);
        //return response()->json($posts);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.post.create', compact('categories'));
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
            'title'=>'required|string|max:255|unique:posts',
            'summary'=>'required|string|max:160',
            'body'=>'required|string|max:255',
            'post_source'=>'required|string|max:255',
            'url_portrait'=>'required|mimes:jpg,png,jpeg|max:150'
        ]);
        $slug=\Str::slug($request->title);
        if($request->hasFile('url_portrait')){
            $url_portrait = $request -> file('url_portrait');
            $nombrefinal = $this->str_unico(8).'.'.$url_portrait->getClientOriginalExtension();
            $destino = public_path('assets/uploads');
            $request->url_portrait->move($destino, $nombrefinal);
        }
        $post=new Post();
        $post->title=$request->title;
        $post->slug=$slug;
        $post->summary=$request->summary;
        $post->body=$request->body;
        $post->url_portrait=$nombrefinal;
        $post->status=$request->status;
        $post->post_source=$request->post_source;
        $post->category_id=$request->category;
        $post->save();
        return redirect('panel/post')->with('Mensaje','Publicación agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::with('category')->findOrFail($id);
        return view('admin.post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Validación
        $this->validate($request,[
            'title'=>'string|max:255',
            'summary'=>'string|max:160',
            'body'=>'string|max:255',
            'post_source'=>'string|max:255'       
        ]);
        $post = Post::find($id);
        if($request->hasFile('url_portrait')){
            //Validando el archivo
            $this->validate($request,[
            'url_portrait'=>'mimes:jpg,png,jpeg|max:150'
            ]);
            //Elimina el documento anterior
            unlink(public_path().'/assets/uploads/'.$post->url_portrait);
            //Recuperando extensión de la nueva imagen
            $url_portrait = $request->file('url_portrait');
            $nombrefinal = $this->str_unico(8).'.'.$url_portrait->getClientOriginalExtension();
            //Definiendo ruta de subida            
            $destino = public_path('assets/uploads');
            $request->url_portrait->move($destino, $nombrefinal);
            //Asignando el nuevo nombre a guardar
            $post->url_portrait=$nombrefinal;
        }
        if ($request->title !=$post->title) {
            $slugupdate=\Str::slug($request->title);
            $post->slug =$slugupdate;
        }
        $post->title=$request->title;
        $post->summary=$request->summary;
        $post->body=$request->body;
        $post->post_source=$request->post_source;
        $post->category_id=$request->category;
        $post->status=$request->status;
        $post->save();
        return redirect('panel/post')->with('Mensaje','Publicación actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //Eliminando el archivo
        unlink(public_path().'/assets/uploads/'.$post->url_portrait);
        $post->delete();
        return redirect('panel/post')->with('Mensaje','Publicación eliminada correctamente');
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
