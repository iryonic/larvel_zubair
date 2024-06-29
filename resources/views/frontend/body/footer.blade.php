@php
    $footer = App\Models\Footer::find(1);
@endphp
<footer>
    <div class="foot">
        <div class="qoute">
            <h2 id="he">{{ $footer->footertitle }}</h2>
            <p>
                {{ $footer->footerpara }}
            </p>
        </div>
        <div class="support">
            <h2 id="he">Support</h2>
            <ul>
                <li><a href="{{ $footer->fb }}">Facebook</a></li>
                <li><a href="{{ $footer->ig }}">Instagram</a>
                </li>
                <li><a href="{{ $footer->privacy }}">Privacy Policy</a></li>
                <li><a href="tel:{{ $footer->phone }}">Contact us</a></li>
            </ul>
        </div>
        <div class="address">
            <h2 id="he">Address</h2>
            <p>
                <span id="bold">Address :</span> {{ $footer->address }}
            </p>
            <p><span id="bold">Email :</span> {{ $footer->email }} </p>
            <p><span id="bold">Phone :</span> {{ $footer->phone }}</p>
            <p><span id="bold">Alternate Phone :</span> {{ $footer->alphone }}</p>
        </div>
    </div>
    <div class="copy">
        <p>Copyright © 2024. All right reserved</p>
        <p>Developed by <a href="https://api.whatsapp.com/send?phone=916006801960">Irycodes</a> </p>
    </div>
</footer>
