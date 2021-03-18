<section class="portfolio pt-100 pb-70" data-scroll-index="3">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="heading text-center">
                    <h6>Portfolio</h6>
                    <h2>Work I Have Done</h2>
                </div>
                <div class="portfolio-filter text-center">
                    <ul>
                        <li class="sel-item" data-filter="*">All</li>
                        <li data-filter=".design">Web Design</li>
                        <li data-filter=".application">Applications</li>
                        <li data-filter=".development">Development</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row portfolio-items">
            @foreach (BlogPackage::get_cms_data()->portfolio as $item)
            <div class="col-lg-4 col-md-6 item application">
                <div class="item-content">
                    <img src="/{{$item->image->value}}" alt="">
                    <div class="item-overlay">
                        <h6>{{$item->title->value}}</h6>
                        <div class="icons">
                            <span class="icon link">
                                <a href="images/portfolio/img-1.jpg">
                                    <i class="fa fa-search"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
@endforeach
        </div>
    </div>
</section>