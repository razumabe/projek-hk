@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Data Pembayaran</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pengirim</th>
                <th>Rekening Pengirim</th>
                <th>Nominal</th>
                <th>Pesan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payment as $bayar)
            <tr>
                <td>{{ $bayar->nama_pengirim }}</td>
                <td>{{ $bayar->rekening_pengirim }}</td>
                <td>{{ $bayar->nominal }}</td>
                <td>{{ $bayar->pesan }}</td>
                <td>{{ $bayar->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
