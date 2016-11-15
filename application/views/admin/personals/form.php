<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('', array('role'=>'form','enctype'=>'multipart/form-data')); ?>

    <?php // hidden id
     //var_dump($personals);
     ?>
    <?php if (isset($personal_id)) : ?>
        <?php echo form_hidden('id', $personal_id); ?>
    <?php endif; ?>

    <div class="row">
        <?php // title ?>
        <div class="form-group col-sm-4<?php echo form_error('name') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('personals input person_name'), 'name', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'name', 'value'=>set_value('name', (isset($personal['name']) ? $personal['name'] : '')), 'class'=>'form-control')); ?>
        </div>
    </div>

    <div class="row">
        <?php // title ?>
        <div class="form-group col-sm-4<?php echo form_error('title') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('personals input title'), 'name', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'title', 'value'=>set_value('title', (isset($personal['title']) ? $personal['title'] : '')), 'class'=>'form-control')); ?>
        </div>
    </div>


    <div class="row">
        <?php // description ?>
        <div class="form-group col-sm-4<?php echo form_error('description') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('personals input description'), 'description', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_textarea(array('name'=>'description', 'value'=>set_value('description', (isset($personal['description']) ? $personal['description'] : '')), 'class'=>'form-control')); ?>
        </div>
    </div>

    <div class="row">
        <?php // picture ?>
        <div class="form-group col-sm-6<?php echo form_error('image') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('personals input image'), 'image', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_upload(array('name'=>'image', 'value'=>set_value('image', (isset($personal['image']) ? $personal['image'] : '')), 'class'=>'form-control')); ?>
        </div>

    </div>

    </div>
    

    

    <?php // buttons ?>
    <div class="row pull-right">
        <a class="btn btn-default" href="<?php echo $cancel_url; ?>"><?php echo lang('core button cancel'); ?></a>
        <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> <?php echo lang('core button save'); ?></button>
    </div>

<?php echo form_close(); ?>
