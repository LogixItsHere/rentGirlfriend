<?php

namespace App\Http\Controllers;

use App\Models\Girlfriend;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $girlfriends = Girlfriend::all();
        $count = Girlfriend::count();
        return view('home', compact('count'))->with('girlfriends', $girlfriends);
    }

    public function single($id)
    {
        $girlfriends = Girlfriend::findOrFail($id);
        return view('/single')->with('girlfriends', $girlfriends);
    }

    public function search()
    {
        $search_text = $_GET['search'];
        $girlfriends = Girlfriend::where('gf_name','LIKE', '%'.$search_text.'%')->get();
        return view('/search', compact('girlfriends'));
    }
}
