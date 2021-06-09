<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticket</title>
    <link href="{{ asset('asset/css/bootstrap.min.css?ver=1.1.0') }}" rel="stylesheet">
    <noscript>
        <style type="text/css">
            [data-aos] {
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }
            body{
                color: purple !important;
            }
        </style>
    </noscript>
</head>
<body id="top" style="color: purple;">
<div style="width:100%; margin: 10px auto;">
    <div style="border-radius: 8px; padding: 50px; width: 800px; border-style: solid; border-color: gold; align-content: center; position: relative">
        <img height="400" src="{{ asset('asset/images/invitation_card.jpg') }}" alt="invitation" />
{{--        {!! $guest->barcode !!}--}}
        <img height="400" src="{{ $link }}" style="margin-top: 0;" alt="barcode">
        <h4 style="text-align: center">Access Barcode</h4>
    </div>
</div>
    <script src="{{ asset('asset/scripts/jquery.min.js?ver=1.1.0') }}"></script>
    <script src="{{ asset('asset/scripts/bootstrap.bundle.min.js?ver=1.1.0') }}"></script>
</body>
</html>
