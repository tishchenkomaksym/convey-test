<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController
{
    public function index(): View|Factory
    {
        $domains = auth()->user()?->domains()->latest()->get();
        return view('layouts.dashboard', compact('domains'));
    }
}
