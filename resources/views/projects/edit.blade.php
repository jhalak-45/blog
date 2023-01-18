<div class="container-fluid p-0">
    <div class="sticky-top shadow-sm ">
        <x-app-layout></x-app-layout>
    </div>

    <div class="d-flex">
        <div class="sidebar pt-2     bg-[#0f172a] " style="width:18%">
            @include('layouts.sidebar')
        </div>
        <div class="tab px-2 py-2" style="width: 82%; height:100%">
            <div class="container py-4  justify-content-between d-flex w-100 hover-none">
                <div class="h2 align-top text-capitalize">Update Project</div>
                <div class="add-btn">
                    <a href="{{ route('project.index') }}" class="btn btn-primary d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2"width="24" height="24"
                            viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                            <path
                                d="M11.999 1.993C6.486 1.994 2 6.48 1.999 11.994c0 5.514 4.486 10 10.001 10 5.514-.001 10-4.487 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8 .001-4.411 3.59-8 8-8.001C16.411 3.994 20 7.583 20 11.994c0 4.41-3.589 7.999-8 8z">
                            </path>
                            <path d="m12.012 7.989-4.005 4.005 4.005 4.004v-3.004h3.994v-2h-3.994z"></path>
                        </svg>Back</a>
                </div>

            </div>
            <div class="container py-4 px-1 form-control">

                <form action="{{ route('project.update', $project) }}" method="POST" class="form px-2"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Project Name:</label>
                        <input type="text"
                            class="form-control border-1 rounded-2 @error('name')
                            is-invalid
                        @enderror"
                            name="name" id="name" value="{{ $project->name }}">
                        @error('name')
                            <span class="text-danger py-1 ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" name="image" id="image"
                            class="form-control border-1 py-2 rounded-2 px-2
                            @error('image')
                            is-invalid
                        @enderror">
                        <img src="{{ asset('storage/' . $project->image) }}" height="100px" width="150px"
                            class="mt-2">
                        @error('image')
                            <span class="text-danger py-1 ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="url" class="form-label">Project URL:</label>
                        <input type="url" value="{{ $project->url }}" name="url" id="url"
                            class="form-control border-1
                            py-2 rounded-2 px-2
                            @error('url')
                            is-invalid
                        @enderror">
                        @error('url')
                            <span class="text-danger py-1 ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="summernot" class="form-label">Description :</label>
                        <textarea name="description" rows="8" id="summernot"
                            class="form-control text-dark @error('description') is-invalid @enderror">
                            {{ $project->description }}
                        </textarea>
                        @error('description')
                            <span class="text-danger py-1 ">{{ $message }}</span>
                        @enderror
                    </div>


                    <button class="btn btn-primary mt-3">
                        Update
                    </button>

                </form>

            </div>

        </div>

    </div>


</div>
