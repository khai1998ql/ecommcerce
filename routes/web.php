<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('pages.index');
//});
//Route::get('/index', function () {
//    return view('pages.index');
//})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

// USER
Route::group(['prefix' => 'user'], function (){
    Route::get('/logout', 'HomeController@logout')->name('user.logout');
});

// FRONTEND
Route::group(['prefix' => '/'], function (){
    Route::get('/', 'Front\FrontendController@index')->name('index');

    // TEST
    Route::group(['prefix' => 'test'], function(){
        Route::get('update', 'TestController@update');
        Route::get('test', 'TestController@test');
    });

    // SUBCATEGORY
    Route::group(['prefix' => 'danh-muc-con'], function (){
       Route::get('{subcategory_tosub}', 'Front\CategoryController@subcateogry');
       Route::post('orderby', 'Front\CategoryController@orderbySubcateogry')->name('subcateogry.ordeby');
    });

    // CATEGORY

    // PRODUCT
    Route::group(['prefix' => 'product'], function (){
        Route::get('{subcategory_tosub}/{product_tosub}', 'Front\ProductController@product');
        Route::get('get/detailProduct/{id}', 'Front\ProductController@getProduct');
        Route::get('get/sizeProduct/{product_id}/{color}', 'Front\ProductController@getSizeProduct');
        Route::get('get/maxQty/{product_id}/{color}/{size}', 'Front\ProductController@getMaxQty');
    });

    // CART
    Route::group(['prefix' => 'cart'], function (){
        Route::get('checkcart', 'Front\CartController@index');
        Route::post('product/add', 'Front\CartController@productAdd')->name('cart.product.add');
        Route::get('gio-hang', 'Front\CartController@cart')->name('cart.cart');
        Route::get('update/{id}/{qty}', 'Front\CartController@update');
        Route::get('remove/{rowId}', 'Front\CartController@removeCart');
        Route::post('coupon', 'Front\CartController@coupon')->name('cart.coupon');
        Route::get('coupon/remove', 'Front\CartController@removeCoupon')->name('cart.coupon.remove');
        Route::get('checkout', 'Front\CartController@checkout')->name('cart.checkout');
        Route::get('add/delivery/{id}', 'Front\CartController@addDelivery');
        Route::post('checkout/accept', 'Front\CartController@acceptCheckout')->name('cart.checkout.accept');
    });

    // Payment
    Route::group(['prefix' => 'payment'], function (){
        Route::post('stripe', 'Front\PaymentController@stripe')->name('payment.stripe');
        Route::get('checkthu', 'Front\PaymentController@checkthu');
    });

    // Search
    Route::group(['prefix' => 'search'], function (){
        Route::get('color/{color}', 'Front\SearchController@color');
        Route::get('brand/{brand}', 'Front\SearchController@brand');
        Route::get('price/{min}/{max}', 'Front\SearchController@price');
        Route::get('orderby/{orderby}', 'Front\SearchController@orderby');
    });

    // Blog
    Route::group(['prefix' => 'blog'], function (){
        Route::get('/', 'Front\BlogController@blog')->name('blog');
        Route::get('{blog_name_tosub}', 'Front\BlogController@blog_detail');
    });


});


// ADMIN
Route::group(['prefix' => 'admin'], function (){
    // LOGIN, LOGOUT
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    Route::get('home', 'Admin\AdminController@index');
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
    Route::get('logout', 'Admin\AdminController@logout')->name('admin.logout');


    // CATEGORY
    Route::group(['prefix' => 'category'] , function (){
        Route::get('index', 'Admin\CategoryController@category')->name('admin.category.category');
        Route::post('create', 'Admin\CategoryController@createCategory')->name('admin.category.create');
        Route::get('delete/{id}', 'Admin\CategoryController@deleteCategory')->name('admin.category.delete');
        Route::get('edit/{id}', 'Admin\CategoryController@editCategory')->name('admin.category.edit');
        Route::post('update/', 'Admin\CategoryController@updateCategory')->name('admin.category.update');
    });

    // SUBCATEGORY
    Route::group(['prefix' => 'subcategory'], function (){
        Route::get('index', 'Admin\CategoryController@subcategory')->name('admin.subcategory.index');
        Route::post('create', 'Admin\CategoryController@createSubcategory')->name('admin.subcategory.create');
        Route::get('delete/{id}', 'Admin\CategoryController@deleteSubcategory')->name('admin.subcategory.delete');
        Route::get('edit/{id}', 'Admin\CategoryController@editSubcategory')->name('admin.subcategory.edit');
        Route::post('update/', 'Admin\CategoryController@updateSubcategory')->name('admin.subcategory.update');
    });

    // BRANDS
    Route::group(['prefix' => 'brand'], function (){
        Route::get('index', 'Admin\CategoryController@brand')->name('admin.brand.index');
        Route::post('create', 'Admin\CategoryController@createBrand')->name('admin.brand.create');
        Route::get('delete/{id}', 'Admin\CategoryController@deleteBrand')->name('admin.brand.delete');
        Route::get('edit/{id}', 'Admin\CategoryController@editBrand')->name('admin.brand.edit');
        Route::post('update/', 'Admin\CategoryController@updateBrand')->name('admin.brand.update');
    });



    // COUPON TYPE
    Route::group(['prefix' => 'coupon_type'], function (){
        Route::get('index', 'Admin\CategoryController@coupon_type')->name('admin.coupon_type.index');
        Route::post('create', 'Admin\CategoryController@createCoupon_type')->name('admin.coupon_type.create');
        Route::get('delete/{id}', 'Admin\CategoryController@deleteCoupon_typed')->name('admin.coupon_type.delete');
        Route::get('edit/{id}', 'Admin\CategoryController@editCoupon_typed')->name('admin.coupon_type.edit');
        Route::post('update/', 'Admin\CategoryController@updateCoupon_type')->name('admin.coupon_type.update');
    });

    // COUPON
    Route::group(['prefix' => 'coupon'], function (){
        Route::get('index', 'Admin\CategoryController@coupon')->name('admin.coupon.index');
        Route::post('create', 'Admin\CategoryController@createCoupon')->name('admin.coupon.create');
        Route::get('delete/{id}', 'Admin\CategoryController@deleteCoupon')->name('admin.coupon.delete');
        Route::get('edit/{id}', 'Admin\CategoryController@editCoupon')->name('admin.coupon.edit');
        Route::post('update/', 'Admin\CategoryController@updateCoupon')->name('admin.coupon.update');
    });

    // PRODUCT
    Route::group(['prefix' => 'product'], function (){
        Route::get('index', 'Admin\ProductController@product')->name('admin.product.index');
        Route::get('add', 'Admin\ProductController@addProduct')->name('admin.product.add');
        Route::get('get/subcategory/{category_id}', 'Admin\ProductController@getSubcategory');
        Route::post('create', 'Admin\ProductController@createProduct')->name('admin.product.create');
        Route::get('show/{id}', 'Admin\ProductController@showProduct');
        Route::get('status/{id}', 'Admin\ProductController@statusProduct');
        Route::get('delete/{id}', 'Admin\ProductController@deleteProduct');
        Route::get('edit/{id}', 'Admin\ProductController@editProduct')->name('admin.product.edit');
        Route::post('update/info', 'Admin\ProductController@updateInfoProduct')->name('admin.product.update.info');
        Route::post('update/detail', 'Admin\ProductController@updateDetailProduct')->name('admin.product.update.detail');
        Route::post('update/image', 'Admin\ProductController@updateImageProduct')->name('admin.product.update.image');
    });
    // Blog
    Route::group(['prefix' => 'blog'], function (){
        // Blog Category
        Route::get('category', 'Admin\BlogController@blog_category')->name('admin.blog_category');
        Route::post('category/create', 'Admin\BlogController@createBlog_category')->name('admin.blog_category.create');
        Route::get('blog_category/delete/{id}', 'Admin\BlogController@deleteBlog_category');
        Route::get('blog_category/get/{id}', 'Admin\BlogController@getBlog_category');
        Route::post('category/update', 'Admin\BlogController@updateBlog_category')->name('admin.blog_category.update');

        // Blog Post
        Route::get('post', 'Admin\BlogController@blog_post')->name('admin.blog_post');
        Route::get('post/add', 'Admin\BlogController@addBlog_post')->name('admin.blog_post.add');
        Route::post('post/create', 'Admin\BlogController@createBlog_post')->name('admin.blog_post.create');
    });

    // ORDER
    Route::group(['prefix' => 'order'], function (){
        // Status order == 0( Đơn hàng mới)
        Route::get('new_order', 'Admin\OrderController@new_order')->name('admin.order.new_order');
        Route::get('new_order/view/{id}', 'Admin\OrderController@new_orderView');
        // Cancel order
        Route::get('cancel/{id}', 'Admin\OrderController@_cancel_order');
        // Accept order
        Route::get('accept/{id}', 'Admin\OrderController@_accept_order');
        // Delivery Process order
        Route::get('delivery_process/{id}', 'Admin\OrderController@_delivery_process_order');
        // Delivery Done order
        Route::get('done/{id}', 'Admin\OrderController@_done_order');
        // Status order == 1( Đơn hàng đã được chập nhận)
        Route::get('accept_order', 'Admin\OrderController@accept_order')->name('admin.order.accept_order');
        Route::get('accept_order/view/{id}', 'Admin\OrderController@accept_orderView');
        // Status order == 2( Đơn hàng đã được gửi đi)
        Route::get('delivery_order', 'Admin\OrderController@delivery_order')->name('admin.order.delivery_order');
        Route::get('delivery_order/view/{id}', 'Admin\OrderController@delivery_orderView');
        // Status order == 3( Đơn hàng đã hoàn thành)
        Route::get('done_order', 'Admin\OrderController@done_order')->name('admin.order.done_order');
        Route::get('done_order/view/{id}', 'Admin\OrderController@done_orderView');
        // Status order == 4( Đơn hàng đã bị hủy)
        Route::get('cancel_order', 'Admin\OrderController@cancel_order')->name('admin.order.cancel_order');
        Route::get('cancel_order/view/{id}', 'Admin\OrderController@cancel_orderView');
    });
});
