<section class="testimonials pt-100 pb-100" style="background-image: url('images/background/testimonials-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="owl-carousel owl-theme text-center">
                    @foreach (BlogPackage::get_cms_data()->testimonial as $item)
                    {{-- @php
                        dd($item);
                    @endphp --}}
                    <div class="testimonial-item">
                        <div class="author-img">
                            <img src="/{{$item->image->value}}" alt="">
                        </div>
                        <h5>{{$item->name->value}}</h5>
                        <span>{{$item->designation->value}}</span>
                        <p>{{$item->description2->value}}</p>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</section>