<div class="container-fluid p-0">
    <div class="sticky-top shadow-sm ">
        <x-app-layout></x-app-layout>
    </div>

    <div class="d-flex ">
        <div class="sidebar pt-2     bg-[#0f172a] " style="width:18%">
            @include('layouts.sidebar')
        </div>
        <div class="tab px-2 py-2" style="width: 82%; height:100%">
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Profile') }}
                    </h2>
                </x-slot>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>

        </div>

    </div>


</div>
