<?php
require '../config/connection.php';
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
 
// Include your database connection file

function get_bus_data() {
     global $connection;
    $sql = "SELECT * FROM buses";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $bus_data = [];
        while ($row = $result->fetch_assoc()) {
            $bus_data[] = [
                'name' => $row['bus_name'],
                'number' => $row['bus_number'],
                'bus_id' => $row['bus_id'],
                'capacity' => $row['capacity'],
                'status' => $row['bus_status']
            ];
        }
        return $bus_data;
    } else {
        return [];
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