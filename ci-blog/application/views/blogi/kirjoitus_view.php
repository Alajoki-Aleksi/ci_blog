<?php
print "<h1>" . $otsikko . "</h1>";
print "<div class='kirjoitus_details'>";
print "<p> " . date("d.m.Y G.i",strtotime($paivays)) . " by " . $tunnus . "</p>";
print "<p>". $teksti ."</p>";

print "</div>";
print "<h3 id='kommenttiotsikko'>Kommentit</h3>";

