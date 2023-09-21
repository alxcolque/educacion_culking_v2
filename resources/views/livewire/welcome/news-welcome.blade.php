<div id="news" class="section wb">
    <div class="container">
        <div class="section-title row text-center">
            <div class="col-md-8 offset-md-2">
                <h3>Noticias más recientes</h3>
            </div>
        </div><!-- end title -->

        <div class="row">
            @foreach ($news as $new)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-item">
                    <div class="image-blog">
                        <img src="{{$new->url}}" alt="" loading="lazy" class="img-fluid">
                    </div>
                    <div class="meta-info-blog">
                        <span><i class="fa fa-calendar"></i> <a href="#">{{$new->created_at->format('m/d/Y')}}</a> </span>
                        <span><i class="fa fa-tag"></i>  <a href="#">{{$new->type}}</a> </span>
                        <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
                    </div>
                    <div class="blog-title">
                        <h2><a href="#" title="">{{$new->title}}</a></h2>
                    </div>
                    <div class="blog-desc">
                        <p>{{$new->extract}}</p>
                    </div>
                    <div class="blog-button">
                        <a class="hover-btn-new orange" href="#"><span>Leer Más...<span></a>
                    </div>
                </div>
            </div><!-- end col -->

            @endforeach
        </div><!-- end row -->
        <div class="text-center">
            <a href="">VER MÁS NOTICIAS</a>
        </div>
    </div><!-- end container -->
</div><!-- end section -->
