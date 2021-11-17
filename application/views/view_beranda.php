 <!DOCTYPE html>
 <html>
 <head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/materialize.min.css"  media="screen,projection"/>  <!-- CSS Bikin -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>PPOB</title>

</head>

<body id="home">
  <!-- Navbar -->

  <div class="navbar-fixed">
    <nav class="amber">
        <div class="nav-wrapper">
          <a href="#home" class="brand-logo" style="padding-left: 50px">APPOB</a>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#about">About</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!--  -->

  <!-- sidenav -->
  <ul class="sidenav" id="mobile-nav">
    <li><a href="">About</a></li>
  </ul>
  <!--  -->

  <!-- Slideeeeeeeeeeeeeew -->
  <div class="slider">
    <ul class="slides">
      <li>
        <img src="assets/img/slider/8.png"> <!-- random image -->
        <div class="caption center-align">
          <h3>Listrik</h3>
          <h5 class="light grey-text text-lighten-3">Hampir semua wilayah menggunakan listrik</h5>
        </div>
      </li>
      <li>
        <img src="assets/img/slider/2.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3>Jangan telat bayar!</h3>
          <h5 class="light grey-text text-lighten-3">Listrik Penting untuk kehidupan sehari-hari</h5>
        </div>
      </li>
      <li>
        <img src="assets/img/slider/1.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3>APPOB</h3>
          <h5 class="light grey-text text-lighten-3">Mempermudah pembayaran</h5>
        </div>
      </li>
    </ul>
  </div>
  <!--  -->

  <!-- Menuju about -->
  <section id="about" class="about">
    <div class="container">
      <div class="row">
        <br><br>
        <h3 class="center light amber-text text-darken-3">About</h3>
        <div class="col m6 light">
        <h5>APPOB</h5> 
        <p>Merupakan Aplikasi pembayaran listrik secara online yang ditujukan untuk memudahkan para agen dan customernya dalam membayar tagihan listrik</p>
        </div>
        <div class="col m6 light center">
          <br><br>
        <a class="waves-effect waves-light btn-large" href="masuk.php">Login <i class="material-icons right">lock_outline</i></a> 
        </div>
      </div>
    </div>
  </section>
  <!--  -->

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="assets/js/materialize.min.js"></script>

  <script>
    const sidenav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sidenav);

    const slider = document.querySelectorAll('.slider');
    M.Slider.init(slider, {
      indicators: false,
      height : 590,
      duration : 500,
      interval : 3000
    });
  </script>

</body>
</html>