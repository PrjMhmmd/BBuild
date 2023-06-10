
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
                <h2 class="title">User Page</h3>
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
                <div class="table">
                    <table id="myTable" cellspacing="0" cellpadding="10">
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Hp</th>
                        </tr>
                        @foreach($users as $users)
                        <tr>

                            <td>{{ $users->id }}</td>
                            <td>{{ $users->username }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->hp }}</td>
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