@php
    $content = App\Models\Homepage::find(1);
@endphp
@php
    $package = App\Models\PackageDetail::latest()->limit(2)->get();
    $days = App\Models\itinerary::latest()->get();
    $content = App\Models\Homepage::find(1);
@endphp
<section id="pakages">
    <h2 id="pkhead">{{ $content->bestpackheading }}</h2>
    <p id="pkpara">
        {{ $content->bestpackpara }}
    </p>
    <div class="pkwrap">
        @foreach ($package as $item)
            <div class="pakage" id="pakage3">
                <div class="pkimg"><img src="{{ asset('upload/packageimage/' . $item->image) }}" alt="" /></div>
                <div class="pktitle">{{ $item['type']['name'] }}</div>
                <div class="pkdetails">
                    {{ $item->title }}
                </div>
                <div class="pkfoot">
                    <div class="pkprice">₹ {{ $item->price }}</div>
                    <button class="pkmoredetails">
                        <a href="{{ url('package/details/' . $item->id) }}">Details</a>
                    </button>
                </div>
            </div>
        @endforeach



    </div>

    <button class="veiwall">
        <a class="btn" href="{{ route('all.packages') }}">View All Packages</a>
    </button>
</section>
