<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home(){
        $article = Article::all();
        $category = Category::all();
        $user = User::all();

        $auth = Auth::check();
        $role = 'guest';
 
        // dd(Auth::user());
       if($auth){
            $role = Auth::user()->role;
        }
        return view ('welcome', compact('role','article', 'category','user'));
    }

    public function showUser(){
        $user = User::where('role', '=' , 'member')->get(); 

        $auth = Auth::check();
        $role = 'guest';
 
       if($auth){
            $role = Auth::user()->role;
        }
        return view('userMenu', compact('user','role'));
    }

    public function deleteUser($id){
        $user = User::find($id); 
        $user->delete();
        return redirect('/');
    }

    public function profile($id){
        $user = User::find($id); 
        // dd($id);
        $auth = Auth::check();
        $role = 'guest';
 
       if($auth){
            $role = Auth::user()->role;
        }
        return view('profileMenu', compact('user','role'));
    }

    public function updateProfile(Request $request ,$id){
        // dd($request);
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

    public function category($id){
        $category = Category::all();
        $article = Article::all();
        $article = Article::where('category_id',$id)->get();

        $auth = Auth::check();
        $role = 'guest';

       if($auth){
            $role = Auth::user()->role;
        }

        return view('categorize',compact('role','category','article'));
    }

    public function fullStory($id){
        $category = Category::all();
        $article = Article::all();
        $article = Article::find($id);
        $auth = Auth::check();
        $role = 'guest';
       if($auth){
            $role = Auth::user()->role;
        }
        return view('fullStory',compact('role','article','category'));
    }

    public function blogList(){
        $article = Article::all(); 
        $auth = Auth::check();
        $role = 'guest';

       if($auth){
            $role = Auth::user()->role;
        }
        return view('blog',compact('role','article'));
    }
}
