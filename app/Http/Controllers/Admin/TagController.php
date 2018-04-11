<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use Redirect;
use Session;
use App\Http\Controllers\Controller;
use App\Tag;


class TagController extends Controller
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
        $tags = Tag::orderBy('id','DESC')->paginate(5);
        //dd($tags);
        return view('admin.tags.index',compact('tags'));
        //return 'hola este es el index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        // Para guardar datos masivos y la otra forma seria asignar en una variable uno a uno y despues guardarlo
        $tag = Tag::create($request->all());
        $tag->save();
        //return view('admin.tags.index');
        // return redirect()->route('tags.index');
        Session::flash('create',"Se ha registrado el Tag ". $tag->name ." de forma exitosa!");
        return Redirect::route('tags.index');
        //return redirect()->route('tags.index')->with('info','Etiqueta Creada con exito ...');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */                  
    public function update(TagUpdateRequest $request, $id)
    {
        $tag = Tag::find($id);
        $tag->fill($request->all())->save();
        Session::flash('edit',"Se ha actualizado el Tag ". $tag->name ." de forma exitosa!");
        return Redirect::route('tags.index');
        //return redirect()->route('tags.edit',$tag->id)->with('edit','Etiqueta Actualizada con exito ...');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        Session::flash('delete',"Se ha eliminado el Tag ". $tag->name ." de forma exitosa!");
        return Redirect::route('tags.index');
        //return back()->with('info','Eliminado Correctamente');
    }
}
