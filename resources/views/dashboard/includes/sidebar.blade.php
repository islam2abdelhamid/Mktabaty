<div class="sidebar" data-color="orange" data-background-color="black" data-image="../assets/user/img/books.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="#" class="simple-text logo-normal">
            Library Management
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item  ">
                <a class="nav-link" href="{{ route('dashboard') }}"> 
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('listUsers') }}">
                    <i class="material-icons">person</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item active ">
                <a class="nav-link" href="{{ route('listAdmins') }}">
                    <i class="material-icons">person</i>
                    <p>Admins</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./books.html">
                    <i class="material-icons">content_paste</i>
                    <p>Books</p>
                </a>
            </li>
        </ul>
    </div>
</div>