<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Support\Facades\Auth;

class PlanController
{
    public function index()
    {
        $plans = Plan::all();
        $currentPlan = auth()->user()?->plan;
        return view('layouts.plans', compact('plans', 'currentPlan'));
    }

    public function buy(Plan $plan)
    {
        auth()->user()->update(['plan_id' => $plan->id]);
        return redirect()->back()->with('success', 'Plan updated successfully!');
    }

}
