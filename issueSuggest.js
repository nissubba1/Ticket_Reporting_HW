// Function that takes IssueType as a parameter
// Make a Ajax request to getSuggestions.php
// Find a matching substrings
function showSuggestion(issueType) {
  if (issueType.length == 0) {
    $("id-suggestions").innerHTML = "";
    return;
  }

  new Ajax.Request("getSuggestions.php", {
    method: "POST",
    parameters: { issues: issueType },
    onSuccess: issueSuccess,
  });
}

//function to execute when ajax request is successful
function issueSuccess(ajax) {
  $("id-suggestions").value = ajax.responseText;
}

//function to execute when ajax request is unsuccessful
function ajaxFailure() {
  alert("Ajax request failed");
}
