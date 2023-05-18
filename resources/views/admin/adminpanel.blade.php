<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>StudyRoom Admin</title>

    @include('admin.link')
</head>
<body>
    @include('admin.icons')
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')
    <!-- partial -->
    @include('admin.mainpanel')
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('user.script')
</body>
</html>
