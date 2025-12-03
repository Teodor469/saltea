<?php

use App\Livewire\Product\AddProduct;
use App\Livewire\Product\EditProduct;
use App\Livewire\AddUser;
use App\Livewire\Product\ListProduct;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/language/{locale}', function ($locale) {
    Log::debug('Language switch requested', ['locale' => $locale]);
    
    if (in_array($locale, ['en', 'bg'])) {
        session(['locale' => $locale]);
        Log::debug('Language switched and stored in session', [
            'locale' => $locale,
            'session_locale' => session('locale')
        ]);
    } else {
        Log::debug('Invalid locale requested', ['locale' => $locale]);
    }
    
    return redirect()->back();
})->name('language.switch');

Route::middleware(['admin', 'auth', 'verified'])->group(function() {
    Route::view('admin/dashboard', 'dashboard')->name('admin.dashboard');
    
    Route::get('admin/add-product', AddProduct::class)->name('admin.add_product');
    Route::get('admin/list-products', ListProduct::class)->name('admin.list_products');
    Route::get('admin/edit-product/{product}', EditProduct::class)->name('admin.edit_product');

    Route::get('admin/add-user', AddUser::class)->name('admin.add_user');
    Route::get('admin/list-users', AddUser::class)->name('admin.list_users');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
