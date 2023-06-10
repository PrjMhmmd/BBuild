
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BBuild.si | {{ $title }}</title>
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <link rel="stylesheet" type="text/css" href="../css/format.css">
    </head>

    <body>
        <header>

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


        <section id="login">
            <section id="menu">
                <div id="head">
                    <h2>LOGIN</h2>
                </div>
                <div id="isi">

                  @if(session()->has('success'))
                  <div class='session'>
                    {{ session('success') }}
                  </div>
                  @endif

                  @if(session()->has('loginError'))
                  <div class='loginError'>
                    {{ session('loginError') }}
                  </div>
                  @endif

                  <form method="POST" action="/login">
                    @csrf
                    <div>
                      <label for="username" for="">Nama:</label>
                      <input class="input-1" type="text" placeholder="Nama" name="username" id="username" required>
                    </div>

                    @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror

                    <div>
                      <label for="password" for="">Password:</label>
                      <input class="input-1" type="password" placeholder="Password" name="password" id="password" required>
                    </div>
                    <a href="/register">Daftar</a>
                      <?php if(isset($error)): ?>
                      <p style="color:red;" >Username atau Password Salah</p>
                      <?php endif; ?>
                    <div>
                      <button name="login" type="submit">MASUK</button>
                    </div>
                  </form>
                </div>
            </section>
          </section>

        <footer id="footer">
            <p>&copy;2023 BBuild.si</p>

        </footer>
    </body>

</html>

