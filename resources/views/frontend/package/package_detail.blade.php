@extends('frontend.main_master')
@section('main')
    @php
        $days = App\Models\itinerary::latest()->get();
        $daynumber = 0;
        $content = App\Models\Homepage::find(1);
    @endphp
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords"
        content="zubi tours, zubi tours and travels , zubi tours and holiday kashmir , 
  tour and travel company , zubi travel, zubitours.com" />

    <link rel="stylesheet" href="{{ asset('frontend/assets/pkdetstyle.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
        integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <section class="info">
        <img src="{{ url('/upload/packageimage/' . $packageDetail->image) }}" alt="img" id="bgimg" />

        <div class="packouter">
            <div class="pkname"></div>
            {{ $packageDetail->title }}
            @foreach ($days as $day)
                @if ($day->packagetype_id == $packageDetail->id)
                    @php
                        $daynumber++;
                    @endphp
                @endif
            @endforeach
            <div class="pkduration"> {{ $daynumber - 1 }} Nights / {{ $daynumber }} Days</div>
            <h5 style="text-align: center">₹ {{ $packageDetail->price }}</h5>
        </div>
    </section>

    <div class="pkinfo" id="Summary">
        <div class="head">Summary</div>
        <div class="content">
            {{ $packageDetail->short_desc }}
        </div>
    </div>
    @foreach ($itinerary as $item)
        <div class="pkinfo" id="day1">
            <div class="head">{{ $item->title }}</div>
            <h4> {{ $item->from_destination }} | {{ $item->to_destination }}</h4>
            <div class="content">
                {{ $item->description }}
            </div>
        </div>
    @endforeach
    <div class="inclusions">
        <h2>Inclusions:-</h2>
        <ul>
            <p>{!! str_replace(',', '<br>', $packageDetail->inclusions) !!}</p>

        </ul>
    </div>

    <div class="exclusions">
        <h2>Exclusions:-</h2>
        <ul>
            <p>{!! str_replace(',', '<br>', $packageDetail->exclusions) !!}</p>


        </ul>
    </div>
    <div class="button">
        <button id="bookbtn">
            <a href="{{ route('contact.us') }}" target="_blank">
                Book now <i class="ri-bookmark-line"></i></a>
        </button>
    </div>
@endsection
