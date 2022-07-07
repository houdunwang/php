<?php

use Illuminate\Support\Facades\Route;

Route::fallback(
    fn () => file_get_contents(public_path('core/index.html'))
);
