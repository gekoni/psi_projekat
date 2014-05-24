<div style="width:260px; margin:auto; padding-top: 20px; padding-bottom: 20px;">
    <div class="contentTitle"><h2> Dodavanje oblasti </h2></div> 

    <?php echo form_open('oblasti/dodajOblast'); ?>
    <div class="label">
        <p><?php echo form_label('Naziv', 'naziv') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('naziv'); ?>
        </div>
        <?php
        if (isset($podaci['novi'])) {
            $val = '';
        } else {
            $val = 'naziv';
        }
        $data_form = array(
            'name' => 'naziv',
            'size' => 35,
            'id' => 'naziv',
            'value' => set_value($val)
        );
        echo form_input($data_form);
        ?> 
    </div>

</p>
<br/>
<br/>
<p><?php echo form_submit('', 'Dodaj oblast', "class='button'"); ?></p>

<?php echo form_close(); ?>

<br/>
<br/>
<div class="contentTitle"><h2> Brisanje oblasti </h2></div>
<table class="tg">
    <tr>
        <th class="tg-031e">Naziv</th>
        <th class="tg-031e">Brisanje</th>
    </tr>

    <?php
    $oblasti = $podaci['oblasti'];
    for ($index = 0; $index < count($oblasti); $index++) {
        $izmena = $oblasti[$index];

        $naziv = $izmena->getNaziv();
        $id = $izmena->getId();
        ?>
        <tr>
            <td class="tg-031e"><?php echo $naziv; ?></td>
            <td class="tg-031e"><a style="cursor:pointer;"  href="<?php echo base_url(); ?>index.php/oblasti/obrisiOblast/<?php echo $id; ?>">Obrisi</a></td>
        </tr>
        <?php
    }
    ?>

</table>
</div>