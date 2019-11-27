<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phim;

class MuaveController extends Controller
{
    public function muave()
    {
    	$phimdc=phim::where('trangthai','1')->limit(12)->get();
    	return view('muave',compact('phimdc'));
    }

}
