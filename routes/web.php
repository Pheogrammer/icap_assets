<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Users Management
Route::get('users', [HomeController::class, 'users'])->name('users');
Route::get('registerNewUser', [HomeController::class, 'registerNewUser'])->name('registerNewUser');
Route::post('saveregisteredUser', [HomeController::class, 'saveregisteredUser'])->name('saveregisteredUser');

// Assets Management
Route::get('assets', [HomeController::class, 'assets'])->name('assets');
Route::get('registerNewAsset', [HomeController::class, 'registerNewAsset'])->name('registerNewAsset');
Route::post('saveregisteredAsset', [HomeController::class, 'saveregisteredAsset'])->name('saveregisteredAsset');
Route::get('editAsset/{id}', [HomeController::class, 'editAsset'])->name('editAsset');
Route::post('updateAsset', [HomeController::class, 'updateAsset'])->name('updateAsset');
Route::get('deleteAsset/{id}', [HomeController::class, 'deleteAsset'])->name('deleteAsset');

Route::get('deletedAssets', [HomeController::class, 'deletedAssets'])->name('deletedAssets');
Route::get('activateAsset/{id}', [HomeController::class, 'activateAsset'])->name('activateAsset');

// Reports
Route::get('reports', [HomeController::class, 'reports'])->name('reports');
Route::get('generateRegisteredAssetsReport', [HomeController::class, 'generateRegisteredAssetsReport'])->name('generateRegisteredAssetsReport');
Route::get('generateDeletedAssetsReport', [HomeController::class, 'generateDeletedAssetsReport'])->name('generateDeletedAssetsReport');
Route::get('generateAllAssetsReport', [HomeController::class, 'generateAllAssetsReport'])->name('generateAllAssetsReport');
Route::get('generateAssetsByKindReport', [HomeController::class, 'generateAssetsByKindReport'])->name('generateAssetsByKindReport');
Route::get('generateAssetsByStatusReport', [HomeController::class, 'generateAssetsByStatusReport'])->name('generateAssetsByStatusReport');
Route::get('generateUsersReport', [HomeController::class, 'generateUsersReport'])->name('generateUsersReport');
