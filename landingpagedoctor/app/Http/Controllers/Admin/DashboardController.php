<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentBlock;
use App\Models\Promotion;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'serviceCount' => Service::count(),
            'promotionCount' => Promotion::count(),
            'contentBlockCount' => ContentBlock::count(),
        ]);
    }
}
