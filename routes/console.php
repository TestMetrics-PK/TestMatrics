<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment('Inspirational quote.');
})->describe('Display an inspirational quote');
