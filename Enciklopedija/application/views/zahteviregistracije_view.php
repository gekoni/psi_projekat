<div style="margin-left: 70px; padding-top: 20px; padding-bottom: 20px;">
    <table class="tg">
        <tr>
            <th class="tg-031e">Username</th>
            <th class="tg-031e">Ime</th>
            <th class="tg-031e">Prezime</th>
            <th class="tg-031e">Email<br></th>
            <th class="tg-031e">Prihvati registraciiju<br></th>
            <th class="tg-031e">Odbaci registraciiju<br></th>
        </tr>

        <?php
        for ($index = 0; $index < count($podaci); $index++) {
            $registracija = $podaci[$index];
            $registracijaID = $registracija->getId();
            ?>
            <tr>
                <td class="tg-031e"><?php echo $registracija->getUsername(); ?></td>
                <td class="tg-031e"><?php echo $registracija->getIme(); ?></td>
                <td class="tg-031e"><?php echo $registracija->getPrezime(); ?></td>
                <td class="tg-031e"><?php echo $registracija->getEmail(); ?></td>
                <td class="tg-031e"><a style="cursor:pointer; " href="<?php echo base_url(); ?>index.php/zahtevi/prihvatiRegistraciju/<?php echo $registracijaID; ?>">Prihvati</a></td>
                <td class="tg-031e"><a style="cursor:pointer;" href="<?php echo base_url(); ?>index.php/zahtevi/odbaciRegistraciju/<?php echo $registracijaID; ?>">Odbaci</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>