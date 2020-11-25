<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class ProductController extends Controller
{
    public function getProduct($id){
        $product = DB::table('products')
                ->join('categories', 'products.category_id', 'categories.id')
                ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
                ->join('brands', 'products.brand_id', 'brands.id')
                ->select('products.*', 'categories.category_name','subcategories.subcategory_name', 'brands.brand_name')
                ->where('products.id', $id)
                ->first();
//        dd($product);
        $product_id = $product->id;
        $productDetail = DB::table('product_detail')->where('product_id', $product_id)->get();
        $dataColor = array();
        $dataSize = array();
        foreach ($productDetail as $key => $item){
            $dataColor[$key] = $item->product_color;
            $dataSize[$key] = $item->product_size;

        }
        $color = array_unique($dataColor);
        $size = array_unique($dataSize);
        return response::json(array(
            'product' => $product,
            'color' => $color,
            'size' => $size,
        ));
    }
    public function getSizeProduct($product_id, $color){
        $product_id = intval($product_id);
        $product = DB::table('product_detail')
                    ->where('product_id', $product_id)
                    ->where('product_color', $color)
                    ->where('product_quantity', '>', 0)
                    ->get();
//        dd($product);
        return response::json(array(
            'product'=> $product,
        ));
    }
    public function getMaxQty($product_id, $color, $size){
        $product = DB::table('product_detail')
                ->where('product_id', $product_id)
                ->where('product_color', $color)
                ->where('product_size', $size)
                ->first();
        return response::json(array(
           'product' => $product,
        ));
    }
    public function product($subcategory_tosub, $product_tosub){
        $product = DB::table('products')
                    ->join('categories', 'products.category_id', 'categories.id')
                    ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
                    ->join('brands', 'products.brand_id', 'brands.id')
                    ->select('products.*', 'categories.category_name','subcategories.subcategory_name', 'brands.brand_name')
                    ->where('products.product_tosub', $product_tosub)
                    ->where('subcategories.subcategory_tosub', $subcategory_tosub)
                    ->first();
        // Tăng lượt xem cho sản phâm
        DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->where('products.product_tosub', $product_tosub)
            ->where('subcategories.subcategory_tosub', $subcategory_tosub)
            ->update(['product_view' => DB::raw('product_view + 1')]);

        // Lấy sản phẩm cùng danh mục

        $productRela = DB::table('products')
                        ->join('categories', 'products.category_id', 'categories.id')
                        ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
                        ->where('subcategory_id', $product->subcategory_id)
                        ->where('status', 1)
                        ->select('products.*', 'categories.category_name', 'subcategories.subcategory_name')
                        ->limit(6)
                        ->get();


        // Lấy sản phẩm đang giảm giá
        $productSale = DB::table('products')
                        ->join('categories', 'products.category_id', 'categories.id')
                        ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
                        ->where('discount_price', '>', 0)
                        ->where('status', 1)
                        ->select('products.*', 'categories.category_name', 'subcategories.subcategory_name')
                        ->limit(6)
                        ->get();



//         Lấy tất cả color của sản phẩm hiện tại
        $productDetail = DB::table('product_detail')->where('product_id', $product->id)->where('product_quantity', '>', 0)->get();
        $dataColor = array();
        foreach ($productDetail as $key => $item){
            $dataColor[$key] = $item->product_color;
        }
        $color = array_unique($dataColor);

        if($product){
            return view('pages.product.product', compact('product', 'color', 'productRela', 'productSale'));
        }else{
            $notification = array(
                'message' => 'Đường dẫn không tồn tại!',
                'alert-type' => 'error',
            );
            return Redirect()->route('index')->with($notification);
        }
    }
}
