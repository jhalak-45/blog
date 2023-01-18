
<div class="container-fluid p-0">
    <div class="sticky-top shadow-sm ">
        <x-app-layout></x-app-layout>
    </div>

    <div class="d-flex">
        <div class="sidebar pt-2     bg-[#0f172a] " style="width:18%">
            @include('layouts.sidebar')
        </div>
        <div class="tab px-2 py-2" style="width: 82%; height:100%">
            <div class="container py-4 justify-content-between d-flex w-100 hover-none">
                <div class="h2 align-top">New Blog</div>
                <div class="add-btn">
                    <a href="{{ route('blog.index') }}" class="btn btn-primary d-flex">
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

                <form action="{{ url('dashboard/blog') }}" method="POST" class="form px-2"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Title :</label>
                        <input type="text"
                            class="form-control border-1 rounded-2 @error('title')
                            is-invalid
                        @enderror"
                            name="title" id="title" value="{{ old('title') }}" placeholder="Title..">
                        @error('title')
                            <span class="text-danger py-1 ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="excerpt" class="form-label">Excerpt :</label>
                        <input type="text"
                            class="form-control border-1 rounded-2
                        @error('excerpt')
                            is-invalid
                        @enderror"
                            name="excerpt" id="excerpt" value="{{ old('excerpt') }}" placeholder="Excerpt...">
                        @error('excerpt')
                            <span class="text-danger py-1 ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="summernot" class="form-label">Description :</label>
                        <textarea name="description" rows="8" id="summernot"
                            class="form-control text-dark @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                            <span class="text-danger py-1 ">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail :</label>
                        <input type="file" name="thumbnail" value="{{ old('thumbnail') }} " id="thumbnail"
                            class="form-control border-1 py-2 rounded-2 px-2
                            @error('thumbnail')
                            is-invalid
                        @enderror">
                        @error('thumbnail')
                            <span class="text-danger py-1 ">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-3">
                        Publish
                    </button>

                </form>

            </div>

        </div>

    </div>


</div>
