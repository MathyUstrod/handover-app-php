<?php

class Validate
{
    /*method accepts two params
        1. field
        2. required as string literal
        validate($name, "required");
        if first arg is null or undefined it redirects to the requesting page with a message
        if field is not required the field value is returned as is
    */

    public function validate($field, $required="")
    {
        $prev_url = $_SERVER['HTTP_REFERER'];
        switch($required){
            case "required":
                if(($field)){
                    return trim(htmlspecialchars($field));
                }else{
                    //return to requesting page
                    header("location: $prev_url");
                    break;
                }
            case "":
            default:
                return $field;
        }
    }

}