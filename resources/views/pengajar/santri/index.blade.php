@extends('layouts.main')

@section('content')
<div class="container-fluid py-2">
    <div class="mb-4">
        <h3 class="font-weight-bolder text-white mb-0">Data Santri</h3>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        
                        <a class="btn btn-primary mb-3" href="{{ route('create.santris') }}">Tambah User</a>

                        <table class="table table-hover align-items-center mb-0 mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">No</th>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">NIS</th>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">Kelas</th>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($santri as $u)
                                <tr>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">{{ $loop->iteration }}</span>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-sm">{{ $u->nis }}</h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">{{ $u->nama }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">{{ $u->kelas }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                      <span class="text-secondary text-sm font-weight-bold">{{ $u->status }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a class="btn btn-link text-dark px-1 mb-0" href="/pengajar/santri/{{ $u->id }}/edit"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
                                        <form action="/pengajar/santri/{{ $u->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-link text-danger text-gradient px-3 mb-0" type="submit">
                                                <i class="far fa-trash-alt me-2"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
