@foreach (BlogPackage::get_cms_data()->banner as $item)

<section id="home" class="banner" style="background-image: url('/{{$item->image->value}}'); height: 508px;
background-position: 0% 0px;" data-stellar-background-ratio=".7" data-scroll-index="0">
    <div class="container">
        <!--Banner Content-->
        <div class="banner-caption">
            <h1>{{ $item->title->value }}</h1>
            <p class="cd-headline clip mt-30">
                <span>{{ $item->sub_title->value  }}</span><br>
                <span class="blc">Specialized in</span>
                <span class="cd-words-wrapper">
                    <b class="is-visible">Creating Websites.</b>
                    <b>Designing Logo.</b>
                    <b>Designing UI/UX.</b>
                </span>
            </p>
        </div>
        <div class="arrow bounce">
            <a class="fa fa-chevron-down fa-2x" href="#" data-scroll-nav="1"></a>
        </div>
    </div>
</section>

@php
break;
@endphp
@endforeach