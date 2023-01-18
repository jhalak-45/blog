@extends('layouts.frontend.main')
@php
    $title = 'Jhalak Dhami | Contact';
@endphp

@section('main')
    <div class="container-fluid contact-page">
        <div class="title py-2">
            <h1 class="page-title pb-2">Contact Me</h1>
        </div>
        <div class="contact container py-5 ">
            <div class="row py-4">
                @if (Session::has('success'))
                <div class="d-flex justify-content-end">
                    <div class="alert alert-success col-md-8 col-sm-12 rounded-1 text-center">
                        {{ Session::get('success') }}
                    </div>
                </div>

                @endif
                <div class="col-md-5">
                    <div class="text h2">Let's get Connected!</div>
                    <p class="about-text">
                        {{$contact->info}}
                    </p>
                    <div class="icons">
                        <div class="con">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Name</div>
                            <div class="sub-title">{{$contact->name}}</div>
                            </div>
                        </div>
                        <div class="con">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">Birthplace</div>
                                <div class="sub-title">{{$contact->address}}</div>
                            </div>
                        </div>
                        <div class="con">
                            <i class="fas fa-envelope"></i>
                            <div class="info ">
                                <div class="head">Email</div>
                                <div class="sub-title">
                                    <a href="mailto:{{$contact->email}}">{{$contact->email}} </a>
                                </div>
                            </div>
                        </div>
                        <div class="con">
                            <i class="fab fas fa-github"></i>
                            <div class="info ">
                                <div class="head">Github</div>
                                <div class="sub-title">
                                    <a href="{{$contact->github}}">Jhalak Dhami</a>
                                </div>
                            </div>
                        </div>
                        <div class="con">
                            <i class="fab fas fa-facebook"></i>
                            <div class="info ">
                                <div class="head">Facebook</div>
                                <div class="sub-title">
                                    <a href="{{$contact->facebook}}">Jhalak Dhami</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 h-100">
                    <form method="POST" action="{{ route('contact.store') }}"
                        class="px-3 form shadow-sm  pb-5 bg-white rounded-1 ">
                        @csrf
                        <h4 class="ms py-4" style="text">Message me</h4>
                        <div class="row">
                            <div class="mb-3 form-group col-md-6">
                                <label for="name" class="form-label">Full Name:</label>
                                <input type="text" class="form-control rounded-1 shadow-0 outline-0 @error('name') is-invalid @enderror
                                " id="name" name="name">
                                @error('name')
                                    <div class="error text-danger py-2"><svg xmlns="http://www.w3.org/2000/svg" width="17"
                                            height="17" viewBox="0 0 24 24" style="fill: red;transform: ;msFilter:;">
                                            <path
                                                d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z">
                                            </path>
                                        </svg> {{ $message }}</div>
                                @enderror


                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label for="email" class="form-label">Email Address:</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror rounded-1" id="email" name="email">
                                @error('email')
                                    <div class="error text-danger py-2"><svg xmlns="http://www.w3.org/2000/svg" width="17"
                                            height="17" viewBox="0 0 24 24" style="fill: red;transform: ;msFilter:;">
                                            <path
                                                d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z">
                                            </path>
                                        </svg> {{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group  col-md-6 ">
                                <label for="con" class="form-label">Contact Number:</label>
                                <input type="number" class="form-control rounded-1 @error('contact') is-invalid @enderror" id="con" name="contact">
                                @error('contact')
                                    <div class="error text-danger py-2"><svg xmlns="http://www.w3.org/2000/svg" width="17"
                                            height="17" viewBox="0 0 24 24" style="fill: red;transform: ;msFilter:;">
                                            <path
                                                d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z">
                                            </path>
                                        </svg> {{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror rounded-1" id="address" name="address">
                                @error('address')
                                    <div class="error text-danger py-2"><svg xmlns="http://www.w3.org/2000/svg" width="17"
                                            height="17" viewBox="0 0 24 24" style="fill: red;transform: ;msFilter:;">
                                            <path
                                                d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z">
                                            </path>
                                        </svg> {{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="mb-3 form-group ">
                            <label for="subject" class="form-label">Subject:</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror rounded-1 " id="subject" name="subject">
                            @error('subject')
                                <div class="error text-danger py-2"><svg xmlns="http://www.w3.org/2000/svg" width="17"
                                        height="17" viewBox="0 0 24 24" style="fill: red;transform: ;msFilter:;">
                                        <path
                                            d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z">
                                        </path>
                                    </svg> {{ $message }}</div>
                            @enderror

                        </div>

                        <div class="mb-3 form-group">
                            <label for="message" class="form-label">Message:</label>
                            <textarea name="message" class="form-control rounded-1 @error('message') is-invalid @enderror " rows="4" id="message"></textarea>

                            @error('message')
                                <div class="error text-danger py-2"><svg xmlns="http://www.w3.org/2000/svg" width="17"
                                        height="17" viewBox="0 0 24 24" style="fill: red;transform: ;msFilter:;">
                                        <path
                                            d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z">
                                        </path>
                                    </svg> {{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group py-3">
                            {{-- <a href="{{ route() }}"></a> --}}
                            <button type="submit" class="btn rounded-1 border-0 text-white" name="submit"
                                style="background-color:crimson">Send Message</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
