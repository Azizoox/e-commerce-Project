<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//home
Route::get('/',[HomeController::class,'index']);
route::get('/home',[HomeController::class,'home']);
Route::get('/product',[HomeController::class,'product']);
Route::get('/product_details/{id}',[HomeController::class,'ProductDetails']);
Route::post('add_tocart/{id}',[HomeController::class,'add_cart']);
Route::get('/cart',[HomeController::class,'Cart']);
Route::delete('/cart_delte/{id}',[HomeController::class,'DeleteCart'])->name('cart.destroy');
Route::post('/orders', [HomeController::class, 'ConfirmOrders']);
Route::get('/myorders',[HomeController::class, 'myorders']);




// all product route
route::get('/admin/add_product',[AdminController::class,'AddProduct']);
route::post('/admin/store_product',[AdminController::class,'StoreProduct']);
Route::get('/admin/products', [AdminController::class, 'ShowProducts'])->name('admin.products');
route::delete('/admin/delete_product/{id}',[AdminController::class,'DeleteProduct']);
route::get('/admin/edit_product/{id}',[AdminController::class,'EditProduct']);
Route::put('/admin/update_product/{id}', [AdminController::class, 'UpdateProduct']);
route::post('/admin/SearchProduct',[AdminController::class,'SearchProduct']);



// all category route
route::get('/admin/categorie',[AdminController::class,'categorie']);
route::post('/admin/add_categorie',[AdminController::class,'AddCategorie']);
Route::post('/admin/delete_categorie/{id}', [AdminController::class, 'DeleteCategorie']);
route::get('/admin/edit_categorie/{id}',[AdminController::class,'EditCategorie']);
route::post('/admin/update_categorie/{id}',[AdminController::class,'UpdateCategorie']);
route::get('/admin/orders',[AdminController::class,'ShowOrders']);
route::post('orders/accpted/{id}',[AdminController::class,'Orders_Accept']);
route::post('/orders/refused/{id}',[AdminController::class,'Orders_Refused']);
route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);









Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
