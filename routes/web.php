<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('leads.index');
});

Route::resource('leads', LeadController::class);
