@can('sys_admin_rights')
<li class="has-submenu">
    <a href="{{ route('home') }}"><i class="mdi mdi-view-dashboard"></i>Dashboard</a>
</li>
<li class="has-submenu">
    <a href="#"> <i class="mdi mdi-account-network-outline"></i>User Management <div class="arrow-down"></div></a>
    <ul class="submenu">
        <li>
            <a href="{{ route('users.index') }}">Users</a>
        </li>
        <li>
            <a href="layouts-center-menu.html">Create</a>
        </li>
    </ul>
</li>
@endcan

<li class="has-submenu">
    <a href="{{ route('record.index') }}"><i class="mdi mdi-file-document-box-multiple"></i>Receiving</a>
</li>

<li class="has-submenu">
    <a href="#"><i class="mdi mdi-gavel"></i>Assigning</a>
</li>

<li class="has-submenu">
    <a href="#"><i class="mdi mdi-feather"></i>Resolution</a>
</li>

<li class="has-submenu">
    <a href="#"><i class="mdi mdi-shield-check"></i>Validation</a>
</li>
