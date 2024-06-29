@php
    $footer = App\Models\Footer::find(1);
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
        integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-P2MXH2DG');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords"
        content="zubi tours, zubi tours and travels , zubi tours and holiday kashmir , 
    tour and travel company , zubi travel, zubitours.com" />

    <link rel="stylesheet" href="{{ asset('frontend/assets/contact.css') }}" />
    @include('frontend.body.header')
    <section class="image">
        <div>
            <img src="{{ asset('frontend/assets/z7.jpg') }}" alt="Contact-Us" />
        </div>

        <!-- for icons -->

        <div class="contact-icons">
            <div class="one" id="one">
                <div class="contact-iconslist">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="contact-det">
                    <p> <span style="font-weight: 500;">Address:</span>
                        {{ $footer->address }}
                    </p>
                </div>
            </div>
            <div class="one">
                <div class="contact-iconslist"><i class="fa-solid fa-phone"></i></div>
                <div class="contact-det">
                    <p><span style="font-weight: 500;">Phone:</span> +91 {{ $footer->phone }}</p>
                </div>
            </div>
            <div class="one">
                <div class="contact-iconslist">
                    <i class="fa-regular fa-envelope"></i>
                </div>
                <div class="contact-det">
                    <p><span style="font-weight: 500;">Mail:</span> {{ $footer->email }}</p>
                </div>
            </div>

        </div>

        <!-- for details -->
    </section>

    <!-- form section -->

    <section class="form-section">

        <div class="form-det">
            <h1 id="formhead">
                Fill the form to reach us
            </h1>
            <form id="myForm" action="{{ route('get.data') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" placeholder="Name" name="name" />
                <br />
                <input type="email" placeholder="Email id" name="email" />
                <br />
                <input type="text" placeholder="Phone" name="phone" />
                <br />
                <input type="text" placeholder="Total Adult" name="adult" />
                <br />
                <input type="text" placeholder="Total Child" name="child" />
                <br />
                <textarea id="area" cols="37" rows="8" placeholder="Message" name="message"
                    style="
              background-color: rgba(255, 171, 61, 0.212);
              margin-top: 15px;
              padding: 10px;
              font-size: larger;
              color: rgb(48, 53, 80);
            "></textarea>
                <br />
                <button id="submit-button" type="submit">Submit</button>
            </form>
        </div>

        <div class="map">
            <h1 id="maphead">
                Locate us on map
            </h1>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3304.5625089503774!2d74.81132567571768!3d34.080727573146355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzTCsDA0JzUwLjYiTiA3NMKwNDgnNTAuMCJF!5e0!3m2!1sen!2sin!4v1718960513168!5m2!1sen!2sin"
                style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                id="map"></iframe>
        </div>
    </section>

    <!-- FOOTER  -->
    @include('frontend.body.footer')
