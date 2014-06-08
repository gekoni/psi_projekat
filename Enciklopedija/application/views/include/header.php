<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
    <head>

        <link href="<?php echo base_url(); ?>css/black.css" rel="stylesheet">

    </head>
    <body>
        <div id="wrap">
                   <div id="header">
                <h1 style="margin-left: 70px; float: left;">JavaWiki</h1>
                <div class="logout-btn">
                    <?php
                    if ($this->session->userdata('korisnik')) {
                        ?>
                        <a href="<?php echo base_url(); ?>index.php/profil">Profil</a>
                        <a href="<?php echo base_url(); ?>index.php/login/logout">Odjava</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>index.php">Uloguj se</a>
                    <?php } ?>
                </div>
                <div style="clear: both;"></div>
                <h2 style="margin-left: 70px;">Multimedijalna enciklopedija</h2>
            </div>