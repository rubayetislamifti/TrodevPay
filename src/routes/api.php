<?php

use Illuminate\Support\Facades\Route;
use TrodevIT\Trodevpay\Http\Controllers\PaymentController;

Route::get('/tropay/bkash/grant-token', [PaymentController::class, 'grantToken'])
    ->name('tropay.grant-token');
