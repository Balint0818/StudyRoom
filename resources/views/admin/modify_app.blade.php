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

        <form action="{{url('updateAppointment',$data->id)}}" method="post">

            @csrf
            <div style="padding: 15px;">
                <label>Név:</label>
                <input type="text" style="color:black" name="name" value="{{$data->name}}">

            </div>

            <div style="padding: 15px;">
                <label>Neptun kód: </label>
                <input type="text" style="color:black" name="nk" value="{{$data->nk}}"
                       placeholder="Add meg az új Neptun kódot">
            </div>

            <div style="padding: 15px;">
                <label>Ettől</label>
                <input type="datetime-local" style="color:black" name="starttime" value="{{$data->starttime}}">
            </div>
            <div style="padding: 15px;">
                <label>Eddig</label>
                <input type="datetime-local" style="color:black" name="endtime" value="{{$data->endtime}}">
            </div>

            <div style="padding: 15px;">
                <input type="submit" class="btn btn-success" style="background: green">
            </div>
        </form>
    </div>

</div>
</div>

</body>
</html>
