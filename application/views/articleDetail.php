<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Minn Ko Aung</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../../themes/<?php echo $this->settings->theme; ?>/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../themes/<?php echo $this->settings->theme; ?>/css/freelancer.css">
    <link rel="stylesheet" href="../../themes/<?php echo $this->settings->theme; ?>/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom CSS -->
   <!--  <link href="../css/portfolio-item.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php // Navigation ?>
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="http://localhost/minnkoaung/public/">Minn Ko Aung</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a href="http://localhost/minnkoaung/public/#portfolio">Portfolio</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
<body id="page-top" class="index" style="margin-top: 85px;">
    <!-- Blog Grid Section -->
    <section id="blog" style="padding-top:25px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2> <?php echo $blogs['title']; ?></h2>
                    <div class="container" style="padding:10px;height: 350px; border:2px solid #eaeaea; overflow: hidden;">
                    <img src="../../uploads/<?php echo $blogs['image']; ?>"  alt="<?php echo $blogs['image']; ?>">
                    </div>
                    <small>Authour : <?php echo $blogs['author']; ?> |</small>
                    <small> Wrote at : <?php echo $blogs['created_at']; ?></small>
                    <p style="text-align:left;padding: 10px;line-height: 1.5em;"><?php echo $blogs['article']; ?></p>
                </div>
            </div>
    </section>
 
<!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>815. Manpyae 2nd Street
                            <br>Tharketa Tsp, Yangon, Myanmar.</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Feel free at my blog</h3>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem eius reiciendis blanditiis officia, deleniti laboriosam iure expedita. <br> <a class="btn btn-success btn-sm" href="<?php echo base_url('/blog'); ?>">To My Blog</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                       <small class="text-muted">
                <?php echo lang('core text page_rendered'); ?>
                | Powered by CodeIgniter v<?php echo CI_VERSION; ?>
                <?php //echo $this->settings->site_name; ?> <?php //echo $this->settings->site_version; ?>
                | <a href="http://minnkoaung.github.io/myporfilio/" target="_blank">Github.com</a>
            </small>
                    </div>
                </div>
            </div>
        </div>

    </footer>



        

    </div>
    <!-- /.container -->
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <?php // Javascript files ?>
    <?php if (isset($js_files) && is_array($js_files)) : ?>
        <?php foreach ($js_files as $js) : ?>
            <?php if ( ! is_null($js)) : ?>
                <?php echo "\n"; ?><script type="text/javascript" src="<?php echo $js; ?>?v=<?php echo $this->settings->site_version; ?>"></script><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($js_files_i18n) && is_array($js_files_i18n)) : ?>
        <?php foreach ($js_files_i18n as $js) : ?>
            <?php if ( ! is_null($js)) : ?>
                <?php echo "\n"; ?><script type="text/javascript"><?php echo "\n" . $js . "\n"; ?></script><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    

</body>

</html>
