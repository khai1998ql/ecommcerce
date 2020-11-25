<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function update(){

        // UPDATE SỐ LƯỢNG QTY CỦA SẢN PHẨM CHI TIẾT
//       $product_detail = DB::table('product_detail')->get();
////       dd($product_detail);
//       foreach ($product_detail as $key => $item){
//           $product_size = $item->product_size;
////                dd($product_size);
//           $rand = mt_rand(30, 120);
//           while ($rand == $product_size){
//               $rand = mt_rand(30, 120);
//           }
//           DB::table('product_detail')->where('id', $item->id)->update(['product_quantity' => $rand]);
//       }

    }
}
