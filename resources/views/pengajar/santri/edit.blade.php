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

                        <form action="/santri/{{ $santri->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="NIS" class="form-label">NIS</label>
                                <input type="text" class="form-control" id="nis" name="nis" value="{{ $santri->nis }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $santri->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $santri->kelas }}">
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $santri->kelas }}">
                            </div>
                            {{-- <button type="submit" name="action" value="password" class="btn btn-danger mr-5 mb-5">Reset Password</button> --}}
                            <button type="submit" name="action" value="data" class="btn btn-warning mr-5 mb-5">Submit</button>
                            <button type="submit" name="action" value="password" class="btn btn-danger mr-5 mb-5">Reset Password</button>
                            <a href="{{route('santri')}}" class="btn btn-primary mr-5 mb-5">Kembali</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
