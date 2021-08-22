@extends('layouts.frontend_app')

@section('user')
  active
@endsection

@section('title')
User Dashbord | Zero
@endsection

@section('frontend_content')

<section id="breadcrumb-section" class="breadcrumb-section w100dt mb-30">
    <div class="container">
        <nav class="breadcrumb-nav w100dt">
            <div class="page-name hide-on-small-only left">
                <h4>DASHBORD</h4>
            </div>
            <div class="nav-wrapper right">
                <a href="index.html" class="breadcrumb">Home</a>
                <a href="contact.html" class="breadcrumb active">User Dashbord</a>
            </div>
        </nav>
    </div>
</section>
<section id="contact-section" class="contact-section w100dt mb-20">
    <div class="container">
        <div class="row">
            <div class="col m9 s12">
                <div class="sidebar-title left-align">
                    <h2>About Me</h2>
                </div>

                <div class="contact-me">
                    <div class="row">
                        <div class="col m6 s12">
                            <div class="contact-things">
                                <div class="row">
                                    <div class="col m5 s12">
                                        <div class="ppic left">
                                            <img src="{{ asset('dashbord/image/user_image/default.png') }}" alt="Image">
                                        </div>
                                    </div>
                                    <div class="col m7 s12">
                                        <div class="c-text mt-40">
                                            <p>
                                                <form action="">
                                                    <input type="file" class="" name="image">
                                                    <button type="submit">Change Image</button>
                                                </form>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-things">
                                <div class="c-icon"><i class="icofont icofont-location-pin"></i></div>
                                <div class="c-text p-0">
                                    <p>{{ Auth::user()->name }}</p>
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="contact-things">
                                <div class="c-icon"><i class="icofont icofont-location-pin"></i></div>
                                <div class="c-text p-0">
                                    <p>452 Town road, Big House</p>
                                    <p>New York, NY  45896</p>
                                </div>
                            </div>
                            <!-- /.contact-things -->
                            <div class="contact-things">
                                <div class="c-icon"><i class="icofont icofont-phone"></i></div>
                                <div class="c-text"><p>+88016 8063 6189</p></div>
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
                                    <label for="first_name">User name</label>
                                </div>
                                <!-- first_name -->

                                <div class="contact-input">
                                    <input id="email" type="email" class="validate">
                                    <label for="email" data-error="wrong" data-success="right">Email</label>
                                </div>
                                <!-- email -->

                                <div class="contact-input">
                                    <input id="subject" type="text" class="validate">
                                    <label for="subject">Profession</label>
                                </div>
                                <!-- subject -->

                                <div class="contact-input">
                                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                                    <label for="textarea1">Type your address</label>
                                </div>
                                <!-- textarea1 -->
                                <button type="button" class="waves-effect waves-light right">Update Profile</button>
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
    </div>
</section>
<section id="comment-section" class="comment-section w50dt mb-30 mt-20">
    <div class="container">
        <nav class="breadcrumb-nav w100dt">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h3 class="mt-3 text-center">COMMENT DATA</h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="category_table">
                                    <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Comment</th>
                                            <th>Blog</th>
                                            <th>Create By</th>
                                            <th>Create At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($comments as $comment)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $comment->comment }}</td>
                                                <td>
                                                    <a href="{{ url('blog/details') }}/{{ $comment->blog->slug }}" class="comment_blog">{{ $comment->blog->blog_title }}</a>
                                                </td>
                                                <td>{{ $comment->user->name }}</td>
                                                <td>{{ $comment->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{ route('delete.user.comment',$comment->id) }}" class="comment_delete">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>
@endsection
@section('footer_scripts')
  <script>

    @if(session('success_status'))
        //Notify
        alertify.set('notifier','position','top-right');
        alertify.success('Comment Data Deleted.');
    @endif

  </script>
@endsection
