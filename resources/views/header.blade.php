<ul class="nav p-2">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href={{ route("welcome") }}>Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href={{ route("about") }}>About</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href={{route("contact.index")}}>Contact</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href={{route("user.show-users")}}>Users List</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href={{ route("file.upload")}}>File upload</a>
    </li>
</ul>
