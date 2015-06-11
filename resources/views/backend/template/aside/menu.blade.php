<ul class="sidebar-menu">

    <li class="header">MAIN NAVIGATION</li>

    <li class="@if(Request::is('admin')) active @endif treeview">
        <a href="{{ route('admin.index') }}">
            <i class="fa fa-dashboard"></i> <span>Panel de Control</span>
        </a>
    </li>

    <li class="@if(Request::is('admin/users*')) active @endif treeview">
        <a href="{{ route('admin.users.index')}}">
            <i class="fa fa-users"></i> <span>Usuarios</span>
        </a>
    </li>

    <li class="treeview">
        <a href="{{ route('index') }}" target="_blank">
            <i class="fa fa-globe"></i> <span>Website</span>
        </a>
    </li>

</ul>