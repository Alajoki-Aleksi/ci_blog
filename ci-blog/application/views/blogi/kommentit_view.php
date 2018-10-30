<?php


print "<div class='kommentti'>";

foreach ($kommentit as $kommentti) {
        $paivays = date("d.m.Y G.i",strtotime($kommentti->paivays));
        print $paivays . " by " . $kommentti->tunnus;
        if ($this->session->userdata('id') == $kommentti->kayttaja_id) {
            print "<a class='fa fa-trash' aria-hidden='true' href=" . base_url() . "index.php/kommentti/poista/$kommentti->id" .  "></a>";
        }
        print "<br>";
        print $kommentti->teksti;
        print "<hr>";
}

if ($this->session->userdata('id')) {
    print form_open('kommentti/tallenna','class="form-horizontal"');
    $data = array(
        "name"  => "teksti",
        "id"    => "textarea",
    );
    print form_textarea($data);
    echo form_hidden('kirjoitus_id', set_value('kirjoitus_id',$id));
    print form_submit('submit','Tallenna',"class='btn btn-default'");
}
print "</div>";