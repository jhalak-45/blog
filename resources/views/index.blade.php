@extends('layouts.frontend.main')
@section('main')
    @php
        $title = 'Jhalak Dhami';
    @endphp
    <div class="container-fluid   p-0">
        <div class="front-page w-100">
            <div id="particles-js"></div>

            <div class="row py-5 h-auto ">
                <div class="col-md-6 ">
                    <div class="information-frontpage">

                        <h1>
                            <a href="" class="nav-link name typewrite" data-period="2000"
                                data-type='[ "Hi,I am  Jhalak." ]'>
                                <span class="wrap"></span>
                            </a>
                        </h1>
                        <h5 class="post px-2 text-muted">
                            <a href="" class="nav-link  typewrite" data-period="2000"
                                data-type='[ "Student | Web Developer" ]'>
                                <span class="wrap"></span>
                            </a>
                        </h5>
                        <div class="social-links py-4 text1">
                            <ul class="links px-0">
                                <li class="">
                                    <a href="mailto:{{ $contact->email }} ">
                                        <i class='bx bx-envelope'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $contact->facebook }} ">
                                        <i class='bx bxl-facebook-circle'></i> </a>
                                </li>
                                <li>
                                    <a href="{{ $contact->github }} ">
                                        <i class='bx bxl-github'></i> </a>
                                </li>
                            </ul>
                            <a href="{{ url('/contact') }}" class="btn mt-5 px-2 ml-2 text-white "
                                style="background-color: crimson; font-size:20px; font-family:'ubuntu',sans-serif"> Contact
                                me!</a>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 ">
                    <div class="image d-flex justi-content-center">
                        <img  src="{{ asset('storage/uploads/' . $data->homepage_image) }}">

                    </div>

                </div>
            </div>

        </div>
        <section class="services service-page py-2">
            <div class="title py-2">
                <h1 class="page-title pb-2">Services</h1>
            </div>
            <div class="services py-5">
                @foreach ($services as $service)
                    <div class="card service">
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $service->image) }}" class="rounded-circle p-2" height="280px"
                                width="280px">

                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->name }}</h5>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="view-all d-flex justify-content-end px-5  py-2">
                <a class="btn rounded-1  text-white text-center"
                    style="background-color:orangered;"href="{{ url('/services') }}">
                    <i class='bx bxs-chevrons-right'></i></a>
                </a>
            </div>
        </section>
        <section class="projects blog-page py-3">
            <div class="title py-2">
                <h2 class="page-title pb-2">Projects</h2>
            </div>
            <div class="blogs d-flex  flex-wrap justify-content-around  py-4">
                @foreach ($projects as $project)
                    <div class="card blog">
                        <div class="image" style="height: 250px">
                            <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" height="100%">

                        </div>
                        <div class="card-body">
                            <span class="text-muted py-2"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" viewBox="0 0 24 24" style="fill: rgb(67, 65, 65);transform: ;msFilter:;">
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
                            <h5 class="card-title py-3">
                                <a href="{{ route('project.view', ['id' => $project->id]) }}" class=" mt-3" style="text-decoration: none">
                                    {{ $project->name }}
                                </a>
                            </h5>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="view-all d-flex justify-content-end px-5 py-2">
                <a class="btn  text-white  rounded-1  text-center"
                    style="background-color:orangered;"href="{{ url('/projects') }}">
                    <i class='bx bxs-chevrons-right'></i></a>
                </a>
            </div>
        </section>

        <section class="blogs blog-page ">
            <div class="title py-2">
                <h1 class="page-title pb-2">Blogs</h1>
            </div>
            <div class="blogs  d-flex flex-wrap justify-content-around  py-4">
                @foreach ($blogs as $blog)
                    <div class="card blog">
                        <div class="image" style="height: 250px">
                            <img src="{{ asset('storage/' . $blog->thumbnail) }}" class="card-img-top" height="100%">

                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a
                                    style="text-decoration:none;"href="{{ route('blog.view', ['id' => $blog->id]) }}">{{ $blog->title }}</a>
                            </h5>
                            <span class="text-muted py-2"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" style="fill: rgb(74, 74, 74);transform: ;msFilter:;">
                                    <path
                                        d="M19 4h-3V2h-2v2h-4V2H8v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM5 20V7h14V6l.002 14H5z">
                                    </path>
                                    <path
                                        d="m15.628 12.183-1.8-1.799 1.37-1.371 1.8 1.799zm-7.623 4.018V18h1.799l4.976-4.97-1.799-1.799z">
                                    </path>
                                </svg>
                                @php
                                    $time = $blog->created_at;
                                @endphp
                                {{ $time->diffForHumans() }} </span>
                            <p class="card-text">
                                {{ $blog->excerpt }}
                            </p>
                            {{-- <a href="{{ route('blog.view', ['id' => $blog->id]) }}" class="btn btn-primary mt-3">Read
                                more</a> --}}
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="view-all d-flex justify-content-end px-5 py-2">
                <a class="btn rounded-1  text-white  text-center"
                    style="background-color:orangered;"href="{{ url('/blog') }}">
                    <i class='bx bxs-chevrons-right'></i></a>
            </div>
        </section>
    </div>
@endsection
