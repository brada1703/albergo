<?php

  if ($_POST ['submit'] ) {
      if (!$_POST['email']) {
          $error.="<br/>- Please enter your email";
    }
      if (!$_POST['phone']) {
          $error.="<br/>- Please enter your phone number with country code.";
    }
      if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
          $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Ld6IBMUAAAAAJfNNOSL72PgGbQFafmP19FYZsgR&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
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
      <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="80">

    <!-- TOP BAR -->
        <div id="topbar">
          <div class="text-left">
            <a href="tel:+393284833173">
              <span class="glyphicon glyphicon-earphone"></span>&nbsp; +39 328 4833173</a> |
            <a href="mailto:info@albergodieri.it">
              <span class="glyphicon glyphicon-envelope"></span>&nbsp; info(at)albergodieri.it</a>
          </div>
          <div class="text-right">
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
    <!-- ++++++++++++++++++++++++++++++ PHP Reservation Error +++++++++++++++++++++++++++++++++++-->
      <div class="reservationerror">
        <?php echo $result; ?>
      </div>
    <!-- ++++++++++++++++++++++++++++++ PHP Reservation Error +++++++++++++++++++++++++++++++++++-->

    <!-- ++++++++++++++++++++++++++++++ MAIN CAROUSEL +++++++++++++++++++++++++++++++++++-->
      <div id="theCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="item active">
            <div class ="slide1"></div>
            <div class="carousel-caption">
              <h1>Welcome</h1>
              <p>to our bed and breakfast</p>
              <!-- <p><a href="#reserve" class="btn btn-primary btn-sm booknow">Book Now</a></p> -->
            </div>
          </div>
          <div class="item">
            <div class="slide2"></div>
            <div class="carousel-caption">
            <h1>l'Albergo di Ieri</h1>
              <p>where you can find a cozy bed,</p>
              <!-- <p><a href="#reserve" class="btn btn-primary btn-sm booknow">Book Now</a></p> -->
            </div>
          </div>
          <div class="item">
            <div class="slide3"></div>
            <div class="carousel-caption">
              <h1>Award-winning service</h1>
              <p>as seen on Booking.com and AirBnB,</p>
              <!-- <p><a href="#reserve" class="btn btn-primary btn-sm booknow">Book Now</a></p> -->
            </div>
          </div>
          <div class="item">
            <div class="slide4"></div>
            <div class="carousel-caption">
              <h1>Beautiful landscapes</h1>
              <p>fresh air, mountain views, tranquil scenery</p>
              <!-- <p><a href="#reserve" class="btn btn-primary btn-sm booknow">Book Now</a></p> -->
            </div>
          </div>
          <div class="item">
            <div class="slide5"></div>
            <div class="carousel-caption">
              <h1>Rustic interiors</h1>
              <p>and authentic, regional cuisine.</p>
              <!-- <p><a href="#reserve" class="btn btn-primary btn-sm booknow">Book Now</a></p> -->
            </div>
          </div>
        </div>
          <a class="left carousel-control" href="#theCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#theCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>
    <!-- ++++++++++++++++++++++++++++ MAIN CAROUSEL END +++++++++++++++++++++++++++++++++-->

    <!-- ++++++++++++++++++++++++++++++ RESERVATION BAR  +++++++++++++++++++++++++++++++++++++++++-->
      <div id="registrationform">
          <div class="registration row">
              <form method="post" class="form-inline" autocomplete="on">
                  <div class="col-sm-2" data-toggle="tooltip" data-placement="bottom" title="Email Address">
                      <div class="form-group">
                          <input type="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo $_POST['email']; ?>" required>
                      </div>
                  </div>
                  <div class="col-sm-2" data-toggle="tooltip" data-placement="bottom" title="Include Country Code">
                      <div class="form-group">
                          <input type="tel" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo $_POST['phone']; ?>" required>
                      </div>
                  </div>
                  <div class="col-sm-1" data-toggle="tooltip" data-placement="bottom" title="Number of Guests">
                      <div class="form-group">
                          <select class="form-control" id="sel1" name="guests" value="<?php echo $_POST['guests']; ?>">
                              <optgroup label="Number of Guests">
                                  <option disabled="disabled" selected="selected">Guests</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                              </optgroup>
                          </select>
                      </div>
                  </div>
                  <div class="col-sm-2" data-toggle="tooltip" data-placement="bottom" title="Select Room">
                    <div class="form-group">
                        <select class="form-control" id="sel2" name="room" value="<?php echo $_POST['room']; ?>">
                          <option disabled="disabled" selected="selected">Select Room</option>
                          <optgroup label="Up to 4 Guests">
                            <option value="L'altra Camera">Camera Tagete</option>
                          </optgroup>
                          <optgroup label="Up to 2 Guests">
                            <option value="La Camera Rosa">Camera Oleandro</option>
                            <option value="La Camera Gialla">Camera Gelsomino</option>
                          </optgroup>
                          <optgroup label="Other">
                            <option value="No Preference">No preference</option>
                          </optgroup>
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-4" data-toggle="tooltip" data-placement="bottom" title="Check-in after noon. Check-out before 10a.m.">
                      <!-- +++++++++++  DATEPICKER ++++++++++++++++-->
                        <div class="input-daterange input-group form-group" id="datepicker" style="margin-top: 3px;">
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
                  </div>
                  <div class="col-sm-1">
                      <!-- <input type="submit" name="submit" class="btn btn-primary" value="Book Now"/> -->
                      <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#emailconfirmation" style="padding-left: -10px; padding-right: none;">Book Now</button>
                        <!-- Modal -->
                            <div class="modal fade" id="emailconfirmation" role="dialog">
                              <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" style="color: black;">Human Verification</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Please confirm that you are not a robot.</p>
                                    <center><img src="http://blog.coghillcartooning.com/wp-content/uploads/2010/11/Classroom-Antics-robot-sketch-v01.jpg" class="robot"></center>
                                    <center><div class="g-recaptcha" data-sitekey="6Ld6IBMUAAAAAGD9SMU-p-zfZQDPSqdp_6Hmm48q"></div></center>
                                  </div>
                                  <div class="center submitbutton" style="margin-bottom: 20px;">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      <!-- END Modal -->
                  </div>
              </form>
          </div>
      </div>
    <!-- ++++++++++++++++++++++++++++++ RESERVATION BAR  END +++++++++++++++++++++++++++++++++++++++++-->

    <!-- ++++++++++++++++++++++++++++++ NAVBAR  +++++++++++++++++++++++++++++++++++++++++-->
     <!--  <nav class="navbar navbar-default ontop">
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
      </nav> -->
    <!-- ++++++++++++++++++++++++++++++ NAVBAR END ++++++++++++++++++++++++++++++++++++++-->

    <!-- ++++++++++++++++++++++++++++++ ABOUT + REGION ++++++++++++++++++++++++++++++++++-->
     <!--      <div class="container">
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
          </div> -->
    <!-- ++++++++++++++++++++++++++++++ ABOUT + REGION END ++++++++++++++++++++++++++++++-->
    <br><br><br>

    <!-- ++++++++++++++++++++++++++++++ OUR ROOMS ++++++++++++++++++++++++++++++++++++++-->
      <div class="row titlerow">
          <div class="col-sm-5 col-xs-4"><hr></div>
          <div class="col-sm-2 col-xs-4"><h2 class="text-center" style="color: #5e5e5e">Our Rooms</h2></div>
          <div class="col-sm-5 col-xs-4"><hr></div>
      </div>

      <div class="row" class="text-center" id="roomslist">
          <div class="col-md-4">
              <div class="montage-wrap">
                  <div class="montage-block">
                      <div class="block1">
                          <div class="roompicture-altracamera"></div>
                          <div class="roominfo">
                              <div class="name">
                                  <p>Camera Tagete</p>
                              </div>
                              <div class="price">
                                  <p>60&euro;/night</p>
                              </div>
                          </div>
                      </div>
                      <div class="thumb_content">
                          <div class="titleinfo">
                              <h1>Camera Tagete</h1>
                              <p>Room with large bed and comfortable shower with separate kitchen, the perfect shelter to feel at home.</p>
                          </div>
                          <div class="infolist">
                              <div class="left">
                                  <p><img src="img/svg/avatar.svg">&nbsp; Up to 4 Guests</p>
                                  <p><img src="img/svg/shower.svg">&nbsp; Private Bathroom</p>
                                  <p><img src="img/svg/real-state-parking-sign.svg">&nbsp; Free Parking</p>
                              </div>
                              <div class="right">
                                  <p><img src="img/svg/bed.svg">&nbsp; 1 King-Sized Bed</p>
                                  <p><img src="img/svg/sofa.svg">&nbsp; 1 Sofa Bed</p>
                                  <p><img src="img/svg/coffee-cup.svg">&nbsp; Breakfast</p>
                              </div>
                          </div>
                          <div class="booknow">
                              <a class="btn btn-primary btn-xs selectLaltraCamera" id="item1" role="button"
                              href="#registrationform" data-toggle="tooltip" data-placement="top" title="Extra Guests: &euro;10 / night after the first guest"
                              data-placement="bottom">Select Room!</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="montage-wrap">
                  <div class="montage-block">
                      <div class="block1">
                          <div class="roompicture-camerarosa"></div>
                          <div class="roominfo">
                              <div class="name">
                                  <p>Camera Oleandro</p>
                              </div>
                              <div class="price">
                                  <p>50&euro;/night</p>
                              </div>
                          </div>
                      </div>
                      <div class="thumb_content">
                          <div class="titleinfo">
                              <h1>Camera Oleandro</h1>
                              <p>Junior Suite with large king size bed and comfortable shower with separate kitchen, the perfect shelter to feel at home.</p>
                          </div>
                          <div class="infolist">
                              <div class="left">
                                  <p><img src="img/svg/avatar.svg">&nbsp; Up to 2 Guests</p>
                                  <p><img src="img/svg/shower.svg">&nbsp; Private Bathroom</p>
                                  <p><img src="img/svg/real-state-parking-sign.svg">&nbsp; Free Parking</p>
                              </div>
                              <div class="right">
                                  <p><img src="img/svg/bed.svg">&nbsp; 1 King-Sized Bed</p>
                                  <p><img src="img/svg/coffee-cup.svg">&nbsp; Breakfast</p>
                              </div>
                          </div>
                          <div class="booknow">
                              <a class="btn btn-primary btn-xs selectCameraRosa" id="item2" role="button"
                              href="#registrationform" data-toggle="tooltip" data-placement="top" title="Extra Guests: &euro;10 / night after the first guest"
                              data-placement="bottom">Select Room!</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="montage-wrap">
                  <div class="montage-block">
                      <div class="block1">
                          <div class="roompicture-cameragialla"></div>
                          <div class="roominfo">
                              <div class="name">
                                  <p>Camera Gelsomino</p>
                              </div>
                              <div class="price">
                                  <p>50&euro;/night</p>
                              </div>
                          </div>
                      </div>
                      <div class="thumb_content">
                          <div class="titleinfo">
                              <h1>Camera Gelsomino</h1>
                              <p>Junior Suite with large king size bed and comfortable shower with separate kitchen, the perfect shelter to feel at home.</p>
                          </div>
                          <div class="infolist">
                              <div class="left">
                                  <p><img src="img/svg/avatar.svg">&nbsp; Up to 4 Guests</p>
                                  <p><img src="img/svg/shower.svg">&nbsp; Private Bathroom</p>
                                  <p><img src="img/svg/real-state-parking-sign.svg">&nbsp; Free Parking</p>
                              </div>
                              <div class="right">
                                  <p><img src="img/svg/bed.svg">&nbsp; 1 King-Sized Bed</p>
                                  <p><img src="img/svg/coffee-cup.svg">&nbsp; Breakfast</p>
                              </div>
                          </div>
                          <div class="booknow">
                              <a class="btn btn-primary btn-xs selectCameraGialla" id="item3" role="button"
                              href="#registrationform" data-toggle="tooltip" data-placement="top" title="Extra Guests: &euro;10 / night after the first guest"
                              data-placement="bottom">Select Room!</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    <!-- ++++++++++++++++++++++++++++++ OUR ROOMS END ++++++++++++++++++++++++++++++++++++++-->
    <br><br><br>

    <!-- ++++++++++++++++++++++++++++++ OUR AMENITIES ++++++++++++++++++++++++++++++++++++++-->
      <div class="row titlerow">
          <div class="col-sm-5 col-xs-4"><hr></div>
          <div class="col-sm-2 col-xs-4"><h2 class="text-center" style="color: #5e5e5e">Amenities</h2></div>
          <div class="col-sm-5 col-xs-4"><hr></div>
      </div>

      <div class="row amenities">
          <div class="col-xs-3 amenity1">
              <div class="roundelement">
                  <p>
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                           viewBox="0 0 511 511" style="enable-background:new 0 0 511 511" xml:space="preserve">
                          <path d="m399.5,192h-32c-5.647,0-11.161,0.742-16.5,2.177v-34.677c0-8.547-6.953-15.5-15.5-15.5h-272c-8.547,0-15.5,6.953-15.5,15.5v280c0,19.43 14.106,35.617 32.613,38.887 3.27,18.506 19.457,32.613 38.887,32.613h160c19.43,0 35.617-14.107 38.887-32.613 18.507-3.27 32.613-19.457 32.613-38.887v-26.678c5.339,1.436 10.854,2.178 16.5,2.178h32c35.014,0 63.5-28.486 63.5-63.5v-96c0-35.014-28.486-63.5-63.5-63.5zm-48.5,63.5c0-9.098 7.402-16.5 16.5-16.5h32c9.098,0 16.5,7.402 16.5,16.5v96c0,9.098-7.402,16.5-16.5,16.5h-32c-9.098,0-16.5-7.402-16.5-16.5v-96zm-71.5,240.5h-160c-10.894,0-20.146-7.149-23.321-17h206.643c-3.176,9.851-12.428,17-23.322,17zm56.5-56.5c0,13.509-10.991,24.5-24.5,24.5h-224c-13.509,0-24.5-10.991-24.5-24.5v-280c0-0.276 0.224-0.5 0.5-0.5h272c0.276,0 0.5,0.224 0.5,0.5v280zm112-88c0,26.743-21.757,48.5-48.5,48.5h-32c-5.707,0-11.235-0.98-16.5-2.89v-18.792c4.802,2.965 10.454,4.681 16.5,4.681h32c17.369,0 31.5-14.131 31.5-31.5v-96c0-17.369-14.131-31.5-31.5-31.5h-32c-6.046,0-11.698,1.716-16.5,4.681v-18.792c5.264-1.91 10.792-2.889 16.5-2.889h32c26.743,0 48.5,21.757 48.5,48.5v96.001z"/>
                          <path d="m184,119.5c0,4.142 3.358,7.5 7.5,7.5s7.5-3.358 7.5-7.5c0-6.554 2.464-9.427 6.193-13.776 4.369-5.095 9.807-11.436 9.807-23.541 0-12.109-5.437-18.454-9.805-23.551-3.73-4.353-6.195-7.229-6.195-13.791s2.464-9.438 6.195-13.791c4.368-5.096 9.805-11.441 9.805-23.55 0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5c0,6.562-2.464,9.438-6.195,13.791-4.368,5.097-9.805,11.441-9.805,23.551s5.437,18.454 9.805,23.551c3.73,4.353 6.195,7.229 6.195,13.791 0,6.554-2.464,9.427-6.193,13.776-4.369,5.095-9.807,11.436-9.807,23.54z"/>
                          <path d="m224,119.5c0,4.142 3.358,7.5 7.5,7.5s7.5-3.358 7.5-7.5c0-6.554 2.464-9.427 6.193-13.776 4.369-5.095 9.807-11.436 9.807-23.541 0-12.109-5.437-18.454-9.805-23.551-3.73-4.353-6.195-7.229-6.195-13.791 0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5c0,12.109 5.437,18.454 9.805,23.551 3.73,4.353 6.195,7.229 6.195,13.791 0,6.554-2.464,9.427-6.193,13.776-4.369,5.096-9.807,11.437-9.807,23.541z"/>
                          <path d="m144,119.5c0,4.142 3.358,7.5 7.5,7.5s7.5-3.358 7.5-7.5c0-6.554 2.464-9.427 6.193-13.776 4.369-5.095 9.807-11.436 9.807-23.541 0-12.109-5.437-18.454-9.805-23.551-3.73-4.353-6.195-7.229-6.195-13.791 0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5c0,12.109 5.437,18.454 9.805,23.551 3.73,4.353 6.195,7.229 6.195,13.791 0,6.554-2.464,9.427-6.193,13.776-4.369,5.096-9.807,11.437-9.807,23.541z"/>
                          <path d="m311.5,176c-4.142,0-7.5,3.358-7.5,7.5v24c0,4.142 3.358,7.5 7.5,7.5s7.5-3.358 7.5-7.5v-24c0-4.142-3.358-7.5-7.5-7.5z"/>
                          <path d="m311.5,232c-4.142,0-7.5,3.358-7.5,7.5v120c0,4.142 3.358,7.5 7.5,7.5s7.5-3.358 7.5-7.5v-120c0-4.142-3.358-7.5-7.5-7.5z"/>
                      </svg>
                  </p>
              </div>
              <div class="amenitytitle">Breakfast Included</div>
          </div>
          <div class="col-xs-3 amenity2">
              <div class="roundelement">
                  <p>
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                           viewBox="0 0 63.445 63.445" style="enable-background:new 0 0 63.445 63.445" xml:space="preserve">
                          <path d="M21.572,28.926c5.067,0,9.19-5.533,9.19-12.334s-4.123-12.334-9.19-12.334c-5.067,0-9.19,5.533-9.19,12.334
                              S16.504,28.926,21.572,28.926z M21.572,7.258c3.355,0,6.19,4.275,6.19,9.334s-2.834,9.334-6.19,9.334
                              c-3.356,0-6.19-4.275-6.19-9.334S18.216,7.258,21.572,7.258z"/>
                          <path d="M48.83,40.922c-0.189-0.256-0.37-0.498-0.466-0.707c-2.054-4.398-7.689-9.584-16.813-9.713L31.2,30.5
                              c-8.985,0-14.576,4.912-16.813,9.51c-0.077,0.156-0.247,0.361-0.427,0.576c-0.212,0.254-0.423,0.512-0.604,0.793
                              c-1.89,2.941-2.853,6.25-2.711,9.318c0.15,3.26,1.512,5.877,3.835,7.369c0.937,0.604,1.95,0.907,3.011,0.907
                              c2.191,0,4.196-1.233,6.519-2.664c1.476-0.907,3.002-1.848,4.698-2.551c0.191-0.063,0.968-0.158,2.241-0.158
                              c1.515,0,2.6,0.134,2.833,0.216c1.653,0.729,3.106,1.688,4.513,2.612c2.154,1.418,4.188,2.759,6.395,2.759
                              c0.947,0,1.867-0.248,2.732-0.742c4.778-2.715,5.688-10.162,2.03-16.603C49.268,41.52,49.048,41.219,48.83,40.922z M45.939,55.838
                              c-0.422,0.238-0.818,0.35-1.25,0.35c-1.308,0-2.9-1.049-4.746-2.264c-1.438-0.947-3.066-2.02-4.949-2.852
                              c-0.926-0.41-2.934-0.472-4.046-0.472c-1.629,0-2.76,0.128-3.362,0.375c-1.943,0.808-3.646,1.854-5.149,2.779
                              c-1.934,1.188-3.604,2.219-4.946,2.219c-0.49,0-0.931-0.137-1.389-0.432c-1.483-0.953-2.356-2.724-2.461-4.984
                              c-0.113-2.45,0.682-5.135,2.238-7.557c0.113-0.177,0.25-0.334,0.383-0.492c0.274-0.328,0.586-0.701,0.823-1.188
                              c1.84-3.781,6.514-7.82,14.115-7.82l0.308,0.002c7.736,0.109,12.451,4.369,14.137,7.982c0.225,0.479,0.517,0.875,0.773,1.223
                              c0.146,0.199,0.301,0.4,0.426,0.619C49.684,48.326,49.279,53.939,45.939,55.838z"/>
                          <path d="M41.111,28.926c5.068,0,9.191-5.533,9.191-12.334S46.18,4.258,41.111,4.258c-5.066,0-9.189,5.533-9.189,12.334
                              S36.044,28.926,41.111,28.926z M41.111,7.258c3.355,0,6.191,4.275,6.191,9.334s-2.834,9.334-6.191,9.334
                              c-3.355,0-6.189-4.275-6.189-9.334S37.756,7.258,41.111,7.258z"/>
                          <path d="M56.205,22.592c-4.061,0-7.241,4.213-7.241,9.59c0,5.375,3.181,9.588,7.241,9.588s7.24-4.213,7.24-9.588
                              C63.445,26.805,60.266,22.592,56.205,22.592z M56.205,38.77c-2.299,0-4.241-3.018-4.241-6.588c0-3.572,1.942-6.59,4.241-6.59
                              s4.24,3.018,4.24,6.59C60.445,35.752,58.503,38.77,56.205,38.77z"/>
                          <path d="M14.482,32.182c0-5.377-3.181-9.59-7.241-9.59S0,26.805,0,32.182c0,5.375,3.181,9.588,7.241,9.588
                              S14.482,37.557,14.482,32.182z M7.241,38.77C4.942,38.77,3,35.752,3,32.182c0-3.572,1.942-6.59,4.241-6.59
                              c2.299,0,4.241,3.018,4.241,6.59C11.482,35.752,9.54,38.77,7.241,38.77z"/>
                      </svg>
                  </p>
              </div>
              <div class="amenitytitle">Pets Allowed</div>
          </div>
          <div class="col-xs-3 amenity3">
              <div class="roundelement">
                  <p>
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                           viewBox="0 0 285 285" style="enable-background:new 0 0 285 285" xml:space="preserve">
                          <path d="M142.5,0C63.934,0,0,63.934,0,142.5S63.934,285,142.5,285S285,221.066,285,142.5S221.066,0,142.5,0z M142.5,271.424
                              c-71.083,0-128.924-57.841-128.924-128.924S71.417,13.576,142.5,13.576S271.424,71.417,271.424,142.5
                              S213.583,271.424,142.5,271.424z"/>
                          <path d="M153.138,62.919H98.637c-12.586,0-20.831,4.991-20.831,20.843v120.507c0,10.632,6.928,17.807,17.788,17.807
                              c10.854,0,17.807-7.175,17.807-17.807v-42.336h39.515c34.524,0,54.279-21.065,54.279-49.504
                              C207.194,77.683,183.11,62.919,153.138,62.919z M146.632,134.583H113.4V90.269h29.545c17.584,0,28.661,6.525,28.661,22.16
                              C171.606,125.881,160.956,134.583,146.632,134.583z"/>
                  </p>
              </div>
              <div class="amenitytitle">Parking</div>
          </div>
          <div class="col-xs-3 amenity4">
              <div class="roundelement">
                  <p>
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                           viewBox="0 0 512.002 512.002" style="enable-background:new 0 0 512.002 512.002" xml:space="preserve">
                          <path d="M405.391,149.39c0-19.468-15.839-35.308-35.307-35.308c-2.847,0-10.521,0.627-40.934,5.009
                              c24.601-18.403,30.474-23.39,32.487-25.403c6.669-6.669,10.342-15.536,10.342-24.966c0-9.432-3.673-18.299-10.342-24.966
                              c-6.669-6.67-15.536-10.342-24.967-10.342s-18.298,3.672-24.965,10.341c-2.012,2.012-6.998,7.884-25.404,32.488
                              c4.383-30.414,5.009-38.087,5.009-40.935C291.309,15.839,275.47,0,256.002,0s-35.308,15.839-35.308,35.308
                              c0,2.847,0.627,10.521,5.009,40.935c-18.405-24.603-23.391-30.475-25.403-32.487c-6.669-6.67-15.536-10.342-24.967-10.342
                              s-18.298,3.672-24.967,10.341c-13.766,13.766-13.766,36.166,0,49.934c2.013,2.013,7.888,6.999,32.487,25.402
                              c-30.413-4.383-38.087-5.009-40.934-5.009c-19.468,0-35.308,15.839-35.308,35.308c0,19.469,15.839,35.308,35.308,35.308
                              c2.847,0,10.521-0.627,40.934-5.009c-24.599,18.403-30.474,23.389-32.488,25.403c-13.765,13.767-13.765,36.167,0,49.932
                              c6.669,6.67,15.536,10.342,24.966,10.342c9.431,0,18.298-3.672,24.967-10.341c2.012-2.012,6.998-7.885,25.403-32.488
                              c-4.383,30.414-5.009,38.087-5.009,40.935c0,16.576,11.486,30.514,26.915,34.292v106.063
                              c-6.146-11.246-13.904-21.646-23.177-30.919c-3.278-3.277-8.593-3.277-11.869,0c-3.278,3.279-3.278,8.593,0,11.871
                              c14.934,14.932,25.435,33.171,30.78,53.288c-20.117-5.346-38.355-15.849-53.287-30.783c-14.931-14.93-25.433-33.166-30.779-53.279
                              c6.45,1.72,12.741,3.98,18.805,6.758c4.212,1.93,9.196,0.082,11.127-4.133c1.932-4.215,0.081-9.197-4.134-11.127
                              c-11.216-5.14-23.11-8.724-35.35-10.652c-2.651-0.414-5.342,0.459-7.241,2.356c-1.898,1.898-2.774,4.59-2.356,7.241
                              c4.479,28.457,17.64,54.291,38.057,74.708c19.145,19.145,43.054,31.91,69.424,37.12v47.332c0,4.637,3.758,8.393,8.393,8.393
                              c4.635,0,8.393-3.757,8.393-8.393v-47.725c25.651-5.429,48.912-18.021,67.619-36.727c20.417-20.417,33.577-46.251,38.057-74.708
                              c0.417-2.651-0.459-5.342-2.356-7.241c-1.898-1.897-4.586-2.766-7.241-2.356c-28.456,4.48-54.29,17.64-74.707,38.057
                              c-8.39,8.39-15.532,17.707-21.372,27.732V297.765c15.428-3.777,26.914-17.716,26.914-34.292c0-2.847-0.627-10.521-5.009-40.935
                              c18.405,24.603,23.391,30.475,25.403,32.487c6.669,6.67,15.536,10.342,24.966,10.342s18.298-3.672,24.966-10.341
                              c6.669-6.669,10.342-15.536,10.342-24.968c0-9.431-3.673-18.298-10.342-24.968c-2.013-2.012-7.886-6.998-32.486-25.402
                              c30.413,4.383,38.087,5.009,40.934,5.009C389.552,184.698,405.391,168.859,405.391,149.39z M297.636,384.777
                              c14.934-14.934,33.171-25.437,53.288-30.781c-5.345,20.117-15.848,38.353-30.78,53.287
                              c-14.932,14.934-33.171,25.437-53.288,30.783C272.202,417.948,282.704,399.709,297.636,384.777z M323.573,55.625
                              c3.497-3.498,8.148-5.424,13.096-5.424s9.599,1.926,13.097,5.426c3.498,3.497,5.424,8.148,5.424,13.096
                              c0,4.947-1.926,9.598-5.424,13.096c-1.909,1.908-11.743,9.978-55.504,42.258l-12.947-12.947
                              C313.597,67.366,321.665,57.533,323.573,55.625z M256.002,16.787c10.212,0,18.52,8.308,18.52,18.521
                              c0,2.699-1.248,15.359-9.366,69.128h-18.31c-8.118-53.769-9.366-66.428-9.366-69.128C237.48,25.095,245.789,16.787,256.002,16.787
                              z M162.239,81.819c-7.224-7.222-7.224-18.972-0.002-26.194c3.498-3.498,8.149-5.424,13.097-5.424
                              c4.948,0,9.599,1.926,13.097,5.426c1.908,1.907,9.976,11.74,42.257,55.503l-12.946,12.947
                              C173.981,91.796,164.147,83.727,162.239,81.819z M141.919,167.91c-10.212,0.001-18.521-8.307-18.521-18.52
                              s8.308-18.521,18.521-18.521c2.699,0,15.359,1.247,69.127,9.366v18.31C157.278,166.663,144.619,167.91,141.919,167.91z
                               M188.43,243.154c-3.498,3.498-8.149,5.424-13.097,5.424s-9.599-1.926-13.097-5.426c-7.222-7.221-7.221-18.971,0-26.192
                              c1.909-1.909,11.743-9.978,55.504-42.258l12.946,12.947C198.406,231.413,190.337,241.246,188.43,243.154z M256.002,281.993
                              c-10.212,0-18.521-8.308-18.521-18.522c0-2.699,1.248-15.359,9.366-69.128h18.31c8.118,53.769,9.366,66.428,9.366,69.128
                              C274.522,273.685,266.214,281.993,256.002,281.993z M256.001,177.557c-15.531,0-28.167-12.636-28.167-28.167
                              s12.636-28.167,28.167-28.167s28.167,12.636,28.167,28.167S271.532,177.557,256.001,177.557z M349.766,216.96
                              c3.497,3.499,5.424,8.151,5.424,13.097c0,4.948-1.926,9.599-5.424,13.097c-3.498,3.498-8.149,5.424-13.097,5.424
                              s-9.598-1.926-13.096-5.426c-1.908-1.907-9.976-11.74-42.257-55.503l12.947-12.947
                              C338.024,206.983,347.858,215.053,349.766,216.96z M300.956,158.545v-18.31c53.768-8.119,66.428-9.366,69.128-9.366
                              c10.212-0.001,18.52,8.307,18.52,18.52s-8.308,18.521-18.52,18.521C367.385,167.911,354.725,166.664,300.956,158.545z"/>
                      </svg>
                  </p>
              </div>
              <div class="amenitytitle">Garden</div>
          </div>
      </div>
    <!-- ++++++++++++++++++++++++++++++ OUR AMENITIES END ++++++++++++++++++++++++++++++++++++++-->
    <br><br><br>

    <!-- ++++++++++++++++++++++++++++++ OUR REVIEWS  ++++++++++++++++++++++++++++++++++++++-->

      <!--++++++++++++++++++++++++++++++++++++ Title ++++++++++++++++++++++++++++++++++++-->
          <div class="row titlerow">
              <div class="col-sm-5 col-xs-4"><hr></div>
              <div class="col-sm-2 col-xs-4"><h2 class="text-center" style="color: #5e5e5e">Reviews</h2></div>
              <div class="col-sm-5 col-xs-4"><hr></div>
          </div>
      <!--++++++++++++++++++++++++++++++++++++ END Title ++++++++++++++++++++++++++++++++++++-->
      <!--++++++++++++++++++++++++++++++++++++ Carousel ++++++++++++++++++++++++++++++++++++-->
      <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
      <!--   <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
       -->
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
              <div class="center" style="width: 239px;">
                  <div id="TA_selfserveprop574" class="TA_selfserveprop img-fluid">
                      <ul id="SKGjZbUZJx0" class="TA_links J1qKmd">
                          <li id="8O8VOl0ubu" class="lB15vkg">
                              <a target="_blank" href="https://www.tripadvisor.com/">
                                  <img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/>
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
              <script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=574&amp;locationId=3140630&amp;lang=en_US&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=true&amp;display_version=2"></script>
          </div>
          <div class="item">
            <div class="center" style="width: 159px;">
                 <script>
                      (function() {
                          var randomId = Math.floor(Math.random() * 100000);
                          var targetElemId = 'bcom_rwidget_' + randomId;
                          document.write('<div id="' + targetElemId + '"></div>');
                          var script   = document.createElement('script');
                          script.type  = 'text/javascript';
                          script.async = true;
                          script.src   = 'http://www.booking.com/review_widget/it/albergo-di-ieri.it.html?tmpl=review_widget/review_widget&wid=' + targetElemId + '&wtype=box_big_feat&hotel_id=364714&widget_language=it';
                          var node     = document.getElementsByTagName('script')[0];
                          node.parentNode.insertBefore(script, node);
                      }());
                  </script>
            </div>
          </div>
          <div class="item">
              <div class="center">
                  <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fsilvia.tinti.777%2Fposts%2F10206415535802231%3A0&width=500" width="500" height="335" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
              </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!--++++++++++++++++++++++++++++++++++++ END Carousel ++++++++++++++++++++++++++++++++++++-->
    <!-- ++++++++++++++++++++++++++++++ OUR REVIEWS  ++++++++++++++++++++++++++++++++++++++-->
    <br><br><br>

    <!-- ++++++++++++++++++++++++++++++++++++++  ROOMS - ALL  ++++++++++++++++++++++++++++++++++++-->
        <!-- <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div id="rooms"><h1 class="header1">Rooms</h1></div>
            </div>
          </div>
        </div>
        <div class="container-rooms">
            <div class="row header-rooms">
              <div class="col-xs-3 text-center">Room</div>
              <div class="col-xs-3 text-center">Details</div>
              <div class="col-xs-3 text-center">House Rules</div>
              <div class="col-xs-3 text-center">Price</div>
            </div>
            <div class="row room1">
                <div class="col-xs-3 name nopadding text-center">
                  <a href="#rooms" class="openModalClassicDoubleRoom">L&#39;altra Camera</a>
                  <div class="leftpadding1em">
                    <button type="button" class="btn btn-primary btn-xs openModalClassicDoubleRoom">
                    <span class="glyphicon glyphicon-picture hidden-xs" aria-hidden="true"></span> View photos!</button>
                      <div class="modal fade modal-transparent modal-fullscreen" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="padding: 0px;">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" style="padding:0px;">
                                  <div id="myCarouselLaltraCamera" class="carousel slide" data-ride="carousel">
                                      <div class="carousel-inner" role="listbox">
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
                                      </div>
                                      <a class="left carousel-control carousel-transparent" href="#myCarouselLaltraCamera" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control carousel-transparent" href="#myCarouselLaltraCamera" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
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
                <div class="col-xs-3 nopadding text-center">
                    <div class="inlineblock">
                        <img src="img/svg/check-in.svg" class="hidden-xs" alt="image"> Check-in: Noon <br>
                        <img src="img/svg/alarm-clock.svg" class="hidden-xs" alt="image"> Check-out: 10<br>
                        <img src="img/svg/no-smoking.svg" class="hidden-xs" alt="image"> No Smoking <br>
                        <img src="img/svg/champagne-glass.svg" class="hidden-xs" alt="image"> No Parties <br>
                    </div>
                </div>
                <div class="col-xs-3 nopadding" style="text-align: center">
                    <a href="#reserve">60&euro; / night</a><br>
                    <a class="btn btn-primary btn-xs selectLaltraCamera" id="item1" role="button" href="#reserve" data-toggle="tooltip" title="Extra people: &euro;10 / night after the first guest" data-placement="bottom">
                    <span class="glyphicon glyphicon-check hidden-xs" aria-hidden="true"></span> Select Room!</a>
                </div>
            </div>
            <div class="row room2">
                <div class="col-xs-3 name nopadding text-center">
                  <a href="#rooms" class="openModalLaCameraRosa">La Camera Rosa</a>
                  <div class="leftpadding1em">
                    <button type="button" class="btn btn-primary btn-xs openModalLaCameraRosa">
                    <span class="glyphicon glyphicon-picture hidden-xs" aria-hidden="true"></span> View photos!</button>
                      <div class="modal fade modal-transparent modal-fullscreen" id="modalCameraRosa" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="padding: 0px;">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" style="padding:0px;">
                                  <div id="myCarouselCameraRosa" class="carousel slide" data-ride="carousel">
                                      <div class="carousel-inner" role="listbox">
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
                                      </div>
                                      <a class="left carousel-control carousel-transparent" href="#myCarouselCameraRosa" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control carousel-transparent" href="#myCarouselCameraRosa" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
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
                <div class="col-xs-3 nopadding text-center">
                    <div class="inlineblock">
                        <img src="img/svg/check-in.svg" class="hidden-xs" alt="image"> Check-in: Noon <br>
                        <img src="img/svg/alarm-clock.svg" class="hidden-xs" alt="image"> Check-out: 10<br>
                        <img src="img/svg/no-smoking.svg" class="hidden-xs" alt="image"> No Smoking <br>
                        <img src="img/svg/champagne-glass.svg" class="hidden-xs" alt="image"> No Parties <br>
                    </div>
                </div>
                <div class="col-xs-3 nopadding" style="text-align: center">
                    <a href="#reserve">50&euro; / night</a><br>
                    <a class="btn btn-primary btn-xs selectCameraRosa" id="item2" role="button" href="#reserve" data-toggle="tooltip" title="Extra people: &euro;10 / night after the first guest" data-placement="bottom">
                    <span class="glyphicon glyphicon-check hidden-xs" aria-hidden="true"></span> Select Room!</a>
                </div>
            </div>
            <div class="row room3">
                <div class="col-xs-3 name nopadding text-center">
                  <a href="#rooms" class="openModalCameraGialla">La Camera Gialla</a>
                  <div class="leftpadding1em">
                    <button type="button" class="btn btn-primary btn-xs openModalCameraGialla">
                      <span class="glyphicon glyphicon-picture hidden-xs" aria-hidden="true"></span> View photos!</button>
                      <div class="modal fade modal-transparent modal-fullscreen" id="modalCameraGialla" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="padding: 0px;">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" style="padding:0px;">
                                  <div id="carouselCameraGialla" class="carousel slide" data-ride="carousel">
                                      <div class="carousel-inner" role="listbox">
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
                                      </div>
                                      <a class="left carousel-control carousel-transparent" href="#carouselCameraGialla" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control carousel-transparent" href="#carouselCameraGialla" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
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
                <div class="col-xs-3 nopadding text-center">
                    <div class="inlineblock">
                        <img src="img/svg/check-in.svg" class="hidden-xs" alt="image"> Check-in: Noon <br>
                        <img src="img/svg/alarm-clock.svg" class="hidden-xs" alt="image"> Check-out: 10<br>
                        <img src="img/svg/no-smoking.svg" class="hidden-xs" alt="image"> No Smoking <br>
                        <img src="img/svg/champagne-glass.svg" class="hidden-xs" alt="image"> No Parties <br>
                    </div>
                </div>
                <div class="col-xs-3 nopadding" style="text-align: center">
                    <a href="#reserve">60&euro; / night</a><br>
                    <a class="btn btn-primary btn-xs selectCameraGialla" id="item3" role="button" href="#reserve" data-toggle="tooltip" title="Extra people: &euro;10 / night after the first guest" data-placement="bottom">
                    <span class="glyphicon glyphicon-check hidden-xs" aria-hidden="true"></span> Select Room!</a>
                </div>
            </div>
            <div class="row footer-rooms">
              <div class="col-xs-12 nopadding responsivefont" style="text-align:center;"><em>For more photos of the property, <a href="#rooms" class="openProperty"> click here</a>.</em></div>
            </div>
                  <div class="modal fade modal-transparent modal-fullscreen" id="myModalProperty" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="padding: 0px;">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" style="padding:0px;">
                              <div id="myCarouselProperty" class="carousel slide" data-ride="carousel">
                                  <div class="carousel-inner" role="listbox">
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
                                  </div>
                                  <a class="left carousel-control carousel-transparent" href="#myCarouselProperty" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="right carousel-control carousel-transparent" href="#myCarouselProperty" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                              </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                  </div>
        </div> -->
    <!-- ++++++++++++++++++++++++++++++++++++++  ROOMS - ALL END  +++++++++++++++++++++++++++++++++-->

    <!-- <br><br><br> -->

    <!-- ++++++++++++++++++++++++++++++++++++++  RESERVATIONS  +++++++++++++++++++++++++++++++++-->
       <!--      <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div id="reserve"><h1 class="header1">Reserve</h1></div>
                    <section>
                      <div class="container">
                        <div class="row">
                          <div class="col-md-10 col-md-offset-1">
                              <?php echo $result; ?>
                              <p>Please enter your information below to make a reservation</p>
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
                                    <div class="input-daterange input-group form-group" id="datepicker">
                                        <div class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        </div>
                                        <input type="text" class="input-sm form-control" name="start" placeholder="Check-in" />
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="end" placeholder="Check-out" />
                                        <div class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <textarea name="message" rows="5" class="form-control" placeholder="Please tell us more about your trip. For example, at what time do you plan on arriving? Do you have any special needs? Thanks!" required><?php echo $_POST['message']; ?></textarea>
                                    </div>
                                    <center><div class="g-recaptcha" data-sitekey="6LcX2gYUAAAAAEMBhjE9ykl5WTDFoL8t_KAxyLco"></div></center>
                                    <br>
                                    <div class="center">
                                      <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
                                    </div>
                                  </form>
                          </div>
                        </div>
                      </div>
                    </section>
                </div>
              </div>
            </div> -->
    <!-- ++++++++++++++++++++++++++++++++++++++  RESERVATIONS END  +++++++++++++++++++++++++++++++++-->

    <!--     <br><br><br> -->

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="bootstrap-datepicker.min.js"></script>
        <script src="validator.js"></script>
        <script src="override.js"></script>
    <!-- ++++++++++++++++++++++++++++++++++  JAVASCRIPT LINKS END  +++++++++++++++++++++++++++++++++-->
  </body>
</html>