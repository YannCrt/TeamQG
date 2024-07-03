<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Footer with Social icons</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

<footer class="mainfooter" role="contentinfo">
  <div class="footer-middle">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <!-- Column1 -->
          <div class="footer-pad">
            <h4>Newsletter</h4>
            <!-- Newsletter Form -->
            <div class="newsletter">
              <form action="/subscribe" method="post">
                <input type="text" name="firstname" placeholder="First Name" required>
                <input type="text" name="lastname" placeholder="Last Name" required>
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit">Confirmer</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <!-- Column2 -->
          <div class="footer-pad">
            <h4>Contact</h4>
            <ul class="list-unstyled">
              <li>Nom de l'association : Team Qg</li>
              <li>Adresse : 4 Impasse Barrier 75012 Paris</li>
              <li>Numéro de téléphone : +33 6 65 41 57 79</li>
              <li>Directeur de la publication : schahmanecheerwan@gmail.com</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <h4>Suivez-nous</h4>
          <ul class="social-network social-circle">
            <li><a href="https://www.instagram.com/team__qg/" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
          </ul>        
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12 copy">
          <p class="text-center">&copy; Font made from ONLINE WEB FONTS is licensed by CC BY 3.0</p>
        </div>
      </div>
    </div>
  </div>
</footer>

</body>
</html>
