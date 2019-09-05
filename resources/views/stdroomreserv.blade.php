<?php
$Standard=350;
$Family=600;
$Single=250;

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kompass</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">



    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <div class="site-navbar-wrap js-site-navbar bg-white">

      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="/">Kompass</a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">

                    <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li>
                        <a href="index.php">Home</a>
                      </li>
                      <li class="has-children active">
                        <a href="rooms">Rooms</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="standardroom">Standard Room</a></li>
                          <li><a href="familyroom">Family Room</a></li>
                          <li><a href="singleroom">Single Room</a></li>

                          </li>

                        </ul>
                      </li>
                      <li><a href="events">Events</a></li>
                      <li><a href="about">About</a></li>
                      <li><a href="contact">Contact</a></li>
                      @if (Route::has('login'))

                    @auth
                        <li><a href="{{ url('/home') }}">Konto</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth

            @endif
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-blocks-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">Luxurious Rooms</span>
              <h1 class="mb-4">Standard room</h1>

            </div>
          </div>
        </div>
      </div>


    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Rezerwacja</h2>
          </div>
        </div>
        <div class="row">

          <div id="demo" class="carousel slide" data-ride="carousel">



            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/img_1.jpg" alt="Los Angeles">
              </div>
              <div class="carousel-item">
                <img src="images/img_2.jpg" alt="Chicago">
              </div>
              <div class="carousel-item">
                <img src="images/img_3.jpg" alt="New York">
              </div>
              <div class="carousel-item">
                <img src="images/img_4.jpg" alt="New York">
              </div>
              <div class="carousel-item">
                <img src="images/img_5.jpg" alt="New York">
              </div>
              <div class="carousel-item">
                <img src="images/img_6.jpg" alt="New York">
              </div>
              <div class="carousel-item">
                <img src="images/img_7.jpg" alt="New York">
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>

          </div>
          <div class="text-container">

            <form method="post" action="{{route('histories.store')}}">
  @csrf
            <div style="width: 400px;">
            </div>
            <div style="display: flex; padding-bottom: 18px;width : 450px;">

            <div style=" margin-left : 0; margin-right : 1%; width : 49%;"><td>Imię</td><span style="color: red;"> *</span><br/>

            <td><input type="text" id="data_2" name="name" style="width: 100%;" class="form-control"/></td>
            </div>
            <div style=" margin-left : 1%; margin-right : 0; width : 49%;"><td>Nazwisko</td><span style="color: red;"> *</span><br/>

          <td>  <input type="text" id="data_3" name="surname" style="width: 100%;" class="form-control"/></td>
            </div>
          </div><div style="padding-bottom: 18px;"><td>Phone</td><span style="color: red;"> *</span><br/>

          <td>  <input type="text" id="data_4" name="nrtel" style="width : 450px;" class="form-control"/></td>
            </div>
            <div style=" margin-left : 0; margin-right : 1%; width : 49%;"><td>Email</td><span style="color: red;"> *</span><br/>

            <td><input type="text" id="data_2" name="email" style="width: 100%;" class="form-control"/></td>
            </div>
            <div style="padding-bottom: 18px;"><td>Arrival date</td><span style="color: red;"> *</span><br/>


            <td><input type="text" id="data_6" name="data_check" style="width : 250px;" class="form-control"/></td>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.4.0/pikaday.min.js" type="text/javascript"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.4.0/css/pikaday.min.css" rel="stylesheet" type="text/css" />
            <div style="padding-bottom: 18px;"><td>Departure date</td><span style="color: red;"> *</span><br/>
          <td>  <input type="text" id="data_7" name="data_checkout" style="width : 250px;" class="form-control"/></td>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.4.0/pikaday.min.js" type="text/javascript"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.4.0/css/pikaday.min.css" rel="stylesheet" type="text/css" />
<div class="container">

<form action="" method="post">

<label>Dodac Parking?</label>
<input type="radio" name="parking_status" value="1"?/>Yes
<input type="radio" name="parking_status" value="0"?/>No</br>
<form action="" method=post>
<label>Wybierz typ pokoju</label>

<input type="radio" name="room_type" value="Standard"?/>Standard
<input type="radio" name="room_type" value="Family"?/>Family
<input type="radio" name="room_type" value="Single"?/>Single
<?php
$Standard=350;
$Family=500;
$Single=250;
 ?>
</form>
<form method="post">
    <input type="submit" name="test" id="test" value="RUN" /><br/>
</form>

<?php

function testfun()
{
   echo "Your test function on button click is working";
}

if(array_key_exists('test',$_POST)){
   testfun();
}

?>
 <button type="submit" class="btn btn-primary">Dodaj</button>

</form>

            <div>
            </div>
            </form>

            <script type="text/javascript">
            function validateForm() {
            if (isEmpty(document.getElementById('data_2').value.trim())) {
            alert('First name is required!');
            return false;
            }
            if (isEmpty(document.getElementById('data_3').value.trim())) {
            alert('Last name is required!');
            return false;
            }
            if (isEmpty(document.getElementById('data_4').value.trim())) {
            alert('Phone is required!');
            return false;
            }
            if (isEmpty(document.getElementById('data_5').value.trim())) {
            alert('Email is required!');
            return false;
            }
            if (!validateEmail(document.getElementById('data_5').value.trim())) {
            alert('Email must be a valid email address!');
            return false;
            }
            if (isEmpty(document.getElementById('data_6').value.trim())) {
            alert('Arrival date is required!');
            return false;
            }
            if (isEmpty(document.getElementById('data_7').value.trim())) {
            alert('Departure date is required!');
            return false;
            }
            if (isEmpty(document.getElementById('data_8').value.trim())) {
            alert('Number of adults is required!');
            return false;
            }
            return true;
            }
            function isEmpty(str) { return (str.length === 0 || !str.trim()); }
            function validateEmail(email) {
            var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,15}(?:\.[a-z]{2})?)$/i;
            return isEmpty(email) || re.test(email);
            }
            </script>
          </div>
        </div>


<p>Wszystkie pokoje Delux wyposażone są w dwa oddzielne łóżka z możliwością komfortowego łączenia, łazienkę z kabiną prysznicową, toaletą i umywalką, kanapę, biurko do pracy, klimatyzację, TV SAT, minibar, sejf oraz nieograniczony dostęp do hotelowej sieci HOT SPOT. Pokoje zlokalizowane są na parterze oraz pierwszym piętrze, a dla wygody naszych Gości dostępna jest winda. Dzięki klasycznej elegancji i niepowtarzalnej atmosferze pokoje zapewniają idealne warunki do pracy i wypoczynku.</p>
      </div>
    </div>




    <footer class="site-footer">
      <div class="container">


        <div class="row">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4 text-white">About</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat quos rem ullam, placeat amet.</p>
            <p><a href="#" class="btn btn-primary pill text-white px-4">Read More</a></p>
          </div>



          <div class="col-md-2">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Social Icons</h3></div>
              <div class="col-md-12">
                <p>
                  <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                  <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                  <a href="#" class="p-2"><span class="icon-vimeo"></span></a>

                </p>
              </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">

        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>


  <script src="js/mediaelement-and-player.min.js"></script>

  <script src="js/main.js"></script>


  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>

  </body>
</html>
