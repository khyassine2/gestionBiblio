@extends('layouts.app')

@section('content')

<div class="row align-items-center" style="padding: 0rem 0 8rem 0 !important">
    <div class="col-lg-7">
        <div class="intro-wrap">

            <h1 class="mb-5"><span class="d-block">Bienvenue</span>Sur <span class="typed-words"></span></h1> 
        </div>
    </div>
</div>
@endsection


@section('animation')
<div class="untree_co-section mb-5">
    <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-lg-7"><h2 class="section-title text-center">Popular Livres</h2></div>
        </div>
 
        <div class="owl-carousel owl-3-slider">
            @foreach ($livres as $item)
            <div class="item">
                <a class="media-thumb" href="/storage/{{ $item->image }}" data-fancybox="gallery">
                    <div class="media-text">
                        <h3>{{ $item->themes()->get()[0]->titre }}</h3>
                        <span class="location">{{$item->titre}}</span>
                    </div>
                    <img src="/storage/{{ $item->image }}" alt="Image" class="img-fluid" style="height:400px !important ;">
                </a>
            </div>
            @endforeach
         </div>
    </div>
 </div>

@endsection

@section('section01')
<div class="container">
    <div class="row justify-content-between align-items-center">

        <div class="col-lg-6">
            <figure class="img-play-video">
                <a id="play-video" class="video-play-button" href="https://www.youtube.com/watch?v=YncSOWJ-kRs" data-fancybox>
                    <span></span>
                </a>
                <img src="images/b2.jpeg" alt="Image" class="img-fluid rounded-20" width='748px' height="1023px">
            </figure>
        </div>

        <div class="col-lg-5">
            <h2 class="section-title text-left mb-4">Take a look at Tour Video</h2>
            <p> Le club de bibliothèque est un endroit parfait pour tous les amoureux de la lecture. Il offre une occasion unique de se connecter avec d autres personnes partageant les mêmes idées et de discuter de différents livres dans un environnement détendu et accueillant .</p>


            <p class="mb-4">Le club de bibliothèque est un endroit parfait pour tous les amoureux de la lecture. Il offre une occasion unique de se connecter avec d autres personnes partageant les mêmes idées et de discuter de différents livres dans un environnement détendu et accueillant</p>

            <ul class="list-unstyled two-col clearfix">
                <li>Outdoor recreation</li>
                <li>Airlines</li>
                <li>Car Rentals</li>
                <li>Cruise Lines</li>
            </ul>

            <p><a href="#" class="btn btn-primary">Get Started</a></p>
        </div>
    </div>
</div>
@endsection

@section('section02')
<div class='py-5 cta-section'>
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <h2 class="mb-2 text-white">Lets you Explore the Best. Contact Us Now</h2>
            <p class="mb-4 lead text-white text-white-opacity">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, fugit?</p>
            <p class="mb-0"><a href="{{ route('contact') }}" class="btn btn-outline-white text-white btn-md font-weight-bold">Get in touch</a></p>
        </div>
    </div>
</div>
</div>
@endsection



