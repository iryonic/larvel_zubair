@extends('frontend.main_master')
@section('main')
    @php
        $content = App\Models\Homepage::find(1);
    @endphp

    <div class="mainbody">
        <img src="{{ asset($content->homeimage) }}" autoplay muted loop preload class="vid"></img>
        <div class="outer">
            <div class="right">
                <h1>
                    {{ $content->headertext }}
                </h1>

                <p>
                    {{ $content->headerparagraph }}
                </p>
                <br />
                <button class="explore"><a href="#why">Explore</a></button>
                <button class="whatsp">
                    <a href="    {{ $content->whatsappnumber }}"><i class="fa-brands fa-whatsapp" target="_blank"></i>
                        &nbsp;Whatsapp</a>
                </button>
            </div>
            <form id="myForm" action="{{ route('get.data') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="left">

                    <input type="text" id="name" name="name" placeholder="Enter Name" required />

                    <input type="email" id="email" name="email" placeholder="Enter Email" required />

                    <input type="text" id="phone" name="phone" placeholder="Enter Phone no." required />
                    <button id="send" type="submit">Send now</button>
                </div>
            </form>
        </div>
    </div>

    <section id="explore" class="preabout">
        <div class="ot">
            <h1 id="why">Why Choose Us ?</h1>
        </div>

        <div class="outside">
            <div class="inone">
                <p>
                    {{ $content->whychooseusdescription }}
                </p>
                <a href="{{ route('aboutus') }}" id="lmore">learn more <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="intwo">
                <img src="{{ asset($content->whychooseusimage) }}" alt="img" />
            </div>
        </div>

        <div class="cards">
            <div class="cardone">
                <div class="iconarea"><i class="ri-price-tag-3-fill"></i></div>
                <div class="cardinfo">
                    <span id="cardhead"> {{ $content->servicetitleone }}</span><br /> {{ $content->serviceparaone }}
                </div>
            </div>
            <div class="cardtwo">
                <div class="iconarea"><i class="fa-solid fa-hotel"></i></div>
                <div class="cardinfo">
                    <span id="cardhead"> {{ $content->servicetitltwo }}</span><br /> {{ $content->serviceparatwo }}
                </div>
            </div>
            <div class="cardthree">
                <div class="iconarea">
                    <i class="ri-service-fill"> </i>
                </div>
                <div class="cardinfo">
                    <span id="cardhead">{{ $content->servicetitlethree }}</span><br /> {{ $content->serviceparathree }}
                </div>
            </div>
        </div>
    </section>

    <hr />
    <!--    DESTINATION SECTION -->
    <section id="destinations">
        <div class="title">
            {{ $content->thirdheading }}
        </div>
        <div class="summary">
            {{ $content->thirdparagrapgh }}
        </div>
        <div class="corousel">
            <div class="caroitem">
                <img src="{{ asset('frontend/assets/z2.jpg') }}" alt="image" class="caroimg" />
            </div>
            <div class="caroitem">
                <img src="{{ asset('frontend/assets/z6.jpg') }}" alt="image" class="caroimg" />
            </div>
            <div class="caroitem">
                <img src="{{ asset('frontend/assets/z3.jpg') }}" alt="image" class="caroimg" />
            </div>
            <div class="caroitem">
                <img src="{{ asset('frontend/assets/z7.jpg') }}" alt="image" class="caroimg" />
            </div>
        </div>
    </section>

    <!--                 PAKAGES SECTION                   -->

    @include('frontend.packages.package')
@endsection
