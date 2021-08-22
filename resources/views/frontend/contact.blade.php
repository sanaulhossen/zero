@extends('layouts.frontend_app')

@section('contact')
  active
@endsection

@section('title')
Home | Zero
@endsection

@section('frontend_content')

<section id="breadcrumb-section" class="breadcrumb-section w100dt mb-30">
    <div class="container">
        <nav class="breadcrumb-nav w100dt">
            <div class="page-name hide-on-small-only left">
                <h4>CONTACT</h4>
            </div>
            <div class="nav-wrapper right">
                <a href="{{ url('/') }}" class="breadcrumb">Home</a>
                <a class="breadcrumb active">Contact</a>
            </div>
        </nav>
    </div>
</section>

<!-- ==================== contact-section start ==================== -->
<section id="contact-section" class="contact-section w100dt mb-50">
    <div class="container">

        <div id="map-section" class="map-section w100dt mb-50">
            <div id="google-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12361.634249727864!2d89.4995532597498!3d22.908359566416802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1628614392477!5m2!1sbn!2sbd" width="1140" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <!-- /#google-map-->
        </div>
        <!-- /#map-section -->

        <div class="row">
            <div class="col m9 s12">
                <div class="sidebar-title left-align">
                    <h2>Contact Me</h2>
                </div>

                <div class="contact-me">
                    <div class="row">

                        <div class="col m6 s12">
                            <p class="mb-30">
                                If you have any questions, please contact us through our online support system and we will contact you shortly. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore.
                            </p>

                            <div class="contact-things">
                                <div class="c-icon">
                                    <i class="icofont icofont-location-pin"></i>
                                </div>
                                <div class="c-text p-0">
                                    <p>452 Town road, Big House</p>
                                    <p>New York, NY  45896</p>
                                </div>
                            </div>
                            <!-- /.contact-things -->
                            <div class="contact-things">
                                <div class="c-icon">
                                    <i class="icofont icofont-phone"></i>
                                </div>
                                <div class="c-text">
                                    <p>+88016 8063 6189</p>
                                </div>
                            </div>
                            <!-- /.contact-things -->
                            <div class="contact-things">
                                <div class="c-icon">
                                    <i class="icofont icofont-send-mail"></i>
                                </div>
                                <div class="c-text">
                                    <p>info@sitename.com</p>
                                </div>
                            </div>
                            <!-- /.contact-things -->
                        </div>
                        <!-- colsm6 -->

                        <div class="col m6 s12">
                            <form class="contact-form" action="#">
                                <div class="contact-input">
                                    <input id="first_name" type="text" class="validate">
                                    <label for="first_name">First Name</label>
                                </div>
                                <!-- first_name -->

                                <div class="contact-input">
                                    <input id="email" type="email" class="validate">
                                    <label for="email" data-error="wrong" data-success="right">Email</label>
                                </div>
                                <!-- email -->

                                <div class="contact-input">
                                    <input id="subject" type="text" class="validate">
                                    <label for="subject">Subject</label>
                                </div>
                                <!-- subject -->

                                <div class="contact-input">
                                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                                    <label for="textarea1">Type your message</label>
                                </div>
                                <!-- textarea1 -->
                                <button type="button" class="waves-effect waves-light right">SEND MESSAGE</button>
                            </form>
                            <!-- /.contact-form -->
                        </div>
                        <!-- colsm6 -->

                    </div>
                    <!-- row -->
                </div>
                <!-- /.contact-me -->
            </div>
            <!-- colm9 -->

            <div class="col m3 s12">
                <div class="sidebar-title left-align">
                    <h2>Get Social</h2>
                </div>

                <ul class="social-link">
                    <li>
                        <a href="#" class="facebook">
                            <span class="s-icon left"><i class="icofont icofont-social-facebook"></i></span>
                            <span class="s-name">Facebook</span>
                            <span class="s-likes right">53K</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="twitter">
                            <span class="s-icon left"><i class="icofont icofont-social-twitter"></i></span>
                            <span class="s-name">Twitter</span>
                            <span class="s-likes right">652</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="google-plus">
                            <span class="s-icon left"><i class="icofont icofont-social-google-plus"></i></span>
                            <span class="s-name">Google+</span>
                            <span class="s-likes right">25K</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="instagram">
                            <span class="s-icon left"><i class="icofont icofont-social-instagram"></i></span>
                            <span class="s-name">Instagram</span>
                            <span class="s-likes right">10K</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dribbble">
                            <span class="s-icon left"><i class="icofont icofont-social-dribbble"></i></span>
                            <span class="s-name">Dribbble</span>
                            <span class="s-likes right">543</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- colm3 -->
        </div>
        <!-- row -->

    </div>
</section>
<!-- ==================== contact-section end ==================== -->
@endsection
