<?php
print "<div class='starter-template'>";
print form_open('blogi/tallenna','class="form-horizontal"');
    
print "<div class='form-group'>";
print form_label('Otsikko:','otsikko','class="control-label col-sm-2"');
$data = array(
    "name"  => "otsikko",
    "id"    => "otsikko",
    "maxlength" => "50",
);
print "<div class='col-sm-10'>";
print form_input($data,"", "class='form-control'");
print "</div>";
print "</div>";


print "<div class='form-group'>";
print form_label('Teksti:','teksti','class="control-label col-sm-2"');
$data = array(
    "name"  => "teksti",
    "id"    => "teksti",
);
print "<div class='col-sm-10'>";
print form_textarea($data,"", "class='form-control'");
print "</div>";
print "</div>";




print "<div class='form-group'>";
print "<div class='col-sm-offset-2 col-sm-10'>";
print form_submit('submit','Tallenna',"class='btn btn-default'");
print "</div>";
print "</div>";
print "</div>";

