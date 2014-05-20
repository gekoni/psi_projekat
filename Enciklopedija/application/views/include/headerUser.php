<html>
    <head>

        <link href="<?php echo base_url(); ?>css/black.css" rel="stylesheet">

    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <h1 style="margin-left: 70px; float: left;">JavaWiki</h1>
                <div class="logout-btn"><a href="<?php echo base_url(); ?>index.php/login/logout">Odjava</a></div>
                <div style="clear: both;"></div>
                <h2 style="margin-left: 70px;">Multimedijalna enciklopedija</h2>
            </div>
            <div div class="left">
                <ul>
                    <?php 
                    if ($this->session->userdata('korisnik')) {
                        $uloga = $this->session->userdata('korisnik')->getUloga()->getUloga();
                    }
                    else {
                        $uloga = '';
                    }
                    ?>
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
                    <li><a href="zahteviIzmene.html"> Zahtevi za izmenu </a></li>
                    <?php } ?>
                    <?php if ($uloga == 'admin') { ?>
                    <li><a href="zahteviRegistracije.html"> Zahtevi za registraciju </a></li>
                    <li><a href="urednici.html"> Urednici </a></li>
                    <li><a href="oblasti.html"> Oblasti </a></li>
                    <?php } ?>
                </ul>
            </div>