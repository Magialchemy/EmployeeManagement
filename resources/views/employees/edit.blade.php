@extends('layouts.pagebase')

@section('title')
	社員情報変更
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
	@empty($msg)
	@else
		<div class="alert alert-success" role="alert">
    		{{ $msg }}
 		</div>
	@endempty
	<form action="{{ route('employees.update',['employee' => $employee]) }}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<input type="hidden" name="id" value="{{$employee->id}}">
			<input type="hidden" name="employeeCode" value="{{$employee->employeeCode}}">
			<label>社員番号</label>
			<br>{{$employee->employeeCode}}
		</div>
		<div class="form-group">
			<label>名前</label>
			@empty(old('name'))
			<input type="text" name="name" class="form-control" placeholder="名前を入力してください..." value="{{$employee->name}}">
			@else
			<input type="text" name="name" class="form-control" placeholder="名前を入力してください..." value="{{old('name')}}">
			@endempty
			<small>50文字以内で入力してください。</small>
		</div>

			<input type="hidden" name="isDeleted" value="{{$employee->isDeleted}}">
			<input type="hidden" name="_method" value="patch">
		<button type="submit" class="btn btn-primary" style="float:left;">変更</button>
	</form>
	<form action="{{route('employees.destroy',['employee' => $employee])}}" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="delete">
		
		<!-- Button trigger modal -->
		 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"style="float:right;">削除</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">確認</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        本当に削除しますか？
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
		        <button type="submit" class="btn btn-primary">削除</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>
	
@endsection