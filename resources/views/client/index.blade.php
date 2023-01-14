@extends('client.layouts.main')

@section('main-content')
    <!-- Masthead-->
    <header class="masthead" style="background-image: url('{{ asset('assets/img/client/background/header.jpg') }}')">
        <div class="container">
            <div class="heading-jumbo justify">{{ __('Préservez la forêt') }}
                <br>{{ __('avec un placement utile et sûr') }}
                <br>{{ __('dès 100 €') }}</div>
        </div>
    </header>

    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12 center">
                    <div
                        class="heading-jumbo-small">{{ __('Partageons les arbres en favorisant une gestion plus durable de nos forêts') }}</div>
                    <div class="home-section-wrap">
                        <hr class="short">
                        <br>
                        <h2><span
                                class="mot_vert strong center">{{ __('Treemium') }}</span>, {{ __('la plateforme de la forêt') }}
                        </h2>
                        <p class="paragraph-light">{{ __('Treemium s’appuie sur son expertise forestière et la détection LiDAR pour protéger et valoriser les forêts par la création d’un revenu immédiat sur les arbres en croissance. Pour cela, il est nécessaire d’attribuer à chaque arbre une identité. Cette identité aidera à la prise de conscience que la gestion des forêts est nécessaire et à un engagement civique pour préserver ces dernières.') }}</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/client/background/chene-gland-vert.jpg') }}"
                         alt="{{ __('Pourquoi les chênes') }}" class="image-tree">
                </div>
                <div class="col-md-6">
                    <h4>{{ __('Pourquoi les chênes ?') }}</h4>
                    <p>{{ __('Le chêne est l’essence française par excellence que nous retrouvons dans nos forêts avec une qualité remarquable. Il est aujourd’hui toujours recherché pour sa qualité de merrains mais aussi pour la charpente, l’ameublement ou la menuiserie.') }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section section-special-light"
             style="background-image: url('{{ asset('assets/img/client/background/bois.jpg') }}')" id="offre">
        <div class="container">
            <div class="row text-center p-3">
                <div class="col-md-5 paragraph-special-2 home-section-wrap-2 ">
                    <h4 class="text-center">{{ __('Sylviculteurs') }}</h4>
                    <br>
                    <p>{{ __("Bénéficiez de revenus immédiats en développant la co-propriété de l'arbre.") }}</p>
                    <p>{{ __('Vendez 40% de chaque arbre sélectionné et touchez instantanément le revenu de cette vente. A la coupe, vous récupérez la majeure partie du revenu et en versez une au particulier.') }}</p>
                    <ul>
                        <li>{{ __('Investissez tout de suite dans les projets qui vous tiennent à coeur.') }}</li>
                        <li>{{ __('Obtenez un mapping précis de votre parcelle.') }}</li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <br><br>
                </div>
                <div class="col-md-5 paragraph-special-2 home-section-wrap-2">
                    <h4 class="text-center">{{ __('Investisseur') }}</h4>
                    <br>
                    <p>{{ __('Investissez dans les arbres pour un placement concret, transparent, visible et durable avec une rentabilité.') }}</p>
                    <p>{{ __("Achetez une part d’arbre en l'humanisant, et devenez acteur de la protection des forêts, des puits carbone et de la biodiversité. Au moment de la coupe de l’arbre,  40% des revenus vous reviennent.") }}</p>
                    <ul>
                        <li>{{ __("Echangez instantanément vos tokens d'arbre quand vous le souhaitez pour un investissement liquide.") }}</li>
                        <li>{{ __('Devenez acteur de la protection de la biodiversité en développant des projets forestiers.') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section" id="technologie">
        <div class="container">
            <h2 class="center">{{ __("De l'arbre physique à l'arbre digital") }}</h2>
            <br><br>
            <div class="row text-center">
                <div class="col-md-5">
                    <p>{{ __('Nous utilisons les drones équipés de capteurs LiDAR et multispectral identifiant les arbres un à un. Leurs caractéristiques sont analysées et téléchargées') }}</p>
                    <img src="{{ asset('assets/img/client/background/bulle-identification.png') }}"
                         alt="{{ __('Identification') }}"
                         class="image-3">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-5">
                    <p>{{ __("L'arbre physique est présenté sous forme de token d'arbre digital sur la plateforme de la forêt grâce à la blockchain") }}</p>
                    <br>
                    <img src="{{ asset('assets/img/client/background/bulle-listing.png') }}"
                         alt="{{ __('Inventaire') }}"
                         class="image-3">
                </div>
            </div>
            <br><br>
            <hr class="short">
            <br>
            <h2 class="center">{{ __('La technologie blockchain au service de la forêt') }}</h2>
            <br><br>
            <p>{{ __("La Blockchain est la meilleure solution pour la valorisation et la protection des actifs numériques. Appliquée à la forêt, elle permet de stocker les caractéristiques horodatées de l'arbre et de garantir les conditions d'échange dans le Smart Contract.") }}</p>
            <p>{{ __("En offrant la plus grande plateforme d'arbre en croissance, nous utilisons cette nouvelle technologie pour construire un système meilleur grâce à la traçabilité, la transparence et la sécurisation.") }}</p>
            <div class="row justify-content-center">
                <div class="col-md-2">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('assets/img/client/background/protection.png') }}" alt="{{ __('Protection') }}"
                         class="image-2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('assets/img/client/background/stockage.png') }}" alt="{{ __('Stockage') }}"
                         class="image-2">
                </div>
                <div class="col-md-2">
                </div>
            </div>
            <br><br>
            <div class="row justify-content-center">
                <div class="col-md-2">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('assets/img/client/background/tracking.png') }}" alt="{{ __('Tracking') }}"
                         class="image-2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('assets/img/client/background/information.png') }}" alt="{{ __('Information') }}"
                         class="image-2">
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </section>

    <section class="page-section" id="equipe">
        <h2 class="center">{{ __('Notre équipe') }}</h2>
        <br><br>
        <div class="row justify-content-center">
            <div class="col-md-2 ">
                <img src="{{ asset('assets/img/client/team/georgine.png') }}" alt="Georgine" class="image-2">
                <p class="center"><strong>Georgine de Saporta</strong><br><span
                        class="em center">{{ __('Founder') }}<br>Epita</span>
                </p>
            </div>
            <div class="col-md-2">
                <img src="{{ asset('assets/img/client/team/matis.png') }}" alt="Matis" class="image-2">
                <p class="center"><strong>Matis Veniant</strong><br><span class="em center">{{ __('Co-Founder') }}<br>HEC Paris</span>
                </p>
            </div>
            <div class="col-md-2">
                <img src="{{ asset('assets/img/client/team/maxime.png') }}" alt="Maxime" class="image-2">
                <p class="center"><strong>Maxime de Ladoucette</strong><br><span
                        class="em center">{{ __('Co-Founder') }}<br>CentraleSupélec, LBS</span></p>
            </div>
            <div class="col-md-2 ">
                <img src="{{ asset('assets/img/client/team/nolwenn.png') }}" alt="Nolwenn" class="image-2">
                <p class="center"><strong>Nolwenn Bautier</strong><br><span class="em center">{{ __('Sales / forest') }}<br>‍AgroParisTech</span>
                </p>
            </div>
            <div class="col-md-2">
                <img src="{{ asset('assets/img/client/team/celia.png') }}" alt="Celia" class="image-2">
                <p class="center"><strong>Célia Guigliarelli</strong><br><span
                        class="em center">{{ __('Sales / forest') }}<br>‍AgroParisTech</span></p>
            </div>
        </div>
    </section>

    <!-- Contact-->
    <section class="page-section" style="background-image: url('{{ asset('assets/img/client/background/bois.jpg') }}')"
             id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">{{ __('Contactez-nous') }}</h2>
            </div>

            {{-- Validation --}}
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="contactForm" action="{{ route('send-query') }}" method="POST">
                @csrf
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="name" id="name" type="text"
                                   placeholder="{{ __('Votre Nom') }} *" value="{{ old('name') }}" autocomplete="name"
                                   required/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="email" id="email" type="email"
                                   placeholder="{{ __('Votre Email') }} *" value="{{ old('email') }}"
                                   autocomplete="email" required/>
                        </div>
                        <div class="form-group mb-md-0">
                            <input class="form-control" name="tel" id="tel" type="tel"
                                   placeholder="{{ __('Votre Téléphone') }} *" value="{{ old('tel') }}"
                                   autocomplete="tel" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <textarea class="form-control" name="message" id="message" type="text"
                                      placeholder="{{ __('Votre Message') }} *" required>{{ old('message') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">{{ __('Envoyer') }}</button>
                </div>
            </form>
        </div>
    </section>
@endsection
