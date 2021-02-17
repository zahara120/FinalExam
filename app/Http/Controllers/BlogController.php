<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = Auth::check();
        $role = 'guest';
        $category = Category::all();

        if($auth){
            $role = Auth::user()->role;
        }
        
        return view('createBlog',compact('role','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     
        $request->request->add(['user_id' => Auth::user()->id]);
        
        
        // dd($request->hasFile('image_uploded'));

        if ($request->hasFile('image_uploded')){ 
            $image_uploded = $request->image_uploded->getClientOriginalName() . '-' . time() . '.' . $request->image_uploded->extension();
            $request->image_uploded->move(public_path('assets'), $image_uploded);
            // dd($image);
         }
         $request->request->add(['image' => $request->image_uploded->getClientOriginalName()]);
        //  dd($request->all());
        
        $article = Article::create($request->all());
        
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::where('id',$id)->first();
        // $article = Article::where('id',$id)->firstOrFail();
        $article->delete();
        if($article != null){
            $article->delete();
        }
        return redirect('/');
    }
}
