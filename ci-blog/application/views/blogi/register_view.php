<h1>Rekisteröidy</h1>
<?php

print "<div class='starter-template'>";
print form_open('register/register','class="form-horizontal"');
    
print "<div class='form-group'>";
print form_label('Etunimi:','etunimi','class="control-label col-sm-2"');
$data = array(
    "name"  => "etunimi",
    "id"    => "etunimi",
    "maxlength" => "50",
);
print "<div class='col-sm-10'>";
print form_input($data,"", "class='form-control'");
print "</div>";
print "</div>";


print "<div class='form-group'>";
print form_label('Sukunimi:','sukunimi','class="control-label col-sm-2"');
$data = array(
    "name"  => "sukunimi",
    "id"    => "sukunimi",
    "maxlength" => "50",
);
print "<div class='col-sm-10'>";
print form_input($data,"", "class='form-control'");
print "</div>";
print "</div>";

print "<div class='form-group'>";
print form_label('Sähköposti:','email','class="control-label col-sm-2"');
$data = array(
    "name"  => "email",
    "id"    => "email",
    "maxlength" => "50",
);
print "<div class='col-sm-10'>";
print form_input($data,"", "class='form-control'");
print "</div>";
print "</div>";

print "<div class='form-group'>";
print form_label('Tunnus:','tunnus','class="control-label col-sm-2"');
$data = array(
    "name"  => "tunnus",
    "id"    => "tunnus",
    "maxlength" => "50",
);
print "<div class='col-sm-10'>";
print form_input($data,"", "class='form-control'");
print "</div>";
print "</div>";



print "<div class='form-group'>";
print form_label('Salasana:','salasana','class="control-label col-sm-2"');
$data = array(
    "name"  => "salasana",
    "id"    => "salasana",
    "maxlength" => "50",
);
print "<div class='col-sm-10'>";
print form_password($data,"", "class='form-control'");
print "</div>";
print "</div>";



print "<div class='form-group'>";
print form_label('Salasana uudelleen:','salasana2','class="control-label col-sm-2"');
$data = array(
    "name"  => "salasana2",
    "id"    => "salasana2",
    "maxlength" => "50",
);
print "<div class='col-sm-10'>";
print form_password($data,"", "class='form-control'");
print "</div>";
print "</div>";



print "<div class='form-group'>";
print "<div class='col-sm-offset-2 col-sm-10'>";
print form_submit('submit','Rekisteröidy',"class='btn btn-default'");
print "</div>";
print "</div>";
print "</div>";

