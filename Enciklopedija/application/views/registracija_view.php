
<div style="width: 40%; margin-left: 35%; margin-right: 35%; padding-top: 35px; padding-bottom: 35px;">
    <div class="contentTitle"><h2>Registracija novog korisnika</h2></div>
    <!--<?php
    if (validation_errors()) {
        ?>
            <div style="background: red; color: white;">
        <?php echo validation_errors(); ?>
            </div>
        <?php
    }
    ?>-->


    <?php echo form_open('registracija/uspesnaRegistracija'); ?>

    <div class="label"> 
        <p><?php echo form_label('Korisnicko ime', 'username') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('username'); ?>
        </div>
        <?php
        $data_form = array(
            'name' => 'username',
            'size' => 35,
            'id' => 'username',
            'value' => set_value('username')
        );

        echo form_input($data_form);
        ?> 
        </p>

        <p><?php echo form_label('Lozinka', 'lozinka') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('lozinka'); ?>
        </div>
        <?php
        $data_form = array(
            'name' => 'lozinka',
            'size' => 35,
            'id' => 'lozinka',
            'value' => set_value('lozinka')
        );
        echo form_password($data_form);
        ?> 
        </p>

        <p><?php echo form_label('Potvrdi lozinku', 'lozinka_potvrda') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('lozinka_potvrda'); ?>
        </div>
        <?php
        $data_form = array(
            'name' => 'lozinka_potvrda',
            'size' => 35,
            'id' => 'lozinka_potvrda',
            'value' => set_value('lozinka_potvrda')
        );
        echo form_password($data_form);
        ?> 
        </p>

        <p><?php echo form_label('Ime', 'ime') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('ime'); ?>
        </div>
        <?php
        $data_form = array(
            'name' => 'ime',
            'size' => 35,
            'id' => 'ime',
            'value' => set_value('ime')
        );
        echo form_input($data_form);
        ?> 
        </p>

        <p><?php echo form_label('Prezime', 'prezime') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('prezime'); ?>
        </div>
        <?php
        $data_form = array(
            'name' => 'prezime',
            'size' => 35,
            'id' => 'prezime',
            'value' => set_value('prezime')
        );
        echo form_input($data_form);
        ?>
        </p>


        <p><?php echo form_label('Ulica', 'ulica') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('ulica'); ?>
        </div>
        <?php
        $data_form = array(
            'name' => 'ulica',
            'size' => 35,
            'id' => 'ulica',
            'value' => set_value('ulica')
        );
        echo form_input($data_form);
        ?>

        </p>

        <p><?php echo form_label('Broj', 'broj') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('broj'); ?>
        </div>
        <?php
        $data_form = array(
            'name' => 'broj',
            'size' => 35,
            'id' => 'broj',
            'value' => set_value('broj')
        );
        echo form_input($data_form);
        ?>

        </p>

        <p><?php echo form_label('Grad', 'grad') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('grad'); ?>
        </div>
        <?php
        $data_form = array(
            'name' => 'grad',
            'size' => 35,
            'id' => 'grad',
            'value' => set_value('grad')
        );
        echo form_input($data_form);
        ?>

        </p>

        <p><?php echo form_label('Telefon', 'telefon') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('telefon'); ?>
        </div>
        <?php
        $data_form = array(
            'name' => 'telefon',
            'size' => 35,
            'id' => 'telefon',
            'value' => set_value('telefon')
        );
        echo form_input($data_form);
        ?>    
        </p>

        <p><?php echo form_label('Email', 'email') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('email'); ?>
        </div>
        <?php
        $data_form = array(
            'name' => 'email',
            'size' => 35,
            'id' => 'email',
            'value' => set_value('email')
        );
        echo form_input($data_form);
        ?> 

        </p>

    </div>

    <br />
    <br />
    <p><?php echo form_submit('', 'Posalji zahtev'); ?></p>
    <!--<input type="submit" class="button" value="Posalji zahtev"/>-->
    <br />
    <br />

    <?php echo form_close(); ?>

</div>
