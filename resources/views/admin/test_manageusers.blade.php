<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>StudyRoom Admin</title>
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
        }
    </style>
    @include('admin.link')

</head>

<body>

@include('admin.icons')

<!-- partial:partials/_sidebar.html -->
@include('admin.test')
<!-- partial -->
<div class="container-fluid page-body-wrapper">

    <div class="container" align="center" style="padding-top: 100px">
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    X
                </button>
                {{session()->get('message')}}

            </div>
        @endif
            <div class="container-fluid page-body-wrapper">
                <div class="text-center" style="padding: 100px;">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Név</th>
                            <th>E-mail cím</th>
                            <th>Neptun kód</th>
                            <th>Admin</th>
                            <th>Módosítás</th>
                            <th>Jogosultság adás</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr style="background: #bababa;">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->nk}}</td>
                                <td>{{$user->usertype}}</td>
                                <td><a href="{{url('update_user', $user->id)}}" class="btn btn-primary">Módosítás</a></td>
                                <td>
                                    @if($user->usertype == '0')
                                        <a href="{{url('giveAdmin', $user->id)}}" class="btn btn-success">Kinevezés Adminná</a>
                                    @else
                                        <a href="{{url('removeAdmin', $user->id)}}" class="btn btn-danger">Admin elvétele</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


@include('admin.script')
</body>
</html>
