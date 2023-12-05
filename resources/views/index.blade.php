@guest
<!-- Tampilkan ini hanya jika pengguna belum terautentikasi -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Hubbul Khoir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
<body>
    <h1><b>Hubbul Khoir</b></h1>
    <h2>Selamat datang di Portal Hubbul Khoir</h2>

    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    <a href="{{ route('payment') }}" class="btn btn-danger">Payment</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
@else
<!-- Pengguna sudah terautentikasi, arahkan ke dashboard -->
<script>
    window.location.href = "{{ route('admin') }}";
</script>
@endguest














{{-- @Auth --}}
    {{-- <a href="{{ route('admin') }}" class="btn btn-info">Dashboard</a> --}}


    {{-- <p>Welcome  <b>{{ Auth::user()->name }}</b></p> --}}
    {{-- <a href="{{ route('password') }}" class="btn btn-primary">Change Password</a> --}}
    {{-- <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a> --}}
    {{-- @endauth --}}
    {{-- <br> --}}
    {{-- @auth
    <!-- Jika pengguna sudah login, tampilkan tombol logout -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    @endauth --}}
{{-- 

    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    <a href="{{ route('register') }}" class="btn btn-danger">Register</a --}}