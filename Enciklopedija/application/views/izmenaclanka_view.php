<div style="width: 40%; margin-left: 35%; margin-right: 35%; padding-top: 20px; padding-bottom: 20px;">
    <?php echo form_open('clanak/izmenaSubmit'); ?>
        <input type="hidden" name="idClanka" value="<?php echo $clanak->getId(); ?>">
        <div class="contentTitle"> <?php echo $clanak->getNaslov(); ?> </div>
        <span class="label"> Datum </span> &nbsp;  <?php echo $clanak->getDatum()->format('d-m-Y'); ?>
        <br/>
        <span class="label"> Autor </span> &nbsp; <?php echo $clanak->getAutor()->getUsername(); ?>
        <br/>
        <span class="label"> Oblast </span> &nbsp;  <?php echo $clanak->getOblast()->getNaziv(); ?>
        <br/>
        <br/>
        <textarea rows="10" cols="70" name="sadrzaj"><?php echo $clanak->getSadrzaj(); ?></textarea>
        <br/>
        <br/>
        <span style="font-size: 16px; font-weight: bold;">
            <?php echo $poruka; ?>
        </span>
        <br/>
        <br/>
        <input type="submit" class="button" value="Izmeni"/>
    <?php echo form_close(); ?>
</div>