Total earnings 99999

<form action="/logout" method="post" id="logout-form">
    @csrf
    <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit()">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
    </a>
</form>
