<!DOCTYPE html>
<html><head>

    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <title>Payslip</title>

    <style type="text/css">
        body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; font-size:1.1em; }
        a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  }
        a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  }
        comment { display:none;  }
    </style>

</head>

<body>

<div>
    <p>Dear {{ $guest->name }},</p>
        <p>
            Kindly find attached your ticket for {{ $guest->weddingEvent->name }}
        </p>
        <p> The event is coming up on {{  $guest->weddingEvent->date}}</p>

    Kind regards,<br>
    __________________________________________<br>
    <address style="color: #851e2b">
        {{  $guest->weddingEvent->address}}
    </address>
    DISCLAIMER: This message and any attachment herewith is confidential and may contain legally privileged
    and protected information. It is intended only for the use of the named recipient.
    Internet communications are not secure and therefore iPaySuite does not accept legal
    responsibility for errors or omissions in this email. iPaySuite will also not be liable for any
    damage or loss caused by any virus transmitted with this email. If you have received this email by mistake,
    please let us know by e-mail and delete such from your system; you may not copy this message or
    disclose its contents to anyone. Violation of this notice may be unlawful.
</div>
</body>
</html>
