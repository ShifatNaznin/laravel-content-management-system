<section class="blogs pt-100 pb-100 bg-gray" data-scroll-index="4">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="heading text-center">
                    <h6>Blog</h6>
                    <h2>Latest News</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel owl-theme">
                @foreach (BlogPackage::get_all_post(['orderBy'=>'DESC','limit'=>10]) as $data)
                <div class="blog-item">
                    <div class="blog-img">
                        <a href="single-blog.html">
                            <img src="{{ asset(''.BlogPackage::find_post($data->id,'photo')) }}" alt=""
                            style="height:300px; margin: 0px 0px 0px 0px;">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3>{{ $data->title}}</h3>
                        <p>{!!Str::limit($data->description ,100,'...')!!}</p>
                        <div class="blog-meta">
                            <span class="more">
                                <a href="single-blog.html">Read More</a>
                            </span>
                            <span class="date">
                                1/April/2018
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <div class="blog-button pt-40">
                    <a class="main-btn" href="blogs-page.html">View More</a>
                </div>
            </div>
        </div>
    </div>
</section>