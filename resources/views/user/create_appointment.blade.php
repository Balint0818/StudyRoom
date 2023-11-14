@include('user.head')

@include('user.topbar')
@include('user.script')

<?php
session(['can_access_appointment' => true]);
?>

<div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp" style="text-align: center; font-weight: bolder">Időpont foglalás</h1>

            <form class="main-form" action="{{url('appointment')}}" method="post">
                @csrf
                <div class="row mt-5 ">

                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                        <div class="form-control col-sm-12" style="text-align: center">Foglalási időpont kezdete:
                        </div>
                        <input type="datetime-local" name="starttime" class="form-control">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <div class="form-control col-sm-12" style="text-align: center">Foglalás vége:</div>
                        <input type="datetime-local" name="endtime" class="form-control">
                    </div>

                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="room" id="departement" class="custom-select">
                        @foreach($room as $rooms)
                            <option value="{{$rooms->name}}">{{$rooms->name}} - {{$rooms->floor}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <textarea name="message" id="message" class="form-control" rows="6"
                                  placeholder="Megjegyzés"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-3 wow "
                                style="visibility: visible;background: #50ADC9">Send
                        </button>
                    </div>
                </div>
                <div style="margin-top: 80px;">
                </div>

                @include('user.schedule')

        </form>
    </div>
</div>
</div>

