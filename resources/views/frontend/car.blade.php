<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
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

    <link rel="stylesheet" href="{{ asset('frontend/assets/transport.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
        integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Zubi tours & holiday kashmir</title>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2MXH2DG" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('frontend.body.header')  
    <div class="imgse">
        <img src="transimg.jpg" alt="image" />
        <div class="headpart">
            <span class="head">Car Rentals</span>
            <span class="content">
                Hire transport and take a ride to visit highly acclaimed paradise with
                us.
            </span>
        </div>
    </div>



    <div class="form">
        <h1>Enter Details</h1>
        <form id="myForm" action="{{ route('get.data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="pu">Pickup City </label>
            <input type="text" id="pu"  name="pickupcity"/>
            <label for="persons">Persons </label>
            <input type="text" id="persons"  name="persons"/>
            <label for="persons">Name </label>
            <input type="text" id="persons" name="name" />
            <label for="persons">Phone </label>
            <input type="text" id="persons"  name="phone"/>
            <label for="persons">Email</label>
            <input type="email" id="persons"  name="email"/>
            <label for="persons"> Pickup Date</label>
            <input type="date" id="name"  name="pickupdate"/>
            <label for="persons"> Pickup time</label>
            <input type="time" id="name" name="pickuptime" />
            <label for="type">Travel Type</label>
            <select name="traveltype" id="type">
                <option value="Full Day">Full Day</option>
                <option value="Half Day">Half Day</option>
                <option value="Transfers">Transfers</option>
                <option value="Excursions">Excursions</option>
            </select>
            <button type="submit" id="submit-button">Submit</button>
        </form>
    </div>

    <!-- FOOTER  -->
    @include('frontend.body.footer')