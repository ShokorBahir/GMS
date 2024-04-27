<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kabul university</title>
    <link rel="stylesheet" href="{{ asset('ku/bootstrap files/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ku/style.css') }}">
</head>

<body>
    <!--header section-->
    <nav class="navbar navbar-expand-lg navbar-light bg-opacity-75  fixed-top" style="background-color: #00134b85;">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="text-warning">Kabul</span>University</a> <button
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse"
                type="button"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url(config('nova.path')) }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @include('front.section.carousel')
    {{-- About Page --}}
    @include('front.section.about')
    {{-- Services Page --}}
    @include('front.section.sevices')
    {{-- Team Page --}}
    @include('front.section.team')
    <!-- Contact starts -->
    <section class="contact section-padding" id="contact">
        <div class="container mt-5 mb-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2 class="text-white">Contact Us</h2>
                        <p class="text-white">
                            Email: <a href="mailto:farzadqasimy@gmail.com">Farzadqasimy@gmail.com</a> <br />
                            Phone: <a href="tel:0093765993446" target="_blank">+93765993446</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-md-12 p-0 pt-4 pb-4">
                </div>
            </div>
        </div>
    </section><!-- contact ends -->
    <!-- footer starts -->
    <footer class="bg-dark p-2 text-center">
        <div class="container">
            <p class="text-white">All has been developed by Mohmmad Rafi Shirzai Sulaiman Qasimi and Ahmad Shokor Bahir
            </p>
        </div>
    </footer>
    <!-- footer ends -->
    <script src="{{ asset('ku/bootstrap files/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('ku/bootstrap files/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ku/bootstrap files/popper.min.js') }}"></script>
</body>

</html>
