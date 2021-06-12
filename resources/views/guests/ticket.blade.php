<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticket</title>
    <link href="{{ asset('asset/css/bootstrap.min.css?ver=1.1.0') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap"/>
    </noscript>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap"/>
    </noscript>
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link href="{{ asset('asset/css/bootstrap.min.css?ver=1.1.0') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/font-awesome/css/all.min.css?ver=1.1.0') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/aos.css?ver=1.1.0') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/ekko-lightbox.css?ver=1.1.0') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/main.css') }}" rel="stylesheet">
        <style type="text/css">
            [data-aos] {
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }
            .card-container{
                background-color: #681319;
                min-height: 200px;
                width: 550px;
                border-radius: 30px;
            }
            .text-color{
                color: #fada5f;
            }
            .border-r{
                border-right: 1px dotted #fada5f;
            }
            .border-t{
                border-top: 1px dotted #fada5f;
            }
            .border-b{
                border-bottom: 1px dotted #fada5f;
            }
            .text-letter-spacing{
                letter-spacing: 5px;
            }

        </style>

</head>
<body id="top" style="color: #fada5f;">
{{--<div style="width:100%; margin: 10px auto;">--}}
{{--    <div style="border-radius: 8px; padding: 50px; width: 800px; border-style: solid; border-color: gold; align-content: center; position: relative">--}}
{{--        <img height="400" src="{{ asset('asset/images/invitation_card.jpg') }}" alt="invitation" />--}}
{{--        {!! $guest->barcode !!}--}}
{{--        <img height="400" src="{{ $link }}" style="margin-top: 0;" alt="barcode">--}}
{{--        <h4 style="text-align: center">Access Barcode</h4>--}}
{{--    </div>--}}
{{--</div>--}}

    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="shadow-sm d-flex p-1 card-container" style="">
            <div style="width: 10%;" class="d-flex flex-column justify-content-center border-r" >
                <p style="font-size: 20px; writing-mode: vertical-lr" class="text-center">Ticket One</p>
            </div>
            <div style="width: 60%;" class="d-flex flex-column justify-content-around px-1">
                <section class="text-center">
{{--                    <h4 class="font-weight-lighter mb-3" style="letter-spacing: 5px">Save The Date</h4>--}}
                    <h2 class="ww-title text-letter-spacing text-white">Michelle Michelle</h2>
                    <div>
                        <img src="{{ asset('asset/images/divider.PNG') }}" alt="">
                    </div>
                    <h2 class="ww-title text-letter-spacing text-white">David David</h2>
                </section>
            <section class="d-flex border-t">
                <section class="w-75 px-1 flex-column justify-content-between align-items-center border-r">
                    <p class="pb-1 border-b">Emeritus Professor Theophilus Oladipo Ogunlesi Hall, Ibadan, Nigeria.</p>
                    <p>Saturday, 24th July</p>
                </section>
                <section class="w-25 d-flex flex-column justify-content-between text-center px-1">
                    <p class="pb-4 border-b">12 PM</p>
                    <p>2021</p>
                </section>
            </section>
            </div>
            <div style="width: 30%;" class="p-2">
                <img src="{{ asset('asset/images/qrCode.jpg') }}" alt="" style="width: 100%">
                <p class="text-center mt-3 text-white font-weight-bolder text-letter-spacing">ACCESS</p>
            </div>
        </div>
    </div>
<script src="{{ asset('asset/scripts/jquery.min.js?ver=1.1.0') }}"></script>
<script src="{{ asset('asset/scripts/bootstrap.bundle.min.js?ver=1.1.0') }}"></script>
<script src="{{ asset('asset/scripts/aos.js?ver=1.1.0') }}"></script>
<script src="{{ asset('asset/scripts/ekko-lightbox.min.js?ver=1.1.0') }}"></script>
<script src="{{ asset('asset/scripts/main.js?ver=1.1.0') }}"></script>
</body>
</html>
