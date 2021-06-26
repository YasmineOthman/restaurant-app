<?php


use App\Models\Meal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\MealOrderController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ExportReportController;
use App\Http\Controllers\ReportRouteController;

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
//home
Route::get('/lang/{locale}', function ($locale, HttpRequest $request) {
    if (!in_array($locale, ['ar', 'en'])) {

        abort(400);
    }
    App::setLocale($locale);

    $request->session()->put('locale', $locale);
    // dd(Session::get('locale'));

    return redirect()->back();
})->name('locale.toggle');
Route::get('/', [PageController::class, 'home'])->name('home');
//resource
Route::resource('restaurants', RestaurantController::class);
Route::resource('categories', CategoryController::class);
Route::resource('meals', MealController::class);
Route::resource('components', ComponentController::class);
Route::resource('orders', OrderController::class);
Route::resource('tables', TableController::class);
Route::resource('mealorder', MealOrderController::class);
Route::resource('reservations', ReservationController::class);

//functions
Route::get('/order/{id}', [OrderController::class, 'createorder'])->name('res-order.createorder');
Route::get('/table/{id}', [TableController::class, 'createtable'])->name('res-table.createtable');
Route::get('/reservation/{id}', [ReservationController::class, 'createreservation'])->name('res-reservation.createreservation');
Route::post('/mealorder/{id}', [MealOrderController::class, 'storeorder'])->name('meal-order.storeorder');
// Route::post('/tables',[TableController::class,'storetable'])->name('res-table.storetable');
Route::get('/restaurant',[RestaurantController::class,'search'])->name('restaurants.search');
Route::get('/category',[CategoryController::class,'search'])->name('categories.search');
Route::get('/meal',[MealController::class,'search'])->name('meals.search');

Route::get("/chart", [ReportRouteController::class,'blde'])->name('chart');

Route::post("/routef", [ReportRouteController::class,'routef'])->name('routef');


Route::post("/invicechart", [ChartController::class,'InvoicesChart'])->name('invoicechart');

Route::get('importExportView', [ExportReportController::class, 'importExportView']);
Route::get('export', [ExportReportController::class, 'export'])->name('export');
Route::get('/RestaurantByIPLocation', [RestaurantController::class, 'Getlocation'])->name('getbyip');


//dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


























// Route::get('/order/{id}',[OrderController::class,'order'])->name('res-order.order');;

//  Route::get('/order/create', function (Restaurant $restaurant) {
//     // $restaurant = Restautaurant::findOrFail($id);
//     dd('hello');
//     $meals = Meal::all();
//     // $restaurants = Restaurant::all();
//     // $restaurant = Restaurant::where('restaurant_id' , '=' , $id)->get();
//     // $meals = Meal::where('meal_id' , '=' , $meal_id)->get();
//     return view ('order.create',['meals'=>$meals,'restaurant'=>$restaurant]);
    // return view('pages.post', ['post' => $post]);
// });
