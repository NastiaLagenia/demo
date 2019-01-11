 @extends('layouts.main')
 @section('content')
 <h2>Добро пожаловать на сайта</h2>
 	 Welcome
	 <div class="maintext">	 
       {!!$obj->body!!}
	 </div>
@endsection