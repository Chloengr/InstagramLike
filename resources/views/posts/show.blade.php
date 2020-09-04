@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
      <img src="/storage/{{ $post->image}}" class="w-100" alt="">
    </div>

    <div class="col-4">
      <div class="d-flex align-items-center">
        <div class="pr-3">
          <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width: 55px">
        </div>
        <div class="font-weight-bold">
          <div>
            <a href="/profile/{{$post->user->id}}">
            <span class="theme-dark">
              {{ $post->user->username}}
            </span>
            </a>
            <span class="pl-1 pr-1 font-weight-bold">©</span>
            <a href="">Follow</a>
          </div>
        </div>
      </div>
      <hr>
      <p>
        <span class="font-weight-bold">
          <a href="/profile/{{$post->user->id}}">
            {{ $post->user->username}}
          </a>
        </span>
        {{ $post->caption}}
        </p>
    </div>
  </div>
</div>
@endsection