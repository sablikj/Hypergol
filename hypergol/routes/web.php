<?php

use App\Http\Controllers\LaunchController;
use App\Models\Launch;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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

Route::get('/', function () {
    $launch = Launch::whereDate('launch_date', '>=', Carbon::now('Europe/Prague'))->orderBy('launch_date', 'asc')->take(1)->get();
    $upcoming = Launch::whereDate('launch_date', '>=', Carbon::now('Europe/Prague'))->orderBy('launch_date', 'asc')->take(5)->get();
    return view('welcome')->with('launch', $launch)->with('upcoming', $upcoming);
});

Route::resource('/launches', LaunchController::class);

Route::get('/dashboard', function () {
    $allLaunches = Launch::all();
    return view('dashboard', ['allLaunches' => $allLaunches])->with('i');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
