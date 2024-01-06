<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Issue Submission Confirmation</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="main.css" />
    <link rel="stylesheet" type="text/css" href="issueview.css" />
</head>

<body>
    <?php 
        // Include a connection page
        include 'sqlconnection.php';
    ?>
    <div class="container">
        <?php 
            // HTML Injection Protection
            $FirstName = htmlspecialchars($_POST["fname"]);
            $LastName = htmlspecialchars($_POST["lname"]);
            $Email = htmlspecialchars($_POST["email"]);
            $SubmissionDate = htmlspecialchars($_POST["issue-date"]);
            $IssueType = htmlspecialchars($_POST["issue-type"]);
            $Suggestion = htmlspecialchars($_POST["suggestions"]);
            $IssueMsg = htmlspecialchars($_POST["issue-box"]);

            // SQL Injection Protection
            $FirstName = mysqli_real_escape_string($conn, $_POST["fname"]);
            $LastName = mysqli_real_escape_string($conn, $_POST["lname"]);
            $Email = mysqli_real_escape_string($conn, $_POST["email"]);
            $SubmissionDate = mysqli_real_escape_string($conn, $_POST["issue-date"]);
            $IssueType = mysqli_real_escape_string($conn, $_POST["issue-type"]);
            $Suggestion = mysqli_real_escape_string($conn, $_POST["suggestions"]);
            $IssueMsg = mysqli_real_escape_string($conn, $_POST["issue-box"]);
        ?>
        <div class="nav-container">
            <div class="nav">
                <div class="logo-container flex-item">
                    <p>
                        <img class="logo" src="logo.png" alt="logo of Ticket Master" />
                    </p>
                </div>
                <!-- Div Logo Container end here -->
                <ul class="nav-list flex-item">
                    <li class="flex-item">
                        <a href="reportingpage.html">Report A Issue</a>
                    </li>
                    <li class="flex-item">
                        <a href="issueview.php">Reported Issues</a>
                    </li>
                </ul>
            </div>
            <!-- Div Nav end here -->
        </div>
        <!-- Div Nav Container end here -->
        <div class="main-container">
            <div class="heading">
                <h1>Confirmation Page</h1>
            </div>
            <!-- Div Heading end here -->
            <div class="issue-container">
                <?php 

                    // Check to make sure form inputs are not empty
                    if (!empty($FirstName) && !empty($LastName) && !empty($Email) && !empty($SubmissionDate) && !empty($IssueType) && !empty($Suggestion) && !empty($IssueMsg)) {
                        // Insert into the database
                        $sql_query = "INSERT INTO TechnicalIssues
                            (FirstName, LastName, Email, SubmissionDate, IssueType, Suggestion, Issue)
                        VALUES
                            ('$FirstName', '$LastName', '$Email', DATE '$SubmissionDate', '$IssueType', '$Suggestion', '$IssueMsg')";
                        $result = mysqli_query($conn, $sql_query);

                        // Check if insert fails, and if so, display a error message
                        if (!$result) {
                            echo "<h2 class='issues-heading'>Something went wrong, Please try again. " . mysqli_error($conn) . "</h2>";
                        };
                        // Show message to thank you user for submission
                        echo "<h2 class='issues-heading'>Thank you for submission</h2>";
                        
                        // Link to take to page with that shows reported issues
                        echo "<p>Click here to view all your reported issues. <a href='issueview.php'> Click Here! </a></p>";

                        } else {
                            echo "<h2 class='issues-heading'>Invalid Submission, please do not submit empty form.</h2>";

                            echo "<p> <a href='reportingpage.html'>Click here</a> to try again.</p>";
                        }
                ?>
            </div>
            <!-- Div Issue Container end here -->
        </div>
        <!-- Div Main Container end here -->
    </div>
    <!-- Div Container end here -->
</body>

</html>