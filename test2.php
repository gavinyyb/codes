<?php
if(preg_match("/php/i", "PHP is the web scripting language of choice.", $matches)){
    print "A match was found:". $matches[0];
} else {
    print "A match was not found.";
}
?>