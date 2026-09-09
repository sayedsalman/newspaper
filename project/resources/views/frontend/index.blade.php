@extends('layouts.front')
@section('contents')
@section('meta')
<meta name="Description" content="{!! $seo->meta_description !!}">
<meta name="Keywords" content="{!! $seo->meta_keys !!}">
<meta property="og:title" content="{{ $gs->title }}" />
<meta property="og:description" content="{!! $seo->meta_description !!}" />
<meta property="og:image" content="{{asset('assets/images/'.$gs->og_baner)}}" />
@endsection

<div class="add-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="add-image">
                    {!!$gs->homepageads2_970!!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bp-home">
    <div class="container">


        @if($bpHeroMain)
        <div class="bp-hero row">
            <div class="col-lg-5 col-md-5">
                <div class="bp-hero-main">
                    <a href="{{ route('frontend.postBySubcategory.details',[$bpHeroMain->category->slug,$bpHeroMain->slug]) }}" class="bp-hero-img">
                        <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$bpHeroMain->image_big)}}" alt="{{ $bpHeroMain->title }}">
                    </a>
                    <h2 class="bp-hero-title">
                        <a href="{{ route('frontend.postBySubcategory.details',[$bpHeroMain->category->slug,$bpHeroMain->slug]) }}">{{ $bpHeroMain->title }}</a>
                    </h2>
                    @if($bpHeroMain->short_description)
                    <p class="bp-hero-excerpt">
                        {{ strlen($bpHeroMain->short_description) > 160 ? mb_substr($bpHeroMain->short_description,0,160,"utf-8").'...' : $bpHeroMain->short_description }}
                    </p>
                    @endif
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <ul class="bp-hero-list">
                    @foreach($bpHeroList as $hItem)
                    <li>
                        <a href="{{ route('frontend.postBySubcategory.details',[$hItem->category->slug,$hItem->slug]) }}" class="bp-hero-list-thumb">
                            <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$hItem->image_big)}}" alt="{{ $hItem->title }}">
                        </a>
                        <a href="{{ route('frontend.postBySubcategory.details',[$hItem->category->slug,$hItem->slug]) }}" class="bp-hero-list-title">{{ $hItem->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="bp-tab-widget">
                    <ul class="bp-tab-buttons">
                        <li class="active" data-bp-tab="bp-popular">পঠিত</li>
                        <li data-bp-tab="bp-latest">সর্বশেষ</li>
                    </ul>
                    <div id="bp-popular" class="bp-tab-item active">
                        <ol>
                            @foreach($bpPopularTab as $pItem)
                            <li>
                                <a href="{{ route('frontend.postBySubcategory.details',[$pItem->category->slug,$pItem->slug]) }}">{{ $pItem->title }}</a>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                    <div id="bp-latest" class="bp-tab-item">
                        <ol>
                            @foreach($bpLatestTab as $lItem)
                            <li>
                                <a href="{{ route('frontend.postBySubcategory.details',[$lItem->category->slug,$lItem->slug]) }}">{{ $lItem->title }}</a>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @endif


        @if($bpBisheshShongbadCat && $bpBisheshShongbadGrid->count())
        <div class="bp-section">
            <div class="bp-section-title">
                <span class="bp-bar"></span> <a href="{{ route('frontend.category',$bpBisheshShongbadCat->slug) }}">{{ $bpBisheshShongbadCat->title }}</a>
            </div>
            <div class="bp-grid-4">
                @foreach($bpBisheshShongbadGrid as $post)
                <div class="bp-grid-card">
                    <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}" class="bp-grid-thumb">
                        <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$post->image_big)}}" alt="{{ $post->title }}">
                    </a>
                    <h3 class="bp-grid-title">
                        <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                    </h3>
                </div>
                @endforeach
            </div>
        </div>
        @endif


        @if($bpChattogramCat || $bpJatiyoCat)
        <div class="bp-section row">
            @if($bpChattogramCat && $bpChattogramBig->count())
            <div class="col-lg-8 col-md-8">
                <div class="bp-section-title">
                    <span class="bp-bar"></span> <a href="{{ route('frontend.category',$bpChattogramCat->slug) }}">{{ $bpChattogramCat->title }}</a>
                </div>
                <div class="bp-bigsmall row">
                    <div class="col-lg-6 col-md-6">
                        @foreach($bpChattogramBig as $post)
                        <div class="bp-big-card">
                            <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}" class="bp-grid-thumb">
                                <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$post->image_big)}}" alt="{{ $post->title }}">
                            </a>
                            <h3 class="bp-big-title">
                                <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                            </h3>
                            @if($post->short_description)
                            <p class="bp-big-excerpt">{{ strlen($post->short_description) > 110 ? mb_substr($post->short_description,0,110,"utf-8").'...' : $post->short_description }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="bp-small-list-thumb">
                            @foreach($bpChattogramSmall as $post)
                            <li>
                                <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}" class="bp-small-thumb">
                                    <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$post->image_big)}}" alt="{{ $post->title }}">
                                </a>
                                <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}" class="bp-small-title">{{ $post->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            @if($bpJatiyoCat && $bpJatiyoBig->count())
            <div class="col-lg-4 col-md-4">
                <div class="bp-section-title">
                    <span class="bp-bar"></span> <a href="{{ route('frontend.category',$bpJatiyoCat->slug) }}">{{ $bpJatiyoCat->title }}</a>
                </div>
                @foreach($bpJatiyoBig as $post)
                <div class="bp-big-card">
                    <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}" class="bp-grid-thumb">
                        <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$post->image_big)}}" alt="{{ $post->title }}">
                    </a>
                    <h3 class="bp-big-title">
                        <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                    </h3>
                </div>
                @endforeach
                <ul class="bp-small-list-text">
                    @foreach($bpJatiyoSmall as $post)
                    <li>
                        <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        @endif

  
        @if($bpSaradeshCat || $bpRajnitiCat || $bpArthoCat)
        <div class="bp-section row">
            @foreach([
                ['cat'=>$bpSaradeshCat,'big'=>$bpSaradeshBig,'small'=>$bpSaradeshSmall],
                ['cat'=>$bpRajnitiCat,'big'=>$bpRajnitiBig,'small'=>$bpRajnitiSmall],
                ['cat'=>$bpArthoCat,'big'=>$bpArthoBig,'small'=>$bpArthoSmall],
            ] as $col)
            @if($col['cat'] && $col['big']->count())
            <div class="col-lg-4 col-md-4">
                <div class="bp-section-title">
                    <span class="bp-bar"></span> <a href="{{ route('frontend.category',$col['cat']->slug) }}">{{ $col['cat']->title }}</a>
                </div>
                @foreach($col['big'] as $post)
                <div class="bp-big-card">
                    <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}" class="bp-grid-thumb">
                        <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$post->image_big)}}" alt="{{ $post->title }}">
                    </a>
                    <h3 class="bp-big-title">
                        <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                    </h3>
                </div>
                @endforeach
                <ul class="bp-small-list-text">
                    @foreach($col['small'] as $post)
                    <li>
                        <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            @endforeach
        </div>
        @endif

      
        @if($bpKhelaCat || $bpAntorjatikCat)
        <div class="bp-section row">
            @if($bpKhelaCat && $bpKhelaBig->count())
            <div class="col-lg-8 col-md-8">
                <div class="bp-section-title">
                    <span class="bp-bar"></span> <a href="{{ route('frontend.category',$bpKhelaCat->slug) }}">{{ $bpKhelaCat->title }}</a>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        @foreach($bpKhelaBig as $post)
                        <div class="bp-big-card">
                            <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}" class="bp-grid-thumb">
                                <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$post->image_big)}}" alt="{{ $post->title }}">
                            </a>
                            <h3 class="bp-big-title">
                                <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                            </h3>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-6 col-md-6">
                        @foreach($bpKhelaSmall as $post)
                        <div class="bp-small-card">
                            <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}" class="bp-grid-thumb">
                                <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$post->image_big)}}" alt="{{ $post->title }}">
                            </a>
                            <h4 class="bp-small-card-title">
                                <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                            </h4>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            @if($bpAntorjatikCat && $bpAntorjatikBig->count())
            <div class="col-lg-4 col-md-4">
                <div class="bp-section-title">
                    <span class="bp-bar"></span> <a href="{{ route('frontend.category',$bpAntorjatikCat->slug) }}">{{ $bpAntorjatikCat->title }}</a>
                </div>
                @foreach($bpAntorjatikBig as $post)
                <div class="bp-big-card">
                    <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}" class="bp-grid-thumb">
                        <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$post->image_big)}}" alt="{{ $post->title }}">
                    </a>
                    <h3 class="bp-big-title">
                        <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                    </h3>
                </div>
                @endforeach
                <ul class="bp-small-list-text">
                    @foreach($bpAntorjatikSmall as $post)
                    <li>
                        <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        @endif


        @if($bpBinodonCat && $bpBinodonGrid->count())
        <div class="bp-section">
            <div class="bp-section-title">
                <span class="bp-bar"></span> <a href="{{ route('frontend.category',$bpBinodonCat->slug) }}">{{ $bpBinodonCat->title }}</a>
            </div>
            <div class="bp-grid-4">
                @foreach($bpBinodonGrid as $post)
                <div class="bp-grid-card">
                    <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}" class="bp-grid-thumb">
                        <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$post->image_big)}}" alt="{{ $post->title }}">
                    </a>
                    <h3 class="bp-grid-title">
                        <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                    </h3>
                </div>
                @endforeach
            </div>
        </div>
        @endif

      
        @if($bpFeatureCat || $bpShikkhaCat || $bpShasthoCat || $bpMotamotCat)
        <div class="bp-section row">
            @foreach([
                ['cat'=>$bpFeatureCat,'big'=>$bpFeatureBig,'small'=>$bpFeatureSmall],
                ['cat'=>$bpShikkhaCat,'big'=>$bpShikkhaBig,'small'=>$bpShikkhaSmall],
                ['cat'=>$bpShasthoCat,'big'=>$bpShasthoBig,'small'=>$bpShasthoSmall],
                ['cat'=>$bpMotamotCat,'big'=>$bpMotamotBig,'small'=>$bpMotamotSmall],
            ] as $col)
            @if($col['cat'] && $col['big']->count())
            <div class="col-lg-3 col-md-3">
                <div class="bp-section-title">
                    <span class="bp-bar"></span> <a href="{{ route('frontend.category',$col['cat']->slug) }}">{{ $col['cat']->title }}</a>
                </div>
                @foreach($col['big'] as $post)
                <div class="bp-big-card">
                    <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}" class="bp-grid-thumb">
                        <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$post->image_big)}}" alt="{{ $post->title }}">
                    </a>
                    <h3 class="bp-big-title">
                        <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                    </h3>
                </div>
                @endforeach
                <ul class="bp-small-list-text">
                    @foreach($col['small'] as $post)
                    <li>
                        <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            @endforeach
        </div>
        @endif

       
        @if($bpEnglishPosts->count())
        <div class="bp-section">
            <div class="bp-section-title">
                <span class="bp-bar"></span> English
            </div>
            <div class="bp-grid-4">
                @foreach($bpEnglishPosts as $post)
                <div class="bp-grid-card">
                    <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}" class="bp-grid-thumb">
                        <img class="lazyload" src="{{asset('assets/images/logo/'.$gs->lazy_baner)}}" data-src="{{asset('assets/images/post/'.$post->image_big)}}" alt="{{ $post->title }}">
                    </a>
                    <h3 class="bp-grid-title">
                        <a href="{{ route('frontend.postBySubcategory.details',[$post->category->slug,$post->slug]) }}">{{ $post->title }}</a>
                    </h3>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var tabs = document.querySelectorAll(".bp-tab-buttons li");
    var tabItems = document.querySelectorAll(".bp-tab-item");
    tabs.forEach(function(tab){
        tab.addEventListener("click", function(){
            tabs.forEach(function(t){ t.classList.remove("active"); });
            tabItems.forEach(function(c){ c.classList.remove("active"); });
            tab.classList.add("active");
            document.getElementById(tab.getAttribute("data-bp-tab")).classList.add("active");
        });
    });
});
</script>

@endsection
