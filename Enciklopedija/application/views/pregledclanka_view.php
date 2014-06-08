<div style="width: 40%; margin-left: 35%; margin-right: 35%; padding-top: 20px; padding-bottom: 20px;">
    <div class="contentTitle"> <?php echo $clanak->getNaslov(); ?> </div>
    <span class="label"> Datum </span> &nbsp;  <?php echo $clanak->getDatum()->format('d-m-Y'); ?>
    <br/>
    <span class="label"> Autor </span> &nbsp; <?php echo $clanak->getAutor()->getUsername(); ?>
    <br/>
    <span class="label"> Oblast </span> &nbsp;  <?php echo $clanak->getOblast()->getNaziv(); ?>
    <br/>
    <span class="label"> Prosecna ocena </span> &nbsp;  <?php echo $clanak->getOcena(); ?>
    <br/>
    <span class="label"> Broj pregleda </span> &nbsp;  <?php echo $clanak->getBrPregleda(); ?>
    <br/>
    <br/>
    <p><?php echo $clanak->getSadrzaj(); ?></p>
    <br/>
    <br/>
    <?php
    if (!isset($izmenaPregled)) {
        $korisnikSession = $this->session->userdata('korisnik');
        if ($korisnikSession != NULL) {
            ?>
            <span style="font-size: 16px; font-weight: bold;">
        <?php echo $poruka; ?>
            </span>
            <br/>
            <br/>
        <?php echo form_open('clanak/oceni'); ?>
            <select name="ocena" style="width:10em;">  
                <option selected="true" style="display:none;">Ocenite clanak</option>
                <option> 1 </option> 
                <option> 2 </option> 
                <option> 3 </option> 
                <option> 4 </option> 
                <option> 5 </option> 
            </select>
            <br/>
            <br/>
            <br/>

            <div style="float: left">
                <input type="hidden" name="idClanka" value="<?php echo $clanak->getId(); ?>">
                <input type="submit" name="submitForm" class="button" value="Oceni"/>
            </div>
        <?php echo form_close(); ?>

            <div style="float: left">
        <?php echo form_open('clanak/istorija'); ?>
                <input type="hidden" name="idClanka" value="<?php echo $clanak->getId(); ?>">
                <input type="submit" name="submitForm" class="button" value="Istorijat"/>
        <?php echo form_close(); ?>
            </div>

            <div style="float: left">
        <?php echo form_open('clanak/izmena'); ?>
                <input type="hidden" name="idClanka" value="<?php echo $clanak->getId(); ?>">
                <input type="submit" name="submitForm" class="button" value="Izmeni"/>
        <?php echo form_close(); ?>
            </div>
            <br/>
            <br/>
    <?php }
} ?>
</div>