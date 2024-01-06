<?php
header("Cache-Control: no-cache, must-revalidate");
 // Date in the past
 // This will always shows most recent update
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// Fill up arrays with suggestions
$suggestionsArray = array("Injection Attack", "Broken Authentication", "Security Access Issue", "Cross-site Scripting", "Network Down", "Password Recovery", "Sensitive Data Exposure");

// Get the issues parameter from URL
$issueInput = $_POST["issues"];

// Check to make sure input is not blank
if (strlen($issueInput) > 0) {
    // Create a variable with empty string
    $suggestion = "";
    // Loop through the array
    for ($i = 0; $i < count($suggestionsArray); $i++) {
        // Convert input and array items into lowercase
        // Check is there is a match 
        if (strtolower($issueInput) == strtolower(substr($suggestionsArray[$i], 0, strlen($issueInput)))) {
            // Check if suggestion variable is empty
            if ($suggestion == "") {
                // If its empty, concatenate the string with item from array
                $suggestion = $suggestionsArray[$i];
            } else {
                // Show multiple items from array if there is multiple matches
                $suggestion = $suggestion . " , ". $suggestionsArray[$i];
            }
        }
    }
}
// Check if suggestion variable is empty, which means there is no match
if ($suggestion == "") {
    // Say Other if there is no match
    $suggestionResult = "Other";
} else {
    // Else display the matched suggestion
    $suggestionResult = $suggestion;
}
// Print out the suggestion text
echo $suggestionResult;
?>