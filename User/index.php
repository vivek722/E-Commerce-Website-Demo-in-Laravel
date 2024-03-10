<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <?php
    include('include/head.php');
    ?>
</head>

<body>
    <?php
    include('include/header.php');
    ?>
    <br/><br/><br/>
    <main>
        <div class="main-container">
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000" ;>
                <img src="images/p2.jpg" style="height: 550px;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">

                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="images/p7.jpg" class="d-block w-100" style="height: 550px;" alt="...">
                <div class="carousel-caption d-none d-md-block">

                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

        </div>






        <hr class="featurette-divider">
      
          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading fw-normal lh-1">rudraksha bracelet<span class="text-body-secondary">It’ll blow your mind.</span></h2>
              <p class="lead">Wearing Rudraksha beads can have positive effects on the nervous system, improving concentration, memory, and overall mental clarity. Rudraksha beads are protective charms and are believed to shield the wearer from negative energies, evil forces, and malefic planetary influences.</p>
            </div>
            <div class="col-md-5">
              <img src="images/p5.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text></svg>
            </div>
          </div>
      
          <hr class="featurette-divider">
      
          <div class="row featurette">
            <div class="col-md-7 order-md-2">
              <h2 class="featurette-heading fw-normal lh-1"> <span class="text-body-secondary">See for yourself.</span></h2>
              <p class="lead">Removes negative energy.<br/>
Improves sleep.<br/>
Improves energy layers.<br/>
Improves temperature of the body.<br/>
Improves focus.<br/>
Differentiates between clean water and the poisonous water.<br/>
Improves Physical Health.</p>
            </div>
            <div class="col-md-5 order-md-1">
              <img src="images/p2.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text></svg>
            </div>
          </div>
      
          <hr class="featurette-divider">
      
          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading fw-normal lh-1">some of the benefits of wearing a  <span class="text-body-secondary">Rudraksha</span></h2>
              <p class="lead">Rudraksha beads calm the mind, reduce stress, anxiety, and depression, while enhancing spiritual growth and self-awareness. Wearing Rudraksha beads can have positive effects on the nervous system, improving concentration, memory, and overall mental clarity.</p>
            </div>
            <div class="col-md-5">
              <img src="images/p3.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text></svg>
            </div>
          </div>
      
          <hr class="featurette-divider">
      
          
    </main>
    
    <?php
    include('include/footer.php');
    ?>

    <script src="js/main.js"></script>
    <script src="../user/bootstrap/js/bootstrap.min.js"></script>
    <script src="../user/js/main.js"></script>
    <script>
        activateLink('home');
    </script>
</body>

</html>