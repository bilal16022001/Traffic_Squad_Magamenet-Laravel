<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, "index"])->name("selection");

Route::get('/login/{type}', [LoginController::class, "loginForm"])->name('login.show');
Route::post('/login', [LoginController::class, "login"])->name('login');



Route::get('/logout/{type}', [LoginController::class, "logout"])->name('logout');

Route::group(['middleware' => 'auth:web,police,offense'], function () {
    Route::get('/dashboard', [HomeController::class, "dashboard"])->name('dashboard');
    Route::group(['namespace' => 'Offenses'], function () {

        Route::resource('AllOffenses', 'OffenseController');

        Route::get("Offense/{id}", 'OffenseController@delete')->name("AllOffenses.delete");
        Route::get("offense/generateOffense/{id}", 'OffenseController@generateOffense')->name("AllOffenses.generateOffense");
        Route::get("pay/{id}", 'OffenseController@pay')->name("AllOffenses.pay");

        Route::get("/CompletedOffenses", function () {
            return view("pages.Offenses.CompletedOffenses");
        });
        Route::get("/PendingOffenses", function () {
            return view("pages.Offenses.PendingOffenses");
        });
        Route::get("/ReportOffenses", function () {
            return view("pages.Offenses.ReportOffenses");
        });
        Route::get("/SearchOffenses", function () {
            return view("pages.Offenses.SearchOffenses");
        });


        Route::post("/ReportOffenses", "OffenseController@Reports")->name("AllOffenses.Reports");
        Route::post("/SearchOffenses", "OffenseController@Search")->name("AllOffenses.SearchOffenses");
    });

    Route::group(['namespace' => 'Profile'], function () {
        Route::resource('Profile', 'ProfileController');
    });
});

Route::group(['middleware' => 'auth:web,police'], function () {
    Route::group(['namespace' => 'PoliceStations'], function () {

        Route::resource('PoliceStations', 'PoliceStationController');
    });

    Route::group(['namespace' => 'TrafficPolices'], function () {

        Route::resource('TrafficPolices', 'TrafficPoliceController');
    });

    Route::group(['namespace' => 'TrafficStations'], function () {

        Route::resource('TrafficStations', 'TrafficStationController');
    });

});




Route::group(['middleware' => 'auth:police'], function () {
    Route::get("/police/dashboard", function () {
        return view('dashboard');
    });
});

Route::group(['middleware' => 'auth:offense'], function () {
    Route::get("/offense/dashboard", function () {

        $data['Offenses'] = \App\Models\Offense::all()->where("Phone", auth("offense")->user()->Phone)->count();
        $data['OffensesPnding'] = \App\Models\Offense::all()->where("paidStatut", 0)->where("Phone", auth("offense")->user()->Phone)->count();
        $data['OffensesComplet'] = \App\Models\Offense::all()->where("paidStatut", 1)->where("Phone", auth("offense")->user()->Phone)->count();
        return view('dashboard', compact("data"));
    });
});
