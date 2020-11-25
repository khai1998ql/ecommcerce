<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    // SUBCATEGORY
    public function subcateogry($subcategory_tosub){
        $product = DB::table('products')
                ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
                ->where('subcategories.subcategory_tosub', $subcategory_tosub)
                ->where('products.status', 1)
                ->select('products.*', 'subcategories.subcategory_name')
                ->get();
//        // Lấy danh muicj sản phẩm liên quan
//        $category = DB::table('subcategories')
//                    ->where('subcategory_tosub', $subcategory_tosub)
//                    ->first();
//        $subcategory = DB::table('subcategories')->where('category_id', $category->category_id)->get();
//
//        // Lấy màu sản phẩm
//        $product_detail = DB::table('product_detail')->get();
//        $dataColor = array();
//        foreach ($product_detail as $key => $item){
//            $dataColor[$key] = $item->product_color;
//        }
//        $color = array_unique($dataColor);
//
//        // Lấy nhãn hiệu
//        $brand = DB::table('brands')->get();


        if(count($product) > 0){
            return view('pages.category.subcategory', compact('subcategory_tosub'));
        }else{
            $notification = array(
                'message' => 'Đường dẫn không tồn tại!',
                'alert-type' => 'error',
            );
            return Redirect()->route('index')->with($notification);
        }

    }
    public function orderbySubcateogry(Request $request){
        $orderby = $request->orderby;
        if($orderby != NULL){
            Session::put('orderby', $orderby);
            return redirect()->back();
        }else{
            if (Session::has('orderby')){
                Session::forget('orderby');
            }
            return redirect()->back();
        }
//        dd($orderby);

    }
}
