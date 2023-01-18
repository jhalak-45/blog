@extends('layouts.frontend.main')
@section('main')
    @php
        // $bt = {{ $blog->title }};
        $title = 'Jhalak Dhami ';
    @endphp
    <div class="container py-5  px-2">
        <h1 class="py-3 mt-2"><i class="fa fa-book" aria-hidden="true"></i> {{ $project->name }}
        </h1>
        <a href="{{ $project->url }}" class="btn btn-primary">
            Visit

        </a>
        <div class="details py-3"
            style="font-family: 'Nunito',sans-serif; font-size:18px; line-height:28px;word-spacing:4px;">
            {!! $project->description !!}
        </div>
        <div class="date mt-3 py-2  bg-slate-700">
            <i class="fa fa-clock" aria-hidden="true"></i>

            @php
                $data = $project->created_at;
            @endphp
            {{ $data->diffForHumans() }}
        </div>

    </div>
@endsection
