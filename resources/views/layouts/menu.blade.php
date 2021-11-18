<li class="nav-item">
    <a href="{{ route('jobapplications.index') }}"
       class="nav-link {{ Request::is('jobapplications*') ? 'active' : '' }}">
        <p>Jobapplications</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
        <p>Logs</p>
    </a>
</li>


