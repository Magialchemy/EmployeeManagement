@extends('layouts.pagebase')

@section('title')
	新規社員登録
@endsection

@section('intheBox')
	@if(count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form action="{{ route('employees.store') }}" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id">
		<div class="form-group">
			<label>社員番号</label>
			<input type="number" name="employeeCode" class="form-control" placeholder="8桁の整数を入力してください..." value="{{old('employeeCode')}}">
			<small>8桁の整数を入力してください。</small>
		</div>
		<div class="form-group">
			<label>名前</label>
			<input type="text" name="name" class="form-control" placeholder="名前を入力してください..." value="{{old('name')}}">
			<small>50文字以内で入力してください。</small>
		</div>
			<input type="hidden" name="isDeleted" value="0">
		<button type="submit" class="btn btn-primary">登録</button>
	</form>
@endsection