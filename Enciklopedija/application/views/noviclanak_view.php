<div style="width: 40%; margin-left: 35%; margin-right: 35%; padding-top: 20px; padding-bottom: 20px;">
    <?php echo validation_errors('<p class="errorMessageBox">', '</p>'); ?>
    <?php echo form_open('clanak/noviSubmit'); ?>
    <div class="label"><p>Naslov</p></div>
    <?php echo form_input('naslov', set_value('naslov')); ?> 
    <br/>
    <br/>
    <select name="oblast" style="width:10em;">  
        <?php foreach ($oblasti as $oblast) { ?>
            <option> <?php echo $oblast->getNaziv(); ?> </option> 
        <?php } ?>
    </select>
    <br/>
    <br/>
    <textarea rows="10" cols="70" name="sadrzaj"></textarea>
    <br/>
    <br/>
    <input type="submit" class="button" value="Kreiraj clanak"/>
    <?php echo form_close(); ?>

</form>

</div>