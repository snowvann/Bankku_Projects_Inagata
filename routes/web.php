<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/transactions', function () {
    return view('dashboard.transactions');
})->name('transactions');

Route::get('/accounts', function () {
    return view('dashboard.placeholder', ['title' => 'Accounts']);
})->name('accounts');

Route::get('/investments', function () {
    return view('dashboard.placeholder', ['title' => 'Investments']);
})->name('investments');

Route::get('/credit-cards', function () {
    return view('dashboard.credit-cards');
})->name('credit-cards');

Route::get('/loans', function () {
    return view('loans.index');
})->name('loans');

Route::get('/services', function () {
    return view('dashboard.placeholder', ['title' => 'Services']);
})->name('services');

Route::get('/settings', function () {
    return view('settings.index');
})->name('settings');
