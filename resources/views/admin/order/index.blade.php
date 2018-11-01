@extends('admin.layouts.master')

@section('content')

    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('quickadmin::templates.templates-customView_index-list') }}</div>
        </div>
        <div class="portlet-body">
		<table with="100%" class="table table-borderd table-striped">           
		   <tr>
		    <th>ФИО</th>
			<th>E-MAIL</th>
			<th>Телефон</th>
			<th>Адрес</th>
			<th>Доставка</th>
		    <th>Оплата</th>
			<th>Заказ</th>
			<th>Действие</th>
		   </tr>
		   <tr>
		   @foreach($all as $one)
		   <td>{{$one->fio}}</td>
		   <td>{{$one->email}}</td>
		   <td>{{$one->phone}}</td>
		   <td>{{$one->adress}}</td>
		   <td>{{$one->type}}</td>
		   <td>{{$one->pay}}</td>
		   <td><span>{{count(unserialize($one->body))}}</span></td>
		   <td><a href="{{asset('admin/order/one/'.$one->id)}}">Перейти к списку товаров в заказе</a></td>
		   </tr>
		   @endforeach
		</table>
		{!!$all->links()!!}		
        </div>
	</div>

@endsection