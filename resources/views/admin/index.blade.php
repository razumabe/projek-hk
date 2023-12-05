@extends('layouts.main')


@section('content')


@auth
  <div class="container-fluid py-2">
    <div class="mb-4">
      <h3 class="font-weight-bolder text-white mb-0">Selamat datang <i>{{ Auth::user()->name }}</i></h3>
      <div class="font-size-h5 text-black"><strong>Email : </strong>{{ Auth::user()->email }}</div>
      <div class="font-size-sm text-black"><strong>Role / Jabatan : </strong>{{ implode(", ", Auth::user()->roles()->get()->pluck('name')->toArray()) }}</div>
    </div>
  </div>
@endauth



@endsection