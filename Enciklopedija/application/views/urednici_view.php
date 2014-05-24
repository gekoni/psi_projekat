<div style="width:260px; margin:auto; padding-top: 20px; padding-bottom: 20px;">
    <div class="contentTitle"><h2> Dodavanje urednika </h2></div>

    <?php echo form_open('urednici/dodajUrednika'); ?>
    <div class="label">
        <p><?php echo form_label('Korisnik', 'korisnik') ?>:<br/>
        <div class="errorMessageBox">
            <?php if (isset($podaci['greska_korisnik'])) { ?>
                <p> <?php echo $podaci['greska_korisnik'] ?></p>
            <?php } ?>
        </div>
        <?php
        $options = $podaci['korisnici'];
        echo form_dropdown('korisnici', $options);
        ?>
        <br/>
        <br/>
        <p><?php echo form_label('Oblast', 'oblast') ?>:<br/>
        <div class="errorMessageBox">
            <?php if (isset($podaci['greska_oblast'])) { ?>
                <p> <?php echo $podaci['greska_oblast'] ?></p>
            <?php } ?>
        </div>
        <?php
        $options2 = $podaci['oblasti'];
        echo form_dropdown('oblasti', $options2);
        ?>
        <br/>
        <div class="errorMessageBox">
            <?php if (isset($podaci['greska_vec_postoji'])) { ?>
                <p> <?php echo $podaci['greska_vec_postoji'] ?></p>
            <?php } ?>
        </div>
        <br/>
    </div>
    <input type="submit" class="button" value="Dodaj urednika"/>
    <?php echo form_close(); ?>
    <br/>
    <br/>
    <div class="contentTitle"><h2> Brisanje urednika </h2></div>
    <table class="tg">
        <tr>
            <th class="tg-031e">Ime i prezime</th>
            <th class="tg-031e">Email</th>
            <th class="tg-031e">Username</th>
            <th class="tg-031e">Oblast</th>
            <th class="tg-031e">Brisanje</th>
        </tr>
        <?php
        $lista = $podaci['lista'];
        foreach ($lista as $element) {
            ?>
            <tr>
                <td class="tg-031e"><?php echo $element['ime_prezime']; ?></td>
                <td class="tg-031e"><?php echo $element['email']; ?></td>
                <td class="tg-031e"><?php echo $element['username']; ?></td>
                <td class="tg-031e"><?php echo $element['oblast']; ?></td>
                <td class="tg-031e"><a style="cursor:pointer; " href="<?php echo base_url(); ?>index.php/urednici/obrisiUrednika/<?php echo $element['oblastId']; ?>/<?php echo $element['urednikId']; ?>">Obrisi</a></td>
            </tr>
            <?php
        }
        ?>

    </table>
</div>