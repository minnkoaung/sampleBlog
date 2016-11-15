<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!-- Blog Grid Section -->
    <section id="blog" style="padding-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Welcome from my blog</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row" >
                <?php foreach ($blogs['results'] as $blog):?>
                <div class="col-xs-12 col-sm-6 col-md-4 blog-grid">
                  <input type="hidden" name="id" value="  <?php echo $blog['id']; ?>">
                    <div class="thumbnail">
                        <!-- <img data-src="holder.js/300x200" alt="..."> -->
                        <img src="uploads/<?php echo $blog['image']; ?>" class="img-responsive" alt="<?php echo $blog['image']; ?>" width:"300" height="200">
                        <div class="caption">
                            <small class="badge">Wrote at : <?php echo $blog['created_at']; ?></small>
                            <small class="badge pull-right">By : <?php echo $blog['author']; ?></small>
                            <hr>
                            <h3 style="text-align: center;margin-bottom: 12px;"><?php echo $blog['title']; ?></h3>
                            <hr>

                            <p style="margin-top: 10px;">
                                  <?php
                                    $myArticle = $blog['article'];
                                    $cutted = substr($myArticle, 0,500);
                                    echo $cutted . "....";
                                  ?>
                            </p>
                            <p>
                            <a href="<?php echo base_url('blog/articleDetail/'.$blog['id']); ?>" class="btn btn-info btn-lg" role="button">      <i class="fa fa-search-plus"></i> Full Article</a>
                            <!-- <a name="<?php //echo $blog['id'] ?>"  href="<?php //echo base_url('/articleDetail'); ?>" class="btn btn-info btn-lg" role="button">      <i class="fa fa-search-plus"></i> Full Article</a> -->
                        </div>
                    </div>
                </div> <!-- blog-grid end -->
              <?php endforeach; ?>



                <!-- <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="themes/<?php //echo $this->settings->theme; ?>/img/portfolio/cake.png" class="img-responsive" alt="">
                        <h1>Post Title</h1>
                        <p style="background:#fff !important;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et molestiae impedit animi hic nemo natus unde expedita incidunt architecto doloribus nulla dolore odit nam perspiciatis, tempore rerum corrupti aspernatur minima.</p>
                        <a href="" class="btn btn-primary btn-block">Detail</a>
                    </a>
                </div> -->

                <!-- <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>

                       <img src="themes/<?php //echo $this->settings->theme; ?>/img/portfolio/circus.png" class="img-responsive" alt="">

                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>

                        <img src="themes/<?php //echo $this->settings->theme; ?>/img/portfolio/game.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>

                         <img src="themes/<?php // echo $this->settings->theme; ?>/img/portfolio/safe.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="themes/<?php //echo $this->settings->theme; ?>/img/portfolio/submarine.png" class="img-responsive" alt="">
                    </a>
                </div>
            </div> -->
        </div>
    </section>


    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <?php foreach($personals['results'] as $personal): ?>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <p><?php echo $personal['description']; ?></p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="https://www.linkedin.com/in/minnkoaung" class="btn btn-lg btn-outline">
                        <i class="fa fa-linkedin"></i> | My LinkedIn Profile
                        </a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Contact Section -->
                </div>
            </div>
        </div>
    </section>



























<!-- <p><?php //echo lang('welcome content view_location'); ?></p>
<code>application/views/welcome.php</code>

<div class="clearfix"><br /></div>

<p><?php //echo lang('welcome content controller_location'); ?></p>
<code>application/controllers/Welcome.php</code>

<div class="clearfix"><hr /></div>

<p><?php //echo lang('welcome content ci_docs'); ?></p>

<div class="clearfix"><hr /></div>

<p><a href="<?php //echo base_url('api/users'); ?>"><?php //echo lang('welcome content click_here'); ?></a>: <?php //echo lang('welcome content sample_api'); ?></p>

<div class="clearfix"><hr /></div>

<p><a href="<?php //echo base_url('profile'); ?>"><?php //echo lang('welcome content click_here'); ?></a>: <?php //echo lang('welcome content sample_profile'); ?></p>
<p>
    <?php //echo lang('welcome content username'); ?>: <strong>johndoe</strong><br />
    <?php //echo lang('welcome content or_email'); ?>: <strong>john@doe.com</strong><br />
    <?php //echo lang('welcome content password'); ?>: <strong>johndoe</strong>
</p>

<div class="clearfix"><hr /></div>

<p><a href="<?php //echo base_url('admin'); ?>"><?php //echo lang('welcome content click_here'); ?></a>: <?php //echo lang('welcome content sample_admin'); ?></p>
<p>
    <?php //echo lang('welcome content username'); ?>: <strong>admin</strong><br />
    <?php //echo lang('welcome content or_email'); ?>: <strong>admin@admin.com</strong><br />
    <?php //echo lang('welcome content password'); ?>: <strong>admin</strong>
</p> -->
