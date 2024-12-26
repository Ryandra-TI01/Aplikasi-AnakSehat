@extends('layouts.user')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="input-group input-group-merge mb-6 m-auto" style="width: 40%">
        <span id="basic-icon-default-fullname2" class="input-group-text bg-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m19.6 21l-6.3-6.3q-.75.6-1.725.95T9.5 16q-2.725 0-4.612-1.888T3 9.5t1.888-4.612T9.5 3t4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l6.3 6.3zM9.5 14q1.875 0 3.188-1.312T14 9.5t-1.312-3.187T9.5 5T6.313 6.313T5 9.5t1.313 3.188T9.5 14"/></svg>
        </span>
        <input type="text" class="form-control bg-white" id="basic-icon-default-fullname" placeholder="Search ..." aria-label="Search ..." aria-describedby="basic-icon-default-fullname2">
    </div>
    <div class="d-flex justify-content-evenly mb-6 m-auto" style="width: 40%">
        @for($i = 0; $i < 3; $i++)
            <a href="">
                <span class="badge bg-label-primary">Primary</span>
            </a>
            <a href="">
                <span class="badge bg-label-secondary">Secondary</span>
            </a>
        @endfor
    </div>
    <h4>
        Rekomendasi artikel untukmu
    </h4>
    <div class="row mb-12 g-6">
      @foreach($articles as $k)
      <div class="col-md-6">
          <a href="/article/{{$k->id}}">
              <div class="card">
                <div class="d-flex">
                  <div class="overflow-hidden">
                    <img class="rounded" style="object-fit: cover; height: 200px; widhth: 100px;" 
                    src="{{asset('storage/' . $k->image)}}" alt="Card image">
                  </div>
                  <div>
                    <div class="card-body">
                      <h5 class="card-title">{{$k->title}}</h5>
                      <p class="card-text">
                       {{$k->content}}
                      </p>
                      <p class="card-text"><small class="text-muted">Published {{$k->date}}</small></p>
                    </div>
                  </div>
                </div>
              </div>
          </a>
      </div>
      @endforeach
  </div>
</div>
@endsection