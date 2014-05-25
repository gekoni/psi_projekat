<div style="width:260px; margin:auto; padding-top: 20px; padding-bottom: 20px;">
    <div class="contentTitle"><h2> Istorijat clanka </h2></div>
    <br/>
    <div class="contentTitle"> Java Virtual Machine </div>
    <span class="label"> Datum </span> &nbsp;  <?php echo $clanak->getDatum()->format('d-m-Y'); ?>
    <br/>
    <span class="label"> Autor </span> &nbsp; <?php echo $clanak->getAutor()->getUsername(); ?>
    <br/>
    <span class="label"> Oblast </span> &nbsp;  <?php echo $clanak->getOblast()->getNaziv(); ?>
    <br/>
    <span class="label"> Ocena </span> &nbsp;  <?php echo $clanak->getOcena(); ?>
    <br/>
    <span class="label"> Broj pregleda </span> &nbsp;  <?php echo $clanak->getBrPregleda(); ?>
    <br/>
    <br/>
    <table class="tg">
        <tr>
            <th class="tg-031e">Koautor</th>
            <th class="tg-031e">Datum izmene</th>
        </tr>
        <?php foreach ($izmene as $izmena) { ?>
        <tr>
            <td class="tg-031e"><?php echo $izmena->getKorisnik()->getUsername(); ?></td>
            <td class="tg-031e"><?php echo $izmena->getDate()->format('d-m-Y'); ?></td>
        </tr>
        <?php } ?>
    </table>
</div>