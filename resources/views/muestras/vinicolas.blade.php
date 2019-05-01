<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <style>
    	*,
		*::before,
		*::after {
		  box-sizing: border-box;
		}
		html {
		  background-color: #f0f0f0;
		}
		body {
		  color: #999999;
		  font-family: 'Roboto', 'Helvetica Neue', Helvetica, Arial, sans-serif;
		  font-style: normal;
		  font-weight: 400;
		  letter-spacing: 0;
		  padding: 1rem;
		  text-rendering: optimizeLegibility;
		  -webkit-font-smoothing: antialiased;
		  -moz-osx-font-smoothing: grayscale;
		  -moz-font-feature-settings: "liga" on;
		}
		img {
		  height: auto;
		  max-width: 100%;
		  vertical-align: middle;
		}
		.btn {
		  background-color: white;
		  border: 1px solid #cccccc;
		  color: #696969;
		  padding: 0.5rem;
		  text-transform: lowercase;
		}
		.btn--block {
		  display: block;
		  width: 100%;
		}
		.cards {
		  display: flex;
		  flex-wrap: wrap;
		  list-style: none;
		  margin: 0;
		  padding: 0;
		}
		.cards__item {
		  display: flex;
		  padding: 1rem;
		}
		@media (min-width: 40rem) {
		  .cards__item {
		    width: 50%;
		  }
		}
		@media (min-width: 56rem) {
		  .cards__item {
		    width: 33.3333%;
		  }
		}
		.card {
		  background-color: white;
		  border-radius: 0.5rem;
		  box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
		  display: flex;
		  flex-direction: column;
		  overflow: hidden;
		}
		.card:hover .card__image {
		  -webkit-filter: contrast(100%);
		          filter: contrast(100%);
		}
		.card__content {
		  display: flex;
		  flex: 1 1 auto;
		  flex-direction: column;
		  padding: 1rem;
		}
		.card__image {
		  background-position: center center;
		  background-repeat: no-repeat;
		  background-size: cover;
		  border-top-left-radius: 0.25rem;
		  border-top-right-radius: 0.25rem;
		  -webkit-filter: contrast(70%);
		          filter: contrast(70%);
		  overflow: hidden;
		  position: relative;
		  transition: -webkit-filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
		  transition: filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
		  transition: filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91), -webkit-filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
		}
		.card__image::before {
		  content: "";
		  display: block;
		  padding-top: 56.25%;
		}
		@media (min-width: 40rem) {
		  .card__image::before {
		    padding-top: 66.6%;
		  }
		}
		.card__image--flowers {
		  background-image: url(https://unsplash.it/800/600?image=82);
		}
		.card__image--river {
		  background-image: url(https://unsplash.it/800/600?image=11);
		}
		.card__image--record {
		  background-image: url(https://unsplash.it/800/600?image=39);
		}
		.card__image--fence {
		  background-image: url(https://unsplash.it/800/600?image=59);
		}
		.card__title {
		  color: #696969;
		  font-size: 1.25rem;
		  font-weight: 300;
		  letter-spacing: 2px;
		  text-transform: uppercase;
		}
		.card__subtitle {
		  color: #696969;
		  font-size: 1rem;
		  font-weight: 300;
		  margin: 1rem 0;
		  letter-spacing: 2px;
		  text-transform: uppercase;
		}
		.card__text {
		  flex: 1 1 auto;
		  font-size: 0.875rem;
		  line-height: 1.5;
		  margin-bottom: 1.25rem;
		}

		a:link, a:visited {
		  background-color: white;
		  color: black;
		  border: 2px solid navy;
		  padding: 10px 20px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		}

		a:hover, a:active {
		  background-color: navy;
		  color: white;
		}

    </style>
</head>

<body id="top">

	 <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow">

        <main class="py-4" id="app">
            <div class="container-fluid">
				<br>
				<br>
				<div class="container-fluid">
					<ul class="cards">
					@forelse ($vinicolas as $vinicola)
						<li class="cards__item">
						    <div class="card">   
						      <div class="card__content">
						        <div class="card__title">{{$vinicola->nombre}}</div>
						        <div class="card__subtitle">Tipo: {{$vinicola->tipo}}</div>
						        <span><b>Filosofía</b></span>
						        <p class="card__text">{{$vinicola->filosofia}}</p>
						        <span><b>Locación</b></span>
						        <p class="card__text">
						        	{{$vinicola->locacion}}
						        	<a href="{{$vinicola->getMapLink()}}" target="_blank">Ver en Google Maps</a>
						        </p>
						        @forelse ($vinicola->uvasVin as $uvaVin)
							        <span><b>UVA</b></span>
							        <p class="card__text">{{$uvaVin->nombre}} {{$uvaVin->hectarea}} ha</p>
								@empty
									{{-- empty expr --}}
								@endforelse
						        <span><b>Teléfono</b></span>
						        <p class="card__text">{{$vinicola->telefono}}</p>
						      </div>
						    </div>
						 </li>
					@empty
						No hay uvas 
					@endforelse
					</ul>
				</div>
			</div>
        </main>

    </section> <!-- s-content -->

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</body>

</html>
	