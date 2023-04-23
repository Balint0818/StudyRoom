<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>

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
            <form>
                <div style="padding: 15px;">
                    <label>Szoba neve:</label>
                    <input type="text" style="color:black" name="name" placeholder="Add meg a szoba nevét">
                </div>
                <div style="padding: 15px;">
                    <label>Szoba neve:</label>
                    <input type="text" style="color:black" name="name" placeholder="Add meg a szoba nevét">
                </div>

                <div style="padding: 15px;">
                    <label>Emelet:</label>
                    <select style="color: #0a58ca" >
                        <option value="0">Földszint</option>
                        <option value="1">Első emelet</option>
                        <option value="2">Második emelet</option>
                        <option value="3">Harmadik emelet</option>
                        <option value="4">Negyedik emelet</option>
                        <option value="5">Ötödik emelet</option>


                    </select>
                </div>
            </form>
        </div>

    </div>

@include('admin.script')
</body>
</html>
