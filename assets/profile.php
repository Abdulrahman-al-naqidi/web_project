<?php require_once ('header.php');

$user = unserialize($_SESSION["user"]);
$mypost = $user->store_post($user->id);
?>
<section class="w-100 px-4 py-5" style="background-color: #9de2ff; border-radius: .5rem .5rem 0 0;">
    <div class="row d-flex justify-content-center">
        <div class="col col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                alt="Generic placeholder image" class="img-fluid"
                                style="width: 180px; border-radius: 10px;">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1"><?= $user->name ?></h5>
                            <p class="mb-2 pb-1"><?= $user->role ?></p>
                            <div class="d-flex justify-content-start rounded-3 p-2 mb-2 bg-body-tertiary">
                                <div>
                                    <p class="small text-muted mb-1">Articles</p>
                                    <p class="mb-0">41</p>
                                </div>
                                <div class="px-3">
                                    <p class="small text-muted mb-1">Followers</p>
                                    <p class="mb-0">976</p>
                                </div>
                                <div>
                                    <p class="small text-muted mb-1">Rating</p>
                                    <p class="mb-0">8.5</p>
                                </div>
                            </div>
                            <div class="d-flex pt-1">
                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary flex-grow-1">Follow</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-6 offset-3 bg-info mt-5 round-2 pt-5">
        <h1 class="text-white">share your idea</h1>
        <?php
        if (isset($_GET["msg"]) && $_GET["msg"] == ['done']) {
            ?>
            <div class="alert alert-success" role="alert">
                <strong>done</strong> post added sucssefuly
            </div>
            <?php
        }

        ?>
         <?php
        if (isset($_GET["msg"]) && $_GET["msg"] == ['required_fields']) {
            ?>
            <div class="alert alert-danger" role="alert">
                <strong>empty field</strong> 
            </div>
            <?php
        }

        ?>
           

            <form action="storePost.php" method="post" enctype="multipart/form-data">
            <div class="col-6 offset-3 bg-info mt-5 round-2 ">
                    <div class="mb-3">
                        <label for="" class="form-label">title</label>
                        <input type="text" name="title" id="" class="form-control" placeholder=""
                            aria-describedby="helpId">

                    </div>

                </div>
        </div>
        <div class="col-6 offset-3 bg-info mt-5 round-2 ">
            <div class="mb-3">
                <label for="" class="form-label">content</label>
                <textarea type="text" name="content" id="" class="form-control" placeholder=""
                    aria-describedby="helpId"></textarea>
              
            </div>
            <div class="mb-3">
                <label for="" class="form-label">image</label>
                <input type="file" name="image" id="" class="form-control" placeholder=""
                    aria-describedby="helpId"></input>
               
            </div>
            <button type="submit" class="btn btn-primary my-5">
                Submit
            </button>


        </div>
    </div>
    <?php
    foreach ($mypost as $post) {
        ?>


        <div class="col-6 offset-3 bg-info mt-5 round-2 ">
            <div class="card">
                <?php
                if(!empty($post["image"])){
                    ?><img class="card-img-top" src="<?= $post["image"] ?>" alt="Title" /><?php
                }
                
                ?>
               
                <div class="card-body">
                    <h4 class="card-title"><?= $post["title"] ?></h4>
                    <p class="card-text"><?= $post["content"] ?></p>
                </div>
            </div>
        </div>

        <?php
    }
    ?>
    <form action="store_comment.php" method="post">
    <input type="text" name="comment">
    <input type="hidden" name="post_id" value="<?= $post_id["id"] ?>">
     <?php
     $comments = $user->get_post_comments($post_id["id"]);
     var_dump($comments);
     ?>
    </form>
    </form>
</div>




<?php require_once ('footer.php'); ?>