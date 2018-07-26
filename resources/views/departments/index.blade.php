
@extends('layouts.app')

@section('content')

<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
<div class="panel panel-primary">
  <div class="panel-heading">Departments<a  class="pull-right btn btn-primary btn-sm"
  	href="/departments/create"><i class="fas fa-plus"></i>Create new</a></div>
  <div class="panel-body">
   

  <ul class="list-group">
    @foreach($departments as $department)
  <li class="list-group-item"><a href="/departments/{{ $department->id }}">{{ $department->name }}</a></li>

  @endforeach
  
</ul>



  </div>
</div>
</div>

@endsection

