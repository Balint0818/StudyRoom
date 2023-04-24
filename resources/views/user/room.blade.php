<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Elérhető tantermek</h1>

        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">

            @foreach($room as $rooms)
                <div class="item">
                    <div class="card-doctor">
                        <div class="header">
                            <img src="../assets/img/doctors/doctor_1.jpg" alt="">
                            <div class="meta">
                                <a href="#"><span class="mai-call"></span></a>
                                <a href="#"><span class="mai-logo-whatsapp"></span></a>
                            </div>
                        </div>
                        <div class="body">
                            <p class="text-xl mb-0">{{$rooms->name}}</p>
                            <span class="text-sm text-grey">{{$rooms->floor}}</span>
                            <br>
                            <span
                                class="text-sm text-grey">{{substr($rooms->opening,0,5)}} - {{substr($rooms->closing,0,5)}}</span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
