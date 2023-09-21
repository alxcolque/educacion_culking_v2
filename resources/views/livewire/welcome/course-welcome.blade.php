<div id="course" class="section wb">
    <div class="container">
        <div class="section-title row text-center">
            <div class="col-md-8 offset-md-2">
                <h3>Cursos más recientes</h3>
            </div>
        </div><!-- end title -->
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="course-item">
                    <div class="image-blog">
                        <img src="{{$course->url}}" alt="" class="img-fluid">
                    </div>
                    <div class="course-br">
                        <div class="course-title">
                            <h2><a href="{{route('posts.slug',$course->slug)}}" title="">{{$course->title}}</a></h2>
                        </div>
                        <div class="course-desc">
                            <p>{{$course->extract}}</p>
                        </div>
                        <div class="course-rating">
                            4.5
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                        </div>
                    </div>
                    <div class="course-meta-bot">
                        <ul>
                            <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$course->created_at->format('m/d/Y')}}</li>
                            <li><i class="fa fa-user" aria-hidden="true"></i>{{$course->user->username}}</li>
                            {{-- <li><i class="fa fa-book" aria-hidden="true"></i> 7 Books</li> --}}
                        </ul>
                    </div>
                </div>
            </div><!-- end col -->

            @endforeach
        </div><!-- end row -->

        <hr class="hr3">

        <div class="text-center">
            <a href="/cursos">VER MÁS CURSOS</a>
        </div>
    </div><!-- end container -->
</div><!-- end section -->
