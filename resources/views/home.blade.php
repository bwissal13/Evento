@extends('layout.layout')
@section('content')

    <body class="demo-1">
        <!--MAIN WRAPPER START-->


        <!-- SECTION -->
        <section class="content">
            <!-- MAIN VIDEO BACKGROUND -->
            <div class="main-video">
                <div class="image-background">
                    <img src="{{ asset('img/we-can-dance-forever2.png') }}" alt="">
                </div>
                <div class="image-title">
                    <p>Creating moments to remember</p>
                    <p> </p>
                    <a href="#" class="button-basic-1">All Events</a>
                </div>
                <div class="video-background">
                    <video autoplay muted loop id="myVideo">
                        <source src="{{ asset('img/concert-loop.mp4') }} " type="video/mp4">
                    </video>
                </div>
            </div>
            <!-- MAIN VIDEO BACKGROUND END -->
            <!-- GlOBAL BLOCK -->
            <div class="global-block">
                <div class="container">
                    <div class="global-block-wrap grid grid-cols-12 gap-8">
                        <div class="global-img col-span-5 sm:col-span-12 res:col-span-12">
                            <div class="item-content">
                                <div class="img-header">
                                    <a class="pattern" href="#">
                                        <img src="{{ asset('img/event-img.png') }}" alt="event-img">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="global-counter col-span-7 sm:col-span-12 res:col-span-12">
                            <div class="global-title">
                                <a href="#" class="button-basic-1">Electro</a>
                                <h2 data-aos="fade-up">Global Fridays Glow Up 4.20</h2>
                                <h5 data-aos="fade-up">/ 26 SEPTEMBER 2021</h5>
                                <p class="dugem-text" data-aos="fade-up">Mauris varius porttitor suscipit. Quisque justo
                                    tortor, convallis id elit vitae, posuere ullamcorper ante. Sed in magna viverra,
                                    fermentum arcu sit amet, porttitor nulla. Vestibulum vestibulum sem neque.</p>
                            </div>
                            <div class="global-buy" data-aos="fade-up">
                                <a href="single-event.html" class="button-basic-1">View Detail</a>
                                <a href="#" class="button-basic-2">Get Ticket</a>
                            </div>
                            <div class="global-countdown">
                                <div class="event-counter clearfix">
                                    <div class="countdown">
                                        <div class="days-count float">
                                            <h3 id="days"></h3>
                                            <span>Days</span>
                                        </div>
                                        <div class="hours-count float">
                                            <h3 id="hours"></h3>
                                            <span>Hours</span>
                                        </div>
                                        <div class="minutes-count float">
                                            <h3 id="minutes"></h3>
                                            <span>Minutes</span>
                                        </div>
                                        <div class="seconds-count float">
                                            <h3 id="seconds">
                                            </h3>
                                            <span>Seconds</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- GlOBAL BLOCK END -->
            <!-- TABLE EVENTS -->
            <div class="table-events">
                <div class="background-overlay"></div>
                <div class="container">

                    <div class="the-title text-center" data-aos="fade-up">
                        <h5 class="head-title-2"> / EVENTS </h5>
                        <h2 class="head-title-1"> Upcoming Event
                            <span class="title-end">.</span>
                        </h2>
                        <p class="dugem-text"> Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean
                            sollicitudin, lorem quis bibendum auctor.</p>
                    </div>
                    <table class="event">
                        <tr>
                            <td>Date</td>
                            <td class="event-thumb-head"></td>
                            <td>Title</td>
                            <td>Location</td>
                            <td>Category</td>
                            <td>Ticket</td>


                        </tr>
                        <tr class="space">
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                        {{-- <tr>
                                <td class="event-date">26/09/2021</td>
                                <td class="event-thumb">
                                    <a href="single-event.html">
                                        <img width="70" height="100" src="{{ asset(' img/upcoming-event-1.png') }}" alt="table-1"> 
                                    </a>
                                </td>
                                <td class="event-artist">DJ Ocean &amp; DJ Thunder</td>
                                <td class="event-title">
                                    <a href="single-event.html">Global Fridays</a>
                                </td>
                                <td class="event-ticket-link">
                                    <a href="#" class="button button-white rsvp">BOOK</a>
                                    <a href="#" class="button button-white">BUY TICKET</a>
                                </td>
                            </tr> --}}

                        @foreach ($events as $event)
                            <tr>


                                <td>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</td>
                                <td class="event-thumb">
                                    <a href="{{ route('events.single', ['event' => $event->id]) }}">
                                        <img width="70" height="100" src="{{ asset('img/upcoming-event-1.png') }}"
                                            alt="table-1">
                                    </a>
                                </td>

                                <td>{{ $event->title }}</td>
                                <td>{{ $event->location }}</td>
                                <td>{{ $event->category->name }}</td>
                                <td class="event-ticket-link">

                                    <a href="" class="button button-white">Details</a>
                                </td>

                            </tr>

                            <tr class="space">
                                <td>&nbsp;</td>
                            </tr>
                        @endforeach

                        {{-- <tr>
                                <td class="event-date">26/03/2021</td>
                                <td class="event-thumb">
                                    <a href="single-event.html">
                                        <img width="70" height="100" src="{{ asset('img/upcoming-event-2.png') }} " alt="table-2"> 
                                    </a>
                                </td>
                                <td class="event-artist">W. Illinvois</td>
                                <td class="event-title">
                                    <a href="single-event.html">Chicago Indrustry</a>
                                </td>
                                <td class="event-ticket-link">
                                    <span class="sold">EXPIRED</span>
                                </td>
                            </tr>
                            <tr class="space">
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td class="event-date">26/03/2021</td>
                                <td class="event-thumb">
                                    <a href="single-event.html">
                                        <img width="70" height="100" src="{{ asset('img/upcoming-event-3.png') }}  " alt="table-3"> 
                                    </a>
                                </td>
                                <td class="event-artist">Apollo Xo</td>
                                <td class="event-title">
                                    <a href="single-event.html">The Underground</a>
                                </td>
                                <td class="event-ticket-link">
                                    <span class="sold">EXPIRED</span>
                                </td>
                            </tr>
                            <tr class="space">
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td class="event-date">26/05/2021</td>
                                <td class="event-thumb">
                                    <a href="single-event.html">
                                        <img width="70" height="100" src="{{ asset('img/upcoming-event-4.png') }} " alt="table-4"> 
                                    </a>
                                </td>
                                <td class="event-artist">Underground Music</td>
                                <td class="event-title">
                                    <a href="single-event.html">EDM</a>
                                </td>
                                <td class="event-ticket-link">
                                    <span class="sold">EXPIRED</span>
                                </td>
                            </tr>
                            <tr class="space">
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td class="event-date">26/06/2021</td>
                                <td class="event-thumb">
                                    <a href="single-event.html">
                                        <img width="70" height="100" src="{{ asset('img/upcoming-event-5.png') }} " alt="table-5"> 
                                    </a>
                                </td>
                                <td class="event-artist">Bhad Bhabie</td>
                                <td class="event-title">
                                    <a href="single-event.html">Asian Dolls</a>
                                </td>
                                <td class="event-ticket-link">
                                    <span class="sold">EXPIRED</span>
                                </td>
                            </tr>
                            <tr class="space">
                                <td>
                                    &nbsp;
                                </td>
                            </tr> --}}
                    </table>
                    <div class="event-mobile">
                        <ul class="event-list">
                            <li>
                                <span class="img-thumb">
                                    <a href="single-event.html">
                                        <img width="70" height="100" src="{{ asset('img/upcoming-event-1.png') }} "
                                            alt="table-1-1">
                                    </a>
                                </span>
                                <p><span>Date :</span> <a href="#">26/09/2022</a></p>
                                <p><span>Artist :</span> <a href="#">DJ Ocean &amp; DJ Thunder</a></p>
                                <p><span>Event :</span> <a href="#">Global Fridays</a></p>
                                <p>
                                    <a href="#" class="button-basic-1">BUY TICKET</a>
                                </p>
                            </li>
                            <li>
                                <span class="img-thumb">
                                    <a href="single-event.html">
                                        <img width="70" height="100" src="{{ asset('img/upcoming-event-2.png') }} "
                                            alt="table-1-2">
                                    </a>
                                </span>
                                <p><span>Date :</span> <a href="#">26/03/2021</a></p>
                                <p><span>Artist :</span> <a href="#">W. Illinvois</a></p>
                                <p><span>Event :</span> <a href="#">Chicago Indrustry</a></p>
                                <p>
                                    <a href="#" class="button-basic-1">BUY TICKET</a>
                                </p>
                            </li>
                            <li>
                                <span class="img-thumb">
                                    <a href="single-event.html">
                                        <img width="70" height="100" src="{{ asset('img/upcoming-event-3.png') }} "
                                            alt="table-1-3">
                                    </a>
                                </span>
                                <p><span>Date :</span> <a href="#">26/03/2021</a></p>
                                <p><span>Artist :</span> <a href="#">Apollo Xo</a></p>
                                <p><span>Event :</span> <a href="#">The Underground</a></p>
                                <p>
                                    <a href="#" class="button-basic-1">BUY TICKET</a>
                                </p>
                            </li>
                            <li>
                                <span class="img-thumb">
                                    <a href="single-event.html">
                                        <img width="70" height="100"
                                            src="{{ asset('img/upcoming-event-4.png') }} " alt="table-1-4">
                                    </a>
                                </span>
                                <p><span>Date :</span> <a href="#">26/05/2021</a></p>
                                <p><span>Artist :</span> <a href="#">Underground Music</a></p>
                                <p><span>Event :</span> <a href="#">EDM</a></p>
                                <p>
                                    <span class="sold">TICKET SOLD OUT</span>
                                </p>
                            </li>
                            <li>
                                <span class="img-thumb">
                                    <a href="single-event.html">
                                        <img width="70" height="100"
                                            src=" {{ asset('img/upcoming-event-5.png') }}" alt="table-1-5">
                                    </a>
                                </span>
                                <p><span>Date :</span> <a href="#">26/06/2021</a></p>
                                <p><span>Artist :</span> <a href="#">Bhad Bhabie</a></p>
                                <p><span>Event :</span> <a href="#">Asian Dolls</a></p>
                                <p>
                                    <a href="#" class="button-basic-1">BUY TICKET</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="button-view text-center">
                        <a href="event.html" class="button-basic-1" data-aos="fade-up">VIEW ALL EVENT</a>
                    </div>

                </div>
            </div>
            <!-- TABLE EVENTS END -->
            <!-- BLOG LOOP -->
            <div class="blog-loop">
                <div class="container">
                    <div class="news-title grid grid-cols-12">
                        <div class="the-title col-span-6 sm:col-span-12 res:col-span-12" data-aos="fade-up">
                            <h5 class="head-title-2"> / EVENTS </h5>
                            <h2 class="head-title-1"> Upcoming Event
                                <span class="title-end">.</span>
                            </h2>
                            <p class="dugem-text"> Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean
                                sollicitudin, lorem quis bibendum auctor.</p>
                        </div>
                        <div class="button-view col-span-6 sm:col-span-12 res:col-span-12" data-aos="fade-up">
                            <a href="blog.html" class="button-basic-1">ALL JOURNAL</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="blog-slide">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-post">
                                        <div class="post-thumb">
                                            <a href="single-post.html">
                                                <img src="{{ asset('img/latest-blog-news-1.png') }} " alt="latest-news-img-1">
                                                <div class="dugem-overlay"></div>
                                            </a>
                                        </div>
                                        <div class="post-content-wrap">
                                            <div class="post-category">
                                                <a href="#" class="button-basic-1">Event News</a>
                                            </div>
                                            <div class="post-title">
                                                <h3>
                                                    <a href="single-post.html">
                                                        Maecenas ultrices justo metusoer quis facilisis
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="post-date">
                                                <a href="#"><span>August 30, 2021</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-post">
                                        <div class="post-thumb">
                                            <a href="single-post.html">
                                                <img src="{{ asset('img/latest-blog-news-2.png') }} " alt="latest-news-img-2">
                                                <div class="dugem-overlay"></div>
                                            </a>
                                        </div>
                                        <div class="post-content-wrap">
                                            <div class="post-category">
                                                <a href="#" class="button-basic-1">Nightlife</a>
                                            </div>
                                            <div class="post-title">
                                                <h3>
                                                    <a href="single-post.html">
                                                        Proin in orci quis elit blandit imperdiet ut eu enim
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="post-date">
                                                <a href="#"><span>April 30, 2021</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-post">
                                        <div class="post-thumb">
                                            <a href="single-post.html">
                                                <img src="{{ asset('img/latest-blog-news-3.png') }} " alt="latest-news-img-3">
                                                <div class="dugem-overlay"></div>
                                            </a>
                                        </div>
                                        <div class="post-content-wrap">
                                            <div class="post-category">
                                                <a href="#" class="button-basic-1">Nightlife</a>
                                            </div>
                                            <div class="post-title">
                                                <h3>
                                                    <a href="single-post.html">
                                                        Donec condimentum pulvinorem velitursus vitae
                                                    </a></h3>
                                            </div>
                                            <div class="post-date">
                                                <a href="#"><span>April 30, 2021</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-post">
                                        <div class="post-thumb">
                                            <a href="single-post.html">
                                                <img src="{{ asset('img/latest-blog-news-4.png') }} " alt="latest-news-img-4">
                                                <div class="dugem-overlay"></div>
                                            </a>
                                        </div>
                                        <div class="post-content-wrap">
                                            <div class="post-category">
                                                <a href="#" class="button-basic-1">Event News</a>
                                            </div>
                                            <div class="post-title">
                                                <h3>
                                                    <a href="single-post.html">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="post-date">
                                                <a href="#"><span>April 30, 2021</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-post">
                                        <div class="post-thumb">
                                            <a href="single-post.html">
                                                <img src="{{ asset('img/latest-blog-news-5.png') }} " alt="latest-news-img-5">
                                                <div class="dugem-overlay"></div>
                                            </a>
                                        </div>
                                        <div class="post-content-wrap">
                                            <div class="post-category">
                                                <a href="#" class="button-basic-1">Contest</a>
                                            </div>
                                            <div class="post-title">
                                                <h3>
                                                    <a href="single-post.html">
                                                        Vivamus pulvinar urna nec ipsum interdum blandi
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="post-date">
                                                <a href="#"><span>April 30, 2021</span></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div> --}}
                <div class="blog-slide">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($events as $event)
                                <div class="swiper-slide">
                                    <div class="swiper-post">
                                        <div class="post-thumb">
                                            <a href="{{ route('events.show', $event->id) }}">
                                                <img src="{{ asset('img/latest-blog-news-1.png') }}"
                                                    alt="latest-news-img-1">
                                                <div class="dugem-overlay"></div>
                                            </a>
                                        </div>
                                        <div class="post-content-wrap">
                                            <div class="post-category">
                                                <a href="{{ route('categories.show', $event->category->id) }}"
                                                    class="button-basic-1">{{ $event->category->name }}</a>
                                            </div>
                                            <div class="post-title">
                                                <h3>
                                                    <a href="{{ route('events.show', $event->id) }}">
                                                        {{ $event->title }}
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="post-date">
                                                <a href="#">
                                                    <span>{{ $event->date }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <!-- BLOG LOOP END -->

            <!-- TESTIMONIAL BLOCK -->
            <div class="testimonial-block">
                <div class="background-overlay"> </div>
                <div class="testimonial-background"></div>
                <div class="testimonial-wrap">
                    <div class="the-title text-center">
                        <h5 class="head-title-2"> / TESTIMONIAL </h5>
                        <h2 class="head-title-1">
                            From Great Our Clients
                            <span class="title-end">.</span>
                        </h2>
                    </div>
                    <div class="testimonial-slide">
                        <div class="swipper-button clearfix">
                            <div class="swiper-button-next">
                                <span>Prev</span>
                                <div class="car-page-arrow-next"></div>
                            </div>
                            <div class="swiper-button-prev">
                                <span>Next</span>
                                <div class="car-page-arrow-prev"></div>
                            </div>

                        </div>
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testi-content">
                                        <div class="testimonial-text">
                                            <p>"I'm the sort of person who takes a camera to dinner or a nightclub because I
                                                enjoy taking pictures of people."</p>
                                        </div>
                                        <div class="testimonial-detail-inner">
                                            <div class="testimonial-image">
                                                <img src="{{ asset('img/testimonial-profile-1.png') }} " alt="testi-1">
                                            </div>
                                            <div class="test-info">
                                                <h5 class="testi-author">Amanda Zedda</h5>
                                                <cite class="testi-job">
                                                    Photographer
                                                </cite>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testi-content">
                                        <div class="testimonial-text">
                                            <p>“A friend got me a job on the door of the Camden Palace nightclub, which
                                                quickly progressed to running the place.”</p>
                                        </div>
                                        <div class="testimonial-detail-inner">
                                            <div class="testimonial-image">
                                                <img src="{{ asset('img/testimonial-profile-2.png') }} " alt="testi-2">
                                            </div>
                                            <div class="test-info">
                                                <h5 class="testi-author">Jennifer Aster</h5>
                                                <cite class="testi-job">
                                                    Musician </cite>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TESTIMONIAL BLOCK END -->

            <!-- BOOK TABLE -->
            <div class="book-table">
                <div class="container">
                    <div class="book-wrap news-title grid grid-cols-12 gap-24">
                        <div class="the-title col-span-6 sm:col-span-12 res:col-span-12">
                            <h5 class="head-title-2"> / RESERVATION </h5>
                            <h2 class="head-title-1"> Book A Table Now
                                <span class="title-end">.</span>
                            </h2>
                            <p class="dugem-text"> Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean
                                sollicitudin, lorem quis bibendum auctor. Sem nibh id elit. Duis sed odio sit amet nibh
                                vulputate cursus a sit amet mauris. </p>
                        </div>
                        <div class="contact-form-style col-span-6 sm:col-span-12 res:col-span-12">
                            <input type="text" name="your-name" size="40" placeholder="Name">
                            <input type="text" name="your-name" size="40" placeholder="Email">
                            <textarea name="your-message" cols="40" rows="10" placeholder="Text"></textarea>
                            <input type="submit" value="Send" class="button-basic-1">

                        </div>
                    </div>
                </div>
            </div>
            <!-- BOOK TABLE END -->
        </section>
        <!-- SECTION END -->
    @endsection
