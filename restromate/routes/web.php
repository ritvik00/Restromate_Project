<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\WaiterController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\GeneralsettingController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\Offers_ManagementController;
use App\Http\Controllers\SystemUserController;
use App\Http\Controllers\AttributesController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddonsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\FeaturedController;
use App\Http\Controllers\EmailsmtpController;
use App\Http\Controllers\PaymentmethodController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\NotificationController;



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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return view('welcome');
});



Route::post('/registercompany', [RegisterController::class, 'registercompany'])->name('register.company');


Auth::routes();
Route::group(['middleware' => 'auth'], function() {

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/superadmin', [HomeController::class, 'index'])->name('superadmin');
Route::get('/restaurant', [HomeController::class, 'index'])->name('restaurant');
Route::get('/deliveryboy', [HomeController::class, 'index'])->name('deliveryboy');
Route::get('/compnay', [CompanyController::class, 'index'])->name('compnay');


Route::post('updateprofile',[HomeController::class, 'updateprofile'])->name('updateprofile');
Route::get('updateuseredit',[HomeController::class, 'updateuseredit'])->name('updateuseredit');
Route::get('updatepassword',[HomeController::class, 'updatepassword'])->name('updatepassword');
Route::post('chnagepassword_update',[HomeController::class, 'chnagepassword_update'])->name('chnagepassword_update');

Route::get('/compnay/create', [CompanyController::class, 'create'])->name('compnay.create');
Route::post('/compnay/store', [CompanyController::class, 'store'])->name('compnay.store');
Route::get('/compnay/edit/{id}', [CompanyController::class, 'edit'])->name('compnay.edit');
Route::post('/compnay/update', [CompanyController::class, 'update'])->name('compnay.update');
Route::get('/compnay/delete/{id}', [CompanyController::class, 'delete'])->name('compnay.delete');
Route::get('/compnay/active/{id}/{active}', [CompanyController::class, 'active'])->name('compnay.active');



Route::get('/department', [DepartmentController::class, 'index'])->name('department');
Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
Route::post('/department/store', [DepartmentController::class, 'store'])->name('department.store');
Route::get('/department/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
Route::post('/department/update', [DepartmentController::class, 'update'])->name('department.update');
Route::get('/department/delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete');
Route::get('/compnay/active/{id}/{active}', [CompanyController::class, 'active'])->name('compnay.active');


Route::get("/employee",[EmployeeController::class,'index'])->name('employee');
Route::get("/employee/create",[EmployeeController::class,'create'])->name('employee.create');
Route::post("/employee/store",[EmployeeController::class,'store'])->name('employee.store');
Route::get("employee/edit/{id}",[EmployeeController::class,'edit'])->name('employee.edit');
Route::post("employee/update",[EmployeeController::class,'update'])->name('employee.update');
Route::get("employee/delete/{id}",[EmployeeController::class,'delete'])->name('employee.delete');


Route::get("/location",[LocationController::class,'index'])->name('location');
Route::get("/location/create",[LocationController::class,'create'])->name('location.create');
Route::post("/location/store",[LocationController::class,'store'])->name('location.store');
Route::get("/location/delete/{id}",[LocationController::class,'delete'])->name('location.delete');
Route::get("/location/edit/{id}",[LocationController::class,'edit'])->name('location.edit');
Route::post("/location/update",[LocationController::class,'update'])->name('location.update');

Route::get("/Pdf",[PDFController::class,'generateInvoicePDF'])->name('generateInvoicePDF');
Route::get("/Pdfsow",[PDFController::class,'generateInvoicePDFview'])->name('generateInvoicePDFview');

// Route::get ("/permission",[PermissionController::class,'index'])->name('permission');

// Route::post ("/permission",[PermissionController::class,'permission'])->name('permission');


Route::get("/slider",[SliderController::class,'index'])->name('slider');
Route::get("/slider/create",[SliderController::class,'create'])->name('slider.create');
Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
Route::get("/slider/edit/{id}",[SliderController::class,'edit'])->name('slider.edit');
Route::get("/slider/delete/{id}",[SliderController::class,'delete'])->name('slider.delete');


Route::get("/ticket/tickettype",[TicketController::class,'index'])->name('ticket');
Route::get("/ticket/tickettype/create",[TicketController::class,'create'])->name('ticket.create');
Route::post('/ticket/tickettype/store', [TicketController::class, 'store'])->name('ticket.store');
Route::get("/ticket/tickettype/edit/{id}",[TicketController::class,'edit'])->name('ticket.edit');
Route::get("/ticket/tickettype/delete/{id}",[TicketController::class,'delete'])->name('ticket.delete');

Route::get("/ticket/system",[TicketController::class,'system'])->name('ticket.system');
Route::get("/ticket/ticketcreate",[TicketController::class,'ticketcreate'])->name('ticket.ticketcreate');
Route::get('/ticket/cod/{id}/{open}', [TicketController::class, 'cod'])->name('ticket.cod');
Route::get("/ticket/ticketedit/{id}",[TicketController::class,'ticketedit'])->name('ticket.ticketedit');
Route::post("/ticket/ticketstore", [TicketController::class, 'ticketstore'])->name('ticket.ticketstore');
Route::get("/ticket/ticketdelete/{id}",[TicketController::class,'ticketdelete'])->name('ticket.ticketdelete');


Route::get("/promocode",[PromocodeController::class,'index'])->name('promocode');
Route::get("/promocode/create",[PromocodeController::class,'create'])->name('promocode.create');
Route::post('/promocode/store', [PromocodeController::class, 'store'])->name('promocode.store');
Route::get("/promocode/edit/{id}",[PromocodeController::class,'edit'])->name('promocode.edit');
Route::get("/promocode/delete/{id}",[PromocodeController::class,'delete'])->name('promocode.delete');
Route::get('/promocode/active/{id}/{active}', [PromocodeController::class, 'active'])->name('promocode.active');


Route::get("/waiter",[WaiterController::class,'index'])->name('waiter');
Route::get("/waiter/create",[WaiterController::class,'create'])->name('waiter.create');
Route::post('/waiter/store', [WaiterController::class, 'store'])->name('waiter.store');
Route::get("/waiter/edit/{id}",[WaiterController::class,'edit'])->name('waiter.edit');
Route::get("/waiter/delete/{id}",[WaiterController::class,'delete'])->name('waiter.delete');
Route::get('/waiter/active/{id}/{active}', [WaiterController::class, 'active'])->name('waiter.active');


Route::get("/faq",[FaqController::class,'index'])->name('faq');
Route::get("/faq/create",[FaqController::class,'create'])->name('faq.create');
Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
Route::get("/faq/edit/{id}",[FaqController::class,'edit'])->name('faq.edit');
Route::get("/faq/delete/{id}",[FaqController::class,'delete'])->name('faq.delete');


Route::get("/cms",[CmsController::class,'index'])->name('cms');
Route::get("/cms/create",[CmsController::class,'create'])->name('cms.create');
Route::post('/cms/store', [CmsController::class, 'store'])->name('cms.store');
Route::get("/cms/edit/{id}",[CmsController::class,'edit'])->name('cms.edit');
Route::get("/cms/delete/{id}",[CmsController::class,'delete'])->name('cms.delete');
Route::get('/cms/active/{id}/{active}', [CmsController::class, 'active'])->name('cms.active');


Route::get("/generalsetting",[GeneralsettingController::class,'index'])->name('generalsetting');
Route::get("/generalsetting/create",[GeneralsettingController::class,'create'])->name('generalsetting.create');
Route::post('/generalsetting/store', [GeneralsettingController::class, 'store'])->name('generalsetting.store');


Route::get("/firebase",[FirebaseController::class,'index'])->name('firebase');
Route::post('/firebase/store', [FirebaseController::class, 'store'])->name('firebase.store');


Route::get("/offer",[Offers_ManagementController::class,'index'])->name('offer');
Route::get("/offer/create",[Offers_ManagementController::class,'create'])->name('offer.create');
Route::post('/offer/store', [Offers_ManagementController::class, 'store'])->name('offer.store');
Route::get("/offer/edit/{id}",[Offers_ManagementController::class,'edit'])->name('offer.edit');
Route::get("/offer/delete/{id}",[Offers_ManagementController::class,'delete'])->name('offer.delete');
Route::get('/offer/active/{id}/{active}', [Offers_ManagementController::class, 'active'])->name('offer.active');


Route::get ("/role",[PermissionController::class,'role'])->name('role');
Route::get ("/permission/{id}",[PermissionController::class,'index'])->name('permission');
Route::post ("/permissionadd",[PermissionController::class,'permissionadd'])->name('permissionadd');
Route::get ("/accessdenied",[PermissionController::class,'accessdenied'])->name('accessdenied');


Route::get ("/systemuser",[SystemUserController::class,'index'])->name('systemuser');
Route::get("/systemuser/create",[SystemUserController::class,'create'])->name('systemuser.create');
Route::get("/systemuser/edit/{id}",[SystemUserController::class,'edit'])->name('systemuser.edit');
Route::post('/systemuser/store', [SystemUserController::class, 'store'])->name('systemuser.store');
Route::get("/systemuser/delete/{id}",[SystemUserController::class,'delete'])->name('systemuser.delete');


Route::get("/category",[CategoryController::class,'index'])->name('category');
Route::get("/category/create",[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get("/category/edit/{id}",[CategoryController::class,'edit'])->name('category.edit');
Route::get("/category/delete/{id}",[CategoryController::class,'delete'])->name('category.delete');
Route::get('/category/active/{id}/{active}', [CategoryController::class, 'active'])->name('category.active');


Route::get("/attributes",[AttributesController::class,'index'])->name('attributes');
Route::get("/attributes/create",[AttributesController::class,'create'])->name('attributes.create');
Route::post('/attributes/store', [AttributesController::class, 'store'])->name('attributes.store');
Route::get("/attributes/edit/{id}",[AttributesController::class,'edit'])->name('attributes.edit');
Route::get("/attributes/delete/{id}",[AttributesController::class,'delete'])->name('attributes.delete');
Route::get('/attributes/active/{id}/{active}', [AttributesController::class, 'active'])->name('attributes.active');


Route::get("/tax",[TaxController::class,'index'])->name('tax');
Route::get("/tax/create",[TaxController::class,'create'])->name('tax.create');
Route::post('/tax/store', [TaxController::class, 'store'])->name('tax.store');
Route::get("/tax/edit/{id}",[TaxController::class,'edit'])->name('tax.edit');
Route::get("/tax/delete/{id}",[TaxController::class,'delete'])->name('tax.delete');
Route::get('/tax/active/{id}/{active}', [TaxController::class, 'active'])->name('tax.active');



Route::get("/addons",[AddonsController::class,'index'])->name('addons');
Route::get("/addons/create",[AddonsController::class,'create'])->name('addons.create');
Route::post('/addons/store', [AddonsController::class, 'store'])->name('addons.store');
Route::get("/addons/edit/{id}",[AddonsController::class,'edit'])->name('addons.edit');
Route::get("/addons/delete/{id}",[AddonsController::class,'delete'])->name('addons.delete');
Route::get('/addons/active/{id}/{active}', [AddonsController::class, 'active'])->name('addons.active');



Route::get("/product",[ProductController::class,'index'])->name('product');
Route::get("/product/create",[ProductController::class,'create'])->name('product.create');
Route::get("/product/edit/{id}",[ProductController::class,'edit'])->name('product.edit');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get("/product/delete/{id}",[ProductController::class,'delete'])->name('product.delete');
Route::get('/product/active/{id}/{active}', [ProductController::class, 'active'])->name('product.active');
Route::get('/product/cod/{id}/{on}', [ProductController::class, 'cod'])->name('product.cod');
Route::get('/product/cancelable/{id}/{on}', [ProductController::class, 'cancelable'])->name('product.cancelable');


Route::get("/tag",[TagController::class,'index'])->name('tag');
Route::get("/tag/create",[TagController::class,'create'])->name('tag.create');
Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');
Route::get("/tag/edit/{id}",[TagController::class,'edit'])->name('tag.edit');
Route::get("/tag/delete/{id}",[TagController::class,'delete'])->name('tag.delete');
Route::get('/tag/active/{id}/{active}', [TagController::class, 'active'])->name('tag.active');


Route::get("/featured",[FeaturedController::class,'index'])->name('featured');
Route::get("/featured/create",[FeaturedController::class,'create'])->name('featured.create');
Route::get("/featured/edit/{id}",[FeaturedController::class,'edit'])->name('featured.edit');
Route::post('/featured/store', [FeaturedController::class, 'store'])->name('featured.store');
Route::get("/featured/delete/{id}",[FeaturedController::class,'delete'])->name('featured.delete');
Route::get('/featured/active/{id}/{active}', [FeaturedController::class, 'active'])->name('featured.active');


Route::get("/emailsmtp",[EmailsmtpController::class,'index'])->name('emailsmtp');
Route::post('/emailsmtp/store', [EmailsmtpController::class, 'store'])->name('emailsmtp.store');


Route::get("/paymentmethod",[PaymentmethodController::class,'index'])->name('paymentmethod');
Route::post('/paymentmethod/store', [PaymentmethodController::class, 'store'])->name('paymentmethod.store');

Route::get("/partner",[PartnerController::class,'index'])->name('partner');
Route::get("/partner/create",[PartnerController::class,'create'])->name('partner.create');
Route::get("/partner/edit/{id}",[PartnerController::class,'edit'])->name('partner.edit');
Route::post('/partner/store', [PartnerController::class, 'store'])->name('partner.store');
Route::get("/partner/delete/{id}",[PartnerController::class,'delete'])->name('partner.delete');
Route::get('/partner/active/{id}/{active}', [PartnerController::class, 'active'])->name('partner.active');
Route::get('/partner/approved/{id}/{approved}', [PartnerController::class, 'approved'])->name('partner.approved');


Route::get ("/rider",[RiderController::class,'index'])->name('rider');
Route::get("/rider/create",[RiderController::class,'create'])->name('rider.create');
Route::get("/rider/edit/{id}",[RiderController::class,'edit'])->name('rider.edit');
Route::post('/rider/store', [RiderController::class, 'store'])->name('rider.store');
Route::get("/rider/delete/{id}",[RiderController::class,'delete'])->name('rider.delete');

Route::get("/notification",[NotificationController::class,'index'])->name('notification');
Route::get("/notification/create",[NotificationController::class,'create'])->name('notification.create');
Route::post('/notification/store', [NotificationController::class, 'store'])->name('notification.store');
Route::get("/notification/edit/{id}",[NotificationController::class,'edit'])->name('notification.edit');
Route::get("/notification/delete/{id}",[NotificationController::class,'delete'])->name('notification.delete');

});