<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;

require __DIR__.'/auth.php';    



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
});



Route::prefix('transaksi')->group(function () {
    Route::get('pdf', [TransaksiController::class, 'generatePDF'])->name('transaksi.pdf');
    Route::get('', function () {
        return view('transaksi');
    })->name('transaksi');
    Route::get('create', function () {
        return view('transaksi/create');
    })->name('transaksi.create');
    Route::get('{id}/edit', function () {
        return view('transaksi/{id}/edit');
    })->name('transaksi.edit');
});

Route::prefix('fish-transactions')->group(function () {
    Route::get('', function () {
        return view('fish-transactions');
    })->name('fish-transactions');
    Route::get('create', function () {
        return view('fish-transactions/create');
    })->name('fish-transactions.create');
    Route::get('{id}/edit', function () {
        return view('fish-transactions/{id}/edit');
    })->name('fish-transactions.edit');
});

Route::prefix('feed-transactions')->group(function () {
    Route::get('', function () {
        return view('feed-transactions');
    })->name('feed-transactions');
    Route::get('create', function () {
        return view('feed-transactions/create');
    })->name('feed-transactions.create');
    Route::get('{id}/edit', function () {
        return view('feed-transactions/{id}/edit');
    })->name('feed-transactions.edit');
});

Route::prefix('medicine-transactions')->group(function () {
    Route::get('', function () {
        return view('medicine-transactions');
    })->name('medicine-transactions');
    Route::get('create', function () {
        return view('medicine-transactions/create');
    })->name('medicine-transactions.create');
    Route::get('{id}/edit', function () {
        return view('medicine-transactions/{id}/edit');
    })->name('medicine-transactions.edit');
});

Route::prefix('other-need-transactions')->group(function () {
    Route::get('', function () {
        return view('other-need-transactions');
    })->name('other-need-transactions');
    Route::get('create', function () {
        return view('other-need-transactions/create');
    })->name('other-need-transactions.create');
    Route::get('{id}/edit', function () {
        return view('other-need-transactions/{id}/edit');
    })->name('other-need-transactions.edit');
});

Route::get('fish-calculator', function () {
    return view('fish-calculator');
})->name('fish-calculator');

Route::get('fish-farm-sampling-calculator', function () {
    return view('fish-farm-sampling-calculator');
})->name('fish-farm-sampling-calculator');

Route::get('hpp', function () {
    return view('hpp');
})->name('hpp');

