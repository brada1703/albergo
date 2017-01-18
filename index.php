<?php

  if ($_POST ['submit'] ) {
      if (!$_POST['name']) {
          $error="<br/>- Please enter your name";
    }
      if (!$_POST['email']) {
          $error.="<br/>- Please enter your email";
    }
      if (!$_POST['message']) {
          $error.="<br/>- Please enter a message";
    }
      if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
          $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcX2gYUAAAAAIvL0UKgpxH3s-JPXmUJY79lxz4d&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
          $gresponse = json_decode($response);
      if ($gresponse->success === false) {
          $error.="<br/>- Please do the Captcha";
      }
    }
      if ($error) {
          $result='<div class="alert alert-danger" role="alert"><strong>Whoops, there is an error.</strong> Please correct the following: '.$error.'</div>';
  } else {
          mail("bradleyjamesahrens@gmail.com", "Contact message", "\r\nName: " . $_POST['name'] . "\r\nEmail: " . $_POST['email'] . "\r\nPhone: " . $_POST['phone'] . "\r\nNo.Guests: " . $_POST['guests'] . "\r\nRoom: " . $_POST['room'] . "\r\nStart: " . $_POST['start'] . "\r\nEnd: " . $_POST['end'] . "\r\nMessage: " . $_POST['message'] );
          {
          $result='<div class="alert alert-success" role="alert">Thank you, We\'ll be in touch shortly</div>';
          }
  }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>l'Albergo di Ieri</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css">
      <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
      <link rel="stylesheet" href="css/override.css">
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="80">

  <!-- TOP BAR -->
    <div id="topbar">
      <div style="padding: 10px; margin-left: 15px; display: inline-block;" class="text-left">
        <a href="tel:+393284833173">
          <span class="glyphicon glyphicon-earphone"></span>&nbsp; +39 328 4833173</a> |
        <a href="mailto:info@albergodieri.it">
          <span class="glyphicon glyphicon-envelope"></span>&nbsp; info(at)albergodieri.it</a>
      </div>
      <div style="padding: 10px; margin-right: 15px; display: inline-block; float: right;" class="text-right">
        <div class="dropdown" style="display: inline-block;">
          <a href="#" class="dropdown-toggle" id="languageMenuTop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <span class="glyphicon glyphicon-globe" style="font-size: 14px;"></span>&nbsp; Language</a>
            <ul class="dropdown-menu" aria-labelledby="languageMenuTop">
              <li><a role="menuitem" tabindex="-1" href="#">English</a></li>
              <li><a role="menuitem" tabindex="-1" href="#">Italiano</a></li>
              <li><a role="menuitem" tabindex="-1" href="#">Espa&ntilde;ol</a></li>
              <li><a role="menuitem" tabindex="-1" href="#">Fran&ccedil;ais</a></li>
              <li><a role="menuitem" tabindex="-1" href="#">Nederlands</a></li>
              <li><a role="menuitem" tabindex="-1" href="#">Deutsch</a></li>
              <li><a role="menuitem" tabindex="-1" href="#">&#1088;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081;</a></li>
        </div> |
        <div style="display: inline-block;">
          <a href="https://www.facebook.com/BedAndBreakfastLAlbergoDiIeri/">
            <i class="fa fa-facebook" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
    <!--  TOP BAR END -->
    <!-- ++++++++++++++++++++++++++++++ MAIN CAROUSEL +++++++++++++++++++++++++++++++++++-->
      <div id="theCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="item active">
            <div class ="slide1"></div>
            <div class="carousel-caption">
              <h1>Welcome</h1>
              <p>to our bed and breakfast</p>
              <p><a href="#reserve" class="btn btn-primary btn-sm">Book Now</a></p>
            </div>
          </div>
          <div class="item">
            <div class="slide2"></div>
            <div class="carousel-caption">
            <h1>l'Albergo di Ieri</h1>
              <p>where you can find a cozy bed,</p>
              <p><a href="#reserve" class="btn btn-primary btn-sm">Book Now</a></p>
            </div>
          </div>
          <div class="item">
            <div class="slide3"></div>
            <div class="carousel-caption">
              <h1>Award-winning service</h1>
              <p>as seen on Booking.com and AirBnB,</p>
              <p><a href="#reserve" class="btn btn-primary btn-sm">Book Now</a></p>
            </div>
          </div>
          <div class="item">
            <div class="slide4"></div>
            <div class="carousel-caption">
              <h1>Beautiful landscapes</h1>
              <p>fresh air, mountain views, tranquil scenery</p>
              <p><a href="#reserve" class="btn btn-primary btn-sm">Book Now</a></p>
            </div>
          </div>
          <div class="item">
            <div class="slide5"></div>
            <div class="carousel-caption">
              <h1>Rustic interiors</h1>
              <p>and authentic, regional cuisine.</p>
              <p><a href="#reserve" class="btn btn-primary btn-sm">Book Now</a></p>
            </div>
          </div>
        </div>
          <a class="left carousel-control" href="#theCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#theCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>
    <!-- ++++++++++++++++++++++++++++ MAIN CAROUSEL END +++++++++++++++++++++++++++++++++-->
    <!-- ++++++++++++++++++++++++++++++ NAVBAR  +++++++++++++++++++++++++++++++++++++++++-->
      <nav class="navbar navbar-default ontop">
        <div class="container-fluid"  data-spy="affix" data-offset-top="480">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">l'Albergo di Ieri</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#about">About</a></li>
              <li><a href="#region">Region</a></li>
              <li><a href="#rooms">Rooms</a></li>
              <li><a href="#reserve">Reserve</a></li>
              <li><div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-globe" style="vertical-align:bottom"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">English</a></li>
                      <li role="presentation" class="divider"></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Italiano</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Espa&ntilde;ol</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Fran&ccedil;ais</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Nederlands</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Deutsch</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">&#1088;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081;</a></li>
                    </ul>
                  </div></li>
            </ul>
          </div>
        </div>
      </nav>
    <!-- ++++++++++++++++++++++++++++++ NAVBAR END ++++++++++++++++++++++++++++++++++++++-->
    <!-- ++++++++++++++++++++++++++++++ ABOUT + REGION ++++++++++++++++++++++++++++++++++-->
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h1 class="header1" id="about">About</h1>
            <p>At the beginning of the 1900&#39;s the building, of which part is now the Bed and Breakfast,  was an inn
              and many famous guests stopped here to enjoy the excellent cooking and warm hospitality.
              It  recently went through a complete renovation, yet still maintains its old character and charm. The present owner,
              who inherited the gift of hospitality from her ancestors, decided to bring it back to its previous function.
              There are three bedrooms with bathroom and a large hall upstairs where we serve breakfast. Breakfast includes
              local sweets and desserts, prepared with authentic ingredients according to local traditions.
            </p>
            <p class="text-center">
            **Note: l'Albergo di Ieri is only open from <strong>1 June to 30 September.</strong>**
            </p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h1 class="header1" id="region">Region</h1>
              <h5>Serravalle di Chienti</h5>
              <p>The small town of Serravalle, where the B&amp;B is located, is at 647 m. above sea level between the regions of Marche and Umbria.</p>
              <h5>Do</h5>
              <p>The guests can enjoy the beautiful nature and the ideal temperatures, especially in summer evenings.
                The nearby woods and highlands offer many opportunities for a relaxing walk; for those who look for more
                challenges and strenuous hikes there is the park of the Sibillini Mountains close by with a great number
                of paths and rock climbs.
              </p>
              <p>If you like shopping there are some nice towns: Camerino, Foligno, Matelica and San Severino not far away
                from the B&amp;B. Here you can also visit museums, beautiful churches and old buildings. In Serravalle you can admire
                the City Hall, designed by the architect Nervi, the frescoes by De Magistris in the church of Santa Lucia, the tower
                and the remains of the fortress built by the Da Varano, the lords of the duchy of Camerino. Near Serravalle there are
                the towns of Assisi, Perugia and Visso, the skiing resort of Frontignano, the beautiful plains of Castelluccio for the
                x-country ski lovers and the Park of the Sibillinis with the blue mountains mentioned by the poet Leopardi. On request
                the guests can get the guide for the Roman "botte" and the Da Varano one, the churches of Acquapagana, Madonna del Piano,
                del Sasso, Plestia which can be visited only by reservatio.
              </p>
              <h5>Eat</h5>
              <p>Excellent gastronomic specialties are: ciavuscolo (a sort of salami), Easter sweet pizza, Christmas sweet spaghetti,
              torrone (a kind of dessert), pecorino cheese, lentils and red potatoes, the ideal ingredient for fantastic gnocchi (dumplings) with lamb sauce.</p>
          </div>
        </div>
      </div>
    <!-- ++++++++++++++++++++++++++++++ ABOUT + REGION END ++++++++++++++++++++++++++++++-->
    <br><br><br>
    <!-- ++++++++++++++++++++++++++++++++++++++  ROOMS - ALL  ++++++++++++++++++++++++++++++++++++-->
      <!-- HEADER -->
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div id="rooms"><h1 class="header1">Rooms</h1></div>
            </div>
          </div>
        </div>
      <!-- HEADER END -->
      <!-- ROOMS SECTION -->
        <div class="container-rooms">
          <!-- HEADER -->
            <div class="row header-rooms">
              <div class="col-xs-3 text-center">Room</div>
              <div class="col-xs-3 text-center">Details</div>
              <div class="col-xs-3 text-center">House Rules</div>
              <div class="col-xs-3 text-center">Price</div>
            </div>
          <!-- HEADER END -->
          <!--++++++ L'ALTRA CAMERA ++++++-->
            <div class="row room1">
              <!-- ROOM -->
                <div class="col-xs-3 name nopadding text-center">
                  <a href="#rooms" class="openModalClassicDoubleRoom">L&#39;altra Camera</a>
                  <div class="leftpadding1em">
                    <button type="button" class="btn btn-primary btn-xs openModalClassicDoubleRoom">
                    <span class="glyphicon glyphicon-picture hidden-xs" aria-hidden="true"></span> View photos!</button>
                    <!-- MODAL -->
                      <div class="modal fade modal-transparent modal-fullscreen" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <!-- MODAL CONTENT-->
                            <div class="modal-content">
                              <!-- MODAL HEADER -->
                                <div class="modal-header" style="padding: 0px;">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                              <!-- MODAL HEADER END -->
                              <!-- MODAL BODY -->
                                <div class="modal-body" style="padding:0px;">
                                  <div id="myCarouselLaltraCamera" class="carousel slide" data-ride="carousel">
                                    <!-- WRAPPER FOR SLIDES -->
                                      <div class="carousel-inner" role="listbox">
                                        <!-- ITEMS -->
                                          <div class="item active">
                                            <img src="img/laltracamera/01.JPG" alt="Chania">
                                            <div class="carousel-caption">
                                              <h3>Double Bed</h3>
                                              <p>Perfect for 1 or 2 people</p>
                                            </div>
                                          </div>
                                          <div class="item">
                                            <img src="img/laltracamera/02.JPG" alt="Chania">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>
                                          <div class="item turnaround">
                                            <img src="img/laltracamera/03.JPG" alt="Flower">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>
                                          <div class="item">
                                            <img src="img/laltracamera/04.JPG" alt="Flower">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>
                                          <div class="item">
                                            <img src="img/laltracamera/05.JPG" alt="Flower">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>
                                          <div class="item">
                                            <img src="img/laltracamera/06.JPG" alt="Flower">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>
                                          <div class="item turnaround">
                                            <img src="img/laltracamera/07.JPG" alt="Flower">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>
                                          <div class="item turnaround">
                                            <img src="img/laltracamera/08.JPG" alt="Flower">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>
                                          <div class="item">
                                            <img src="img/laltracamera/09.JPG" alt="Flower">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>
                                          <div class="item">
                                            <img src="img/laltracamera/10.JPG" alt="Flower">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>
                                        <!-- ITEMS END-->
                                      </div>
                                    <!-- WRAPPER FOR SLIDES END -->
                                    <!-- LEFT AND RIGHT CONTROLS -->
                                      <a class="left carousel-control carousel-transparent" href="#myCarouselLaltraCamera" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control carousel-transparent" href="#myCarouselLaltraCamera" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                    <!-- LEFT AND RIGHT CONTROLS END -->
                                  </div>
                                </div>
                              <!-- MODAL BODY END -->
                              <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                </div>
                              <!-- MODAL FOOTER END -->
                            </div>
                          <!-- MODAL CONTENT END -->
                        </div>
                      </div>
                    <!-- MODAL END -->
                  </div>
                </div>
              <!-- ROOM END -->
              <!-- DETAILS -->
                <div class="col-xs-3 nopadding text-center">
                    <div class="inlineblock">
                        <img src="img/svg/avatar.svg" class="hidden-xs" alt="image"><img src="img/svg/avatar.svg" class="hidden-xs" alt="image"><img src="img/svg/avatar.svg" class="hidden-xs" alt="image"><img src="img/svg/avatar.svg" class="hidden-xs" alt="image"> Up to 4 Guests <br>
                        <img src="img/svg/shower.svg" class="hidden-xs" alt="image"> Private Bathroom <br>
                        <img src="img/svg/bed.svg" class="hidden-xs" alt="image"> 1 King-Sized Bed <br>
                        <img src="img/svg/sofa.svg" class="hidden-xs" alt="image"> 1 Sofa Bed <br>
                        <img src="img/svg/real-state-parking-sign.svg" class="hidden-xs" alt="image"> Free Parking <br>
                        <img src="img/svg/coffee-cup.svg" class="hidden-xs" data-toggle="tooltip" title="Breakfast is provided" data-placement="left" alt="image"> Breakfast <br>

                        <button type="button" class="btn btn-link btn-xs" data-toggle="collapse" data-target="#demo1">More</button>
                            <div id="demo1" class="collapse">
                                <img src="img/svg/television.svg" class="hidden-xs" alt="image"> TV <br>
                                <img src="img/svg/thermometer.svg" class="hidden-xs" data-toggle="tooltip" title="Central heating or a heater in the room" data-placement="left" alt="image"> Heating <br>
                                <img src="img/svg/tool.svg" class="hidden-xs" alt="image"> Hangers <br>
                                <img src="img/svg/washer-machine.svg" class="hidden-xs" data-toggle="tooltip" title="In the building, free or for a fee" data-placement="left" alt="image"> Washer <br>
                                <img src="img/svg/bath.svg" class="hidden-xs" data-toggle="tooltip" title="Towel, bed sheets, soap, and toilet paper" data-placement="left" alt="image"> Essentials <br>
                                <img src="img/svg/paw-print.svg" class="hidden-xs" alt="image"> Pets Allowed <br>
                                <img src="img/svg/holidays.svg" class="hidden-xs" alt="image"> Family/Kid Friendly <br>
                                <img src="img/svg/room.svg" class="hidden-xs" alt="image"> Private Room with Lock <br>
                            </div>
                    </div>
                </div>
              <!-- DETAILS END -->
              <!-- HOUSE RULES -->
                <div class="col-xs-3 nopadding text-center">
                    <div class="inlineblock">
                        <img src="img/svg/check-in.svg" class="hidden-xs" alt="image"> Check-in: Noon <br>
                        <img src="img/svg/alarm-clock.svg" class="hidden-xs" alt="image"> Check-out: 10<br>
                        <img src="img/svg/no-smoking.svg" class="hidden-xs" alt="image"> No Smoking <br>
                        <img src="img/svg/champagne-glass.svg" class="hidden-xs" alt="image"> No Parties <br>
                    </div>
                </div>
              <!-- HOUSE RULES END -->
              <!-- PRICE -->
                <div class="col-xs-3 nopadding" style="text-align: center">
                    <a href="#reserve">60&euro; / night</a><br>
                    <a class="btn btn-primary btn-xs selectLaltraCamera" id="item1" role="button" href="#reserve" data-toggle="tooltip" title="Extra people: &euro;10 / night after the first guest" data-placement="bottom">
                    <span class="glyphicon glyphicon-check hidden-xs" aria-hidden="true"></span> Select Room!</a>
                </div>
              <!-- PRICE END -->
            </div>
          <!--++++++ L'ALTRA CAMERA END++++++-->
          <!--++++++ LA CAMERA ROSA ++++++-->
            <div class="row room2">
              <!-- ROOM -->
                <div class="col-xs-3 name nopadding text-center">
                  <a href="#rooms" class="openModalLaCameraRosa">La Camera Rosa</a>
                  <div class="leftpadding1em">
                    <button type="button" class="btn btn-primary btn-xs openModalLaCameraRosa">
                    <span class="glyphicon glyphicon-picture hidden-xs" aria-hidden="true"></span> View photos!</button>
                    <!-- MODAL -->
                      <div class="modal fade modal-transparent modal-fullscreen" id="modalCameraRosa" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <!-- MODAL CONTENT -->
                            <div class="modal-content">
                              <!-- MODAL HEADER -->
                                <div class="modal-header" style="padding: 0px;">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                              <!-- MODAL HEADER END -->
                              <!-- MODAL BODY -->
                                <div class="modal-body" style="padding:0px;">
                                  <div id="myCarouselCameraRosa" class="carousel slide" data-ride="carousel">
                                    <!-- WRAPPER FOR SLIDES -->
                                      <div class="carousel-inner" role="listbox">
                                      <!-- ITEMS -->
                                        <div class="item active">
                                          <img src="img/camerarosa/11bed-left.JPG" alt="Chania">
                                          <div class="carousel-caption">
                                            <h3>Double Bed</h3>
                                            <p>Perfect for 1 or 2 people</p>
                                          </div>
                                        </div>

                                        <div class="item">
                                          <img src="img/camerarosa/12bed-right.JPG" alt="Chania">
                                          <div class="carousel-caption">
                                            <h3>Header</h3>
                                            <p>Text about photo</p>
                                          </div>
                                        </div>

                                        <div class="item">
                                          <img src="img/camerarosa/13bed.JPG" alt="Flower">
                                          <div class="carousel-caption">
                                            <h3>Header</h3>
                                            <p>Text about photo</p>
                                          </div>
                                        </div>

                                        <div class="item">
                                          <img src="img/camerarosa/14flowers.jpg" alt="Flower">
                                          <div class="carousel-caption">
                                            <h3>Header</h3>
                                            <p>Text about photo</p>
                                          </div>
                                        </div>

                                        <div class="item turnaround">
                                          <img src="img/camerarosa/15chair-vertical.jpg" alt="Flower">
                                          <div class="carousel-caption">
                                            <h3>Header</h3>
                                            <p>Text about photo</p>
                                          </div>
                                        </div>

                                        <div class="item turnaround">
                                          <img src="img/camerarosa/16bathroom-vertical.JPG" alt="Flower">
                                          <div class="carousel-caption">
                                            <h3>Header</h3>
                                            <p>Text about photo</p>
                                          </div>
                                        </div>

                                        <div class="item turnaround">
                                          <img src="img/camerarosa/17mirror-vertical.JPG" alt="Flower">
                                          <div class="carousel-caption">
                                            <h3>Header</h3>
                                            <p>Text about photo</p>
                                          </div>
                                        </div>
                                      <!-- ITEMS END -->
                                      </div>
                                    <!-- WRAPPER FOR SLIDES END -->
                                    <!-- LEFT AND RIGHT CONTROLS -->
                                      <a class="left carousel-control carousel-transparent" href="#myCarouselCameraRosa" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control carousel-transparent" href="#myCarouselCameraRosa" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                    <!-- LEFT AND RIGHT CONTROLS -->
                                  </div>
                                </div>
                              <!-- MODAL BODY END -->
                              <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                </div>
                              <!-- MODAL FOOTER END -->
                            </div>
                          <!-- MODAL CONTENT END -->
                        </div>
                      </div>
                    <!-- MODAL END -->
                  </div>
                </div>
              <!-- ROOM END -->
              <!-- DETAILS -->
                <div class="col-xs-3 nopadding text-center">
                    <div class="inlineblock">
                        <img src="img/svg/avatar.svg" class="hidden-xs" alt="image"><img src="img/svg/avatar.svg" class="hidden-xs" alt="image"> Up to 2 Guests <br>
                        <img src="img/svg/shower.svg" class="hidden-xs" alt="image"> Private Bathroom <br>
                        <img src="img/svg/bed.svg" class="hidden-xs" alt="image"> 1 King-Sized Bed <br>
                        <img src="img/svg/real-state-parking-sign.svg" class="hidden-xs" alt="image"> Free Parking <br>
                        <img src="img/svg/coffee-cup.svg" class="hidden-xs" data-toggle="tooltip" title="Breakfast is provided" data-placement="left" alt="image"> Breakfast <br>

                        <button type="button" class="btn btn-link btn-xs" data-toggle="collapse" data-target="#demo2">More</button>
                            <div id="demo2" class="collapse">
                                <img src="img/svg/television.svg" class="hidden-xs" alt="image"> TV <br>
                                <img src="img/svg/thermometer.svg" class="hidden-xs" data-toggle="tooltip" title="Central heating or a heater in the room" data-placement="left" alt="image"> Heating <br>
                                <img src="img/svg/tool.svg" class="hidden-xs" alt="image"> Hangers <br>
                                <img src="img/svg/washer-machine.svg" class="hidden-xs" data-toggle="tooltip" title="In the building, free or for a fee" data-placement="left" alt="image"> Washer <br>
                                <img src="img/svg/bath.svg" class="hidden-xs" data-toggle="tooltip" title="Towel, bed sheets, soap, and toilet paper" data-placement="left" alt="image"> Essentials <br>
                                <img src="img/svg/paw-print.svg" class="hidden-xs" alt="image"> Pets Allowed <br>
                                <img src="img/svg/holidays.svg" class="hidden-xs" alt="image"> Family/Kid Friendly <br>
                                <img src="img/svg/room.svg" class="hidden-xs" alt="image"> Private Room with Lock <br>
                            </div>
                    </div>
                </div>
              <!-- DETAILS END -->
              <!-- HOUSE RULES -->
                <div class="col-xs-3 nopadding text-center">
                    <div class="inlineblock">
                        <img src="img/svg/check-in.svg" class="hidden-xs" alt="image"> Check-in: Noon <br>
                        <img src="img/svg/alarm-clock.svg" class="hidden-xs" alt="image"> Check-out: 10<br>
                        <img src="img/svg/no-smoking.svg" class="hidden-xs" alt="image"> No Smoking <br>
                        <img src="img/svg/champagne-glass.svg" class="hidden-xs" alt="image"> No Parties <br>
                    </div>
                </div>
              <!-- HOUSE RULES END -->
              <!-- PRICE -->
                <div class="col-xs-3 nopadding" style="text-align: center">
                    <a href="#reserve">50&euro; / night</a><br>
                    <a class="btn btn-primary btn-xs selectCameraRosa" id="item2" role="button" href="#reserve" data-toggle="tooltip" title="Extra people: &euro;10 / night after the first guest" data-placement="bottom">
                    <span class="glyphicon glyphicon-check hidden-xs" aria-hidden="true"></span> Select Room!</a>
                </div>
              <!-- PRICE END -->
            </div>
          <!--++++++ LA CAMERA ROSA END++++++-->
          <!--++++++ LA CAMERA GIALLA ++++++-->
            <div class="row room3">
              <!--++++++++++ ROOM -->
                <div class="col-xs-3 name nopadding text-center">
                  <a href="#rooms" class="openModalCameraGialla">La Camera Gialla</a>
                  <div class="leftpadding1em">
                    <button type="button" class="btn btn-primary btn-xs openModalCameraGialla">
                      <span class="glyphicon glyphicon-picture hidden-xs" aria-hidden="true"></span> View photos!</button>
                    <!-- MODAL -->
                      <div class="modal fade modal-transparent modal-fullscreen" id="modalCameraGialla" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <!-- MODAL CONTENT-->
                            <div class="modal-content">
                              <!-- MODAL HEADER -->
                                <div class="modal-header" style="padding: 0px;">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                              <!-- MODAL HEADER END -->
                              <!-- MODAL BODY -->
                                <div class="modal-body" style="padding:0px;">
                                  <div id="carouselCameraGialla" class="carousel slide" data-ride="carousel">
                                    <!-- WRAPPER FOR SLIDES -->
                                      <div class="carousel-inner" role="listbox">
                                        <!-- ITEMS -->
                                          <div class="item active">
                                            <img src="img/cameragialla/01keys.JPG" alt="Chania">
                                            <div class="carousel-caption">
                                              <h3>Double Bed</h3>
                                              <p>Perfect for 1 or 2 people</p>
                                            </div>
                                          </div>

                                          <div class="item">
                                            <img src="img/cameragialla/02bed.JPG" alt="Chania">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>

                                          <div class="item">
                                            <img src="img/cameragialla/03bedsidetable.JPG" alt="Flower">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>

                                          <div class="item">
                                            <img src="img/cameragialla/04desk.JPG" alt="Flower">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>

                                          <div class="item">
                                            <img src="img/cameragialla/05table.JPG" alt="Flower">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>

                                          <div class="item turnaround">
                                            <img src="img/cameragialla/06bathroom.jpg" alt="Flower">
                                            <div class="carousel-caption">
                                              <h3>Header</h3>
                                              <p>Text about photo</p>
                                            </div>
                                          </div>
                                        <!-- ITEMS END -->
                                      </div>
                                    <!-- WRAPPER FOR SLIDES END -->
                                    <!-- LEFT AND RIGHT CONTROLS -->
                                      <a class="left carousel-control carousel-transparent" href="#carouselCameraGialla" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control carousel-transparent" href="#carouselCameraGialla" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                    <!-- LEFT AND RIGHT CONTROLS END -->
                                  </div>
                                </div>
                              <!-- MODAL BODY END -->
                              <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                </div>
                              <!-- MODAL FOOTER END -->
                            </div>
                          <!-- MODAL CONTENT END -->
                        </div>
                      </div>
                    <!-- MODAL END -->
                  </div>
                </div>
              <!--++++++++++ ROOM END -->
              <!--++++++++++ DETAILS ++++++++ -->
                <div class="col-xs-3 nopadding text-center">
                    <div class="inlineblock">
                      <img src="img/svg/avatar.svg" class="hidden-xs" alt="image"><img src="img/svg/avatar.svg" class="hidden-xs" alt="image"> Up to 2 Guests <br>
                      <img src="img/svg/shower.svg" class="hidden-xs" alt="image"> Private Bathroom <br>
                      <img src="img/svg/bed.svg" class="hidden-xs" alt="image"> 1 King-Sized Bed <br>
                      <img src="img/svg/real-state-parking-sign.svg" class="hidden-xs" alt="image"> Free Parking <br>
                      <img src="img/svg/coffee-cup.svg" class="hidden-xs" data-toggle="tooltip" title="Breakfast is provided" data-placement="left" alt="image"> Breakfast <br>

                      <button type="button" class="btn btn-link btn-xs" data-toggle="collapse" data-target="#demo3">More</button>
                        <div id="demo3" class="collapse">
                            <img src="img/svg/television.svg" class="hidden-xs" alt="image"> TV <br>
                            <img src="img/svg/thermometer.svg" class="hidden-xs" data-toggle="tooltip" title="Central heating or a heater in the room" data-placement="left" alt="image"> Heating <br>
                            <img src="img/svg/tool.svg" class="hidden-xs" alt="image"> Hangers <br>
                            <img src="img/svg/washer-machine.svg" class="hidden-xs" data-toggle="tooltip" title="In the building, free or for a fee" data-placement="left" alt="image"> Washer <br>
                            <img src="img/svg/bath.svg" class="hidden-xs" data-toggle="tooltip" title="Towel, bed sheets, soap, and toilet paper" data-placement="left" alt="image"> Essentials <br>
                            <img src="img/svg/paw-print.svg" class="hidden-xs" alt="image"> Pets Allowed <br>
                            <img src="img/svg/holidays.svg" class="hidden-xs" alt="image"> Family/Kid Friendly <br>
                            <img src="img/svg/room.svg" class="hidden-xs" alt="image"> Private Room with Lock <br>
                        </div>
                    </div>
                </div>
              <!--++++++++++ DETAILS END ++++ -->
              <!--++++++++++ HOUSE RULES ++++ -->
                <div class="col-xs-3 nopadding text-center">
                    <div class="inlineblock">
                        <img src="img/svg/check-in.svg" class="hidden-xs" alt="image"> Check-in: Noon <br>
                        <img src="img/svg/alarm-clock.svg" class="hidden-xs" alt="image"> Check-out: 10<br>
                        <img src="img/svg/no-smoking.svg" class="hidden-xs" alt="image"> No Smoking <br>
                        <img src="img/svg/champagne-glass.svg" class="hidden-xs" alt="image"> No Parties <br>
                    </div>
                </div>
              <!--++++++++++ HOUSE RULES END ++++ -->
              <!--++++++++++ PRICE ++++++++ -->
                <div class="col-xs-3 nopadding" style="text-align: center">
                    <a href="#reserve">60&euro; / night</a><br>
                    <a class="btn btn-primary btn-xs selectCameraGialla" id="item3" role="button" href="#reserve" data-toggle="tooltip" title="Extra people: &euro;10 / night after the first guest" data-placement="bottom">
                    <span class="glyphicon glyphicon-check hidden-xs" aria-hidden="true"></span> Select Room!</a>
                </div>
              <!--++++++++++ PRICE END ++++++++ -->
            </div>
          <!--++++++ LA CAMERA GIALLA END ++++++-->
          <!--++++++++++ PROPERTY  ++++++++ -->
            <div class="row footer-rooms">
              <div class="col-xs-12 nopadding responsivefont" style="text-align:center;"><em>For more photos of the property, <a href="#rooms" class="openProperty"> click here</a>.</em></div>
            </div>
            <!-- MODAL -->
                  <div class="modal fade modal-transparent modal-fullscreen" id="myModalProperty" role="dialog">
                    <div class="modal-dialog modal-lg">
                      <!-- MODAL CONTENT-->
                        <div class="modal-content">
                          <!-- MODAL HEADER -->
                            <div class="modal-header" style="padding: 0px;">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                          <!-- MODAL HEADER END -->
                          <!-- MODAL BODY -->
                            <div class="modal-body" style="padding:0px;">
                              <div id="myCarouselProperty" class="carousel slide" data-ride="carousel">
                                <!-- WRAPPER FOR SLIDES -->
                                  <div class="carousel-inner" role="listbox">
                                  <!-- ITEMS -->
                                    <div class="item active">
                                      <img src="img/property/building01.JPG" alt="Chania">
                                      <div class="carousel-caption">
                                        <h3>Double Bed</h3>
                                        <p>Perfect for 1 or 2 people</p>
                                      </div>
                                    </div>

                                    <div class="item">
                                      <img src="img/property/decoration03.JPG" alt="Chania">
                                      <div class="carousel-caption">
                                        <h3>Header</h3>
                                        <p>Text about photo</p>
                                      </div>
                                    </div>

                                    <div class="item">
                                      <img src="img/property/hallway05.JPG" alt="Flower">
                                      <div class="carousel-caption">
                                        <h3>Header</h3>
                                        <p>Text about photo</p>
                                      </div>
                                    </div>

                                    <div class="item">
                                      <img src="img/property/kitchen02.JPG" alt="Flower">
                                      <div class="carousel-caption">
                                        <h3>Header</h3>
                                        <p>Text about photo</p>
                                      </div>
                                    </div>

                                    <div class="item">
                                      <img src="img/property/flowers01.JPG" alt="Flower">
                                      <div class="carousel-caption">
                                        <h3>Header</h3>
                                        <p>Text about photo</p>
                                      </div>
                                    </div>

                                    <div class="item">
                                      <img src="img/property/backyard02.JPG" alt="Flower">
                                      <div class="carousel-caption">
                                        <h3>Header</h3>
                                        <p>Text about photo</p>
                                      </div>
                                    </div>

                                    <div class="item">
                                      <img src="img/property/landscape02.JPG" alt="Flower">
                                      <div class="carousel-caption">
                                        <h3>Header</h3>
                                        <p>Text about photo</p>
                                      </div>
                                    </div>

                                    <div class="item">
                                      <img src="img/property/landscape03.JPG" alt="Flower">
                                      <div class="carousel-caption">
                                        <h3>Header</h3>
                                        <p>Text about photo</p>
                                      </div>
                                    </div>

                                    <div class="item">
                                      <img src="img/property/landscape05.JPG" alt="Flower">
                                      <div class="carousel-caption">
                                        <h3>Header</h3>
                                        <p>Text about photo</p>
                                      </div>
                                    </div>

                                    <div class="item">
                                      <img src="img/property/decoration01.JPG" alt="Flower">
                                      <div class="carousel-caption">
                                        <h3>Header</h3>
                                        <p>Text about photo</p>
                                      </div>
                                    </div>
                                  <!-- ITEMS END -->
                                  </div>
                                <!-- WRAPPER FOR SLIDES END -->
                                <!-- LEFT AND RIGHT CONTROLS -->
                                  <a class="left carousel-control carousel-transparent" href="#myCarouselProperty" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="right carousel-control carousel-transparent" href="#myCarouselProperty" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                <!-- LEFT AND RIGHT CONTROLS END -->
                              </div>
                            </div>
                          <!-- MODAL BODY END -->
                          <!-- MODAL FOOTER -->
                            <div class="modal-footer">
                            </div>
                          <!-- MODAL FOOTER END -->
                        </div>
                      <!-- MODAL CONTENT -->
                    </div>
                  </div>
            <!-- MODAL END -->
          <!--++++++++++ PROPERTY END ++++++++ -->
        </div>
      <!-- ROOMS SECTION END -->
    <!-- ++++++++++++++++++++++++++++++++++++++  ROOMS - ALL END  +++++++++++++++++++++++++++++++++-->
    <br><br><br>
    <!-- ++++++++++++++++++++++++++++++++++++++  RESERVATIONS  +++++++++++++++++++++++++++++++++-->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div id="reserve"><h1 class="header1">Reserve</h1></div>
              <section>
                <div class="container">
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <?php echo $result; ?>
                        <p>Please enter your information below to make a reservation</p>
                          <!-- +++++++++++  RESERVATION FORM ++++++++++++++++-->
                            <form method="post">
                              <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Your name" value="<?php echo $_POST['name']; ?>" required>
                              </div>
                              <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Your email" value="<?php echo $_POST['email']; ?>" required>
                              </div>
                              <div class="form-group">
                                <input type="tel" name="phone" class="form-control" placeholder="Your phone number. Please include country code." value="<?php echo $_POST['phone']; ?>" required>
                              </div>
                              <div class="form-group">
                                <label class="notbold" for="sel1">Number of Guests:</label>
                                <select class="form-control" id="sel1" name="guests" value="<?php echo $_POST['guests']; ?>">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                </select>
                              </div>
                              <div class="form-group">
                                  <label class="notbold">Which room would you like to book?</label>
                                  <select class="form-control" id="sel2" name="room" value="<?php echo $_POST['room']; ?>">
                                    <optgroup label="Up to 4 Guests">
                                      <option value="L'altra Camera">L'altra Camera</option>
                                    </optgroup>
                                    <optgroup label="Up to 2 Guests">
                                      <option value="La Camera Rosa">La Camera Rosa</option>
                                      <option value="La Camera Gialla">La Camera Gialla</option>
                                    </optgroup>
                                    <optgroup label="Other">
                                      <option value="No Preference">No preference</option>
                                    </optgroup>
                                  </select>
                              </div>
                            <!-- +++++++++++  DATEPICKER ++++++++++++++++-->
                              <div class="input-daterange input-group form-group" id="datepicker">
                                  <!-- <label for="start">Check-in</label> -->
                                  <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                  </div>
                                  <input type="text" class="input-sm form-control" name="start" placeholder="Check-in" />
                                  <span class="input-group-addon">to</span>
                                  <!-- <label for="end">Check-out</label> -->
                                  <input type="text" class="input-sm form-control" name="end" placeholder="Check-out" />
                                  <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                  </div>
                              </div>
                            <!-- +++++++++++  DATEPICKER END ++++++++++++-->
                              <div class="form-group">
                                <textarea name="message" rows="5" class="form-control" placeholder="Please tell us more about your trip. For example, at what time do you plan on arriving? Do you have any special needs? Thanks!" required><?php echo $_POST['message']; ?></textarea>
                              </div>
                              <center><div class="g-recaptcha" data-sitekey="6LcX2gYUAAAAAEMBhjE9ykl5WTDFoL8t_KAxyLco"></div></center>
                              <br>
                              <div class="center">
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
                              </div>
                            </form>
                          <!-- +++++++++++  RESERVATION FORM END ++++++++++++++++-->
                    </div>
                  </div>
                </div>
              </section>
          </div>
        </div>
      </div>
    <!-- ++++++++++++++++++++++++++++++++++++++  RESERVATIONS END  +++++++++++++++++++++++++++++++++-->
    <br><br><br>
    <!-- ++++++++++++++++++++++++++++++++++++++  FOOTER  +++++++++++++++++++++++++++++++++-->
      <div class="footer">
        <div class="row footertext">
          <div class="col-sm-3"></div>
          <!-- ADDRESS -->
            <div class="col-sm-3">
              <a href="https://www.google.com/maps/place/L'Albergo+di+Ieri/@43.0715868,12.9507605,16z/data=!4m5!3m4!1s0x0:0xf57476262fbf86e2!8m2!3d43.0726839!4d12.9537859?hl=en-US" target="_blank"><p class="paddingtop">l'Albergo di Ieri</p>
              <p>Via G.Leopardi, 19</p>
              <p>62038 Serravalle del Chienti</p></a>
            </div>
          <!-- ADDRESS END -->
          <!-- PHONE NUMBER AND EMAIL -->
            <div class="col-sm-3">
              <p><span class="glyphicon glyphicon-earphone"></span>
                      <a href="tel:+393284833173">+39 328 4833173</a> <br>
                      or <a href="tel:+393294193814">+39 329 4193814</a></p>
                    <p><span class="glyphicon glyphicon-envelope"></span>
                        <!-- ++++++++++  ENCRYPTED EMAIL ADDRESS +++++++++++-->
                          <script type="text/javascript">
                            <!--
                            eval(unescape('%66%75%6e%63%74%69%6f%6e%20%6a%62%64%38%33%66%31%36%35%30%28%73%29%20%7b%0a%09%76%61%72%20%72%20%3d%20%22%22%3b%0a%09%76%61%72%20%74%6d%70%20%3d%20%73%2e%73%70%6c%69%74%28%22%32%34%39%39%38%32%39%34%22%29%3b%0a%09%73%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%30%5d%29%3b%0a%09%6b%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%31%5d%20%2b%20%22%35%30%32%34%32%31%22%29%3b%0a%09%66%6f%72%28%20%76%61%72%20%69%20%3d%20%30%3b%20%69%20%3c%20%73%2e%6c%65%6e%67%74%68%3b%20%69%2b%2b%29%20%7b%0a%09%09%72%20%2b%3d%20%53%74%72%69%6e%67%2e%66%72%6f%6d%43%68%61%72%43%6f%64%65%28%28%70%61%72%73%65%49%6e%74%28%6b%2e%63%68%61%72%41%74%28%69%25%6b%2e%6c%65%6e%67%74%68%29%29%5e%73%2e%63%68%61%72%43%6f%64%65%41%74%28%69%29%29%2b%2d%31%29%3b%0a%09%7d%0a%09%72%65%74%75%72%6e%20%72%3b%0a%7d%0a'));
                            eval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%6a%62%64%38%33%66%31%36%35%30%28%27') + '%39%61%25%6d%72%64%67%3b%23%6c%66%68%6c%71%73%3f%6e%6e%65%70%44%62%6f%67%64%72%6c%73%61%6e%67%71%6a%2a%6a%77%27%3d%6b%6b%64%74%2d%63%77%2a%67%6d%61%62%71%69%74%66%6e%62%72%68%2f%6f%75%3f%34%60%3e24998294%34%33%34%34%31%32%30' + unescape('%27%29%29%3b'));
                            // -->
                          </script>
                        <!-- ++++++++++  ENCRYPTED EMAIL ADDRESS END ++++++++-->
                    </p>
            </div>
          <!-- PHONE NUMBER AND EMAIL END -->
          <div class="col-sm-3"></div>
        </div>
      </div>
      <div class="footer">
        <div class="row footertext">
          <div class="col-sm-3"></div>
          <!-- SOCIAL MEDIA ****** CHANGE WITH THE DIFFERENT LANGUAGES ********-->
            <div class="col-sm-6">
              As seen on:
                <a href="https://www.facebook.com/BedAndBreakfastLAlbergoDiIeri/" target="_blank"><img src="img/svg/social-media.svg" style="height: 24px;"></a>
                <a href="https://www.airbnb.com/rooms/14165433?sug=50" target="_blank"><img src="img/svg/airbnb.svg" style="height: 24px;"></a>
                <a href="https://www.tripadvisor.com/Hotel_Review-g887086-d3140630-Reviews-L_Albergo_di_Ieri-Serravalle_di_Chienti_Province_of_Macerata_Marche.html" target="_blank"><img src="img/svg/tripadvisor-logotype.svg" style="height: 24px;"></a>
                <a href="http://www.booking.com/hotel/it/albergo-di-ieri.html?aid=357001;label=gog235jc-hotel-XX-it-albergoNdiNieri-unspec-pt-com-L%3Apt-O%3AosSx-B%3Achrome-N%3AXX-S%3Abo-U%3Asalo;sid=e13b4cdc80a777e3498bf3cb48fd0b24;dist=0&group_adults=2&sb_price_type=total&type=total&" target="_blank"><img src="img/svg/booking.png" style="height: 16px;"></a>
            </div>
          <!-- SOCIAL MEDIA END -->
          <div class="col-sm-3"></div>
        </div>
      </div>
    <!-- ++++++++++++++++++++++++++++++++++++++  FOOTER END +++++++++++++++++++++++++++++++++-->

    <!-- ++++++++++++++++++++++++++++++++++  JAVASCRIPT LINKS  +++++++++++++++++++++++++++++++++-->
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="bootstrap-datepicker.min.js"></script>
        <script src="validator.js"></script>
        <script src="override.js"></script>
    <!-- ++++++++++++++++++++++++++++++++++  JAVASCRIPT LINKS END  +++++++++++++++++++++++++++++++++-->
  </body>
</html>