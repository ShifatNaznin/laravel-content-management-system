<section class="stats pt-100 pb-100" style="background-image: url('images/background/stats-bg.jpg')">
    <div class="container">
        <div class="row">
            @foreach (BlogPackage::get_cms_data()->counter as $item)
            <div class="col-lg-3 col-md-6">
                <!--Stats Item-->
                <div class="single-stat">
                    <span class="stat-icon">
                        <i class="{{$item->icon->value}}" aria-hidden="true"></i>
                    </span>
                    <h2 class="counter" data-count="220">{{$item->ammount->value}}</h2>
                    <p>{{$item->title->value}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>