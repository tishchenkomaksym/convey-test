@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Choose Your Plan</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($plans as $plan)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $plan->plan_name }}</h5>
                            <h6>${{ $plan->price }}</h6>
                            <ul class="list-unstyled flex-grow-1">
                                @foreach($plan->features as $featureKey => $featureValue)
                                    <li><strong>{{ $featureKey }}</strong>: {{ $featureValue }}</li>
                                @endforeach
                            </ul>
                            <form method="POST" action="{{ url('/plans/buy/' . $plan->id) }}">
                                @csrf
                                <button class="btn btn-primary w-100 mt-auto">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($currentPlan)
            <div class="mt-5 p-4 bg-light border rounded">
                <h4>Your Current Plan</h4>
                <p><strong>{{ $currentPlan->plan_name }}</strong> – ${{ $currentPlan->price }}</p>
                <ul>
                    @foreach($currentPlan->features as $key => $value)
                        <li><strong>{{ is_numeric($key) ? $value : $key }}</strong>{{ is_numeric($key) ? '' : ": $value" }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
@endsection
