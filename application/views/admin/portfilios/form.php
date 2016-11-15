<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('', array('role'=>'form','enctype'=>'multipart/form-data')); ?>

    <?php // hidden id
     //var_dump($personals);
     ?>
    <?php if (isset($portfilio_id)) : ?>
        <?php echo form_hidden('id', $portfilio_id); ?>
    <?php endif; ?>

    <div class="row">
        <?php // Name ?>
        <div class="form-group col-sm-4<?php echo form_error('name') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('portfilios input portfilio_name'), 'name', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'name', 'value'=>set_value('name', (isset($portfilio['name']) ? $portfilio['name'] : '')), 'class'=>'form-control')); ?>
        </div>
    </div>

    <div class="row">
        <?php // Description ?>
        <div class="form-group col-sm-4<?php echo form_error('description') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('portfilios input description'), 'description', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_textarea(array('name'=>'description', 'value'=>set_value('description', (isset($portfilio['description']) ? $portfilio['description'] : '')), 'class'=>'form-control')); ?>
        </div>
    </div>


    <div class="row">
        <?php // Link/URL ?>
        <div class="form-group col-sm-4<?php echo form_error('link') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('portfilios input link'), 'link', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_input(array('name'=>'link', 'value'=>set_value('link', (isset($portfilio['link']) ? $portfilio['link'] : '')), 'class'=>'form-control')); ?>
        </div>
    </div>

    <div class="row">
        <?php // picture ?>
        <div class="form-group col-sm-6<?php echo form_error('image') ? ' has-error' : ''; ?>">
            <?php echo form_label(lang('portfilios input image'), 'image', array('class'=>'control-label')); ?>
            <span class="required">*</span>
            <?php echo form_upload(array('name'=>'image', 'value'=>set_value('image', (isset($portfilio['image']) ? $portfilio['image'] : '')), 'class'=>'form-control')); ?>
        </div>

    </div>

    </div>
    

    

    <?php // buttons ?>
    <div class="row pull-right">
        <a class="btn btn-default" href="<?php echo $cancel_url; ?>"><?php echo lang('core button cancel'); ?></a>
        <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> <?php echo lang('core button save'); ?></button>
    </div>

<?php echo form_close(); ?>
