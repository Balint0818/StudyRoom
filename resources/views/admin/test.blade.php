<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>StudyRoom - AdminPanel</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #ffff; /* Light gray background */
        }

        .sidebar {
            width: 250px;
            background-color: #50c878;
            height: 100%;
            position: fixed;
            top: 0;
            left: -250px; /* Closed sidebar initially */
            transition: left 0.3s;
        }

        .content {
            margin-left: 0;
            transition: margin-left 0.3s;
            padding: 20px;
            border: #50c878;
            flex: 0 0 auto;
            border: #50c878;
            border-width: 0 0 .3em 0;
        }

        .sidebar-header {
            background-color: #50c878;
            text-align: center;
            color: #fff;
            padding: 20px 0;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            padding: 10px;
        }

        .sidebar-menu a {
            text-decoration: none;
            color: #fff;
            display: block;
        }

        header {
            padding: 0px;
            background-color: #fff;
            color: #fff;

        }

        .toggle-sidebar {
            cursor: pointer;
            background: #50c878;
            padding: 10px;
            margin-left: 15px;
            align-items: flex-start;
        }

        /* Add some spacing between list items */
        li {
            padding: 5px 0;
        }

        /* Styles for responsive behavior (when sidebar is toggled) */
        @media screen and (max-width: 768px) {
            .sidebar {
                left: 0;
            }

            .content {
                margin-left: 250px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
</head>
<body>
<div class="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('admin/assets/images/studyroom.png') }}" alt="StudyRoom Icon">
        <h1>Admin Panel</h1>
    </div>
    <ul class="sidebar-menu">
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('add_room_view') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-edit"></i>
                </span>
                <span class="menu-title">Tanulószobák létrehozása</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('manage_users') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-edit"></i>
                </span>
                <span class="menu-title">Felhasználók kezelése</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('manage_appointments') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-edit"></i>
                </span>
                <span class "menu-title">Időpontok kezelése</span>
            </a>
        </li>
    </ul>
</div>
<div class="content">
    <header>
        <div class="toggle-sidebar" onclick="toggleSidebar()">
            <span>&#9776;</span>
        </div>
    </header>
    <main>
        <!-- Your content goes here -->
    </main>
</div>
<script>
    function toggleSidebar() {
        var sidebar = document.querySelector('.sidebar');
        var content = document.querySelector('.content');

        if (sidebar.style.left === "0px" || sidebar.style.left === "") {
            sidebar.style.left = "-250px";
            content.style.marginLeft = "0";
        } else {
            sidebar.style.left = "0";
            content.style.marginLeft = "250px";
        }
    }
</script>
</body>
</html>
