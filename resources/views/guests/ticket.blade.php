<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticket</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        .ww-title {
            font-family: "Great Vibes", cursive;
            color: white;
            margin-bottom: .3rem;
        }


        [data-aos] {
            opacity: 1 !important;
            transform: translate(0) scale(1) !important;
        }

        .border-r {
            border-right: 1px dotted #fada5f;
        }

        .border-l {
            border-left: 1px dotted #fada5f;
        }

        .border-t {
            border-top: 1px dotted #fada5f;
        }

        .border-b {
            border-bottom: 1px dotted #fada5f;
        }

        .text-letter-spacing {
            letter-spacing: 5px;
        }

        .wedding-card {
            background-color: #681319;
            width: 550px;
            border-radius: 25px;
            content: "";
            clear: both;
            display: table;
            margin: 100px auto;
        }

        .wedding-card__seat {
            width: 10%;
            text-align: center;
            float: left;
        }

        .wedding-card__seat p {
            font-size: 20px;
            text-align: center;
            writing-mode: vertical-lr;
            padding-top: 3rem;
            margin-left: 1rem;

        }

        .wedding-card__main-info {
            width: 55%;
            float: left;
            padding: 0.5rem 0;
        }

        .event-info .venue {
            width: 70%;
            float: left;
            font-size: .8rem;
            line-height: 1.2rem;
        }

        .event-info .venue p {
            padding: 0 .7rem .7rem;
        }

        .event-info .venue small {
            padding: 0 .7rem;
        }

        .event-info .date {
            width: 25%;
            float: left;
            text-align: center;
        }

        .event-info .date p {
            padding-bottom: 2.2rem;
        }

        .wedding-card__barcode {
            width: 25%;
            float: left;
            padding: 1rem;
        }

        .wedding-card__barcode p {
            margin-top: 1rem;
            color: white;
            font-weight: bold;
        }

        .wedding-card__barcode img {
            width: 100%;
        }

        .center-text {
            text-align: center;
        }

    </style>
</head>
<body id="top" style="color: #fada5f;">
<div>
    <div class="wedding-card">
        <div class="wedding-card__seat">
            <p>Ticket for {{ $guest->number_of_guest }} seat(s)</p>
        </div>
        <div class="border-l wedding-card__main-info">
            <section class="center-text">
                <h2 class="ww-title text-letter-spacing">{{ $guest->weddingEvent->bride }}</h2>
                <div>
                    <img src="{{ asset('asset/images/divider.PNG') }}" alt="">
                </div>
                <h2 class="ww-title text-letter-spacing">{{ $guest->weddingEvent->groom }}</h2>
            </section>
            <section class="event-info border-t">
                <section
                    class="border-r venue">
                    <p class="border-b">{{ $guest->weddingEvent->address }}.</p>
                    <small>Name: {{ $guest->name }}</small><br/>
                    <small>Time: {{ $guest->weddingEvent->start_time }}-{{ $guest->weddingEvent->end_time }}</small>
                </section>
                <section class="date">
                    <p>
                        <small>{{ date_format(date_create($guest->weddingEvent->date), 'F dS') }}</small>
                        <br/>{{ date_format(date_create($guest->weddingEvent->date), 'Y') }}</p>
                </section>
            </section>
        </div>
        <div class="wedding-card__barcode">
{{--                        <img src="{{ $link }}" alt="" style="width: 100%">--}}
            <img src="{{ asset('asset/images/qrCode.jpg') }}" alt="">
            <p class="center-text text-letter-spacing">ACCESS</p>
        </div>
    </div>
</div>
</body>
</html>
