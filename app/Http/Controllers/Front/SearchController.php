<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    public function color($color){
        $arrayColor = array();
        $arrayColor['color'] = $color;
        return view('pages.search.color', compact('color', 'arrayColor'));
    }
    public function brand($brand){
        $arrayBrand = array();
        $arrayBrand['brand'] = $brand;
        return view('pages.search.brand', compact('brand', 'arrayBrand'));
    }
    public function price($min, $max){
        return view('pages.search.price', compact('min', 'max'));
    }
    public function orderby($orderby){
        if($orderby != "1"){
            if (Session::has('orderby')){
                Session::forget('orderby');
            }
            Session::put('orderby', $orderby);
//            return redirect()->back();
        }else{
            if (Session::has('orderby')){
                Session::forget('orderby');
            }
//            return redirect()->back();
        }
    }
}
