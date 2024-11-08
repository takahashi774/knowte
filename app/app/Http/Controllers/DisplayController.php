<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\CreateData;

class DisplayController extends Controller
{
    public function index() {
        return view('mypage');
    }
    
    public function logout(){
        Auth::logout();
        return redirect('/login');

    }
}

?>