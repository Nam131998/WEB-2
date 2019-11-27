<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phim;
use App\tintuc;

class TintucController extends Controller
{
    public function tintuc()
    {
    	$phimlq=phim::where('trangthai','0')
        ->inRandomOrder()->limit(4)->get();
    	$review=tintuc::where('theloai',1)->get();
        $blog=tintuc::where('theloai',0)->get();
    	return view('tintuc',compact('review','blog','phimlq'));
    }

    
}

