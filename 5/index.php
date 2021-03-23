<?php
if (isset($_POST["send"])) {
    $password = $_POST["password"];

    $length = "/.{10,}/";
    $characters = "/(?=..*[a-z].*[a-z])(?=..*[A-Z].*[A-Z])(?=..*[0-9].*[0-9])(?=..*[%$#_*].*[%$#_*])/";

    if (!(preg_match($length, $password))) {
        echo "Your password is less than 10 characters";
    } elseif (!(preg_match($characters, $password))) {
        echo "Your password contains less than 2 special characters";
    } elseif ((preg_match("([a-z]{4,})", $password)) || (preg_match("([A-Z]{4,})", $password))
        || (preg_match("([0-9]{4,})", $password)) || (preg_match("([%$#_*]{4,})", $password))) {
        echo "Your password contains more than 3 same characters in a row";
    } else echo "Correct password";
} else {
    include "index.html";
}