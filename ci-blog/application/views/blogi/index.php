<h1>Kirjoitukset</h1>


<?php
    
    foreach ($kirjoitukset as $kirjoitus) {
        print "<div class='kirjoitus'>";
        $paivays = date("d.m.Y G.i",strtotime($kirjoitus->paivays));
        print $paivays . " by " . $kirjoitus->tunnus . "<br>";

        print anchor("kommentti/index/$kirjoitus->id","$kirjoitus->otsikko");
        if ($this->session->userdata('id') == $kirjoitus->kayttaja_id) {
            print "<a class='fa fa-trash' aria-hidden='true' href=" . base_url() . "index.php/blogi/poista/$kirjoitus->id" .  "></a>";
        }
        print "<hr>";
        print "</div>";
        
    }


