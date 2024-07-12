@extends('tablar::page')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xxxl">
        <div class="row g-2 align-items-center">
            <div>
                <!-- Page pre-title -->
                <h2 class="page-title">
                    {{ __('Dashboard: ') }}
                </h2>
            </div>
            <!-- Page title actions -->
            <livewire:dashboard />
        </div>
    </div>
</div>
@endsection
