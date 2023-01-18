@extends('layouts.frontend.main')
@php
    $title = 'Jhalak Dhami | Services';
@endphp
@section('main')
    <div class="container-fluid service-page">
        <div class="title py-2">
            <h1 class="page-title pb-2">Services</h1>
        </div>
        <div class="services py-5">
            @foreach ($services as $service )

            <div class="card service">
                <div class="text-center">
                    <img src="{{asset('storage/'.$service->image)}}"
                        class="rounded-circle p-2" height="280px" width="280px">

                </div>
                <div class="card-body">
                    <h5 class="card-title">{{    $service->name}}</h5>
                </div>
            </div>
            @endforeach


        </div>

    </div>

@endsection
