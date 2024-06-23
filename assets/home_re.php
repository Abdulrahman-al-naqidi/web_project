<?php require_once('header.php');
?>

  <main>

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">welcome <?= $user->name   ?></h1>
          <p class="lead text-body-secondary"></p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
        </div>
      </div>
    </section>

    <div class="album py-5 bg-body-tertiary">
      <div class="container">

        <div class="row">
         <div class="col-8 offset-2">
          <div class="card my-5">
            <img class="card-img-top" src="holder.js/100x180/" alt="Title" />
            <div class="card-body">
              <h4 class="card-title">Title</h4>
             <p class="card-text">Text</p>
            </div> 
          </div>
          <div class="card my-5">
            <img class="card-img-top" src="holder.js/100x180/" alt="Title" />
            <div class="card-body">
              <h4 class="card-title">Title</h4>
             <p class="card-text">Text</p>
            </div> 
          </div>
          
         </div>
        </div>
      </div>
    </div>

  </main>


  <?php require_once('footer.php');?>

