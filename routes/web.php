<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Profiles;
use App\Http\Livewire\Genders;
use App\Http\Livewire\Positions;
use App\Http\Livewire\Divisions;
use App\Http\Livewire\SectionPrograms;
use App\Http\Livewire\Tranches;
use App\Http\Livewire\Salarygrades;
use App\Http\Livewire\Steps;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('profile', Profiles::class)->name('profilez');

Route::get('gender', Genders::class)->name('genderz');

Route::get('position', Positions::class)->name('positionz');

Route::get('division', Divisions::class)->name('divisionz');

Route::get('sectionprogram', SectionPrograms::class)->name('SectionProgramsz');

Route::get('tranche', Tranches::class)->name('tranchez');

Route::get('salarygrade', Salarygrades::class)->name('salarygradez');

Route::get('step', Steps::class)->name('stepz');
