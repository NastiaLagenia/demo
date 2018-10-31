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
  
  @include ('templates.topmenu')
  <div>
   <div>
    <div class="col-md-2">
	 @foreach($v_catalogs as $one)
	 <a href="{{asset('catalog/'.$one->id )}}" class="btn btn-default btn-block">{{$one->name}}</a>
	 @endforeach
	 <!--<a href="{{asset('#')}}" class="btn btn-default btn-block">Разработка</a>
	 <a href="{{asset('#')}}" class="btn btn-success btn-block">Продвижение</a>-->
	 
	 <a href="{{asset('feedback')}}" class="btn btn-primary btn-block">Отзывы</a>
	 
	</div>
	
	<div class="col-md-8">
	@yield('content')
	</div>
	<div class="col-md-2">
	 <a href="{{asset('basket')}}" class="btn btn-primary btn-block">Моя корзина ({{$cookie_count}})</a>
	</div>
   </div>
  </div>
  <br style="clear:both" />
  <footer class="footer">
   2018 &copy; Demchenko Anastasia
  </footer>
 </body>
</html> 