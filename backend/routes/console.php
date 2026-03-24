<?php

use App\Models\UrlModel;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {
    UrlModel::deleteExpired();
})->daily()->name('delete-expired-urls');
