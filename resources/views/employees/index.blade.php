@extends('layouts.pagebase')

@section('title')
    社員一覧
@endsection

@section('intheBox')
<table class="table">
    <thead>
        <tr><th>id</th><th>社員番号</th><th>氏名</th></tr>
    </thead>
        <tbody>
        @forelse($employees as $employee)
        <tr>
        	<td><a href="{{route('employees.edit',['id' => $employee->id])}}">{{$employee->id}}</a></td>
        	<td>{{$employee->employeeCode}}</td>
        	<td>{{$employee->name}}</td>
        </tr>
        @empty
        <p class="alert alert-warning">登録されているデータはありません。</p>
        @endforelse
    </tbody>
</table>
{{ $employees->links() }}
@endsection