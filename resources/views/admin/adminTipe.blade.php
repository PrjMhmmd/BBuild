
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BBuild.si | {{ $title }}</title>
        <link rel="stylesheet" type="text/css" href="../css/adminTipe.css">
        <link rel="stylesheet" type="text/css" href="../css/format.css">
    </head>

    <body>
      <header>
        <nav id="navkiri">
          <ul>
              <li>
                <h2 class="title">Tipe Page</h3>
              </li>
              <li>
                <a href="/admin"><h2 class="back">Back</h3></a>
              </li>
          </ul>
        </nav>
      </header>

      <div id="supplier">
        <div class="supplier-box">
        <div class="box-create">
            <a class="create" href="/admin/kategori">Tambah Kategori</a>
            <a class="create" href="/admin/ruangan">Tambah Ruangan</a>
            <a class="create" href="/admin/jenis">Tambah Jenis</a>

        </div>

        <div class="box">
            <h3>Tabel Kategori</h3>
            <div class="table">
                <table id="myTable" cellspacing="0" cellpadding="10">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                    </tr>
                    @foreach($kategoris as $kategoris)
                    <tr>
                        <td>{{ $kategoris->id }}</td>
                        <td>{{ $kategoris->name }}</td>
                        <td>{{ $kategoris->slug }}</td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>


        <div class="box">
            <h3>Tabel Ruangan</h3>
            <div class="table">
                <table id="myTable" cellspacing="0" cellpadding="10">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($ruangans as $ruangans)
                    <tr>
                        <td>{{ $ruangans->id }}</td>
                        <td>{{ $ruangans->name }}</td>
                        <td>{{ $ruangans->slug }}</td>
                        <td>
                            <form action="/admin/Tipe/{{ $ruangans->slug }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" onclick="return confirm('hapus?');">hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>

        <div class="box">
            <h3>Tabel Jenis</h3>
            <div class="table">
                <table id="myTable" cellspacing="0" cellpadding="10">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($jeniss as $jeniss)
                    <tr>
                        <td>{{ $jeniss->id }}</td>
                        <td>{{ $jeniss->name }}</td>
                        <td>{{ $jeniss->slug }}</td>
                        <td>
                            <form action="/admin/Tipe/{{ $jeniss->slug }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" onclick="return confirm('hapus?');">hapus</button>
                            </form>
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
