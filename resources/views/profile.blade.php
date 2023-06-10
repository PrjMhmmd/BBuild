<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BBuild.si | Profile</title>
        <link rel="stylesheet" type="text/css" href="../css/format.css">
        <link rel="stylesheet" type="text/css" href="../css/profile.css">
    </head>

    <body>
        <header>
          <nav id="navkanan">
            <div class="dropdown">
              <button onclick="cart()" class="dropbtn"><svg class="fiturR" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
              </svg>
              </button>
                <div class="dropdown-content" id="myDropdown-1">
                  <a href="/cart">Keranjang</a>
                  <a href="/riwayat-pemesanan">Riwayat Pemesanan</a>
                </div>
            </div>
            <div class="dropdown">
              <button onclick="profile()" class="dropbtn"><svg class="fiturR" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                </svg>
              </button>
              <div class="dropdown-content" id="myDropdown-2">
                <h4 class="user">{{ auth()->user()->username }}</h4>
                <a href="/profile">Profile</a>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="logout">Log Out</button>
                </form>
              </div>
            </div>
          </nav>

          <div id="contact">
            <ul>
                <li>
                  <a href="https://api.whatsapp.com/send/?phone=6287765067159&text&type=phone_number&app_absent=0" target="_blank"><svg class="call" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="#"><svg class="call" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                    </svg>
                  </a></li>
            </ul>
          </div>

          <nav id="navkiri">
            <ul>
                <li>
                  <a href="/"><img src="../img/logo.png" class="logo"></a>
                </li>
            </ul>
          </nav>
        </header>

        <div id="cari">
          <form action="#">
            <input id="input" type="search" placeholder="Search..." name="search">
          </form>
        </div>

        <section id="profile">
            <div id="menu">
                <img id="profileSaya" src="../img/profileSaya.jpeg">
                <div id="datadiri">

                <form action="/profile/update" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                    <div class="form">
                    <div id="left">
                      <div id="img">
                        @if ($user->image)
                            <img class="img" id="preview" src="{{ asset('../storage/'. auth()->user()->image) }}" alt="image">
                        @else
                            <img class="img" id="preview" src="{{ $gambar }}" alt="image">
                        @endif
                      </div>
                      <div id="pilih">
                        <label for="image"><h4>Image Profile</h4></label>
                        <input type="file" name="image" id="image" onchange="previewImage()" accept="image/jpeg, image/png" class="button"@error('image') is-invalid @enderror>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                      </div>
                    </div>


                    <div id="right">
                        <label for="username"><h4>Nama:</h4></label>
                        <input id="nama" class="inputan" type="text" name="username" placeholder="{{ auth()->user()->username }}">
                        <label for="email"><h4>Email:</h4></label>
                        <input id="email"  class="inputan" type="text" name="email" placeholder="{{ auth()->user()->email }}">
                        <label for="hp"><h4>No.HP:</h4></label>
                        <input id="nomor"  class="inputan" type="text" name="hp" placeholder="{{ auth()->user()->hp }}">
                        <input type="hidden" id="id" name="id" value="{{ auth()->user()->id }}">
                        <div id="simpan">
                          <button type="submit" id="button-1">SIMPAN</button>
                        </div>
                    </div>
                </div>
                </form>

                </div>

            </div>
          </section>

        <footer id="footer">
            <p>&copy;2023 BBuild.si</p>
        </footer>
    </body>
    <script src="../js/format.js"></script>
    <script src="../js/profil.js"></script>
</html>
