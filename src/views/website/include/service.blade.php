<section class="services bg-gray pt-100 pb-50" data-scroll-index="2">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="heading text-center">
                    <h6>Services</h6>
                    <h2>What I Can Do</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach (BlogPackage::get_cms_data()->service as $item)
            <div class="col-md-4">
                <!--Service Item-->
                <div class="service-item">
                    <span class="icon">
                        <i class="{{$item->icon->value}}"></i>
                    </span>
                    <h4>{{$item->title->value}}</h4>
                    <p>{{$item->description->value}}</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>