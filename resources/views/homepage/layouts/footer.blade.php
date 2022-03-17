<div class="container">
    <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
            <p class="mb-4"><img src="{{ getOption()->logo}}" style="height: 7rem;" alt="Image" class="img-fluid"></p>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
            <h5>Kontak</h5>
            <p class="mt-3" style="color: #fff;">
                <i class="fa fa-fw fa-phone mr-1 text-primary" aria-hidden="true"></i> {{ getOption()->phone }}<br>
                <i class="fa fa-fw fa-envelope mr-1 text-primary" aria-hidden="true"></i> {{ getOption()->email }}
            </p>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
            <h5>Alamat</h5>
            <p class="mb-4" style="color: #fff;">
                {{ getOption()->address }}
            </p>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
            <h5 class="mt-3">Social Media</h5>
            <div class="footer-sosmed mt-3">
                <a href="{{ getOption()->facebook }}" target="_blank"><span class="mai-logo-facebook-f"></span></a>
                <a href="{{ getOption()->instagram }}" target="_blank"><span class="mai-logo-instagram"></span></a>
                <a href="{{ getOption()->youtube }}" target="_blank"><span class="mai-logo-youtube"></span></a>
                <a href="mailto:{{ getOption()->email }}" target="_blank"><span class="mai-mail"></span></a>
            </div>
        </div>
    </div>

    <hr />

    <p id="copyright">
        Copyright &copy; {{ date('Y') }} UPTD KPHP Kendilo Dinas Kehutanan Prov. Kalimantan Timur. All right reserved
    </p>
</div>