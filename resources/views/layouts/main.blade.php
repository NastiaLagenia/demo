<!DOCTYPE html>
<html lang="ru">
 <head>
  <meta charset="utf-8">
  <meta name="description" content="1, 2 3 предложения">
  <meta name="keywords" content="выражения через , ">
  <meta name="author" content="Demchenko">
  <title>Название сайта</title>
  <link type="text/css" rel="stylesheet" href="{{asset('media/bootstrap/css/bootstrap.min.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('media/css/style.css')}}" />
  @section('style')
  @show  
  @section('scripts')
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('js/test.js')}}"></script>
  @show
 </head>
 <body>
  <header id="header">
   <h1 id="logotext">Название сайта</h1>
   <img id="logo" src="media/img/logo.png" />
  </header>
  
  <nav class="topmenu">
   <a href="{{asset('/')}}">Главная</a>
   <a href="{{asset('about')}}">О компании</a>
   <a href="{{asset('categories')}}">Товары</a>
   <a href="{{asset('#')}}">Услуги</a> 
   <a href="{{asset('contact')}}">Контакты</a>
	@guest
		
			<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>		
			@if (Route::has('register'))
				<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
			@endif
	   
	@else
		
			<a href="{{asset('home')}}">
				{{ Auth::user()->name }} <span class="caret"></span>
			</a>


				<a class="dropdown-item" href="{{ route('logout') }}"
				   onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>		
	@endguest
  </nav> 
  <div>
   <div>
    <div class="col-md-2">
    Main !!!
	</div>
	
	<div class="col-md-8">
	@yield('content')
	</div>
	<div class="col-md-2">
	 <!--pogoda.by-->
<!--Информер распространяется свободно и на безвозмездной основе. Однако, в случае изменения кода информера (в частности, удаления ссылок), POGODA.BY снимает с себя ответственность за конечный результат.-->

    <a href="{{asset('basket')}}" class="btn btn-primary btn-block">Моя корзина ({{$cookie_count}})</a>
	</div>
   </div>
  </div>
  <br style="clear:both" />
  <footer class="footer">
   2018 &copy; DemchenkoAnastasia
  </footer>
 </body>
</html> 