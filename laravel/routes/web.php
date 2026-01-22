<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('product')->group(function () {
    Route::get('/', function () {
        return view('product.index');
    })->name('product.index');

    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    Route::get('/{id?}', function ($id = '123') {
        return view('product.detail', ['id' => $id]);
    })->where('id', '.*')->name('product.detail');
});

Route::get('/sinhvien/{name?}/{mssv?}', function ($name = 'Dao Tung Lam', $mssv = '0157767') {
    return "Thông tin giới thiệu của sinh viên làm bài: $name, MSSV: $mssv";
});

Route::get('/banco/{n}', function ($n) {
    return view('banco', ['n' => $n]);
});

app('router')->fallback(function () {
    return response()->view('errors.404', [], 404);
});
