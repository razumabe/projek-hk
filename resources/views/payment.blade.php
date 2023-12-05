
<!-- Tampilkan ini hanya jika pengguna belum terautentikasi -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran Hubbul Khoir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
<body>

    <div class="container">
        <h2>Pembayaran Pondok</h2>
        <form method="post" action="{{ route('payment.store') }}">
            @csrf
            <div class="form-group">
                <label for="nama_pengirim">Nama Pengirim:</label>
                <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim">
            </div>
            <div class="form-group">
                <label for="rekening_pengirim">Rekening Pengirim:</label>
                <input type="text" class="form-control" id="rekening_pengirim" name="rekening_pengirim">
            </div>
            <div class="form-group">
                <label for="nominal">Nominal Transfer:</label>
                <input type="number" class="form-control" id="nominal" name="nominal">
            </div>
            <div class="form-group">
                <label for="pesan">Pesan:</label>
                <textarea class="form-control" id="pesan" name="pesan"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pembayaran</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>






