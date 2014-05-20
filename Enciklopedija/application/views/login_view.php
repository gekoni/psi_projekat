<div style="width: 30%; margin-left: 40%; margin-right: 30%; padding-top: 20px; padding-bottom: 20px;">
    <?php echo validation_errors('<p class="errorMessageBox">', '</p>'); ?>
    <?php echo form_open('login/auth'); ?>
    <div class="label"><p>Korisnicko ime</p></div>
    <?php echo form_input('username', set_value('username')); ?>  
    <div class="label"><p>Lozinka</p></div>
    <?php echo form_password('password', set_value('password')); ?>
    <br/>
    <br/>
    <?php 
    $config = array (
        'value' => 'Prijava',
        'class' => 'button',
        'style' => 'margin-left: 30px;'
    );
    echo form_submit($config); 
    ?>
    <?php echo form_close(); ?>
    <br/>
    <br/>
    <div class="label" style="text-decoration: underline;">
        <a href="<?php echo base_url(); ?>index.php/registracija">Zelite da postanete korisnik?</a>
        <br/>
        <br/>
        <a href="<?php echo base_url(); ?>index.php/login/continueAsUnregistered">Nastavi dalje kao neregistrovan korisnik</a>
        <br/>
        <br/>
    </div>
</div>



