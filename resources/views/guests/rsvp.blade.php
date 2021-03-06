<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $event->name }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&amp;display=swap"/>
    </noscript>
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap"/>
    </noscript>
    <link href="{{ asset('asset/css/bootstrap.min.css?ver=1.1.0') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/font-awesome/css/all.min.css?ver=1.1.0') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/aos.css?ver=1.1.0') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/ekko-lightbox.css?ver=1.1.0') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/main.css') }}" rel="stylesheet">
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
<header></header>
<div class="page-content">
    <div class="div">
        <div class="ww-home-page" id="home">
            <div class="ww-wedding-announcement d-flex align-items-center justify-content-start">
                <div class="container ww-announcement-container">
                    <p class="ww-couple-name ww-title" data-aos="zoom-in-down" data-aos-delay="300" data-aos-duration="1000">
                        {{ $event->name }}
                    </p>
                    <img class="img-fluid mt-1" src="{{ asset('asset/images/laurel-1.png') }}" alt="Heart" data-aos="zoom-in-down" data-aos-delay="300" data-aos-duration="1000"/>
                    <p class="h2 mt-5 ww-title" data-aos="zoom-in-down" data-aos-delay="300" data-aos-duration="1000" data-aos-offset="10">
                        {{ date_format(date_create($event->date), 'F dS, Y') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="ww-nav-bar sticky-top bg-light">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container"><a href="#"><svg class="heart" viewBox="0 0 32 29.6"><path d="M23.6,0c-3.4,0-6.3,2.7-7.6,5.6C14.7,2.7,11.8,0,8.4,0C3.8,0,0,3.8,0,8.4c0,9.4,9.5,11.9,16,21.2c6.1-9.3,16-12.1,16-21.2C32,3.8,28.2,0,23.6,0z"/>
                        </svg></a>
                    <h1 class="h2"><a class="pl-4 navbar-brand" href="#">{{ $event->name }}</a></h1>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ww-navbarNav" aria-controls="ww-navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse text-uppercase" id="ww-navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#home">Home</a></li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#couple">Couple</a></li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#events">Events</a></li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#rsvp">RSVP</a></li>
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="#gallery">Gallery</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="ww-section" id="couple">
            <div class="container">
                <h2 class="h1 text-center pb-3 ww-title" data-aos="zoom-in-down" data-aos-duration="1000">Groom & Bride</h2>
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="mt-3"><img class="img-fluid" src="{{ asset('asset/images/groom.jpg') }}" alt="Groom" data-aos="flip-left" data-aos-duration="1000"/>
                            <p class="pt-3 text-left text-muted"></p>
                            <h3 class="h2 ww-title">Michelle & David </h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-3"><img class="img-fluid" src="{{ asset('asset/images/ore_iv.jpg') }}" alt="Bride" data-aos="flip-right" data-aos-duration="1000"/>
                            <p class="pt-3 text-left text-muted"></p>
                            <h3 class="h2 ww-title"> Invitation Card</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ww-section bg-light" id="events">
            <div class="container ww-wedding-event">
                <h2 class="h1 text-center pb-3 ww-title" data-aos="zoom-in-down" data-aos-duration="1000">Wedding Events</h2>
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="my-3">
                            <div class="h4">Church Wedding</div>
                            <ul>
                                <li><i class="text-muted fas fa-map-marker-alt"></i><span class="pl-2 text-muted">Oritamefa Baptist Church, Queen Elizabeth II Road, Total Garden, Ibadan, Nigeria</span></li>
                                <li class="pt-2"><i class="text-muted far fa-calendar-alt"></i><span class="pl-2 text-muted">24th July 2021, 10AM - 11AM</span></li>
                            </ul>
                            <p data-aos="fade-down-right" data-aos-duration="1000">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.605788145804!2d3.9057906145957926!3d7.397990894662158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1039929fbdfe5c97%3A0xf767333873fdfe05!2sOritamefa%20Baptist%20Church!5e0!3m2!1sen!2sng!4v1623056157367!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="my-3">
                            <div class="h4">Reception</div>
                            <ul>
                                <li><i class="text-muted fas fa-map-marker-alt "></i><span class="pl-2 text-muted">Emeritus Professor Theophilus Oladipo Ogunlesi Hall, Ibadan, Nigeria.</span></li>
                                <li class="pt-2"><i class="text-muted far fa-calendar-alt "></i><span class="pl-2 text-muted">24th July 2021, 12AM - 4PM</span></li>
                            </ul>
                            <p data-aos="fade-up-right" data-aos-duration="1000">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.982790507321!2d3.87119121477543!3d7.35582489469189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10398d2d5f734d23%3A0xaf22cc6544dccb36!2sProf.%20Emeritus%20Ogunlesi%20Hall!5e0!3m2!1sen!2sng!4v1623055700715!5m2!1sen!2sng"
                                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">

                                </iframe>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ww-section ww-rsvp-detail text-white" id="rsvp">
            <div class="container" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="col text-center">
                    <h2 class="h1 ww-title pb-3" data-aos="zoom-in-down" data-aos-duration="1000">RSVP</h2>
                </div>
                <div class="row ww-rsvp-form">
                    <div class="col-md-10">
                        <div class="card-body">
                            <form action="{{ route('event-guests-rsvp', $event->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col md-12 pb-3">
                                        <div class="form-group">
                                            <label for="name-input">Full Name/Family Name*</label>
                                            <input class="form-control" id="name-input" type="text" name="name" required="required"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pb-3">
                                        <div class="form-group">
                                            <label for="email-input">Email*</label>
                                            <input class="form-control" id="email-input" type="email" name="email" required="required"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pb-3">
                                        <div class="form-group">
                                            <label for="phone-input">Phone*</label>
                                            <input class="form-control" id="phone-input" type="tel" name="phone" required="required"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col md-6 pb-3">
                                        <div class="form-group">
                                            <label for="number_of_guest">Number of Guests</label>
                                            <select class="form-control" id="number_of_guest" name="number_of_guest">
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                                <option value="4">Four</option>
                                                <option value="5">Five</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col md-6 pb-3">
                                        <div class="form-group">
                                            <label for="reserved_for">Reserved For</label>
                                            <select class="form-control" id="reserved_for" name="reserved_for">
                                                <option value="single">Single</option>
                                                <option value="couple">Couple</option>
                                                <option value="family">Family</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pb-3">
                                        <div class="form-group">
                                            <label for="events-input">I am Attending</label>
                                            <select class="form-control" id="events-input" name="attending">
                                                <option value="all-event">All Events</option>
                                                <option value="wedding-ceremony">Wedding ceremony</option>
                                                <option value="reception-party">Reception Party</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pb-3">
                                        <div class="form-group">
                                            <label for="room_needed">Room Needed?</label>
                                            <select class="form-control" id="room_needed" name="room_needed">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="message-input">Your Message</label>
                                            <textarea class="form-control" id="message-input" name="comment" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button class="btn btn-primary btn-submit" type="submit">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="ww-section bg-light" id="gallery">
                <div class="ww-photo-gallery">
                    <div class="container">
                        <h2 class="h1 text-center pb-3 ww-title" data-aos="zoom-in-down" data-aos-duration="1000">Photo Gallery</h2>
                        <div class="col-md-12 text-center ww-category-filter mb-4">
                            <a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="all">All</a>
                            <a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="introduction">Introduction</a>
                            <a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="parent">Parents</a>
                            <a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="party">Party</a>
                            <a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="ceremony">Ceremony</a>
                            <a class="btn btn-outline-primary ww-filter-button" href="#" data-filter="wedding">Wedding</a>
                        </div>
                        <div class="ww-gallery" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-duration="1000" data-aos-offset="0">
                            <div class="card-columns">
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/couple.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/couple.jpeg') }}" alt="Couple"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;,&quot;parent&quot;]">
                                    <a href="{{ asset('asset/images/introduction/michelle_parent.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/michelle_parent.jpeg') }}" alt="Michelle's parent"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;,&quot;parent&quot;]">
                                    <a href="{{ asset('asset/images/introduction/ore_parent_2.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/ore_parent_2.jpeg') }}" alt="David's Parent"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/couple_and_wife_siblings.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/couple_and_wife_siblings.jpeg') }}" alt="Michel Siblings"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/family_pic.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/family_pic.jpeg') }}" alt="Family Picture"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/her_eminence.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/her_eminence.jpeg') }}" alt="CAN President's Wife"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/michel_siblings-1.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/michel_siblings-1.jpeg') }}" alt="Michelle Siblings"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;,&quot;parent&quot;]">
                                    <a href="{{ asset('asset/images/introduction/michelle_mother.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/michelle_mother.jpeg') }}" alt="Michelle Mother"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/ore_pastor.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/ore_pastor.jpeg') }}" alt="David's Pastor"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/uncle_b.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/uncle_b.jpeg') }}" alt="Uncle B"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/femi_michelle.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/femi_michelle.jpeg') }}" alt="Uncle B"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/michelle_sisters.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/michelle_sisters.jpeg') }}" alt="Uncle B"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;,&quot;parent&quot;]">
                                    <a href="{{ asset('asset/images/introduction/couple_and_parent_1.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/couple_and_parent_1.jpeg') }}" alt="Uncle B"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;,&quot;parent&quot;]">
                                    <a href="{{ asset('asset/images/introduction/couple_and_parent_2.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/couple_and_parent_2.jpeg') }}" alt="Uncle B"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/general.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/general.jpeg') }}" alt="Uncle B"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/guys.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/guys.jpeg') }}" alt="Uncle B"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/couple_and_david_family.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/couple_and_david_family.jpeg') }}" alt="Uncle B"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;,&quot;parent&quot;]">
                                    <a href="{{ asset('asset/images/introduction/michelle_father.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/michelle_father.jpeg') }}" alt="Uncle B"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;,&quot;parent&quot;]">
                                    <a href="{{ asset('asset/images/introduction/david_father.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/david_father.jpeg') }}" alt="Uncle B"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/enioluwa.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/enioluwa.jpeg') }}" alt="Uncle B"/>
                                    </a>
                                </div>
                                <div class="card" data-groups="[&quot;introduction&quot;]">
                                    <a href="{{ asset('asset/images/introduction/david.jpeg') }}" data-toggle="lightbox" data-gallery="ww-gallery">
                                        <img class="img-fluid" src="{{ asset('asset/images/introduction/david.jpeg') }}" alt="Uncle B"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ww-footer bg-light">
                <div class="container text-center py-4">
                    <p class="my-0">&copy; Tforensic.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<footer></footer>
<script src="{{ asset('asset/scripts/jquery.min.js?ver=1.1.0') }}"></script>
<script src="{{ asset('asset/scripts/bootstrap.bundle.min.js?ver=1.1.0') }}"></script>
<script src="{{ asset('asset/scripts/aos.js?ver=1.1.0') }}"></script>
<script src="{{ asset('asset/scripts/ekko-lightbox.min.js?ver=1.1.0') }}"></script>
<script src="{{ asset('asset/scripts/main.js?ver=1.1.0') }}"></script>
</body>
</html>
