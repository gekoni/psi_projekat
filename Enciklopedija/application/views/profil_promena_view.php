
<div style="width: 30%; margin-left: 40%; margin-right: 30%; padding-top: 20px; padding-bottom: 20px;">

    <div class="contentTitle"><h2>Izmena podataka</h2></div>

    <?php echo form_open('profil/promeniPodatke'); ?>

    <div class="label"> 
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
    </div>

    <br />
    <br />
    <p><?php echo form_submit('', 'Promeni podatke', "class='button'"); ?></p>
    <br />
    <?php echo form_close(); ?>

    <?php if (isset($podaci['uspesna_izmena'])) {
        ?>
        <p>Podaci su uspesno izmenjeni</p>
    <?php }
    ?>
    <br />
    <br />

    <div class="contentTitle"><h2>Promena sifre</h2></div>

    <?php echo form_open('profil/promeni_sifru'); ?>

    <div class="label"> 
        <p><?php echo form_label('Stara lozinka', 'lozinka_stara') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('lozinka_stara'); ?>
        </div>
        <?php
        $data_form = array(
            'name' => 'lozinka_stara',
            'size' => 35,
            'id' => 'lozinka_stara',
            'value' => set_value('lozinka_stara')
        );
        echo form_password($data_form);
        ?> 
    </p><p><?php echo form_label('Nova lozinka', 'lozinka_nova') ?>:<br/>
<div class="errorMessageBox">
    <?php echo form_error('lozinka_nova'); ?>
</div>
<?php
$data_form = array(
    'name' => 'lozinka_nova',
    'size' => 35,
    'id' => 'lozinka_nova',
    'value' => set_value('lozinka_nova')
);
echo form_password($data_form);
?> 
</p>

<p><?php echo form_label('Ponovi lozinku', 'lozinka_ponovo') ?>:<br/>
<div class="errorMessageBox">
    <?php echo form_error('lozinka_ponovo'); ?>
</div>
<?php
$data_form = array(
    'name' => 'lozinka_ponovo',
    'size' => 35,
    'id' => 'lozinka_ponovo',
    'value' => set_value('lozinka_ponovo')
);
echo form_password($data_form);
?>
</p>
</div>

<br />
<br />
<p><?php echo form_submit('', 'Promeni lozinku', "class='button'"); ?></p>
<br />
<?php echo form_close(); ?>

<?php if (isset($podaci['uspesna_izmena_lozinke'])) {
    ?>
    <p>Lozinka je uspesno promenjena</p>
<?php }
?>
</div>