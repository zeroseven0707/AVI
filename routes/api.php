<?php

use App\Http\Controllers\CallbackMidtransController;

Route::post('/midtrans/callback', [CallbackMidtransController::class, 'handleMidtransCallback']);