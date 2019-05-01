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
					{{--  <table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Nombre de la uva</th>
								<th scope="col">Otros nombres</th>
								<th scope="col">Al olfato</th>
								<th scope="col">Al gusto</th>
								<th scope="col">A la vista</th>
								<th scope="col">Maridajes</th>
							</tr>
						</thead>
						<tbody>--}}
							<ul class="cards">
							@forelse ($uvas as $uva)
								<li class="cards__item">
								    <div class="card">   
								      <div class="card__content">
								        <div class="card__title">{{$uva->title}}</div>
								        <div class="card__subtitle">{{$uva->subtitle}}</div>
								        <span><b>Al olfato</b></span>
								        <p class="card__text">{{$uva->olfato}}</p>
								        <span><b>Al gusto</b></span>
								        <p class="card__text">{{$uva->gusto}}</p>
								        <span><b>Al La Vista</b></span>
								        <p class="card__text">{{$uva->vista}}</p>
								        <span><b>Maridajes</b></span>
								        <p class="card__text">{{$uva->maridaje}}</p>
								      </div>
								    </div>
								 </li>
							{{--  <tr>
								<th scope="row">{{$uva->title}}</th>
								<th>{{$uva->subtitle}}</th>
								<th>{{$uva->olfato}}</th>
								<th>{{$uva->gusto}}</th>
								<th>{{$uva->vista}}</th>
								<th>{{$uva->maridaje}}</th>
							</tr>--}}
							@empty
								{{-- empty expr --}}
								No hay uvas 
							@endforelse
							</ul>
							
					{{--	</tbody>
					</table>
					 $uvas->links() --}}
				</div>
			</div>

		{{--  	<ul class="cards">
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--fence"></div>
      <div class="card__content">
        <div class="card__title">Flex</div>
        <p class="card__text">This is the shorthand for flex-grow, flex-shrink and flex-basis combined. The second and third parameters (flex-shrink and flex-basis) are optional. Default is 0 1 auto. </p>
        <button class="btn btn--block card__btn">Button</button>
      </div>
    </div>
  </li>
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--river"></div>
      <div class="card__content">
        <div class="card__title">Flex Grow</div>
        <p class="card__text">This defines the ability for a flex item to grow if necessary. It accepts a unitless value that serves as a proportion. It dictates what amount of the available space inside the flex container the item should take up.</p>
        <button class="btn btn--block card__btn">Button</button>
      </div>
    </div>
  </li>
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--record"></div>
      <div class="card__content">
        <div class="card__title">Flex Shrink</div>
        <p class="card__text">This defines the ability for a flex item to shrink if necessary. Negative numbers are invalid.</p>
        <button class="btn btn--block card__btn">Button</button>
      </div>
    </div>
  </li>
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--flowers"></div>
      <div class="card__content">
        <div class="card__title">Flex Basis</div>
        <p class="card__text">This defines the default size of an element before the remaining space is distributed. It can be a length (e.g. 20%, 5rem, etc.) or a keyword. The auto keyword means "look at my width or height property."</p>
        <button class="btn btn--block card__btn">Button</button>
      </div>
    </div>
  </li>
</ul>--}}
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

     <!-- JavaScripts -->
   <!-- script
    ================================================== -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>


    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/piexif.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/purify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/sortable.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/locales/es.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fileinput.min.js') }}"></script>
    <script src="{{ asset('js/all.js') }}"></script>
</body>

</html>
	