<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticket</title>
    <style type="text/css">
        .ww-home-page .ww-wedding-announcement img {
            max-height: 350px;
            width: auto; }

        .ww-title {
            font-family: "Great Vibes", cursive; }

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
    <div class="d-flex justify-content-center align-items-center" style="height: 100%; position: relative; width: 100%">
        <div class="shadow-sm d-flex p-1 card-container">
            <div style="width: 10%;" class="d-flex flex-column justify-content-center border-r" >
                <p style="font-size: 20px; writing-mode: vertical-lr" class="text-center">Ticket for {{ $guest->number_of_guest }} seat(s)</p>
            </div>
            <div style="width: 60%;" class="d-flex flex-column justify-content-around px-1">
                <section class="text-center">
                    <h2 class="ww-title text-letter-spacing text-white">{{ $guest->weddingEvent->bride }}</h2>
                    <div>
                        <img src="{{ asset('asset/images/divider.PNG') }}" alt="">
                    </div>
                    <h2 class="ww-title text-letter-spacing text-white">{{ $guest->weddingEvent->groom }}</h2>
                </section>
            <section class="d-flex border-t">
                <section style="width: 75%; align-content: center" class="w-75 px-1 flex-column justify-content-between align-items-center border-r">
                    <p class="pb-1 border-b"><small>{{ $guest->weddingEvent->address }}.</small></p>
                    <small>Name: {{ $guest->name }}</small><br/>
                    <small>Time: {{ $guest->weddingEvent->start_time }}-{{ $guest->weddingEvent->end_time }}</small>
                </section>
                <section class="w-25 d-flex flex-column justify-content-between text-center px-1">
                    <p class="pb-4 border-b"><small>{{ date_format(date_create($guest->weddingEvent->date), 'F dS') }}</small> <br/>{{ date_format(date_create($guest->weddingEvent->date), 'Y') }}</p>
                </section>
            </section>
            </div>
            <div style="width: 30%;" class="p-2">
                <img src="{{ $link }}" alt="" style="width: 100%">
                <p class="text-center mt-3 text-white font-weight-bolder text-letter-spacing">ACCESS</p>
            </div>
        </div>
    </div>
</body>
</html>
