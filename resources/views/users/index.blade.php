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
                <div class="h2 align-top">Users</div>
                <div class="add-btn">
                    <a href="{{ route('user.register') }}" class="btn d-flex btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 "width="24" height="24"
                            viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                            <path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4z"></path>
                            <path
                                d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z">
                            </path>
                        </svg>
                        Create New User
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
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created Time</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="Post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('Delete')
                                        <button class="btn-sm btn-danger">Delete</button>

                                    </form>
                                </td>

                            </tr>
                        @endforeach



                    </tbody>
                </table>
                {{ $users->links() }}
            </div>


        </div>

    </div>


</div>
