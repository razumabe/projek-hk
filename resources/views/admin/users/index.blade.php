@extends('layouts.main')

@section('content')
<div class="container-fluid py-2">
    <div class="mb-4">
        <h3 class="font-weight-bolder text-white mb-0">User Management</h3>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        
                        <a class="btn btn-primary mb-3" href="{{ route('create.users') }}">Tambah User</a>

                        <table class="table table-hover align-items-center mb-0 mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">No</th>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">NIM/NIP</th>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">Email</th>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">Hak Akses</th>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">Registered</th>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengguna as $u)
                                <tr>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">{{ $loop->iteration }}</span>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-sm">{{ $u->name }}</h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">{{ $u->nim }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">{{ $u->email }}</span>
                                    </td>
                                    {{-- <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">{{ $u->role->name }}</span>
                                    </td> --}}
                                    <td class="text-center">
                                        {{ implode(', ', $u->roles()->get()->pluck('name')->toArray()) }}
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <em class="text-muted">{{ $u->created_at }}</em>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a class="btn btn-link text-dark px-1 mb-0" href="/admin/users/{{ $u->id }}/edit"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
                                        <form action="/admin/users/{{ $u->id }}" method="POST">
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
