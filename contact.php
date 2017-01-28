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

    <!-- ++++++++++++++++++++++++++++++ TOP BAR +++++++++++++++++++++++++++++++++++++++++-->
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
    <!-- ++++++++++++++++++++++++++++++ TOP BAR END +++++++++++++++++++++++++++++++++++++++++-->
    <!-- ++++++++++++++++++++++++++++++ NAVBAR  +++++++++++++++++++++++++++++++++++++++++-->
      <nav class="navbar navbar-default ontop">
        <div class="container-fluid"  data-spy="affix" data-offset-top="40">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <img src="http://albergodiieri.com/img/logo.jpg" class="pull-left" style="height: 35px; margin-top: 5px;">
            <a class="navbar-brand" href="#" style="margin-left: -29px;">Albergo di Ieri</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php">Home</a></li>
              <li><a href="gallery.html">Gallery</a></li>
              <li><a href="contact.php">Contact</a></li>
          <!--<li><div class="dropdown">
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
                  </div>
                </li> -->
            </ul>
          </div>
        </div>
      </nav>
    <!-- ++++++++++++++++++++++++++++++ NAVBAR END ++++++++++++++++++++++++++++++++++++++-->
    <!-- ++++++++++++++++++++++++++++++ GOOGLE MAP ++++++++++++++++++++++++++++++++++++++-->
      <div class="row titlerow">
          <div class="col-sm-5 col-xs-4"><hr></div>
          <div class="col-sm-2 col-xs-4"><h2 class="text-center" style="color: #5e5e5e">Google Maps</h2></div>
          <div class="col-sm-5 col-xs-4"><hr></div>
      </div>
      <div class="googlemap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d738459.7306103226!2d12.64948400331963!3d43.067546735327284!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf57476262fbf86e2!2sL&#39;Albergo+di+Ieri!5e0!3m2!1sen!2sus!4v1485597272179" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen></iframe>
      </div>
    <!-- ++++++++++++++++++++++++++++++ GOOGLE MAP END ++++++++++++++++++++++++++++++++++++++-->
    <!-- ++++++++++++++++++++++++++++++ WHERE ARE WE ++++++++++++++++++++++++++++++++++++++-->
    <div class="row titlerow">
        <div class="col-sm-5 col-xs-4"><hr></div>
        <div class="col-sm-2 col-xs-4"><h2 class="text-center" style="color: #5e5e5e">Where are we?</h2></div>
        <div class="col-sm-5 col-xs-4"><hr></div>
    </div>
    <div class="contactus">
      <p>
        Located in the Appenine mountains in the heart of Italy surrounded by fresh, clean air and immaculate nature perfect for discovering the beauty of central Italy, as well as cycling, hiking, skiing or simply resting.
      </p>
      <h3>From the Air</h3>
      <div style="padding-left: 10px;">
        <h4>From Rome - airport: approximately 4 hours</h4>
          <ul>
            <li>
              Take a train or bus from the Fiumicino or Ciampino airport to Termini train station.
            </li>
            <li>
              Take a <a href="http://www.trenitalia.com/tcom-en">train</a> from the Termini train station in Rome to Foligno station. This will take around 1 hour and 45 minutes and cost 10€.
            </li>
            <li>
              Take a <a href="http://www.contrammobilita.it/index.php/orari-e-itinerari-contram/">bus</a> from Foligno to Serravalle. This will take about 45 minutes
            </li>
          </ul>
        <h4>From Perugia - airport: approximately 3 hours</h4>
          <ul>
            <li>Take the bus E422 from the San Francesco d'Assisi airport in Perugia to the train station</li>
            <li>Take the train from Perugia to Foligno. This should take about 30 minutes and cost 4€.</li>
            <li>Take a <a href="http://www.contrammobilita.it/index.php/orari-e-itinerari-contram/">bus</a> from Foligno to Serravalle. This will take about 45 minutes</li>
          </ul>
        <h4>From Ancona airport: approximately 3 hours</h4>
          <ul>
            <li>Land in <a href="http://aeroportomarche.regione.marche.it/" target="_blank">Aeroporto delle Marche</a> with flights from Tirana, Rome - Fiumicino, and Munich</li>
            <li>Take the <a href="http://www.trenitalia.com/tcom-en">train</a> from Castelferretti to Foligno - takes about 2 hours and costs about 8,50€</li>
            <li>We would be happy to pick you up in Foligno. Please give us some advance notice. We'll try to accomodate you as best as we can.</li>
          </ul>
      </div>
      <h3>Trains and Busses</h3>
      <div style="padding-left: 10px;">
        <h4>Trainstations</h4>
          <p>
            The closest train stations are Foligno, Tolentino, Gualdo Tadino, and Nocera Umbra.
          </p>
        <h4>Busses</h4>
          <p>
            There are busses from the train stations listed above. Please review their <a href="http://www.contrammobilita.it/index.php/orari-e-itinerari-contram/">hours and availability</a>.
          </p>
        <h4>Private transport</h4>
          <p>
            For other options and private transport, please contact us below.
          </p>
      </div>
    </div>
    <!-- ++++++++++++++++++++++++++++++ WHERE ARE WE END ++++++++++++++++++++++++++++++++++++++-->

    <!-- ++++++++++++++++++++++++++++++ CONTACT FORM ++++++++++++++++++++++++++++++++++++++-->
      <div class="row titlerow">
          <div class="col-sm-5 col-xs-4"><hr></div>
          <div class="col-sm-2 col-xs-4"><h2 class="text-center" style="color: #5e5e5e">Contact Us</h2></div>
          <div class="col-sm-5 col-xs-4"><hr></div>
      </div>

      <div class="container">
          <div class="row">
            <div class="col-md-12">
              <!-- <div id="reserve"><h1 class="header1">Contact</h1></div> -->
                <section>
                  <div class="container">
                    <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                          <?php echo $result; ?>
                          <p>Please send us a message. We would be happy to accomodate you.</p>
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
                                <center><div class="g-recaptcha" data-sitekey="6Ld6IBMUAAAAAGD9SMU-p-zfZQDPSqdp_6Hmm48q"></div></center>
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
        </div>
    <!-- ++++++++++++++++++++++++++++++ CONTACT FORM END ++++++++++++++++++++++++++++++++++++++-->

    <!-- ++++++++++++++++++++++++++++++++++++++  FOOTER  +++++++++++++++++++++++++++++++++-->
      <div class="footer" style="margin-top: 20px;">
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