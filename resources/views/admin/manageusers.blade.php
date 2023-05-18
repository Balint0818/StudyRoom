<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
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
@include('admin.sidebar')
<!-- partial -->
@include('admin.navbar')
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
            <div align="center" style="padding: 100px">
                <table>
                    <tr>
                        <th style="padding: 10px">ID</th>
                        <th style="padding: 10px">Név</th>
                        <th style="padding: 10px">E-mail cím</th>
                        <th style="padding: 10px">Neptun kód</th>
                        <th style="padding: 10px">Admin</th>
                        <th style="padding: 10px">Módosítás</th>
                        <th style="padding: 10px">Jogosultság adás</th>
                    </tr>
                    @foreach($users as $user)
                        <tr align="center" style="background: #bababa">
                            <td style="padding: 10px">{{$user->id}}</td>
                            <td style="padding: 10px">{{$user->name}}</td>
                            <td style="padding: 10px">{{$user->email}}</td>
                            <td style="padding: 10px">{{$user->nk}}</td>
                            <td style="padding: 10px">{{$user->usertype}}</td>
                            <td><a href="{{url('update_user',$user->id)}}" class="btn btn-success">Modify</a></td>
                            @if($user->usertype=='0')
                                <td>
                                    <a href="{{url('giveAdmin',$user->id)}}" class="btn btn-success">Kinevezés
                                        Adminná</a>
                                </td>
                            @else
                                <td>
                                    <a href="{{url('removeAdmin',$user->id)}}" class="btn btn-danger">Admin
                                        elvétele</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>

@include('admin.script')
</body>
</html>
