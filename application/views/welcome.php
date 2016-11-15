<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php // display welcome message from admin settings ?>
<?php //echo $welcome_message; ?>
<!-- Header -->
    <header style="margin-top: -20px;">
        <div class="container">
            <div class="row">
                <?php foreach($personals['results'] as $personal): ?>
                <div class="col-lg-12" style="margin-top: -70px;">
                    <!-- <img class="img-responsive" src="img/profile.png" alt=""> -->
                    <img class="img-responsive" src="uploads/<?php echo $personal['image']; ?>" alt="">

                    <div class="intro-text">
                        <!-- <span class="name">Minn Ko Aung</span> -->
                        <span class="name">I'm <?php echo $personal['name']; ?></span>
                        <hr class="star-light">
                        <span class="skills"><?php echo $personal['title']; ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Portfolio</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <?php foreach($portfilios['results'] as $portfilio): ?>
                <div class="col-sm-4 portfolio-item">
                    <a href="<?php echo $portfilio['link']; ?>" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <h3 style="margin-top: -10px;"><?php echo $portfilio['name']; ?></h3>
                                <i class="fa fa-search-plus fa-3x" style="margin-top: 10px;"></i>
                            </div>
                        </div>
                        <!-- <img src="img/portfolio/cabin.png" class="img-responsive" alt=""> -->
                        <img src="uploads/<?php echo $portfilio['image'];?>" class="img-responsive" alt="">
                    </a>
                </div>
            <?php endforeach; ?>
                <!-- <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>

                        <img src="themes/<?php //echo $this->settings->theme; ?>/img/portfolio/cake.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
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
                </div> -->
            </div>
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
    <section id="contact">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <?php echo form_open('', array('role'=>'form')); ?>

    <div class="row">
        <?php  // name ?>
        <div class="form-group col-xs-12 floating-label-form-group controls<?php echo form_error('name') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('contact input name'), 'name', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'name', 'value'=>set_value('name'), 'class'=>'form-control','placeholder'=>'Your Name')); ?>
        </div>
    </div>

    <div class="row">
        <?php  // email ?>
        <div class="form-group col-xs-12 floating-label-form-group controls<?php echo form_error('email') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('contact input email'), 'email', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'email', 'value'=>set_value('email'), 'class'=>'form-control', 'placeholder'=>'Your Email')); ?>
        </div>
    </div>

    <div class="row">
        <?php  // message title ?>
        <div class="form-group col-xs-12 floating-label-form-group controls<?php echo form_error('title') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('contact input title'), 'title', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'title', 'value'=>set_value('title'), 'class'=>'form-control', 'placeholder'=>'Message Title')); ?>
        </div>
    </div>

    <div class="row">
        <?php  // messsage body ?>
        <div class="form-group col-xs-12 floating-label-form-group controls<?php echo form_error('message') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('contact input message'), 'message', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_textarea(array('name'=>'message', 'value'=>set_value('message'), 'class'=>'form-control','placeholder'=>'Enter Your Message Here!')); ?>
        </div>
    </div>

    <!-- <div class="row">
        <?php  // captcha ?>
        <div class="form-group col-sm-6<?php //echo form_error('captcha') ? ' has-error' : ''; ?>">
            <?php //echo form_label(lang('contact input captcha'), 'captcha', array('class'=>'control-label')); ?>
            <br />
            <?php //echo $captcha_image; ?>
            <?php //echo form_input(array('name'=>'captcha', 'id'=>'captcha', 'value'=>"", 'class'=>'form-control')); ?>
        </div>
    </div> -->

    <?php // buttons ?>
    <div class="row">
        <div class="form-group col-sm-6">

            <button type="submit" name="submit" class="btn btn-success btn-lg" style="margin-top: 10px;"><span class="glyphicon glyphicon-envelope"></span> Send</button>
        </div>
    </div>

<?php echo form_close(); ?>
                    <!-- <form name="sentMessage" id="contactForm" >
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-send"></i> Send</button>
                            </div>
                        </div>
                    </form> -->
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
