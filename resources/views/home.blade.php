@extends('templates/header')
@section('title', 'Inventory')
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome To Page Inventory Monitoring Data
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('templates/footer')
