<div style="margin-left: 70px; padding-top: 20px; padding-bottom: 20px;">
    <table class="tg">
        <tr>
            <th class="tg-031e">Clanak</th>
            <th class="tg-031e">Autor</th>
            <th class="tg-031e">Oblast</th>
            <th class="tg-031e">Datum izmene<br></th>
            <th class="tg-031e">Pogledaj originalni clanak<br></th>
            <th class="tg-031e">Pogledaj izmenjeni clanak<br></th>
            <th class="tg-031e">Odobri izmenu<br></th>
        </tr>
        <?php
        for ($index = 0; $index < count($podaci); $index++) {
            $izmena = $podaci[$index];

            $izmenaId = $izmena->getId();
            $originalId = $izmena->getClanak()->getId();
            $clanak = $izmena->getClanak()->getNaslov();
            $autorIme = $izmena->getClanak()->getAutor()->getIme();
            $autorPrezime = $izmena->getClanak()->getAutor()->getPrezime();
            $oblast = $izmena->getClanak()->getOblast()->getNaziv();
            $datumIzmene = $izmena->getDate();
            ?>
            <tr>
                <td class="tg-031e"><?php echo $clanak; ?></td>
                <td class="tg-031e"><?php echo $autorIme.' '.$autorPrezime; ?></td>
                <td class="tg-031e"><?php echo $oblast; ?></td>
                <td class="tg-031e"><?php echo date_format($datumIzmene, 'd.m.Y'); ?></td>
                <td class="tg-031e"><a style="cursor:pointer; " href="<?php echo base_url(); ?>index.php/zahtevi/pogledajOriginal/<?php echo $originalId; ?>">Vidi original</a></td>
                <td class="tg-031e"><a style="cursor:pointer; " href="<?php echo base_url(); ?>index.php/zahtevi/pogledajIzmenu/<?php echo $izmenaId; ?>">Vidi izmenu</a></td>
                <td class="tg-031e"><a style="cursor:pointer;" href="<?php echo base_url(); ?>index.php/zahtevi/odobriIzmenu/<?php echo $izmenaId; ?>">Odobri</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>