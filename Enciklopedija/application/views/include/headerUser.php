<html>
    <head>
        <link href="<?php echo base_url(); ?>css/black.css" rel="stylesheet">
    </head>
    <body>
        <?php
        if ($this->session->userdata('korisnik')) {
            $korisnikSession = $this->session->userdata('korisnik');
            $uloga = $korisnikSession['uloga'];
        } else {
            $uloga = '';
        }
        ?>
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
            <div div class="left">
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/clanak/pretragaIndex"> 
                            <img src="<?php echo base_url(); ?>css/search.jpg" width="50px" height="50px"/>Pretraga 
                        </a>
                    </li>

                    <?php if ($uloga == 'admin' || $uloga == 'urednik' || $uloga == 'korisnik') { ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/clanak/novi"> 
                                Novi clanak
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($uloga == 'admin' || $uloga == 'urednik') { ?>
                        <li><a href="<?php echo base_url(); ?>index.php/zahtevi/izmene"> Zahtevi za izmenu </a></li>
                    <?php } ?>
                    <?php if ($uloga == 'admin') { ?>
                        <li><a href="<?php echo base_url(); ?>index.php/zahtevi/registracije"> Zahtevi za registraciju </a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/urednici"> Urednici </a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/oblasti"> Oblasti </a></li>
                    <?php } ?>
                </ul>
            </div>