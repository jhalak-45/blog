<div class="container-fluid p-0">
    <div class="sticky-top shadow-sm ">
        <x-app-layout></x-app-layout>
    </div>

    <div class="d-flex ">
        <div class="sidebar pt-2     bg-[#0f172a] " style="width:18%">
            @include('layouts.sidebar')
        </div>
        <div class="tab px-2 py-2" style="width: 82%; height:100%">
            <div class="container py-4 justify-content-between d-flex w-100 hover-none">
                <div class="h2 align-top">Projects</div>
                <div class="add-btn">
                    <a href="{{ url('dashboard/projects/create') }}" class="btn d-flex btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 "width="24" height="24"
                            viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                            <path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4z"></path>
                            <path
                                d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z">
                            </path>
                        </svg>
                        Create New Project
                    </a>
                </div>

            </div>
            <div class="container border-1 h-auto rounded-2 px-0 py-3 bg-light">
                @if (Session::has('success'))
                    <div class="alert alert-success mx-2 alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <table class="table table-striped  h-auto table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Project Name</th>
                        <th>Image</th>
                        <th>URL</th>

                        <th>Created Time</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{  $project->id}}</td>
                                <td>{{  $project->name}}</td>

                                <td>
                                    <img src="{{ asset('storage/'.$project->image  ) }}" height="70px" width="70px">
                                </td>
                                <td>{{  $project->url}}</td>

                                <td>@php
                                    $time = $project->created_at;
                                @endphp
                                {{ $time->diffForHumans() }}</td>
                                <td class="d-flex  py-3">
                                    <a  href="{{route('project.edit',['id'=>$project->id])    }}"class="btn-sm btn-primary">Edit</a>


                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn-sm text-white bg-secondary ml-2"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal-{{$project->id}}">
                                        View </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{$project->id}}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Description
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{  $project->description}}


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-danger"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ url('/dashboard/projects/' . $project->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn-sm btn-danger ml-2">Delete</button>

                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $projects->links() }}
            </div>


        </div>

    </div>


</div>
