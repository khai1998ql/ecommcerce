<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Response;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // CATEGORY

    public function category(){
        $category = DB::table('categories')->get();
        return view('admin.category.category', compact('category'));
    }
    public function createCategory(Request $request){
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_tosub'] = to_sub($request->category_name);
        DB::table('categories')->insert($data);
        $notification = array(
            'message' => 'Thêm danh mục thành công!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function deleteCategory($id){
        $subcategory = DB::table('subcategories')->where('category_id', $id)->get();
        if(count($subcategory) == 0){
            DB::table('categories')->where('id', $id)->delete();
            $notification = array(
                'message' => 'Xóa danh mục thành công!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Danh mục đã có danh mục con! Xóa thất bại!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function editCategory($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return response::json(array(
            'category' => $category
        ));
    }
    public function updateCategory(Request $request){
        $id = $request->category_id;
//        dd($id);
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_tosub'] = to_sub($request->category_name);
        DB::table('categories')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'Cập nhật danh mục thành công!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    // SUBCATEGORY
    public function subcategory(){
        $subcategory = DB::table('subcategories')
                        ->join('categories', 'subcategories.category_id', 'categories.id')
                        ->select('subcategories.*', 'categories.category_name')
                        ->get();
        $category = DB::table('categories')->get();
        return view('admin.category.subcategory', compact('subcategory', 'category'));
    }

    public function createSubcategory(Request $request){
        $data = array();
        $data['subcategory_name'] = $request->subcategory_name;
        $data['category_id'] = $request->category_id;
        $data['subcategory_tosub'] = to_sub($request->subcategory_name);
        DB::table('subcategories')->insert($data);
        $notification = array(
            'message' => 'Thêm mới danh mục con thành công!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function deleteSubcategory($id){
        DB::table('subcategories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Xóa danh mục con thành công!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function editSubcategory($id){
        $subcategory = DB::table('subcategories')->where('id', $id)->first();
        return response::json(array(
            'subcategory' => $subcategory
        ));
    }
    public function updateSubcategory(Request $request){
        $id = $request->subcategory_id;
        $data = array();
        $data['subcategory_name'] = $request->subcategory_name;
        $data['subcategory_tosub'] = to_sub($request->subcategory_name);
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'Cập nhật danh mục con thành công!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // BRANDS
    public function brand(){
        $brand = DB::table('brands')->get();
        return view('admin.category.brand', compact('brand'));
    }
    public function createBrand(Request $request){
        $data = array();
        $image = $request->file('brand_logo');
        if($image){
            $data['brand_name'] = $request->brand_name;
            $data['brand_tosub'] = to_sub($request->brand_name);
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/media/brand_logo/'.$image_name);
            $data['brand_logo'] = 'public/media/brand_logo/'.$image_name;
            DB::table('brands')->insert($data);
            $notification = array(
                'message' => 'Thêm mới nhãn hiệu thành công!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Thêm mới nhãn hiệu thất bại!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function deleteBrand($id){
        $brand = DB::table('brands')->where('id', $id)->first();
        unlink($brand->brand_logo);
        DB::table('brands')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Xóa nhãn hiệu thành công!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function editBrand($id){
        $brand = DB::table('brands')->where('id', $id)->first();
        return response::json(array(
            'brand' => $brand,
        ));
    }
    public function updateBrand(Request $request){
        $id = $request->brand_id;
        $brand_old = $request->brand_logo_old;
        $data = array();
        $image = $request->file('brand_logo');
        if($image){
            unlink($brand_old);
            $data['brand_name'] = $request->brand_name;
            $data['brand_tosub'] = to_sub($request->brand_name);
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/media/brand_logo/'.$image_name);
            $data['brand_logo'] = 'public/media/brand_logo/'.$image_name;
            DB::table('brands')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Cập nhật nhãn hiệu thành công!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Cập nhật nhãn hiệu thất bại!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // COUPON TYPE
    public function coupon_type(){
        $coupon_type = DB::table('coupon_type')->get();
        return view('admin.category.coupon_type', compact('coupon_type'));
    }
    public function createCoupon_type(Request $request){
        $this->validate($request, [
            'coupon_type_name' => 'required|max:255',
        ]);
        $data = array();
        $data['coupon_type_name'] = $request->coupon_type_name;
        DB::table('coupon_type')->insert($data);
        $notification = array(
            'message' => 'Thêm mới loại phiếu giảm giá thành công!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function deleteCoupon_typed($id){
        DB::table('coupon_type')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Xóa loại phiếu giảm giá thành công!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function editCoupon_typed($id){
        $coupon_type = DB::table('coupon_type')->where('id', $id)->first();
        return response::json(array(
            'coupon_type' => $coupon_type,
        ));
    }
    public function updateCoupon_type(Request $request){
        $this->validate($request, [
            'coupon_type_name' => 'required|max:255',
        ]);
        $id = $request->coupon_type_id;
        $data = array();
        $data['coupon_type_name'] = $request->coupon_type_name;
        DB::table('coupon_type')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'Cập nhật loại phiếu giảm giá thành công!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    // COUPON
    public function coupon(){
        $coupon = DB::table('coupons')
                    ->join('coupon_type', 'coupons.coupon_type_id', 'coupon_type.id')
                    ->select('coupons.*', 'coupon_type.coupon_type_name')
                    ->get();
        $coupon_type = DB::table('coupon_type')->get();
        return view('admin.category.coupon', compact('coupon', 'coupon_type'));
    }
    public function createCoupon(Request $request){
        $this->validate($request,[
            'coupon_name' => 'required|max:255',
            'coupon_code' => 'required|max:255',
            'coupon_type_id' => 'required',
            'coupon_discount'   => 'required',
        ]);
        $data = array();
        $data['coupon_name'] = $request->coupon_name;
        $data['coupon_code'] = $request->coupon_code;
        $data['coupon_type_id'] = $request->coupon_type_id;
        $data['coupon_discount'] = $request->coupon_discount;
        DB::table('coupons')->insert($data);
        $notification = array(
            'message' => 'Thêm mới phiếu giảm giá thành công!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function deleteCoupon($id){
        DB::table('coupons')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Xóa phiếu giảm giá thành công!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function editCoupon($id){
        $coupon = DB::table('coupons')->where('id', $id)->first();
        return response::json(array(
            'coupon' => $coupon,
        ));
    }
    public function updateCoupon(Request $request){
        $this->validate($request, [
            'coupon_name' => 'required|max:255',
        ]);
        $id = $request->coupon_id;
        $data = array();
        $data['coupon_name'] = $request->coupon_name;
        $data['coupon_code'] = $request->coupon_code;
        $data['coupon_type_id'] = $request->coupon_type_id;
        $data['coupon_discount'] = $request->coupon_discount;
        DB::table('coupons')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'Cập nhật phiếu giảm giá thành công!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
