
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BBuild.si | Edit Produk</title>
        <link rel="stylesheet" type="text/css" href="../css/adminProduk.css">
        <link rel="stylesheet" type="text/css" href="../css/format.css">
    </head>

    <body>
      <header>
        <nav id="navkiri">
            <a href="/admin/Produk"><h2 class="back">Back</h3></a>
        </nav>
      </header>

      <div id="produk">
        <div class="produk-box">
        <div class="box">
            <form action="/admin/Produk/{{ $produks->slug }}" method="POST" enctype="multipart/form-data">
                <div id="data">
                    @method("PUT")
                    @csrf

                    <label for="nama_barang" for="">Nama:</label>
                    <input id="nama" class="inputan" type="text" name="nama_barang" required>

                    <label for="slug" for="">Slug:</label>
                    <input id="slug"  class="inputan" type="text" name="slug" required>

                    <label for="harga_barang" for="">Harga:</label>
                    <input id="harga" class="inputan" type="number" name="harga_barang" required>

                    <label for="jumlah_barang" for="">Jumlah:</label>
                    <input id="jumlah"  class="inputan" type="text" name="jumlah_barang" required>

                    <label for="deskripsi_barang" for="">Deskripsi:</label>
                    <textarea id="deskripsi" class="inputan" type="text" name="deskripsi_barang" required></textarea>

                    <label for="image">Image Produk:</label>
                    <input type="file" name="image" id="image" accept="image/jpeg, image/png" class="inputan" @error('image') is-invalid @enderror>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    <label for="kategori_id" for="">Kategori:</label>
                    <select id="kategori_id" class="inputan"  name="kategori_id" required>
                        @foreach ($kategoris as $kategoris)
                        <option value="{{ $kategoris->id }}">{{ $kategoris->name }}</option>
                        @endforeach
                    </select>

                    <label for="ruangan_id" for="">Ruangan:</label>
                    <select id="ruangan_id" class="inputan"  name="ruangan_id" required>
                        @foreach ($ruangans as $ruangans)
                        <option value="{{ $ruangans->id }}">{{ $ruangans->name }}</option>
                        @endforeach
                    </select>

                    <label for="jenis_id" for="">Jenis:</label>
                    <select id="jenis_id" class="inputan"  name="jenis_id" required>
                        @foreach ($jeniss as $jeniss)
                        <option value="{{ $jeniss->id }}">{{ $jeniss->name }}</option>
                        @endforeach
                    </select>


                    <div id="simpan">
                        <button type="submit" id="button-1" name="tambah_barang">SIMPAN</button>
                    </div>

                </div>
            </form>
        </div>

        </div>
    </div>
    </body>

</html>
