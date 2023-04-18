<?php

function CheckEmail($email){

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    }
    else
    {
        return "";
    }
}

