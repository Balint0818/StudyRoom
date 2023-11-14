@include('user.head')

<!-- Back to top button -->

@include('user.topbar')

@include('user.body')

@include('user.room')

<!-- .banner-home -->

<footer class="page-footer">
    <div class="container">
        <div class="row px-md-3">
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>Szervezet</h5>
                <ul class="footer-menu">
                    <li><a href="#">Rólunk</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>Továbbiak</h5>
                <ul class="footer-menu">
                    <li><a href="#">Felhasználói feltételek</a></li>
                    <li><a href="#">Adatvédelem</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>Kapcsolat</h5>
                <p class="footer-link mt-2">Győr, Egyetem tér 1.</p>
                <a href="#" class="footer-link">+36/123-9565</a>
                <a href="#" class="footer-link">tanuloszoba@sze.hu</a>
            </div>
        </div>

        <hr>

        <p id="copyright">Copyright &copy; 2023 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. Minden jog fenntartva</p>
    </div>
</footer>

@include('user.script')

</body>
</html>
