<div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp" style="text-align: center; font-weight: bolder">Make an
                Appointment</h1>

            <form class="main-form" action="{{url('create_appointment')}}" method="post">
                @csrf
                <div class="row mt-5 ">
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="text" name="name" class="form-control" placeholder="Teljes név">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="text" name="email" class="form-control" placeholder="E-mail cím">
                    </div>

                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                        <div class="form-control col-sm-12" style="text-align: center"
                        ">Foglalási időpont kezdete:
                    </div>
                    <input type="time" name="starttime" class="form-control">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <div class="form-control col-sm-12" style="text-align: center">Foglalás vége:</div>
                    <input type="time" name="endtime" class="form-control">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">

                    <input type="date" name="date" class="form-control">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="room" id="departement" class="custom-select">
                        @foreach($room as $rooms)
                            <option value="{{$rooms->name}}">{{$rooms->name}} - {{$rooms->floor}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="text" name="nk" class="form-control" placeholder="Neptun kód">
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <textarea name="message" id="message" class="form-control" rows="6"
                                  placeholder="Megjegyzés"></textarea>
                </div>
        </div>

        <div>
            <button type="submit" class="btn btn-primary mt-3 wow "
                    style="visibility: visible;background: green">Send
            </button>
        </div>

        </form>
    </div>
</div>
</div>
