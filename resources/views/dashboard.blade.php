<div class="container-fluid p-0">
    <div class="sticky-top shadow-sm ">
        <x-app-layout></x-app-layout>
    </div>

    <div class="d-flex">

        <div class="sidebar pt-2     bg-[#0f172a] " style="width:18%">
            @include('layouts.sidebar')
        </div>
        <div class="tab px-2 py-2" style="width: 82%; height:100%">
            <div class="shadow-lg d-flex py-3 flex-wrap justify-content-center ">


                <div class="m-2 text-center hover:bg-[#0f172a]  hover:text-white shadow border-1 rounded-1"
                    style="width: 12rem; height:12.3rem; ">
                    <i class="bx bxs-detail text-orange-500 py-2" style="font-size: 100px "></i>
                    <div class="py-2 card-body border-gray-900">
                        <h6 class="h6 card-title">Projects</h6>
                        <p class="card-text h3 text-gray-600">{{   $total_projects }}+</p>
                    </div>
                </div>
                <div class="m-2 text-center shadow hover:bg-[#0f172a]  hover:text-white border-1 rounded-1"
                    style="width: 12rem; height:12.3rem; ">
                    <i class="bx bxl-blogger text-red-600 py-2" style="font-size: 100px "></i>
                    <div class="py-2 card-body border-gray-900">
                        <h6 class="h6 card-title">Blogs</h6>
                        <p class="card-text h3 text-gray-600">{{$blogs}}+</p>
                    </div>
                </div>
                <div class="m-2 text-center hover:bg-[#0f172a]  hover:text-white shadow border-1 rounded-1"
                    style="width: 12rem; height:12.3rem; ">
                    <i class="bx bxs-contact text-orange-500 py-2" style="font-size: 100px "></i>
                    <div class="py-2 card-body border-gray-900">
                        <h6 class="h6 card-title">Contact</h6>
                        <p class="card-text h3 text-gray-600">{{$contacts->total()    }}+</p>
                    </div>
                </div>
                <div class="m-2 text-center shadow hover:bg-[#121b30]  hover:text-white border-1 rounded-1"
                    style="width: 12rem; height:12.3rem; ">
                    <i class="bx bxs-bar-chart-alt-2 text-red-600 py-2" style="font-size: 100px "></i>
                    <div class="py-2 card-body border-gray-900">
                        <h6 class="h6 card-title">Services</h6>
                        <p class="card-text h3 text-gray-600">{{    $total_services}}+</p>
                    </div>
                </div>
            </div>
            <div class="contacts border-1 rounded-0 container mt-4 px-2 py-2 shadow-lg" style="width:100%">
                <h3 class="h3 py-2 card-header ">Contact Details </h3>
                <table class="table w-100 table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>

                                <th scope="row">{{ $contact->id }}</th>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->address }}</td>
                                <td>{{ $contact->contact }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>@php
                                    $time = $contact->created_at;
                                @endphp
                                {{ $time->diffForHumans() }}</td>
                                <td class="d-flex py-3">
                                    <form action="{{ url('/dashboard') . '/' . $contact->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-sm btn-danger">delete</button>

                                    </form>
                                    <button type="button" class="btn-sm ml-2 btn-primary bg-blue-500"  data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop-{{ $contact->id }}">
                                        view
                                    </button>
                                    <div class="modal fade" id="staticBackdrop-{{ $contact->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Message
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-dark ">
                                                        {{ $contact->message }}
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn text-dark btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $contacts->links() }}
            </div>

        </div>

    </div>


</div>
