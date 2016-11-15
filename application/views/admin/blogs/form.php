<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('', array('role'=>'form','enctype'=>'multipart/form-data')); ?>

    <?php // hidden id
     //var_dump($personals);
     ?>
    <?php if (isset($blog_id)) : ?>
        <?php echo form_hidden('id', $blog_id); ?>
    <?php endif; ?>

    <div class="row">
        <?php // Name ?>
        <div class="form-group col-sm-4<?php echo form_error('title') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('blog input article_name'), 'title', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'title', 'value'=>set_value('title', (isset($blog['title']) ? $blog['title'] : '')), 'class'=>'form-control')); ?>
        </div>
    </div>

    <div class="row">
        <?php // Article Body ?>
        <div class="form-group col-sm-4<?php echo form_error('article') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('blog input article_body'), 'article', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_textarea(array('name'=>'article', 'value'=>set_value('article', (isset($blog['article']) ? $blog['article'] : '')), 'class'=>'form-control')); ?>
        </div>
    </div>

    <div class="row">
        <?php // picture ?>
        <div class="form-group col-sm-6<?php echo form_error('image') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('blog input image'), 'image', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_upload(array('name'=>'image', 'value'=>set_value('image', (isset($portfilio['image']) ? $portfilio['image'] : '')), 'class'=>'form-control')); ?>
        </div>

    </div>


    <div class="row">
        <?php // Category ?>
        <div class="form-group col-sm-4<?php echo form_error('category') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('blog input category'), 'category', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'category', 'value'=>set_value('category', (isset($blog['category']) ? $blog['category'] : '')), 'class'=>'form-control')); ?>
        </div>
        <?php // Author Name ?>
        <div class="form-group col-sm-4<?php echo form_error('author') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('blog input author_name'), 'author', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'author', 'value'=>set_value('author', (isset($blog['author']) ? $blog['author'] : '')), 'class'=>'form-control')); ?>
        </div>
    </div>

    <div class="row">

    </div>






    </div>




    <?php // buttons ?>
    <div class="row pull-right">
        <a class="btn btn-default" href="<?php echo $cancel_url; ?>"><?php echo lang('core button cancel'); ?></a>
        <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> <?php echo lang('core button save'); ?></button>
    </div>

<?php echo form_close(); ?>
