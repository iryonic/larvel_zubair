@php
    $footer = App\Models\Footer::find(1);
@endphp

<div class="header">
    <div class="socials">
        <a href="{{ $footer->ig }}" id="instagram" target="_blank" class="ig"><i class="ri-instagram-line"></i></a>
        <a href="{{ $footer->fb }}" id="facebook" target="_blank" class="fb"><i
                class="ri-facebook-box-fill"></i></a>
        <a href="{{ $footer->twitter }}" id="twitter" target="_blank" class="tw"><i
                class="ri-twitter-fill"></i></a>
    </div>

    <div class="contact">
        <p id="eml">
            <i class="fa-solid fa-envelope"></i> {{ $footer->email }}
        </p>
        &nbsp;&nbsp;
        <p id="phn"><i class="fa-solid fa-phone"></i> {{ $footer->phone }}</p>
    </div>
    <!-- headerdiv end-->
</div>
<nav class="navbar">
    <div class="logo"><img src="{{ asset('frontend/assets/zubi logo.png') }}" class="log" /></div>
    <div class="navs">
        <ul>
            <li><a href="{{ url('/') }}" class="active">Home</a></li>
            <li><a href="{{ route('aboutus') }}">About us </a></li>
            <li><a href="#destinations">Destinations</a></li>
            <li><a href="{{route('all.packages')}}">Packages</a></li>
            <li><a href="{{ route('transport') }}">Car Rentals</a></li>
            <li><a href="{{ route('contact.us') }}">Contact us</a></li>
            <button id="bookbtn">
                <a href="https://wa.link/xx7n0j" target="_blank">
                    Book now <i class="ri-bookmark-line"></i></a>
            </button>
        </ul>
    </div>

    <div class="toggle">
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <div class="nav-mobile">
            <a href="index.html">Home</a>
            <a href="about.html">About</a>
            <a href="#destinations">Destinations</a>
            <a href="pakages.html">Packages</a>
            <a href="transport.html">Car Rentals</a>

            <a href="contact.html">Contact</a>
        </div>
    </div>
    <div class="nav-mobile w3-animate-right">
        <!-- Menu items -->
    </div>
</nav>
