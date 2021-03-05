<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
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
        $article = Article::all(); 
        $auth = Auth::check();
        $role = 'guest';

       if($auth){
            $role = Auth::user()->role;
        }
        return view('blog.index',compact('role','article'));
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
        
        return view('blog.create',compact('role','category'))->with('success', 'Article was Successfully Created!');
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
        
        
        return redirect('/blog')->with('success', 'Article was Successfully Created!');
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
        // dd($id);
        
        $category = Category::all();
        $article = Article::find($id);

        $auth = Auth::check();
        $role = 'guest';

        if($auth){
            $role = Auth::user()->role;
        }
        
        return view('blog.edit',compact('role','category','article'))->with('success', 'Article was Successfully Deleted!');
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
        $article = Article::all();
        $category = Category::all();
        $user = User::all();
        $article = Article::find($id);
        
        if ($request->hasFile('image_uploded')){ 
            $image_uploded = $request->image_uploded->getClientOriginalName() . '-' . time() . '.' . $request->image_uploded->extension();
            $request->image_uploded->move(public_path('assets'), $image_uploded);
            // dd($image);
        }
        $article->tittle  =  $request->tittle;
        $article->image  =  $request->image_uploded->getClientOriginalName();
        $article->description  =  $request->description;
        $article->save();
        // dd($request);

        $auth = Auth::check();
        $role = 'guest';
 
       if($auth){
            $role = Auth::user()->role;
        }

        return view('blog.edit',compact('user','role','category','article'));
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
        return redirect('/blog')->with('success', 'Article was Successfully Deleted!');
    }
}
