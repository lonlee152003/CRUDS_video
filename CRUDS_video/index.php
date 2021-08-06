<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        session_start();
        require './dbconnection.php';
        ?>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Landing Page - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <a class="btn btn-primary" href="#signup">Sign Up</a>
            </div>
        </nav>
         Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <form action="save_query.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control form-control-lg" name="video" type="file" placeholder="Upload"/>
                                    </div>
                                    <div class="col-auto"><button name="save" class="btn btn-primary btn-lg"type="submit">Upload</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row">
                    <?php
                    $index_select_pdo = db_config();

                    $index_select = $index_select_pdo->prepare("SELECT * FROM video");
                    $index_select->execute();

                    $index_select_count = $index_select->rowCount();
                    $index_select_post = $index_select->fetchAll();

                    if( $index_select_count > 0 )
                    {
                        ?>
                        <center><h1>Video files here!</h1></center>    
                        <?php
                        foreach( $index_select_post as $index_select_viewpost )
                        {
                    ?>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            
                            <h3>Video name</h3>
                            <p class="lead mb-0"><?php echo $index_select_viewpost->video_name; ?></p>
                            <video width="100%" height="240" controls>
					<source src="<?php echo $index_select_viewpost->location; ?>">
                            </video>
                            <?php
                            $_SESSION['id'] = $index_select_viewpost->id;
                            $_SESSION['location'] = $index_select_viewpost->location;
                            ?>
                            <a href='./delete.php'>Delete</a>
                            <span>/</span>
                            <a href='./Edit.php'>Edit</a>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
