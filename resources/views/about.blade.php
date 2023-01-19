@extends('layouts.frontend.main')
@php
    $title = 'Jhalak Dhami | About';
@endphp
@section('main')
    <div class="container-fluid about-page">
        <div class="title py-2">
            <h1 class="page-title pb-2">About Me</h1>

        </div>

        <div class="row mt-3 py-5 px-2">
            <div class="image-section col-md-5 py-3 px-2">
                <img src="{{ asset('storage/uploads/' . $content->image) }}" class="rounded-5 text-center" height="auto" width="100%">
            </div>
            <div class="about-section col-md-7 py-3">
                <h3 class="py-2">Introduction</h3>
                <div class="about-text">
                    {{ $content->about }}
                </div>
                <a href="{{ asset('storage/uploads/'.$content->cv) }}" class="btn   text-white px-4"style="background-color: orangered; font-size:20px; font-family:'Nunito',sans-serif">View CV</a>




            </div>
        </div>


    </div>
@endsection
