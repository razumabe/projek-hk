@extends('layouts.main')

@section('content')
  
<div class="container-fluid py-2">
    <div class="mb-4">
        <h3 class="font-weight-bolder text-white mb-0">Update User</h3>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">

                        <form action="/admin/users/{{ $pengguna->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $pengguna->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" value="{{ $pengguna->nim }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $pengguna->email }}">
                            </div>
                            <div class="col-md-12">
                              <label for="roles">Roles</label>
                              @foreach($roles as $role)
                                  <div class="form-check">
                                      <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                      @if($pengguna->roles && $pengguna->roles->contains($role->id)) checked @endif>
                                      <label for="">{{ $role->name }}</label>
                                  </div>
                              @endforeach
                            </div>
                            {{-- <button type="submit" name="action" value="password" class="btn btn-danger mr-5 mb-5">Reset Password</button> --}}
                            <button type="submit" name="action" value="data" class="btn btn-warning mr-5 mb-5">Submit</button>
                            <button type="submit" name="action" value="password" class="btn btn-danger mr-5 mb-5">Reset Password</button>
                            <a href="{{route('users')}}" class="btn btn-primary mr-5 mb-5">Kembali</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
