<?php $this->load->view('header'); ?>

<?php echo form_open('shorten', array('name' => 'ajax_form', 'id' => 'ajax_form', 'class'=>'form-horizontal')); ?>

<div id="alias" class="alert">Simple URL shortener</div>

<div class="well" style="text-align: center;">

    <?php
    $data = array(
        'name' => 'url',
        'id' => 'url',
        'class' => 'span6',
        'placeholder' => 'Please enter a full length URL and press \'Shorten\''
    );
    echo form_input($data);
    ?>

    <?php
    $data = array(
        'name' => 'shorten_url',
        'id' => 'shorten_url',
        'value' => 'Shorten',
        'class' => 'btn btn-info'
    );
    echo form_submit($data);
    ?>

</div>


<?php echo form_close(); ?>

<?php $this->load->view('footer'); ?>