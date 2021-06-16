<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Ticket</title>
    <style type="text/css" media="all">
        html {
            clear: both;
        }
        @page {
            margin: 0;
        }
        body {
            margin: 0;
            text-shadow: 2px 2px gold !important;
            color: #681319;
            /*color: #000;*/
            font-size: 20px;
            font-weight: bolder;
        }
        .ww-title {
            font-family: "Great Vibes", cursive;
            color: white;
            margin-bottom: .3rem;
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

        .wedding-card__seat {
            width: 10%;
            float: left;
            text-align: center;
        }

        .wedding-card__seat p {
            font-size: 20px;
            text-align: center;
            writing-mode: vertical-lr;
            padding-top: 3rem;
            margin-left: 1rem;
        }
        .wedding-card__barcode p {
            margin-top: 1rem;
            color: #681319;
            /*color: #000;*/
            font-weight: bold;
        }

        .wedding-card__barcode img {
            display: block;
            margin-top: 3%;
            border: none;
        }

        .center-text {
            text-align: center;
        }

        #wedding-card{
            background-color: #000000; width: 650px; padding: 5px 20px;
            border-radius: 25px; clear: both; margin: 100px auto; position: relative; overflow: hidden; height: 250px;
            background-image: url({{ asset('img/bg.jpg') }}); background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            border: 2px solid gold;
        }

    </style>

</head>
<body>
    <div id="wedding-card" style="">
        <div class="wedding-card__main-info" style="width: 400px; float: left; padding: 5px">
            <div class="event-info" style="width: 400px; position: relative;opacity: 1;">
                <div class="venue" style="width: 350px;  display: inline-block;">
                    <p class="border-b">{{ $guest->weddingEvent->event_center }}.</p>
                    <small>Name: {{ $guest->name }}</small><br/>
                    <small>Time: {{ $guest->weddingEvent->start_time }} - {{ $guest->weddingEvent->end_time }}</small><br/>
                    <small>No Guest(s): {{ $guest->number_of_guest }}</small>
                </div>
            </div>
        </div>
        <div class="wedding-card__barcode" style="width: 200px; float: right;">
            <img src="{{ $link }}" alt="" style="width: 100%">
            <p class="center-text text-letter-spacing">ACCESS</p>
        </div>
    </div>
</body>
</html>
