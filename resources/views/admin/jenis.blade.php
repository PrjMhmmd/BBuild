
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BBuild.si | Tipe {{ $title }}</title>
        <link rel="stylesheet" type="text/css" href="../css/adminTipe.css">
        <link rel="stylesheet" type="text/css" href="../css/format.css">
    </head>

    <body>
      <header>
        <nav id="navkiri">
            <a href="/admin/Tipe"><h2 class="back">Back</h3></a>
        </nav>
      </header>

      <div id="supplier">
        <div class="supplier-box">
        <div class="box">
            <form action="/admin/Tipe/jenis" method="POST">
                <div id="data">
                    @csrf
                    <h3>Jenis</h3>
                    <h4>Nama Jenis:</h4>
                    <input id="name" class="inputan" type="text" name="name" required>
                    <h4>slug:</h4>
                    <input id="slug"  class="inputan" type="text" name="slug" required>

                    <div id="simpan">
                    <button type="submit" id="button-1" name="tambah_jenis">TAMBAH</button>
                    </div>
                </div>
            </form>
        </div>

        </div>
    </div>
    </body>

</html>
