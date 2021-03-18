<section class="about pt-100 pb-100" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <!--About Image-->
                <div class="about-img">
                    <img src="/{{BlogPackage::get_cms_data()->about->image->value}}" alt="">
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <!--About Content-->
                <div class="about-content">
                    <div class="about-heading">
                        <h2>{{BlogPackage::get_cms_data()->about->title->value}}</h2>
                        <span>{{BlogPackage::get_cms_data()->about->sub_title->value}}</span>
                    </div>
                    <p>{{BlogPackage::get_cms_data()->about->description->value}}</p>
                    <!--About Social Icons-->
                    <div class="social-icons">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                    <span class="about-button">
                        <a class="main-btn" href="#">Download CV</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>