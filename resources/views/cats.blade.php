 @extends('layouts.base')
 @section('scripts')
 @parent
 <script src="{{asset('js/modal.js')}}"></script>
 @endsection
 
 @section('content')
 <h2>Категории</h2>
	 <div class="maintext">
	 @foreach($cats as $cat)
      <h2> {{$cat->name}}	 </h2>
	  <div>
	   {!!$cat->body!!}
	  </div>
	  @foreach($cat->products()->get() as $one)
       </hr>
	   @if($one->picture)
		   <img class="product" src="{{asset('uploads/thumb/'.$one->picture)}}" id="{{$one->id}}"/>
	   @else 
		   <img class="product" src="{{asset('media/img/no_foto.jpg')}}" id="{{$one->id}}"/>
	   @endif 	   
	   <h3>
	   <a href="{{asset('product/'.$one->id)}}" class="product_link">
	   {{$one->name}}
	   </a>
	   </h3>
	   {!!$one->body!!}
	   	   
     @endforeach
	 @endforeach
	 
	 
	 </div>
@endsection