<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->

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
<div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
            <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                <div class="ps-lg-1">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and
                            more with this template!</p>
                        <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                           target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                            class="mdi mdi-home me-3 text-white"></i></a>
                    <button id="bannerClose" class="btn border-0 p-0">
                        <i class="mdi mdi-close text-white me-0"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
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
                            <th style="padding: 10px">Jogosultásg adás</th>
                        </tr>
                        @foreach($users as $user)
                            <tr align="center" style="background: #bababa">
                                <td style="padding: 10px">{{$user->id}}</td>
                                <td style="padding: 10px">{{$user->name}}</td>
                                <td style="padding: 10px">{{$user->email}}</td>
                                <td style="padding: 10px">{{$user->nk}}</td>
                                <td style="padding: 10px">{{$user->usertype}}</td>
                                <td><a href="{{url('modify')}}" class="btn btn-success">Modify</a></td>
                                <td><a href="{{'giveAdmin',$user->id}}" class="btn btn-success">Kinevezés Adminná</a>
                                </td>
                                >
                            </tr>
                        @endforeach


                    </table>
                </div>

@include('admin.script')
</body>
</html>
