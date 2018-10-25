@extends('layouts.base')
@section('scripts')
@parent
<script src="{{asset('ckeditor/ckeditor.js')}}" ></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ура получилось!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<form method="post" action="{{asset('home')}}">
{!!csrf_field()!!}

  <div class="form-group">
    <label>Оставьте свой отзыв</label>
	<p><textarea rows="10" cols="105" name="body" class="ckeditor"></textarea></p>
	 </div>
    <button type="sumbit" value="отправить" name="send">Отправить</button>
 
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
