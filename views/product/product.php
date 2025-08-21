<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Form Tambah Produk</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="namaProduk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="namaProduk" placeholder="Contoh: Baju T-Shirt Keren">
                </div>
                <div class="mb-3">
                    <label for="deskripsiProduk" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsiProduk" rows="3" placeholder="Jelaskan detail produkmu di sini..."></textarea>
                </div>
                <div class="mb-3">
                    <label for="hargaProduk" class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" id="hargaProduk" placeholder="Contoh: 150000">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Produk</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>