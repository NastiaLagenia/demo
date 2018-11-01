@extends('admin.layouts.master')

@section('content')

    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('quickadmin::templates.templates-customView_index-list') }}</div>
        </div>
        <div class="portlet-body">
		<table with="100%" class="table table-borderd table-striped">           
		   <tr>
		    <th>Название</th>
			<th>Цена</th>
		   </tr>
		   <tr>
		  
		   <td>{{$obj->name}}</td>
		   <td>{{$obj->price}}</td>

		   </tr>

		</table>
		@php
 		 $arr=unserialize($obj->body);
		@endphp
		@foreach($arr as $key=>$value)
		товар:{{$key}},
		количество:{{$value}}<hr/>
		@endforeach
		
        </div>
	</div>

@endsection