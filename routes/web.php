<?php



// Route::get('/', function () {return view('pages.index');});


Route::get('/', 'FrontController@index');

//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


//Admin Section
//Categories
Route::get('admin/categories', 'Admin\Category\CategoryController@Category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@StoreCategory')->name('store.category');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@DeleteCategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@EditCategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@UpdateCategory');




//Brands Section
Route::get('admin/brands', 'Admin\Category\BrandController@brand')->name('brands');
Route::post('admin/store/brands', 'Admin\Category\BrandController@StoreBrand')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\Category\BrandController@DeleteBrand');
Route::get('edit/brand/{id}', 'Admin\Category\BrandController@EditBrand');
Route::post('update/brand/{id}', 'Admin\Category\BrandController@UpdateBrand');


//Sub Categories
Route::get('admin/sub/category', 'Admin\Category\SubCategoryController@subcategories')->name('sub.categories');
Route::post('admin/store/subcat', 'Admin\Category\SubCategoryController@StoreSubCat')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'Admin\Category\SubCategoryController@DeleteSubCat');
Route::get('edit/subcategory/{id}', 'Admin\Category\SubCategoryController@EditSubCat');
Route::post('update/subcategory/{id}', 'Admin\Category\SubCategoryController@UpdateSubCat');

//for Ajax Subcategory
Route::get('/get/subcategory/{category_id}','Admin\ProductController@getSubcat');

//Coupons

Route::get('admin/sub/coupon', 'Admin\Category\CouponController@coupons')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\Category\CouponController@StoreCoupon')->name('store.coupon');
Route::get('delete/coupon/{id}', 'Admin\Category\CouponController@DeleteCoupon');
Route::get('edit/coupon/{id}', 'Admin\Category\CouponController@EditCoupon');
Route::post('update/coupon/{id}', 'Admin\Category\CouponController@UpdateCoupon');


//News Letter
Route::get('admin/newsletter', 'Admin\Category\NewsletterController@newsLetter')->name('admin.newsletter');
Route::post('store/newsletter', 'FrontController@StoreNewsltr')->name('store.newsltr');
Route::get('delete/sub/{id}', 'Admin\Category\NewsletterController@DeleteNewsltr');



//Products

Route::get('admin/product/all', 'Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\ProductController@Store')->name('store.product');
Route::get('inactive/product/{id}', 'Admin\ProductController@Inactive');
Route::get('active/product/{id}', 'Admin\ProductController@Active');
Route::get('delete/product/{id}', 'Admin\ProductController@DeleteProduct');
Route::get('view/product/{id}', 'Admin\ProductController@ViewProduct');
Route::get('edit/product/{id}', 'Admin\ProductController@EditProduct');
Route::post('update/product/withoutphoto/{id}', 'Admin\ProductController@UpdateProductWithoutPhoto');
Route::post('update/product/withphoto/{id}', 'Admin\ProductController@UpdateProductWithPhoto');



// Blog Admin all
Route::get('blog/Category/list', 'Admin\PostController@BlogCatList')->name('add.blog.category_list');

Route::post('admin/store/blog', 'Admin\PostController@StoreBlog')->name('store.blog.category');

Route::get('admin/edit/blog/{id}', 'Admin\PostController@EditBlog');
Route::post('admin/update/blogcat/{id}', 'Admin\PostController@UpdateBlog');
Route::get('admin/delete/blog/{id}', 'Admin\PostController@DeleteBlog');

Route::get('admin/add/post', 'Admin\PostController@CreatePost')->name('add.create.post');
Route::post('admin/store/post', 'Admin\PostController@StorePost')->name('store.post');
Route::get('admin/list/posts', 'Admin\PostController@index')->name('add.blog.post');
Route::get('delete/post/{id}', 'Admin\PostController@DeletePost');
Route::get('edit/post/{id}', 'Admin\PostController@EditPost');
Route::post('update/post/{id}', 'Admin\PostController@UpdatePost');


// Cart Routes
Route::get('add/wishlist/{id}', 'WishlistController@addWishlist');
Route::get('add/to/cart/{id}', 'CartController@addtoCart');
Route::get('product/cart', 'CartController@showCart')->name('show.cart');
Route::get('remove/cart/{rowId}', 'CartController@removeCart');
Route::post('update/cart/', 'CartController@updateCart')->name('update.cartitem');
Route::get('/cart/product/view/{id}', 'CartController@viewProduct');
Route::post('insert/into/cart', 'CartController@insertCart')->name('insert.into.cart');
Route::get('user/checkout/', 'CartController@Checkout')->name('user.checkout');
Route::get('user/wishlist/', 'CartController@Wishlist')->name('user.wishlist');
Route::post('user/apply/coupon/', 'CouponController@Coupon')->name('apply.coupon');
Route::get('user/remove/coupon/', 'CouponController@removeCoupon')->name('coupon.remove');


Route::get('check', 'CartController@check');

Route::get('/product/details/{id}/{product_name}', 'ProductController@ProductView');
Route::post('cart/product/add/{id}', 'ProductController@addCart');


//Blog Post Routes
Route::get('blog/post/', 'BlogController@Blog')->name('blog.post');
Route::get('blog/lang/english/', 'BlogController@English')->name('language.english');
Route::get('blog/lang/hindi/', 'BlogController@Hindi')->name('language.hindi');
Route::get('blog/single/{id}', 'BlogController@blogSingle');


// Payment Step
Route::get('payment/page/', 'PaymentController@PaymentPage')->name('payment.step');

