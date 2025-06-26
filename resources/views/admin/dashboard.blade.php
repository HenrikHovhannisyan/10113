@extends('layouts.app')

@section('content')
<div class="container admin_controler mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="text-center mb-5">
                <h1>Welcome, Admin-panel!</h1>
                <p class="lead text-muted">Here you can manage your website settings.</p>
            </div>

            <div class="card shadow-sm mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-1">Users</h5>
                        <p class="card-text fs-4">{{ $usersCount ?? 0 }}</p>
                    </div>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">
                        View Users
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>            

            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-1">Plans</h5>
                        <p class="card-text fs-4">{{ $plansCount ?? 0 }}</p>
                    </div>
                    <a href="{{ route('plans.index') }}" class="btn btn-primary">
                        View Plans
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
