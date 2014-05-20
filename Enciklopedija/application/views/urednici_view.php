<div style="width:260px; margin:auto; padding-top: 20px; padding-bottom: 20px;">
    <div class="contentTitle"><h2> Dodavanje urednika </h2></div>

    <?php echo form_open('urednici/dodajUrednika'); ?>
    <div class="label">
        <p><?php echo form_label('Korisnik', 'korisnik') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('korisnik'); ?>
        </div>
        <?php
        $options = $podaci['korisnici'];
        echo form_dropdown('korisnici', $options);
        ?>

        <br/>
        <br/>
        <p><?php echo form_label('Oblast', 'oblast') ?>:<br/>
        <div class="errorMessageBox">
            <?php echo form_error('oblast'); ?>
        </div>
        <?php
        $options2 = $podaci['oblasti'];
        echo form_dropdown('oblasti', $options2);
        ?>
        <br/>
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
        <tr>
            <td class="tg-031e">Aleksaas</td>
            <td class="tg-031e">Aleksaas</td>
            <td class="tg-031e">Aleksaas</td>
            <td class="tg-031e">Java</td>
            <td class="tg-031e"><a style="cursor:pointer;">Obrisi</a></td>
        </tr>
        <tr>
            <td class="tg-031e">Aleksaas</td>
            <td class="tg-031e">Aleksaas</td>
            <td class="tg-031e">Aleksaas</td>
            <td class="tg-031e">C++</td>
            <td class="tg-031e"><a style="cursor:pointer;">Obrisi</a></td>
        </tr>
    </table>
</div>