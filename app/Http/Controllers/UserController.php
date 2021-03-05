<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role', '=' , 'member')->get(); 

        $auth = Auth::check();
        $role = 'guest';
 
       if($auth){
            $role = Auth::user()->role;
        }
        return view('user.index', compact('user','role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = User::find($id); 
        // dd($id);
        $auth = Auth::check();
        $role = 'guest';
 
       if($auth){
            $role = Auth::user()->role;
        }
        return view('user.edit', compact('user','role'));
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

        $user = User::find($id);
        $user->name  =  $request->name;
        $user->email  =  $request->email;
        $user->phone  =  $request->phone;
        $user->save();

        $auth = Auth::check();
        $role = 'guest';
 
       if($auth){
            $role = Auth::user()->role;
        }

        return view('welcome',compact('user','role','category','article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id); 
        $user->delete();
        
        return redirect('/user')->with('success', 'User has been Successfully Deleted!');
    }
}
