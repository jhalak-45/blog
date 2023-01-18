@extends('layouts.frontend.main')
@php
    $title = 'Jhalak Dhami | Blog';
@endphp

@section('main')
    <div class="container-fluid blog-page">
        <div class="title py-2">
            <h1 class="page-title pb-2">Projects</h1>
        </div>
        <div class="blogs d-flex flex-wrap justify-content-around  py-4">
            @foreach ($projects as $project)
                <div class="card blog">
                    <div class="image" style="height: 250px">
                        <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" height="100%">

                    </div>
                    <div class="card-body">
                        <div>
                            <span class="text-muted py-2"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" viewBox="0 0 24 24" style="fill: rgb(74, 74, 74);transform: ;msFilter:;">
                                    <path
                                        d="M19 4h-3V2h-2v2h-4V2H8v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM5 20V7h14V6l.002 14H5z">
                                    </path>
                                    <path
                                        d="m15.628 12.183-1.8-1.799 1.37-1.371 1.8 1.799zm-7.623 4.018V18h1.799l4.976-4.97-1.799-1.799z">
                                    </path>
                                </svg>
                                @php
                                    $time = $project->created_at;
                                @endphp
                                {{ $time->diffForHumans() }}
                            </span>
                        </div>
                        <h5 class="card-title pt-2">
                            <a href="{{ route('project.view', ['id' => $project->id]) }}" class="py-4  text-gray-700"
                                style="text-decoration: none">
                                {{ $project->name }}
                            </a>

                        </h5>




                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
