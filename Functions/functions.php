<?php
// Function to remove junk characters from a string or an array of strings
function remove_junk($string) {
    if(is_array($string)) {
        $cleaned_strings = array();
        foreach($string as $str) {
            $cleaned_strings[] = trim($str); 
        }
        return $cleaned_strings;
    } else {
        return trim($string); 
    }
  }
  function first_character($string) {
    if(is_array($string)) {
        $first_chars = array();
        foreach($string as $str) {
            $first_chars[] = ucfirst($str);
        }
        return $first_chars;
    } else {
        return ucfirst($string);
    }
  }
function display_msg($msg = array()) {
  $output = ''; // Initialize $output as a string
  if(!empty($msg)) {
     foreach ($msg as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $val) {
                $output .= "<div class=\"alert alert-{$key}\">"; // Concatenate the string with ".="
                $output .= "<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
                $output .= remove_junk(first_character($val));
                $output .= "</div>";
            }
        } else {
            $output .= "<div class=\"alert alert-{$key}\">"; // Concatenate the string with ".="
            $output .= "<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
            $output .= remove_junk(first_character($value));
            $output .= "</div>";
        }
     }
     return $output;
  } else {
    return ""; // Return an empty string if $msg is empty
  }
}
?>