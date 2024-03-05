@extends('layout.layout')
@section('content')
<section>
    <div class="single-event-wrap">
        <div class="single-event-inner-wrap event-chocolat event-style1">
            <div class="container">
                <div class="single-event-content-wrap grid grid-cols-12 gap-20">
                    <div class="event-thumbnail col-span-5 sm:col-span-12 res:col-span-12">
                        <div class="thumb-inner">
                            <a href="#">
                                <img src="img/single-event-img.png" alt="single-event">
                            </a>
                            <span></span>
                        </div>
                    </div>
                    <div class="event-content-wrap col-span-7 sm:col-span-12 res:col-span-12">
                        <div class="event-head clearfix">
                            <div class="category-event">
                                <ul class="category">
                                    <li>Dance</li>
                                    <li>Houseparty</li>
                                </ul>
                            </div>
                            <div class="the-title">
                                <h2>Global Fridays</h2>
                            </div>
                            <div class="event-date">
                                26 March 2022
                            </div>
                        </div>
                        <div class="event-content clearfix">
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                        </div>
                        <div class="event-details clearfix">
                            <table class="event-detail-table">
                                <tbody>
                                    <tr>
                                        <td class="tab-title">Start</td>
                                        <td class="tab-content italic">22.00</td>
                                    </tr>
                                    <tr>
                                        <td class="tab-title">End</td>
                                        <td class="tab-content italic">23.59</td>
                                    </tr>
                                    <tr>
                                        <td class="tab-title">Artist</td>
                                        <td class="tab-content artist">
                                            DJ Ocean &amp; DJ Thunder
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="event-ticket">
                                <span class="price">Ticket Price</span> :
                                <span>$69</span>
                                <a href="#">Buy Ticket</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-counter clearfix">
                <div class="event-counter-wrap container clearfix">
                    <div class="overlay dark"></div>
                    <div class="countdown-title column column-3">
                        <h2>Express Within</h2>
                    </div>
                    <div class="countdown-event column column-2of3">
                        <div class="countdown">
                            <div class="first-day-countdown float">
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
        <div class="event-related-content clearfix">
            <div class="container clearfix">
                <h3 class="text-center text-white">Related Events</h3>
                <div class="event-related-content-wrap grid grid-cols-12 gap-12">
                    <div class="col-span-4 sm:col-span-12 res:col-span-12 content-related-post clearfix">
                        <a href="#">
                            <div class="post-thumb">
                                <img src="img/related-event-1.png" alt="related-event-1">
                                <div class="dugem-overlay"></div>
                            </div>
                        </a>
                        <div class="meta-wrapper related-title">
                            <h5 class="event-date">
                                28 March 2021
                            </h5>
                            <h4><a href="#">Chicago Indrustry</a></h4>
                        </div>
                    </div>
                    <div class="col-span-4 sm:col-span-12 res:col-span-12 content-related-post clearfix">
                        <a href="#">
                            <div class="post-thumb">
                                <img src="img/related-event-2.png" alt="related-event-2">
                                <div class="dugem-overlay"></div>
                            </div>
                        </a>
                        <div class="meta-wrapper related-title">
                            <h5 class="event-date">
                                20 March 2021
                            </h5>
                            <h4><a href="#">The Underground</a></h4>
                        </div>
                    </div>
                    <div class="col-span-4 sm:col-span-12 res:col-span-12 content-related-post clearfix">
                        <a href="#">
                            <div class="post-thumb">
                                <img src="img/related-event-3.png" alt="related-event-3">
                                <div class="dugem-overlay"></div>
                            </div>
                        </a>
                        <div class="meta-wrapper related-title">
                            <h5 class="event-date">
                                11 May 2021
                            </h5>
                            <h4><a href="#">EDM</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection