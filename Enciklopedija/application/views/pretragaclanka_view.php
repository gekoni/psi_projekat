<div style="width: 40%; margin-left: 35%; margin-right: 35%; padding-top: 20px; padding-bottom: 20px;">
    <div class="contentTitle"><h2> Pretraga clanaka </h2></div>
    <?php echo form_open('clanak/pretragaSubmit'); ?>

    <div class="label"><p> Naslov </p></div>
    <?php
    $data = array(
              'name'        => 'naslov',
              'value'       => $naslov
            );
    ?>
    <?php echo form_input($data); ?> 
    <br />
    <br />

    <select name="oblast" style="width:10em;">  
        <option selected="true" style="display:none;">Oblast</option>
        <?php foreach ($oblasti as $oblast) { ?>
        <option> <?php echo $oblast->getNaziv(); ?> </option> 
        <?php } ?>
    </select>
    <br />
    <br />
    <?php
    $data = array(
              'name'        => 'sadrzaj',
              'value'       => $sadrzaj
            );
    ?>
    <div class="label"><p> Sadrzaj </p></div>
    <?php echo form_input($data); ?> 
    <br />
    <br />
    <div class="label"><p> Autor </p></div>
    <?php
    $data = array(
              'name'        => 'autor',
              'value'       => $autor
            );
    ?>
    <div class="label"><p> Sadrzaj </p></div>
    <?php echo form_input($data); ?> 
    <br />
    <br />
    <br />
    <?php
    $config = array(
        'value' => 'Pretraga',
        'class' => 'button',
        'style' => 'margin-left: 25px;'
    );
    echo form_submit($config);
    ?>
    <br />
    <br />
    <?php echo form_close(); ?>

</div>
<?php if ($clanci) { ?>
    <div style="clear: both;"></div>
    <table style="margin:auto;" class="tg">
        <tr>
            <th class="tg-031e">Clanak</th>
            <th class="tg-031e">Autor</th>
            <th class="tg-031e">Oblast</th>
            <th class="tg-031e">Datum kreiranja<br></th>
            <th class="tg-031e">Pogledaj clanak<br></th>
        </tr>
        <?php foreach ($clanci as $clanak) { ?>
            <tr>
                <td class="tg-031e"><?php echo $clanak->getNaslov(); ?></td>
                <td class="tg-031e"><?php echo $clanak->getAutor()->getUsername(); ?></td>
                <td class="tg-031e"><?php echo $clanak->getOblast()->getNaziv(); ?></td>
                <td class="tg-031e"><?php echo $clanak->getDatum()->format('d-m-Y'); ?></td>
                <td class="tg-031e">
                    <a href="<?php echo base_url(); ?>index.php/clanak/pregled?idClanka=<?php echo $clanak->getId(); ?>">
                        <img src="<?php echo base_url(); ?>css/view-article.png" width="30px" height="30px" style="cursor:pointer;"/>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php } 