<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MaintenanceController extends Controller
{
    public function index()
    {
        Artisan::call("optimize");
        Artisan::call("config:clear");
        Artisan::call("migrate");
        Artisan::call("db:seed");
    }
}
