@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Welcome to EMS! 👋</h1>
        <p class="lead">Logged in as: <strong>{{ Auth::user()->name }}</strong></p>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">🏢 Departments</h5>
                <a href="{{ route('departments.index') }}" class="btn btn-primary mt-3">Manage</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">👥 Employees</h5>
                <a href="{{ route('employees.index') }}" class="btn btn-primary mt-3">Manage</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">💰 Salaries</h5>
                <a href="{{ route('salaries.index') }}" class="btn btn-primary mt-3">Manage</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">📊 Reports</h5>
                <a href="{{ route('reports.index') }}" class="btn btn-primary mt-3">View</a>
            </div>
        </div>
    </div>
</div>
@endsection
