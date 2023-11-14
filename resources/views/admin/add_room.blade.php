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
            <form action="{{url('upload_rooms')}}" method="post">
                @csrf
                <div style="padding: 15px;">
                    <label>Szoba neve:</label>
                    <input type="text" style="color:black" name="name" placeholder="Add meg a szoba nevét">
                </div>
                <div style="padding: 15px;">
                    <label for="opening-time">Nyitvás:</label>
                    <input value="08:00" type="time" id="opening" name="opening" style="color: black">
                </div>

                <div style="padding: 15px;">
                    <label for="opening-time">Zárás:</label>
                    <input value="16:00" type="time" id="closing" name="closing" style="color: black">
                </div>


                <div style="padding: 15px;">
                    <label>Emelet:</label>
                    <select name="floor" style="color: black; text-weight: bold; text-align: center">
                        <option value="Földszint">Földszint</option>
                        <option value="Első emelet">Első emelet</option>
                        <option value="Második emelet">Második emelet</option>
                        <option value="Harmadik emelet">Harmadik emelet</option>
                        <option value="Negyedik emelet">Negyedik emelet</option>
                        <option value="Ötödik emelet">Ötödik emelet</option>
                        <option value="Hatodik emelet">Hatodik emelet</option>
                        <option value="Hetedik emelet">Hetedik emelet</option>
                        <option value="Nyolcadik emelet">Nyolcadik emelet</option>
                        <option value="Kilencedik emelet">Kilencedik emelet</option>


                    </select>
                </div>
                <div style="padding: 15px;">
                    <input type="submit" class="btn btn-success" style="background: green">
                </div>
            </form>
        </div>

    </div>

@include('admin.script')
</body>
</html>
