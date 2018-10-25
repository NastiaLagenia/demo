@extends('layouts.base')

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

                    <form>
  <div class="form-group">
    
    <label>Оставьте свой отзыв</label>
	<p><textarea rows="10" cols="45" name="text" placeholder="Введите свой отзыв"></textarea></p>
  </div>
  <button type="submit" class="btn btn-default">Отправить</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
