<div class="container-fluid p-0">
    <div class="sticky-top shadow-sm ">
        <x-app-layout></x-app-layout>
    </div>

    <div class="d-flex h-100">
        <div class="sidebar pt-2     bg-[#0f172a] " style="width:18%">
            @include('layouts.sidebar')
        </div>
        <div class="tab px-2 py-2" style="width: 82%; height:100%">
            <div class="container py-4 justify-content-between d-flex w-100 hover-none">
                <div class="h2 align-top">Blogs</div>
                <div class="add-btn">
                    <a href="{{ url('dashboard/blog/create') }}" class="btn d-flex btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 "width="24" height="24"
                            viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                            <path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4z"></path>
                            <path
                                d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z">
                            </path>
                        </svg> Create New Blog
                    </a>
                </div>

            </div>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
            <table class="table px-2 container w-100 table-striped table-hover table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col"> Blog Title</th>
                        <th scope="col">Excerpt</th>
                        {{-- <th scope="col">Description</th> --}}
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->excerpt }} </td>
                            {{-- <td>{{ $blog->description }}</td> --}}
                            <td>
                                <img src="{{ asset('storage/' . $blog->thumbnail) }}" height="70px" width="70px"
                                    class="">
                            </td>

                            <td>@php
                                $time = $blog->created_at;
                            @endphp
                                {{ $time->diffForHumans() }}</td>
                            <td class="d-flex  py-3">
                                <a href="{{ route('blog.edit', ['id' => $blog->id]) }}">
                                    <button class="btn-sm btn-primary">Edit</button>

                                </a>


                                <button type="button" class="btn-sm ml-2 btn-primary"
                                    style="background-color:orangered " data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-{{ $blog->id }}"
                                    data-bs-whatever="@mdo">View</button>
                                <form action="{{ url('/dashboard/blog/' . $blog->id) }}" class="px-0 ml-1"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-sm btn-danger">Delete</button>
                                </form>
                                <div class="modal fade" id="exampleModal-{{ $blog->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Description</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $blog->description }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger text-dark"
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
            {{ $blogs->links() }}

        </div>

    </div>


</div>
