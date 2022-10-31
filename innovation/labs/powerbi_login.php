<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['login'])) 
  {
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM user WHERE UserName=:username and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['lssemsaid']=$result->ID;
}

  if(!empty($_POST["remember"])) {
//COOKIES for username
setcookie ("user_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
//COOKIES for password
setcookie ("userpassword",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
} else {
if(isset($_COOKIE["user_login"])) {
setcookie ("user_login","");
if(isset($_COOKIE["userpassword"])) {
setcookie ("userpassword","");
        }
      }
}
$_SESSION['login']=$_POST['username'];
echo "<script type='text/javascript'> document.location ='power-bi.html'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!DOCTYPE html>
<html class="has-sidemenu has-fancynav-top" dir="ltr" lang="en-US">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>GWC-Innovation</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="../vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../vendors/loaders.css/loaders.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=PT+Mono%7cPT+Serif:400,400i%7cLato:100,300,400,700,800,900" rel="stylesheet">
    <link href="../assets/css/theme.min.css" rel="stylesheet" />
    <link href="../assets/css/user.min.css" rel="stylesheet" />
  </head>

  <body class="overflow-hidden-x">

    <nav class="fancynavbar fancynavbar-expand-lg fancynavbar-top" data-zanim-lg='{"from":{"opacity":1,"x":70},"to":{"opacity":1,"x":0},"ease":"CubicBezier","duration":0.8,"delay":0.3}' data-zanim-xs='{"from":{"opacity":1,"y":-37},"to":{"opacity":1,"y":0},"ease":"CubicBezier","duration":0.8,"delay":0.3}' data-zanim-trigger="scroll" data-exclusive="true">
      <div class="fancynavbar-togglerbar bg-light" data-onscroll-fade-in="data-onscroll-fade-in"><a class="fancynavbar-brand" href="../index.html"><img class="fancynavbar-brand-img" src="../assets/img/logo-sparrow-invert.svg" alt="" width="70" height="40" data-zanim-lg='{"from":{"opacity":0,"x":45},"to":{"opacity":1,"x":0},"ease":"CubicBezier","duration":0.8,"delay":0.4}' data-zanim-trigger="scroll" />
          <!--You can use icon or text logo as well-->
          <!--<span class='fab fa-superpowers fs-3'></span>-->
          <!--<span class='logo-sparrow'>S</span>-->
        </a>
        <div class="fancynavbar-toggler"><svg class="fancynavbar-toggler-icon" viewBox="0 0 70 70" xmlns="http://www.w3.org/2000/svg" data-zanim-lg='{"from":{"opacity":0,"x":45},"to":{"opacity":1,"x":0},"ease":"CubicBezier","duration":0.8,"delay":0.5}' data-zanim-trigger="scroll">
            <path style='stroke:black;' id="path-top" d="M20,25c0,0,22,0,30,0c16,0,18.89,40.71-.15,21.75C38.7,35.65,19.9,16.8,19.9,16.8"></path>
            <path style='stroke:black;' id="path-middle" d="M20,32h30"></path>
            <path style='stroke:black;' id="path-bottom" d="M19.9,46.98c0,0,18.8-18.85,29.95-29.95C68.89-1.92,66,38.78,50,38.78c-8,0-30,0-30,0"></path>
          </svg></div>
          <div class="fancynavbar-addon" style="text-align: center;"><a class="fancynavbar-addon-item" href="https://www.linkedin.com/company/global-weconnect-technologies"><span class="fab fa-linkedin"></span>Linkedin</a></div>
        </div>
      <div class="fancynavbar-collapse">
        <ul class="fancynavbar-nav">

          <li class="fancynav-item"><a class="fancynav-link" href="#innovation"><span class="fancynav-link-content">Innovation</span></a></li>
          <li class="fancynav-item"><a class="fancynav-link" href="#whatwedo"><span class="fancynav-link-content">What we Do?</span></a></li>
          <li class="fancynav-item"><a class="fancynav-link" href="#ourlabs"><span class="fancynav-link-content">Our Labs</span></a></li>


        </ul>
      </div>
    </nav>


    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main min-vh-100" id="top">

      <!-- ============================================-->
      <!-- Preloader ==================================-->
      <div class="preloader" id="preloader">
        <div class="loader">
          <div class="line-scale-pulse-out-rapid">
            <div> </div>
            <div></div>
            <div></div>
            <div></div>
            <div> </div>
          </div>
        </div>
      </div><!-- ============================================-->
      <!-- End of Preloader ===========================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 px-0">
              <div class="sticky-top vh-lg-100 py-9">
                <div class="bg-holder" style="background-image:url(../assets/img/signin.jpg);" data-zanim-trigger="scroll" data-zanim-lg='{"animation":"zoom-out-slide-right","delay":0.4}'></div>
                <!--/.bg-holder-->
              </div>
            </div>
            <div class="col-lg-6 py-6">
              <div class="row h-100 align-items-center justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-10 col-xl-8" data-zanim-xs='{"delay":0.5,"animation":"slide-right"}' data-zanim-trigger="scroll">
                  <h3 class="display-4 fs-2">Power BI Login</h3>
                  <h6 class="text-danger mt-3">Let's Go</h6>
                  <form class="mt-5" action="" method="post" id="login">
                    <div class="mb-3"><input type="text" class="form-control bg-light" placeholder="User Name" required="true" name="username" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" ></div>
                    <div class="mb-0"> <input type="password" class="form-control bg-light" placeholder="Password" name="password" required="true" value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>"></div>

                     <div class="mb-0" style="margin-top:24px;"><input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
              <label for="remember">
                Remember Me
              </label></div> 

                    <div class="mb-3 d-grid"><button class="btn btn-dark mt-3" type="submit" name="login">sign in</button></div>
                   <!--  <div class="mb-3 w-100 position-relative text-center mt-4">
                      <hr class="text-300" />
                      <div class="absolute-centered px-3 font-sans-serif fs--1 text-500">or sign-in with</div>
                    </div> -->
                    <!-- <div class="mb-0">
                      <div class="row gx-2">
                        <div class="col-6 d-grid"><a class="btn btn-outline-danger btn-sm mt-2" href="#!"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                        <div class="col-6 d-grid"><a class="btn btn-outline-primary btn-sm mt-2" href="#!"><span class="fab fa-facebook me-2" data-fa-transform="grow-8"></span> facebook</a></div>
                      </div>
                    </div> -->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->

    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!--===============================================-->
    <!--    Footer-->
    <!--===============================================-->
    <footer class="footer bg-light text-600 py-4 font-sans-serif text-center overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-4 order-lg-2 position-relative"><a class="indicator indicator-up" href="#top"><span class="indicator-arrow indicator-arrow-one" data-zanim-xs='{"from":{"opacity":0,"y":15},"to":{"opacity":1,"y":-5,"scale":1},"ease":"Back.easeOut","duration":0.4,"delay":0.9}'></span><span class="indicator-arrow indicator-arrow-two" data-zanim-xs='{"from":{"opacity":0,"y":15},"to":{"opacity":1,"y":-5,"scale":1},"ease":"Back.easeOut","duration":0.4,"delay":1.05}'></span></a></div>
          <div class="col-lg-4 text-lg-start mt-4 mt-lg-0">
            <p class="fs--1 text-uppercase ls fw-bold mb-0">Copyright &copy; 2022 Gwcteq.</p>
          </div>
          <!-- <div class="col-lg-4 text-lg-end order-lg-2 mt-2 mt-lg-0">
            <p class="fs--1 text-uppercase ls fw-bold mb-0">Made with<span class="text-danger fas fa-heart mx-1"></span>by <a class="text-600" href="https://themewagon.com/">Themewagon</a></p>
          </div> -->
        </div>
      </div>
    </footer>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="../vendors/popper/popper.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../vendors/anchorjs/anchor.min.js"></script>
    <script src="../vendors/is/is.min.js"></script>
    <script src="../vendors/fontawesome/all.min.js"></script>
    <script src="../vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../vendors/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="../vendors/gsap/gsap.js"></script>
    <script src="../vendors/gsap/customEase.js"></script>
    <script src="../vendors/gsap/drawSVGPlugin.js"></script><!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-122907869-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-122907869-1');
    </script>
    <script src="../assets/js/theme.js"></script>
  </body>

</html>