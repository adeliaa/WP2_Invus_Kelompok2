<html>
    <head>
        <title>Halaman Login</title>
        <link rel="shortcut icon" href="<?php echo base_url('assets/img/logoo.png')?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <style>
            body{
  background-image: url("<?php echo base_url('assets/img/2.jpg'); ?>");
  padding:0;
  margin:0;
  height: 100vh;
  width: 100vw;
  background-repeat: no-repeat;
  background-size:cover;
  background-position: center;}


}
.vid-container{
  position:relative;
  height:100vh;
  overflow:hidden;
}
.bgvid.back {
  position: fixed; right: 0; bottom: 0;
  min-width: 100%; min-height: 100%;
  width: auto; height: auto; z-index: -100;
}
.inner {
  position: absolute;
}
.inner-container{
  width:400px;
  height:400px;
  position:absolute;
  top:calc(50vh - 200px);
  left:calc(50vw - 200px);
  overflow:hidden;
}
.bgvid.inner{
  top:calc(-50vh + 200px);
  left:calc(-50vw + 200px);
  filter: url("data:image/svg+xml;utf9,<svg%20version='1.1'%20xmlns='http://www.w3.org/2000/svg'><filter%20id='blur'><feGaussianBlur%20stdDeviation='10'%20/></filter></svg>#blur");
  -webkit-filter:blur(10px);
  -ms-filter: blur(10px);
  -o-filter: blur(10px);
  filter:blur(10px);
}
.box{
  position:absolute;
  height:100%;
  width:100%;
  font-family:Helvetica;
  color:#fff;
  background:rgba(0,0,0,0.13);
  padding:30px 0px;
}
.box h1{
  text-align:center;
  margin:30px 0;
  font-size:30px;
}
.box input{
  display:block;
  width:300px;
  margin:20px auto;
  padding:15px;
  background:rgba(0,0,0,0.2);
  color:#fff;
  border:0;
}
.box input:focus,.box input:active,.box button:focus,.box button:active{
  outline:none;
}
.box button{
  background:#322630;
  border:0;
  color:#fff;
  padding:10px;
  font-size:20px;
  width:330px;
  margin:20px auto;
  display:block;
  cursor:pointer;
}
.box button:active{
  background:black;
}
.box p{
  font-size:14px;
  text-align:center;
}
.box p span{
  cursor:pointer;
  color:black;
}
        </style>
    </head>
    <body>
    <div class="vid-container">
    <?php if($this->session->flashdata('flash')){?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Registrasi Akun Berhasil, <strong>Silahkan <?= $this->session->flashdata('flash'); ?>!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
<div class="inner-container">
    <div class="box">
      <h1>Login</h1>
      <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
      <input type="text" placeholder="Username" name="username" required/>
      <input type="password" placeholder="Password" name="password" required/>
      <button>Login</button>
      <p>Not a member? <a href="<?php echo site_url('login/regis')?>" style="color:black;"><span>Sign Up</span></a></p>
    </div>
  </div>
</div>
    <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js');?>"></script>
    </body>
</html>