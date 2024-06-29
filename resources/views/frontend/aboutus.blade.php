@php
    $detail = App\Models\Aboutus::find(1);
@endphp
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

    <link rel="stylesheet" href="{{ asset('frontend/assets/about.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
        integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Zubi tours & holiday kashmir</title>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2MXH2DG" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('frontend.body.header')


    <!-- About us -->
    <div class="wrap">
        <img src="{{ asset('frontend/assets/z1.jpg') }}" class="imgab">
        <section class="about">

            <div class="aboutus">
                <div class="head">
                    About us</h1>
                </div>
                <div class="aboutpara">
                 {{$detail->aboutus}}
                </div>
            </div>
            <div class="messagesec">
                <div class="msghead">Message from Chairman</div>
                <div class="message">
                    {{$detail->message}}

                    <br>
                    <span id="regard1">Warm regards, </span>
                    <br>
                    <span id="regard2">Zubair Dar </span>
                    <br>
                    <span id="regard2">Chairman, Zubi Tours and Holiday Kashmir</span>
                </div>
            </div>
        </section>
    </div>
 
    <!-- FOOTER  -->

    @include('frontend.body.footer')
