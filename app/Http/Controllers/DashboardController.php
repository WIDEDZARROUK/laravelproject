<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\Post;
class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('client')){
            return view('clientdashboard');
        }
        elseif(Auth::user()->hasRole('vendeur')){
            $records = Post::latest()->paginate(5);
        return view('post.index',compact('records'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        elseif(Auth::user()->hasRole('societelivraison')){
          return view('societelivraison');
      }
      elseif(Auth::user()->hasRole('admin')){
          return view('dashboard');
      }
    }
}
