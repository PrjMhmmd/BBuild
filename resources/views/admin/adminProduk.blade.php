
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BBuild.si | {{ $title }}</title>
        <link rel="stylesheet" type="text/css" href="../css/adminProduk.css">
        <link rel="stylesheet" type="text/css" href="../css/format.css">
    </head>

    <body>
      <header>
        <nav id="navkiri">
          <ul>
              <li>
                <h2 class="title">Produk Page</h3>
              </li>
              <li>
                <a href="/admin"><h2 class="back">Back</h3></a>
              </li>
          </ul>
        </nav>
      </header>

        <div id="produk">
            <div class="produk-box">
            <div class="box">
                <form action="/admin/Produk/" method="POST" enctype="multipart/form-data">
                    <div id="data">
                        @csrf

                        <label for="nama_barang" for="">Nama:</label>
                        <input id="nama" class="inputan" type="text" name="nama_barang" required>

                        <label for="slug" for="">Slug:</label>
                        <input id="slug"  class="inputan" type="text" name="slug" required>

                        <label for="harga_barang" for="">Harga:</label>
                        <input id="harga"  class="inputan" type="number" name="harga_barang" required>

                        <label for="jumlah_barang" for="">Jumlah:</label>
                        <input id="jumlah"  class="inputan" type="text" name="jumlah_barang" required>

                        <label for="deskripsi_barang" for="">Deskripsi:</label>
                        <textarea id="deskripsi"  class="inputan" type="text" name="deskripsi_barang" required></textarea>

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
                            <button type="submit" id="button-1" name="tambah_barang">TAMBAH</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="box">
                <div class="table">
                <table id="myTable" cellspacing="0" cellpadding="10">
                        <tr>
                            <th>Id</th>
                            <th>nama</th>
                            <th>slug</th>
                            <th>harga</th>
                            <th>jumlah</th>
                            <th>deskripsi</th>
                            <th>kategori_id</th>
                            <th>ruangan_id</th>
                            <th>jenis_id</th>
                            <th>aksi</th>
                        </tr>
                        @foreach($produks as $produks)
                        <tr>

                            <td>{{ $produks->id}}</td>
                            <td>{{ $produks->nama_barang}}</td>
                            <td>{{ $produks->slug}}</td>
                            <td>{{ $produks->harga_barang}}</td>
                            <td>{{ $produks->jumlah_barang}}</td>
                            <td>{{ $produks->deskripsi_barang}}</td>
                            <td>{{ $produks->kategori_id}}</td>
                            <td>{{ $produks->ruangan_id}}</td>
                            <td>{{ $produks->jenis_id}}</td>
                            <td>
                                <form action="/admin/Produk/{{ $produks->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" onclick="return confirm('hapus?');">Hapus</button>
                                </form>
                                <a class="edit" href="/{{ $produks->slug }}/edit">Edit</a>
                            </td>

                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            </div>
        </div>

        <footer id="footer">
            <p>&copy;2023 BBuild.si</p>
        </footer>
    </body>

</html>
