<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Site Routes

//=================================================b2bsite========================
Route::get('/a','B2BController@aa');

Route::get('/b2b-site/login','B2BController@b2bloginForm');
Route::post('/b2b-site/login','B2BController@createb2bLogin');
Route::get('/b2b-dashboard','B2BController@b2bDashboard');
Route::post('b2b-site-logout','B2BController@b2bLogout');

Route::get('/b2b-site-po','B2BController@b2bpoForm');
Route::get('/b2b-site-po/findPrice','B2BController@b2bpoFindPrice');
Route::post('/b2b-site-po','B2BController@b2bpocreateForm');
Route::get('/b2b-site-polist','B2BController@b2bpoList');
Route::get('/b2b-site-po/{id}','B2BController@b2bsinglePurchase');
Route::get('/b2b-site-generateinvoice','B2BController@b2bgenerateInvoiceForm');
Route::post('/b2b-site-generateinvoice','B2BController@createb2bgenerateInvoiceForm');
Route::get('/b2b-site-single-invoice/{id}','B2BController@b2bsingleInvoice');
Route::get('/b2b-site-final-invoicelist','B2BController@b2bfinalInvoiceList');
Route::get('/b2b-site-invoicetypet','B2BController@b2binvoiceType');
Route::post('/b2b-site-poinvoice','B2BController@b2bcreatePoinvoice');
Route::post('/b2b-site-poinvoiceautosearch','B2BController@b2bpoinvicesearchNumber')->name('autocomplete.fetch');
Route::get('/b2b-site-exitpo','B2BController@b2binvoiceForExistPo');
Route::post('/existpoinvoicegenerate','B2BController@b2bcreateinvoiceForExistPo');
Route::post('/updatecompanylogo/{id}','B2BController@b2bUpdateCompanyLogo');

Route::get('b2bexistsingleposlist/{id}/{updatetotalpurchase}','B2BController@ExistsinglePoinvoiceList');
Route::get('b2bsingleposlist/{id}','B2BController@singlepoinvoiceList');
Route::get('b2bpurchasesingleposlist/{id}','B2BController@purchasesinglepoList');
//Route::get('/b2b-site-single-poinvoice/{id}','B2BController@b2bsinglepoInvoice');


//=================================================vendor site================
Route::resource('vendor-site', 'VendorSiteController');
Route::get('login/vendor-site','VendorSiteController@vendorLoginForm');
Route::post('login/vendor-site','VendorSiteController@createVendorLogin');
Route::post('vendor-site-logout','VendorSiteController@VendorLogout');
Route::resource('vendor-site-categories', 'VendorCategoryController');
Route::resource('vendor-site-subcategories', 'VendorSubcategoryController');
Route::get('/vendor-site/loadSubCategory/{category_name}', 'SubcategoryController@loadSubCategory');
Route::get('/vendor-site/loadItemSubCategoryWithItemType/{category_id}', 'VendorSubcategoryController@loadItemSubCategoryWithItemType');
Route::get('/vendor-site/loadCategoryTypeForm1', 'VendorCategoryController@loadCategoryTypeForm');
Route::post('/vendor-site/saveCategoryType', 'VendorCategoryController@saveCategoryType');
Route::resource('vendor-site-brands', 'VendorBrandController');
Route::resource('vendor-site-items', 'VendorItemController');
Route::get('vendororderlist','VendorOrderListController@orderList');
Route::get('vendororderinvoices/{id}','VendorOrderListController@orderinvoices');

//order deliver
Route::get('/vendordelivery-process/{id}', 'VendorOrderListController@deliveryprocess');
Route::post('/vendordelivery-process/{id}', 'VendorOrderListController@createDeliveryprocess');
Route::get('/vendororderdeliverylist', 'VendorOrderListController@deliverylist');
Route::get('/vendordelivery-confirm/{id}', 'VendorOrderListController@deliveryconfirm');
Route::post('/vendorfinal-delivery/{id}', 'VendorOrderListController@finaldelivery');
Route::get('/vendordelivery-process-by/{id}', 'VendorOrderListController@deliveryProcessBy');
Route::get('/vendororderstatus','VendorOrderListController@orderStatus');

//=====================================site======================================
Route::post('/loadmore/load_data', 'LoadMoreController@load_data')->name('loadmore.load_data');
Route::get('/','SiteController@index');
Route::get('/itemdetails/{id}', 'SiteController@itemdetails');
Route::post('/searchItems','SiteController@searchItems');
Route::get('/items/{category}','SiteController@categoryItems');
Route::get('/items/{category}/{subcategory}','SiteController@subCategoryItems');
Route::get('/subitems/{subcategory}','SiteController@searchsubCategoryItems');
Route::get('/branditems/{brand}','SiteController@brandItems');

//checkout
Route::get('/order_confirm','SiteController@orderConfirm');
Route::post('/shipping-login','CheckoutController@shippingLoginForm');
Route::get('/shipping','CheckoutController@shippingForm');
Route::post('/shipping','CheckoutController@createShipping');

Route::get('/shipping_method','CheckoutController@shippingMethodForm');
Route::post('/shipping_method','CheckoutController@createShippingMethod');

Route::get('/divisionTodistrict/{id}','CheckoutController@DistrictInfo');
Route::get('/payment','CheckoutController@paymentInfo');
Route::post('/update-cartquantity','CheckoutController@updateCartQuantity');
Route::get('/paymenttype/{id}','CheckoutController@paymentTypeById');
Route::post('/payment','CheckoutController@createPayment');
Route::get('checkout/my-home','CheckoutController@finalConfirmation');
Route::post('/updatecart_quantity','CheckoutController@updateMyuantity');
Route::get('/cart/update','CheckoutController@updateCartQuantity');


// Shopping Cart Route
Route::get('/cart', 'CartController@cart');
Route::post('/cart-add','CartController@addToCart');
Route::get('/cart-remove/{rowId}','CartController@cartRemove');
Route::post('/cart-update','CartController@cartUpdate');

//Customer Profile Route
Route::get('/login/customers', 'Auth\LoginController@showCustomerLoginForm');
Route::post('/login/customers', 'Auth\LoginController@customerLogin');
Route::post('/login/customersOrderConfirm', 'Auth\LoginController@customerLoginFromOrderConfirm');
Route::get('/register/customers', 'GuardRegisterController@showCustomerRegisterForm');
Route::get('/registerFromOrderConfirm/customers', 'GuardRegisterController@showregisterFromOrderConfirm');
Route::post('/register/customers', 'GuardRegisterController@store');
Route::post('/registerFromOrderConfirm/customers', 'GuardRegisterController@registerFromOrderConfirm');
Route::get('/customer', 'CustomerController@index');
Route::get('/mycustomerProfile', 'CustomerController@customerProfile');
Route::get('/editcustomerProfile/{id}', 'CustomerController@customereditProfile');
Route::post('/updatecustomerProfile/{id}', 'CustomerController@customerupdateProfile');

Route::get('/customer/customerProfile', 'CustomerController@customerProfile');
Route::get('/customerOrderHistory', 'CustomerController@customerOrderHistory');
Route::get('/order_report/{id}', 'CustomerController@customerOrderReport');
Route::get('/customerReviewHistory', 'CustomerController@customerReviewHistory');
Route::get('/customerWishList', 'CustomerController@customerWishList');
Route::get('/customershippingAddressBook', 'CustomerController@customershippingAddressBook');
Route::post('/customershipping_update', 'CustomerController@customershippingUpdate');
Route::get('/customerChangePassword', 'CustomerController@customerChangePassword');
Route::post('/customerChangePassword', 'CustomerController@customerUpdatePassword');
Route::get('/orderWizard', 'CustomerController@orderWizard');

//=========================Admin Routes====================================
// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/dashboard', 'AdminController@index')->name('dashboard')->middleware('auth');

////Product Route
//Route::resource('products', 'ProductController');
//Route::get('/addProduct', 'ProductController@addProduct');



//Admin Order
Route::get('/orderlist', 'AdminOrderController@orderlist');
Route::get('/orderdelete/{id}', 'AdminOrderController@orderdelete');
//Route::get('/orderstatus', 'AdminOrderController@orderstatus');
Route::get('/orderinvoices/{id}', 'AdminOrderController@orderinvoices');
//Route::get('/orderinvoicesdownload/{id}', 'AdminOrderController@orderinvoicesDownload');
//Route::get('/paymenthistory', 'AdminOrderController@paymenthistory');



//Category Route
Route::resource('categories', 'CategoryController');
Route::resource('subcategories', 'SubcategoryController');
Route::get('/admin/loadSubCategory/{category_name}', 'SubcategoryController@loadSubCategory');
Route::get('/admin/loadItemSubCategoryWithItemType/{category_id}', 'SubcategoryController@loadItemSubCategoryWithItemType');
Route::get('/admin/loadCategoryTypeForm', 'AdminController@loadCategoryTypeForm');
Route::post('/admin/saveCategoryType', 'AdminController@saveCategoryType');




//order deliver
Route::get('/delivery-process/{id}', 'AdminOrderDeliveryController@deliveryprocess');
Route::post('/delivery-process/{id}', 'AdminOrderDeliveryController@createDeliveryprocess');
Route::get('/orderdeliverylist', 'AdminOrderDeliveryController@deliverylist');
Route::get('/delivery-confirm/{id}', 'AdminOrderDeliveryController@deliveryconfirm');
Route::post('/final-delivery/{id}', 'AdminOrderDeliveryController@finaldelivery');
Route::get('/delivery-process-by/{id}', 'AdminOrderDeliveryController@deliveryProcessBy');
Route::get('/orderstatus','AdminOrderDeliveryController@orderStatus');


//Collection Resource
Route::resource('orders', 'OrderController');
Route::resource('companies', 'CompanyController');
Route::resource('brands', 'BrandController');
Route::resource('item', 'ItemController');
Route::resource('vendors', 'VendorController');
Route::resource('b2bcustomers', 'B2BCustomerController');

//banner
Route::get('/banner', 'BannerController@addBanner');
Route::post('/banner', 'BannerController@createBanner');
Route::get('/bannerList', 'BannerController@manageBanner');
Route::get('/edit-banner/{id}', 'BannerController@editBanner');
Route::post('/update-banner/{id}', 'BannerController@updateBanner');
Route::get('/delete-banner/{id}', 'BannerController@deleteBanner');

//customFooter
Route::get('/customsite', 'CustomFooterController@addCustomFooter');
Route::post('/customsite', 'CustomFooterController@createCustomFooter');
Route::get('/customsiteList', 'CustomFooterController@manageCustomFooter');
Route::get('/edit-customsite/{id}', 'CustomFooterController@editCustomFooter');
Route::post('/update-customsite/{id}', 'CustomFooterController@updateCustomFooter');
