<h1>Kirjaudu sisään</h1>
<?php

$this->load->helper('form');
print "<div class='starter-template'>";
print form_open('login/login','class="form-horizontal"');
    

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
print "<div class='col-sm-offset-2 col-sm-10'>";
print form_submit('submit','Kirjaudu',"class='btn btn-default'");
print "</div>";
print "</div>";
print "</div>";

