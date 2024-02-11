<?php

use Tabuna\Breadcrumbs\Trail;
use App\Http\Livewire\Backend\ImageLibrary;
use App\Http\Controllers\Backend\DashboardController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

Route::get('/image-library', [ImageLibrary::class, 'index'])->name('imageLibrary');
