<ul class="list-group bg-transparent" style="min-height:100vh;">
    <li class="list-group-item bg-transparent  text-light py-3 rounded-0" style="hover:background-color:red;">
        <i class='bx bxs-dashboard' style="font-size: 27px"></i> <a href="{{ url('/dashboard') }}"
            class="px-2 py-auto  hover:text-gray-100 align-top">Dashboard</a>
    </li>
    <li class="list-group-item bg-transparent text-light  py-3 rounded-0">
        <i class='bx bxl-blogger'style="font-size: 27px"></i> <a href="{{ route('blog.index') }}"
            class="px-2  hover:text-gray-100 align-top ">Blogs</a>
    </li>
    <li class="list-group-item  bg-transparent text-light  py-3 rounded-0">
        <i class='bx bxs-detail' style="font-size: 27px"></i> <a href="{{ route('service.index') }}"
            class="px-2  hover:text-gray-100 align-top ">Services</a>
    </li>
    <li class="list-group-item bg-transparent text-light  py-3 rounded-0">
        <i class='bx bx-notepad' style="font-size: 27px"></i>
        <a href="{{ route('project.index') }}" class="px-2 align-top  hover:text-gray-100 ">Projects</a>
    </li>
    <li class="list-group-item bg-transparent text-light  py-3 rounded-0">
        <i class='bx bxs-contact' style="font-size: 27px"></i> <a href="{{ route('contact.index') }}"
            class="px-2  hover:text-gray-100 align-top ">Contact</a>
    </li>
    <li class="list-group-item bg-transparent text-light  py-3 rounded-0">
        <i class='bx bx-cog'style="font-size: 27px"></i> <a href="{{ route('setting.index') }}"
            class="px-2  hover:text-gray-100 align-top">Setting</a>
    </li>
    <li class="list-group-item bg-transparent text-light  py-3 rounded-0">
        <i class='bx bx-registered' style="font-size: 27px"></i> <a href="{{ route('user.index') }}"
            class="px-2  hover:text-gray-100 align-top ">Users</a>
    </li>
    <li class="list-group-item bg-transparent text-light  py-3 rounded-0">
        <i class='bx bx-user' style="font-size: 27px"></i> <a href="{{ url('/profile') }}"
            class="px-2  hover:text-gray-100 align-top ">Profile</a>
    </li>

</ul>
