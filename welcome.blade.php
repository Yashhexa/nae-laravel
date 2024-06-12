@extends('layouts.layouts')

@section('content') {{$menu}}
<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container-fluid slide1">
                <div class="carousel-caption text-end">
                    <h1>Plastic Electronic Enclosures</h1>
                    <p class="opacity-75">Off-the-shelf line of electronic enclosures designed for today's smaller
                        electronics.
                    </p>
                    <p><a class="btn btn-outline-light btn-lg" href="#">Browse enclosures <i
                                class="bi bi-eye-fill"></i></a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">

            <div class="container-fluid slide2">
                <div class="carousel-caption text-start">
                    <h1>Top Quality Designs</h1>
                    <p class="opacity-75">We will assist you in making our Off-The-Shelf Enclosures into Market-Ready
                        Enclosures™ for your end product.
                    </p>
                    <p><a class="btn btn-secondary btn-lg" href="#">Learn more <i
                                class="bi bi-hand-thumbs-up-fill"></i></a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">

            <div class="container-fluid slide3">
                <div class="carousel-caption text-end">
                    <h1>Try the new configurtion tool!</h1>
                    <p class="opacity-75">You can now configure our enclosures to suit your needs and get a quote in
                        real time!
                    </p>
                    <p><a class="btn btn-outline-light btn-lg" href="#">Use the tool <i
                                class="bi bi-tools"></i></a></p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<section class="search-bar fw-lighter">
    <form method="GET" action="/search">
        @csrf
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-1">
                    <label for="part">Part # or Description: </label>
                    <input id="part" type="text" class="form-control">
                    <div class="row pt-1"><label for="length">Length (inches): </label>
                        <div class="col-md-6"> <input id="length" placeholder="Min..." type="text"
                                class="form-control"></div>
                        <div class="col-md-6"> <input id="length" placeholder="Max..." type="text"
                                class="form-control"></div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="row pt-1"><label for="width">Width (inches): </label>
                        <div class="col-md-6"> <input id="width" placeholder="Min..." type="text"
                                class="form-control"></div>
                        <div class="col-md-6"> <input id="width" placeholder="Max..." type="text"
                                class="form-control"></div>
                    </div>
                    <div class="row pt-1"><label for="height">Height (inches): </label>
                        <div class="col-md-6"> <input id="height" placeholder="Min..." type="text"
                                class="form-control"></div>
                        <div class="col-md-6"> <input id="height" placeholder="Max..." type="text"
                                class="form-control"></div>
                    </div>
                </div>
                <div class="col-md-2 d-grid gap-2"><button type="submit"
                        class="btn btn-success btn-lg btn-block mt-4">Search <i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </form>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12  p-3">
            <h1 class="text-success fs-1 fw-lighter text-center mb-4"> Plastic Electronic Enclosure Manufacturers
            </h1>
            <section id="vertical_tab_nav">

                <ul class="tabs">
                    <li><a rel="tab1" href="#">Try our online configuration tool!</a></li>
                    <li><a rel="tab2" href="#">Tab Two</a></li>
                    <li><a rel="tab3" href="#">Tab Three</a></li>
                    <li><a rel="tab4" href="#">Tab Four</a></li>
                </ul>

                <div class="tab_container">
                    <h3 class="tab_drawer_heading" rel="tab1">Tab One</h3>
                    <article id="tab1">

                        <p>New Age Enclosures is a leading manufacturer of off-the-shelf plastic electronic enclosures.
                            We provide solutions for Electronic Engineers and OEM's in a variety of markets. </p>
                        <p>Our enclosures are injection molded out of superior-quality resins including: ABS,
                            Polycarbonate, Acrylic and ASA. Designed for use in almost all environments, our line of
                            plastic electronic enclosures range from industrial and waterproof IP-rated electrical
                            enclosures to basic indoor project and utility boxes.
                        </p>
                        <p> From Off-The-Shelf to Market-Ready™ New Age is your single source enclosure solution. </p>
                    </article>
                    <h3 class="tab_drawer_heading" rel="tab2">Tab Two</h3>
                    <article id="tab2">

                        <p>City Anti-pollution Drive demands certain steps from all the citizens of ABC city. All
                            house-holders should pack the waste in a plastic bag and put the bag in front of their
                            house. The bag will be replaced with an empty bag by the Municipal van
                            every morning. They should maintain the cleanliness of the city. This will make the city
                            pollution free.</p>

                        <p>My visit to a slum area after the rainy season was a sad affair. The pits were still full of
                            rain water. There was mud all around. The polluted water had caused various diseases. There
                            was no home without a sick person. Small children suffered from
                            stomach troubles. The government should immediately rush to the help of the sufferers in the
                            slum area.</p>
                    </article>
                    <h3 class="tab_drawer_heading" rel="tab3">Tab Three</h3>
                    <article id="tab3">
                        <h2 class="fw-light">Tab Content Three</h2>
                        <p>I saw a man climbing down a water pipe. He had a knife in his hand. I hit his hand with a
                            brick. He fell down on the ground and I jumped upon him. Soon others reached there and we
                            handed him over to the police.</p>

                        <p>A tragedy took place yesterday when a Matador fell into a canal. The driver of the Matador
                            tried to save an auto-rickshaw and lost control on the vehicle. About fifty students were
                            travelling in it. The people from the nearby villages saved twenty-seven
                            students. The dead bodies of the drowned were recovered. It was a very painful sight.</p>
                    </article>
                    <h3 class="tab_drawer_heading" rel="tab4">Tab Four</h3>
                    <article id="tab4">
                        <h2 class="fw-light">Tab Content Four</h2>
                        <p>City life is full of fun. There are parks and picnic spots to visit. We have cinema halls to
                            see movies. We have electricity which runs our factories, light and cools our home and helps
                            us in seeing T.V. There are all type of amenities like water,
                            health check up and transport. Sometimes circus shows and magic shows entertain the city
                            people.</p>

                        <p>I was lucky to escape death by a few seconds.' A bomb blasted in the compartment of Nilanchal
                            Express. The overcrowded compartment made me to get down. Anyhow the loss was great. About
                            ten people died and many got injured. It was the job of a terrorist.
                            The government should intensify searching operations in trains.1</p>
                    </article>

                </div>
            </section>
        </div>
    </div>
</div>


@endsection
