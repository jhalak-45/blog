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
                <div class="h2 align-top">Contact Details</div>


            </div>
            <div class="container border-1 h-auto rounded-2 px-0 py-3 bg-white shadow-lg">
                @if (Session::has('success'))
                    <div class="alert alert-success mx-2 alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

                <div class="container bg-white">
                    <form action="{{route('contact.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="mb-3 form-group col-md-6">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control  border-gray-300" value="{{ $contact->name }}">
                                </div>
                                <div class="mb-3 form-group col-md-6">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control  border-gray-300" value="{{ $contact->email }}">
                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-3 form-group col-md-6">
                                    <label for="name" class="form-label">Contact Number:</label>
                                    <input type="number" id="name" name="contact_number"
                                        class="form-control  border-gray-300" value="{{ $contact->contact_number }}">
                                </div>
                                <div class="mb-3 form-group col-md-6">
                                    <label for="site" class="form-label">Website :</label>
                                    <input type="url" id="site" name="website"
                                        class="form-control  border-gray-300" value="{{ $contact->website }}">
                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-3 form-group col-md-6">
                                    <label for="fb" class="form-label">Facebook:</label>
                                    <input type="url" id="fb" name="facebook"
                                        class="form-control  border-gray-300" value="{{ $contact->facebook }}">
                                </div>
                                <div class="mb-3 form-group col-md-6">
                                    <label for="tw" class="form-label">Github:</label>
                                    <input type="url" id="tw" name="github"
                                        class="form-control  border-gray-300" value="{{ $contact->github }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 form-group col-md-12">
                                    <label for="ad" class="form-label">Address:</label>
                                    <input type="text" id="ad" name="address"
                                        class="form-control border-gray-300  focus:ring-blue-500 focus:border-blue-500 " value="{{ $contact->address }}">
                                </div>

                            </div>
                            <div class="mb-3 form-group">
                                <label for="des" class="form-label">Short Summary:</label>
                                <textarea id="des" rows="7" name="info"
                                    class="block p-2.5 w-full  text-gray-900 bg-white  border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                {{ $contact->info }}
                                 </textarea>
                            </div>

                            <button class="btn btn-primary d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                    <path
                                        d="M10 11H7.101l.001-.009a4.956 4.956 0 0 1 .752-1.787 5.054 5.054 0 0 1 2.2-1.811c.302-.128.617-.226.938-.291a5.078 5.078 0 0 1 2.018 0 4.978 4.978 0 0 1 2.525 1.361l1.416-1.412a7.036 7.036 0 0 0-2.224-1.501 6.921 6.921 0 0 0-1.315-.408 7.079 7.079 0 0 0-2.819 0 6.94 6.94 0 0 0-1.316.409 7.04 7.04 0 0 0-3.08 2.534 6.978 6.978 0 0 0-1.054 2.505c-.028.135-.043.273-.063.41H2l4 4 4-4zm4 2h2.899l-.001.008a4.976 4.976 0 0 1-2.103 3.138 4.943 4.943 0 0 1-1.787.752 5.073 5.073 0 0 1-2.017 0 4.956 4.956 0 0 1-1.787-.752 5.072 5.072 0 0 1-.74-.61L7.05 16.95a7.032 7.032 0 0 0 2.225 1.5c.424.18.867.317 1.315.408a7.07 7.07 0 0 0 2.818 0 7.031 7.031 0 0 0 4.395-2.945 6.974 6.974 0 0 0 1.053-2.503c.027-.135.043-.273.063-.41H22l-4-4-4 4z">
                                    </path>
                                </svg>
                                Update Contact
                            </button>


                    </form>

                </div>

            </div>


        </div>

    </div>


</div>