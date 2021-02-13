<!DOCTYPE HTML>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Deze website geeft de meest complete relaties weer die er bestaan tussen Films Regisseurs en Acteurs en alles wat hiermee samenhangt"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--Fontawesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">

        <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
        <link rel="stylesheet" href="{{ URL::to('css/custom.css') }}">
        <link rel="stylesheet" href="{{ URL::to('css/album.css') }}">
        <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/instantsearch.css@7/themes/algolia-min.css"
    />
    <link rel="stylesheet" href="./src/index.css" />
    <link rel="stylesheet" href="./src/app.css" />




        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-106307256-1', 'auto');
        ga('send', 'pageview');
        </script>
        <link href="{{asset('starter-template.css')}}" rel="stylesheet">
        <style>
        .twitter-typeahead,
        .tt-hint,
        .tt-input,
        .tt-menu{
            width: auto ! important;
            font-weight: normal;
        
        }
     </style>





    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('css/tildehekje.ico') }}">
    <title>Geavanceerd zoeken met filters op de DVD Shop van de Nederlandse Film Database</title>
    @yield('styles')
  </head>
  <body>
    @include('partials.header')
    <div id="app">
            

               

            
            
                
                    
@if(Session::has('success'))
<div class="row">
	<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
		<div id="charge-message" class="alert alert-success">
			{{ Session::get('success') }}
		</div>
	</div>
</div>
@endif
	
		
			
    <div class="ais-InstantSearch">
      <h1>Geavanceerd zoeken met filters op YOURHOST ~#</h1>
      <h2>🎮</h2>
      <p>
        
      </p>

      <div class="left-panel">
        <div id="clear-refinements"></div>
        <h2>Regisseur</h2>
        <div id="regisseur"></div>
        <h2>Jaar</h2>
        <div id="jaar"></div>
        <h2>Genre</h2>
        <div id="genre"></div>
        <h2>Land</h2>
        <div id="land"></div>
        <h2>Acteur</h2>
        <div id="acteur"></div>
      </div>

      <div class="right-panel">
        <strong>Zoek naar Films Regisseurs of Acteurs</strong>
        <div id="searchbox" class="ais-SearchBox"></div>
        <div id="hits"></div>
        <div id="pagination"></div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@meilisearch/instant-meilisearch@v0.2.5/dist/instant-meilisearch.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4"></script>
    <script src="./src/app.js"></script>
    
                
            

              
    
            
        
        @yield('scripts')
        @include('partials.footer')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


  



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!--script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script-->






    <!-- Initialize typeahead.js on the input -->
    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
    <script>
        $(document).ready(function() {
            var bloodhound = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '/user/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
            });
            
            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'products',
                source: bloodhound,
                display: function(data) {
                    return data.title  //Input value to be set when you select a suggestion. 
                },
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function(data) {
                    return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.title + '</div></div>'
                    }
                }
            });
            $('.tt-menu').click(function(){
                $('#btn_search').click();
            }); 
        });
    </script>



  </body>
</html>














