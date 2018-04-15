<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Redirect;
use Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->where('user_id',auth()->user()->id)->paginate(5);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        $tags = Tag::orderBy('name','ASC')->get();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        // Para guardar datos masivos y la otra forma seria asignar en una variable uno a uno y despues guardarlo
        $posts = Post::create($request->all());
        //IMAGE 
        if($request->file('file')){
            $path = Storage::disk('public')->put('image',  $request->file('file'));
            $posts->fill(['file' => asset($path)])->save();
        }
        //TAGS
        $posts->tags()->attach($request->get('tags'));
        //$posts->save();
        Session::flash('create',"Se ha registrado el Post ". $posts->name ." de forma exitosa!");
        return Redirect::route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('admin.posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        $tags = Tag::orderBy('name','ASC')->get();
        $posts = Post::find($id);
        return view('admin.posts.edit',compact('posts','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $posts = Post::find($id);
        $posts->fill($request->all())->save();
        //IMAGE 
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $posts->fill(['file' => asset($path)])->save();
        }
        //TAGS
        $posts->tags()->sync($request->get('tags'));
        Session::flash('edit',"Se ha actualizado la Post ". $posts->name ." de forma exitosa!");
        return Redirect::route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::findOrFail($id);
        $posts->delete();
        Session::flash('delete',"Se ha eliminado la Post ". $posts->name ." de forma exitosa!");
        return Redirect::route('posts.index');
    }
}
