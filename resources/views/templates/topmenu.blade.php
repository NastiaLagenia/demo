<nav class="topmenu">
   <a href="{{asset('/')}}">Главная</a>
   <a href="{{asset('about')}}">О компании</a>
   <a href="{{asset('categories')}}">Товары</a>
   <a href="{{asset('basket')}}">Моя корзина</a>
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