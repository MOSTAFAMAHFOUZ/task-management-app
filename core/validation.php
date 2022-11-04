<?php 


function sanitize($value){
    return trim(htmlentities(htmlspecialchars($value)));
}



function val_required($value){
    if(empty($value)){
        return true;
    }
    return false;
}



function val_min($value,$length){
    if(strlen($value) < $length){
        return true;
    }
    return false;
}



function val_max($value,$lenght){
    if(strlen($value) > $lenght){
        return true;
    }
    return false;
}


function val_email($value){
    if(!filter_var($value,FILTER_VALIDATE_EMAIL)){
        return true;
    }
    return false;
}


