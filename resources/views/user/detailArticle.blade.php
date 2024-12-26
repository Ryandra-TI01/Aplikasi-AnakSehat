@extends('layouts.user')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card-body overflow-hidden" style="width: 100%; height: 300px;border-radius: 10px ">
      <img src="{{asset('storage/' . $data->image)}}" 
          alt="img-article" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div class="card mt-6">
      <div style="padding: 1.75rem 0 0 1.75rem">
        <small>Published {{$data->date}}</small><br>
        <small>Written by {{$data->doctor->name}} </small>
      </div>
      <h4 class="card-header">{{$data->title}}</h4>
      <div class="card-body">
        <p class="card-text" style="text-align: justify">
          {{$data->content}}
        </p>
      </div>
    </div>
</div>
@endsection