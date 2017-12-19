<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function admin(){
        $data['admin'] = User::paginate(10);
        return view('admin')->with($data);
    }

    public function delete($id)
    {
        $a = User::find($id);
        $a->delete();

        return redirect(url('/admin'));
    }
}
