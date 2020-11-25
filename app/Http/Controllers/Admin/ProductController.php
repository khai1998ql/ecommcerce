<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Response;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //  PRODUCT
    public function product(){
        $product = DB::table('products')
                ->join('brands', 'products.brand_id', 'brands.id')
                ->join('categories', 'products.category_id', 'categories.id')
                ->select('products.*', 'brands.brand_name', 'categories.category_name')
                ->get();
        return view('admin.product.index', compact('product'));
    }
    public function addProduct(){
        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();
        return view('admin.product.add', compact('category', 'brand'));
    }
    public function createProduct(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_tosub'] = to_sub($request->product_name);
        $data['product_code'] = $request->product_code;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['selling_price'] = $request->selling_price;
        $data['discount_price'] = $request->discount_price;
        $data['product_content'] = $request->product_content;
        $data['best_rated'] = $request->best_rated;
        $data['hot_new'] = $request->hot_new;
        $data['buyone_getone'] = $request->buyone_getone;
        $data['trend'] = $request->trend;
//        dd($data);
        $data_detail = array();
        $product_color = 'product_color';
        $product_size = 'product_size';
        $product_quantity = 'product_quantity';
        for ($i = 1; $i <= 20; $i++){
            $detail = 'detail'.$i;
            if(!empty($request->$detail)){
                $data_de[$i] = $request->$detail;
                $data_det = explode(',', $data_de[$i]);
                foreach ($data_det as $item){
                    $data_detail[$i][$product_color] = $data_det[0];
                    $data_detail[$i][$product_size] = intval($data_det[1]);
                    $data_detail[$i][$product_quantity] = intval($data_det[2]);
                }
            }
        }
//        dd($data_detail);

        $avatar = $request->avatar;
        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;
        $image_four = $request->image_four;
        $image_one_small = $request->image_one;
        $image_two_small = $request->image_two;
        $image_three_small = $request->image_three;
        $image_four_small = $request->image_four;
        if($avatar && $image_one && $image_two && $image_three && $image_four){
            $avatar_name = hexdec(uniqid()).'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(165, 240)->save('public/media/product/avatar/'.$avatar_name);
            $data['avatar'] = base_url().'public/media/product/avatar/'.$avatar_name;
            // Product Image Big size
            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(260,380)->save('public/media/product/product_big/'.$image_one_name);
            $data['image_one'] = base_url().'public/media/product/product_big/'.$image_one_name;

            $image_two_name =hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(260,380)->save('public/media/product/product_big/'.$image_two_name);
            $data['image_two'] = base_url().'public/media/product/product_big/'.$image_two_name;

            $image_three_name =hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(260,380)->save('public/media/product/product_big/'.$image_three_name);
            $data['image_three'] = base_url().'public/media/product/product_big/'.$image_three_name;

            $image_four_name =hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
            Image::make($image_four)->resize(260,380)->save('public/media/product/product_big/'.$image_four_name);
            $data['image_four'] = base_url().'public/media/product/product_big/'.$image_four_name;
            // Product Image small size
            $image_one_small_name = hexdec(uniqid()).'.'.$image_one_small->getClientOriginalExtension();
            Image::make($image_one_small)->resize(85, 125)->save('public/media/product/product_small/'.$image_one_small_name);
            $data['image_one_small'] = base_url().'public/media/product/product_small/'.$image_one_small_name;

            $image_two_small_name =hexdec(uniqid()).'.'.$image_two_small->getClientOriginalExtension();
            Image::make($image_two_small)->resize(85, 125)->save('public/media/product/product_small/'.$image_two_small_name);
            $data['image_two_small'] = base_url().'public/media/product/product_small/'.$image_two_small_name;

            $image_three_small_name =hexdec(uniqid()).'.'.$image_three_small->getClientOriginalExtension();
            Image::make($image_three_small)->resize(85, 125)->save('public/media/product/product_small/'.$image_three_small_name);
            $data['image_three_small'] = base_url().'public/media/product/product_small/'.$image_three_small_name;

            $image_four_small_name =hexdec(uniqid()).'.'.$image_four_small->getClientOriginalExtension();
            Image::make($image_four_small)->resize(85, 125)->save('public/media/product/product_small/'.$image_four_small_name);
            $data['image_four_small'] = base_url().'public/media/product/product_small/'.$image_four_small_name;
//            dd($data);
            $product_id = DB::table('products')->insertGetId($data);
            $notification = array(
                'message' => 'Thêm sản phẩm thành công!',
                'alert-type' => 'success',
            );
//            dd($data_detail);
            foreach ($data_detail as $key => $item){
                $data_data = array();
                $data_data['product_id'] = $product_id;
                $data_data['product_color'] = $item['product_color'];
                $data_data['product_size'] = $item['product_size'];
                $data_data['product_quantity'] = $item['product_quantity'];
                DB::table('product_detail')->insert($data_data);
            }
            return Redirect()->route('admin.product.index')->with($notification);
        }else{
            $notification = array(
                'message' => 'Thêm sản phẩm thất bại!',
                'alert-type' => 'error',
            );
            return Redirect()->route('admin.product.index')->with($notification);
        }

    }
    public function getSubcategory($category_id){
        $subcategory = DB::table('subcategories')->where('category_id', $category_id)->get();
        return response::json(array(
            'subcategory' => $subcategory,
        ));
    }
    public function showProduct($id){
        $product = DB::table('products')
                ->join('brands', 'products.brand_id', 'brands.id')
                ->join('categories', 'products.category_id', 'categories.id')
                ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
                ->select('products.*','categories.category_name', 'subcategories.subcategory_name', 'brands.brand_name')
                ->where('products.id', $id)
                ->first();

        return view('admin.product.show', compact('product'));
    }
    public function statusProduct($id){
        $product = DB::table('products')->where('id', $id)->first();
        $status = intval($product->status);
        $sta = ($status == 0) ? 1 : 0;
        DB::table('products')->where('id', $id)->update(array('status' => $sta));
        $notification = array(
                'message' => 'Cập nhật trạng thái thành công!',
                'alert-type' => 'success',
            );
        return Redirect()->back()->with($notification);
    }
    public function deleteProduct($id){
        $product = DB::table('products')->where('id', $id)->first();
        $avatar = $product->avatar;
        $image1 = $product->image_one;
        $image2 = $product->image_two;
        $image3 = $product->image_three;
        $image4 = $product->image_four;
        unlink(substr($avatar, strlenURL()));
        unlink(substr($image1, strlenURL()));
        unlink(substr($image2, strlenURL()));
        unlink(substr($image3, strlenURL()));
        unlink(substr($image4, strlenURL()));
        unlink(substr($product->image_one_small, strlenURL()));
        unlink(substr($product->image_two_small, strlenURL()));
        unlink(substr($product->image_three_small, strlenURL()));
        unlink(substr($product->image_four_small, strlenURL()));
        DB::table('product_detail')->where('product_id', $id)->delete();
        DB::table('products')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Xóa sản phẩm thành công!',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }
    public function editProduct($id){
        $product = DB::table('products')->where('id', $id)->first();
        $brand = DB::table('brands')->get();
        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')->get();
        return view('admin.product.edit', compact('product', 'brand', 'category', 'subcategory'));
    }
    public function updateInfoProduct(Request $request){
        $id = $request->product_id;
        $count = $request->count;
//         Xử lý phần (màu, size, qty)
        $stt = $request->stt;
        $arrStt = explode(',', $stt);
        $detail = array();
        foreach ($arrStt as $key => $item){
            $name = 'detail_'.$item;
            $detail[$item] = $request->$name;
        }
        $data_data = array();
        foreach ($detail as $key => $item){
            $data_data[$key] = explode(',', $item);
        }
//        dd($data_data);
        $data_detail = array();
        $data_delete = array();
        foreach ($data_data as $key => $item){
            if(!empty($item[0])){
                $data_detail[$key]['product_color'] = $item[0];
                $data_detail[$key]['product_size'] = intval($item[1]);
                $data_detail[$key]['product_quantity'] = intval($item[2]);
            }else{
                $data_delete[$key] = $key;
            }

        }
//        dd($data_detail);
//        dd($data_delete);
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_tosub'] = to_sub($request->product_name);
        $data['product_code'] = $request->product_code;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['selling_price'] = $request->selling_price;
        $data['discount_price'] = $request->discount_price;
        $data['product_content'] = $request->product_content;

        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['hot_new'] = $request->hot_new;
        $data['buyone_getone'] = $request->buyone_getone;
        $data['trend'] = $request->trend;
//        dd($data_detail);
//        dd($data_delete);
        foreach ($data_detail as $key => $item){
            $data_update = array();
            $data_update['product_color'] = $item['product_color'];
            $data_update['product_size'] = $item['product_size'];
            $data_update['product_quantity'] = $item['product_quantity'];
            DB::table('product_detail')->where('id', $key)->update($data_update);
        }
        if(count($data_delete) > 0){
            foreach ($data_delete as $key => $item){
                DB::table('product_detail')->where('id', $item)->delete();
            }
        }
        DB::table('products')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'Cập nhật sản phẩm thành công!',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }
    public function updateDetailProduct(Request $request){
        $id = intval($request->product_id);
        $data_detail = array();
        $product_color = 'product_color';
        $product_size = 'product_size';
        $product_quantity = 'product_quantity';
        for ($i = 1; $i <= 16; $i++){
            $detail = 'detail'.$i;
            if(!empty($request->$detail)){
                $data_de[$i] = $request->$detail;
                $data_det = explode(',', $data_de[$i]);
                foreach ($data_det as $item){
                    $data_detail[$i][$product_color] = $data_det[0];
                    $data_detail[$i][$product_size] = intval($data_det[1]);
                    $data_detail[$i][$product_quantity] = intval($data_det[2]);
                }
            }
        }
//        dd($data_detail);
        foreach ($data_detail as $item){
            $data = array();
            $data['product_id'] = $id;
            $data['product_color'] = $item['product_color'];
            $data['product_size'] = $item['product_size'];
            $data['product_quantity'] = $item['product_quantity'];
//            dd($data);
            DB::table('product_detail')->insert($data);
        }
        $notification = array(
            'message' => 'Thêm thuộc tính sản phẩm thành công!',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }
    public function updateImageProduct(Request $request){
        $id = $request->product_id;
        $data = array();
        $avatar = $request->avatar;
        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;
        $image_four = $request->image_four;
        $image_one_small = $request->image_one;
        $image_two_small = $request->image_two;
        $image_three_small = $request->image_three;
        $image_four_small = $request->image_four;
        if($avatar && $image_one && $image_two && $image_three && $image_four){
            $product = DB::table('products')->where('id', $id)->first();
            unlink(substr($avatar, strlenURL()));
            unlink(substr($image_one, strlenURL()));
            unlink(substr($image_two, strlenURL()));
            unlink(substr($image_three, strlenURL()));
            unlink(substr($image_four, strlenURL()));
            unlink(substr($product->image_one_small, strlenURL()));
            unlink(substr($product->image_two_small, strlenURL()));
            unlink(substr($product->image_three_small, strlenURL()));
            unlink(substr($product->image_four_small, strlenURL()));
            $avatar_name = hexdec(uniqid()).'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(165, 240)->save('public/media/product/avatar/'.$avatar_name);
            $data['avatar'] = base_url().'public/media/product/avatar/'.$avatar_name;

            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(260, 380)->save('public/media/product/product_big/'.$image_one_name);
            $data['image_one'] = base_url().'public/media/product/product_big/'.$image_one_name;

            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(260, 380)->save('public/media/product/product_big/'.$image_two_name);
            $data['image_two'] = base_url().'public/media/product/product_big/'.$image_two_name;

            $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(260, 380)->save('public/media/product/product_big/'.$image_three_name);
            $data['image_three'] = base_url().'public/media/product/product_big/'.$image_three_name;

            $image_four_name =hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
            Image::make($image_four)->resize(260, 380)->save('public/media/product/product_big/'.$image_four_name);
            $data['image_four'] = base_url().'public/media/product/product_big/'.$image_four_name;

            $image_one_small_name = hexdec(uniqid()).'.'.$image_one_small->getClientOriginalExtension();
            Image::make($image_one_small)->resize(85, 125)->save('public/media/product/product_small/'.$image_one_small_name);
            $data['image_one_small'] = base_url().'public/media/product/product_small/'.$image_one_small_name;

            $image_two_small_name = hexdec(uniqid()).'.'.$image_two_small->getClientOriginalExtension();
            Image::make($image_two_small)->resize(85, 125)->save('public/media/product/product_small/'.$image_two_small_name);
            $data['image_two_small'] = base_url().'public/media/product/product_small/'.$image_two_small_name;

            $image_three_small_name = hexdec(uniqid()).'.'.$image_three_small->getClientOriginalExtension();
            Image::make($image_three_small)->resize(85, 125)->save('public/media/product/product_small/'.$image_three_small_name);
            $data['image_three_small'] = base_url().'public/media/product/product_small/'.$image_three_small_name;

            $image_four_small_name =hexdec(uniqid()).'.'.$image_four_small->getClientOriginalExtension();
            Image::make($image_four_small)->resize(85, 125)->save('public/media/product/product_small/'.$image_four_small_name);
            $data['image_four_small'] = base_url().'public/media/product/product_small/'.$image_four_small_name;

            DB::table('products')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Cập nhật sản phẩm thành công!',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);

        }else{
            $notification = array(
                'message' => 'Cập nhật phẩm thất bại!',
                'alert-type' => 'error',
            );
            return Redirect()->route('admin.product.index')->with($notification);
        }
    }

}
