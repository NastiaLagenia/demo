 @extends('layouts.base')
 @section('scripts')
 @parent
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/order.js')}}"></script>

@endsection


 @section('content')
 <h2>Моя Корзина</h2>
	 <div class="maintext">	
@if (count($errors)>0)
	<div class="alter-danger">
<strong>Whoops!</strong>Найдены следующие ошибки.<br><br>
<ul>
@foreach($errors->all() as $error)
<li>
{{$error}}
</li>
@endforeach
</ul>
</div>
@endif


<form method="POST" action="{{asset('order')}}">
@csrf	 
     <table class="table table-borderd table-striped" width='100%'	>
	  <tr>
	   <th>Изображение</th>
	   <th>Название</th>
	   <th>Цена, руб.</th>
	   <th>Количество</th>
	   <th>Сумма</th>
	   <th>Действие</th>
	  </tr>
	  @php
	     $counts=0;
		 $itog=0;
	   @endphp
	  @foreach($arr as $key=>$value)
	   @php
	     $count=$value*$products[$key]->price;
		 $counts+=$value;
		 $itog+=$count;
	   @endphp
	    <tr>
		  <td>
		    @if($products[$key]->picture)
		    <img class="product" src="{{asset('uploads/thumb/'.$products[$key]->picture)}}"/>
	        @else 
		   <img class="product" src="{{asset('media/img/no_foto.jpg')}}" />
	       @endif 
		  </td>	
          <td>{{$products[$key]->name}}</td>		
          <td>
		  <span id="price_{{$key}}">
		  {{$products[$key]->price}}
		  </span>
		  </td>		
          <td>
		  <input type="number" name="{{$key}}" data-id="{{$key}}" min=0 max=100 value="{{$value}}" class="count"/>
		  </td>		
          <td><span id="count_{{$key}}">
		  {{$count}}
		  </span>
		  </td>		
          <td><a href="{{asset('basket/dell/'.$key)}}" data-id="{{$key}}" &times>Delete</a></td>				  
	    </tr>
	  @endforeach
	  	  
	  <tr>
	    <th colspan="3">Итого</th>
		<td>{{$counts}}</td>
		<td>{{$itog}}</td>
		<td><a href="{{asset('basket/clear/')}}">Delete All</a></td>		
	  </tr>
	  
     </table>
     <div class="col-md-10" ></div>
	 <div class="col-md-2">
	 <button type="button" class="btn btn-primary " id="ord"  >Перейти к оформлению заказа</button>
	  </br>
	  </div>
<script>
	 $(function(){
		 $('#of').css('display','block');
	 })
	</script>	  
	  
	  <div id="of" style="display: none">
	  	 <div class="col-md-12">      
					<div class="card-body">
						  </br>
                                    <div class="form-group row">
                                        <label for="fio" class="col-md-2 col-form-label text-md-right">ФИО<i>*</i></label>

                                        <div class="col-md-10">

                                            <input id="fio" type="text" class="form-control{{ $errors->has('fio') ? ' is-invalid' : '' }}" name="fio" value="{{ old('fio') }}" required autofocus>

                                            @if ($errors->has('fio'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('fio') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">E-Mail<i>*</i></label>

                                        <div class="col-md-10">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="address" class="col-md-2 col-form-label text-md-right">Адрес<i>*</i></label>

                                        <div class="col-md-10">
                                            <input id="adress" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="adress" required>

                                            @if ($errors->has('adress'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('adress') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-md-2 col-form-label text-md-right">Телефон<i>*</i></label>

                                        <div class="col-md-10">
                                            <input id="phone" type="text" class="form-control" name="phone" required>
                                        </div>
                                    </div>
									
									<div class="form-group row">
                                        <label for="exampleFormControlSelect1" class="col-md-2 col-form-label text-md-right">Cпособ доставки</label>
                                        <div class="col-md-10">
                                            <select name="type" class="form-control" id="exampleFormControlSelect1" >
											  <option>Доставка курьером</option>
											  <option>Самовывоз</option>
											  <option>Доставка почтой по РБ</option>
											</select>
                                        </div>																				
                                    </div>
									<div class="form-group row">
                                        <label for="exampleFormControlSelect1" class="col-md-2 col-form-label text-md-right">Cпособ оплаты</label>
                                        <div class="col-md-10">
                                            <select class="form-control" id="exampleFormControlSelect1" name="pay">>
											  <option>Оплата наличными курьеру или при самовывозе</option>
											  <option>Предоплата через ЕРИП</option>
											  <option>Оплата по карте </option>
											</select>
                                        </div>																				
                                    </div>
                                    <div class="form-group row" >
                                    	<label for="" class="col-md-2 col-form-label text-md-right">Комментарий к заказу</label>
                                        <div class="col-md-10">
                                    	<textarea rows="10" cols="103" name="body"  class="ckeditor"></textarea>
                                    </div>
                                    </div>
                                
                        </div>
                    </div>
           
	  
	  </div>
	  <div class="col-md-10" ></div>
	 <div class="col-md-2" id="ord">
	  <button type="submit" class="btn btn-primary"}>Подтвердить</button>
	  </br>
	  </div>  
	  </form>
	 </div>
@endsection