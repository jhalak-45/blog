@extends('layouts.frontend.main')
@section('main')
    @php
        // $bt = {{ $blog->title }};
        $title = 'Jhalak Dhami ';
    @endphp
    <div class="container py-5  px-2">
        <h1 class="py-3 mt-2"><i class="fa fa-book" aria-hidden="true"></i> {{ $blog->title }}
        </h1>
        <img src="{{ asset('storage/' . $blog->thumbnail) }}" width="100%">
        <div class="details py-3" style="font-family: 'Nunito',sans-serif; font-size:18px; line-height:28px;word-spacing:4px;">
            {!! $blog->description !!}
        </div>
        <div class="date mt-3 py-2  bg-slate-700">
            <i class="fa fa-clock" aria-hidden="true"></i> {{ $blog->created_at }}</div>

    </div>
@endsection
