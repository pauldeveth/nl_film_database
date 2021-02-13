<nav class="navbar navbar-expand-md navbar-dark bg-dark py-3">
    <a class="navbar-brand" href="{{ route('product.index') }}">
        <i class="fas fa-yin-yang mr-2"></i></a><span>Nl Film DB</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mt-4">
            <li class="dropdown"><a href="#" class="dropdown-toggle mr-4" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">Bekijken of Kopen </a>
                <ul class="dropdown-menu">
                
                    <li><a class="blog-nav-item" href="/picl">Films op Picl</a></li>
                    <li><a class="blog-nav-item" href="/vimeo">Films op Vimeo</a></li>
                    <li><a class="blog-nav-item" href="/youtube">Films op Youtube</a></li>
                    <li><a class="blog-nav-item" href="/npostart">Films op NPO Start</a></li>
                    <li><a class="blog-nav-item" href="/netflix">Films op Netflix</a></li>
                    <li><a class="blog-nav-item" href="/npostartdocus">Documentaires op NPO Start</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/shop">Shop</a></li>
                    <li><a href="/shopopamazon">Shop op Amazon</a></li>
                    <li><a href="/shopopbolcom">Shop op Bol.com</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle mr-4" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">Film Reeksen</a>
                <ul class="dropdown-menu">
                    <li><a href="/filmmuseum">Filmmuseum</a></li>
                    <li><a href="/hollandsch_glorie">Hollandsch Glorie</a></li>
                    <li><a href="/hollandsglorie">Hollands Glorie</a></li>
                    <li><a href="/rob_houwer_film_collectie">Rob Houwer Film Collectie</a></li>
                    <li><a href="/de_100procent_nl_film_collectie">De 100% NL Film Collectie</a></li>
                    <li><a href="/de_nederlandse_film_collectie">De Nederlandse Film Collectie</a></li>
                    <li><a href="/hollands_filmgoud">Hollands Filmgoud</a></li>
                    <li><a href="/quality_film_collection">Quality Film Collection</a></li>
                    <li><a href="/entertainment_collection">Entertainment Collection</a></li>
                    <li><a href="/zappbioskort">Zappbios kort</a></li>
                    <li><a href="/telefilms">Telefilms</a></li>
                    <li><a href="/onenightstand">Onenightstand</a></li>
                    <li><a href="/reekskort">Ntr-Kort</a></li>
                    <li><a href="/nieuwelolas">Nieuwe Lolas</a></li>
                    <li><a href="/enneagram">Enneagram</a></li>
                    <li><a href="/de_oversteek">De Oversteek</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/duivelsedilemmas">Reeks Duivelse dilemmas</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/quality_film_collection_buitenland">Quality Film Collection Buitenland</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle mr-4" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">Studios</a>
                <ul class="dropdown-menu">
                    
                    <li><a href="/baldr">Baldr</a></li>
                    <li><a href="/bosbros">Bosbros</a></li>
                    <li><a href="/circe">Circe</a></li>
                    <li><a href="/column">Column</a></li>
                    <li><a href="/familyaffair">Family Affair Films</a></li>
                    <li><a href="/fuworks">Fu Works</a></li>
                    <li><a href="/habbekrats">Habbekrats</a></li>
                    <li><a href="/hazazah">Hazazah Pictures</a></li>
                    <li><a href="/ijswater">IJswater</a></li>
                    <li><a href="/pupkin">Pupkin Film</a></li>
                    <li><a href="/rinkelfilm">Rinkel Film</a></li>
                    <li><a href="/september">September Film</a></li>
                    <li><a href="/topkapi">Topkapi Films</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle mr-4" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">Lijstjes</a>
                <ul class="dropdown-menu">
                    <li><a href="/top250imdb">Top 250 op IMDB</a></li>
                    <li><a href="/top250moviemeter">Top 250 op Moviemeter</a></li>
                    <li><a href="/top250tvseriestvmeter">Top 250 op TVmeter</a></li>
                    <li><a href="/chronologisch">Chronologisch vanaf 1900</a></li>
                    <li><a href="/verfilmd">Verfilmde Boeken</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/vpro">VPRO</a></li>
                    <li><a href="/regaantalfilms">Regisseurs en aantal</a></li>
                    <li><a href="/actaantalfilms">Acteurs en aantal</a></li>
                    <li><a href="/rankedbybudget">Films ranked by Budget</a></li>
                </ul>
            </li>
            <div class="mr-4" style="align-text:center">
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" name="q" placeholder="Zoek Films"
                            autocomplete="off">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default" id='btn_search'>
                                <span class="fa fa-search">
                                </span>
                    </div>
                </form>
            </div>
            <li class="mr-4">
                <a href="{{ route('product.shoppingCart') }}">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Winkelkar<span
                        class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Account </a>
                <ul class="dropdown-menu">
                    @if(Auth::check())
                    <li><a href="{{ route('user.profile') }}">Profiel</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('user.logout') }}">Logout</a></li>
                    @else
                    <li><a href="{{ route('user.signup') }}">Registreer</a></li>
                    <li><a href="{{ route('user.signin') }}">Inloggen</a></li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</nav>