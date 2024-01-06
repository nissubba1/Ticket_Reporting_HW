<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Reported Issues</title>
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
                <h1>Reported Issues</h1>
            </div>
            <!-- Div Heading end here -->
            <div class="issue-container">
                <h2 class="issues-heading">All currently reported issues:</h2>
                <?php 
                    // Create a query to return data from database
                    $sql_query = "SELECT CONCAT(FirstName, ' ', LastName) AS Name, Email, SubmissionDate, IssueType, Suggestion, Issue FROM TechnicalIssues";

                    // Execute the query
                    $result = mysqli_query($conn, $sql_query);

                    // Check to see if execution failed
                    if (!$result) {
                        echo "<h2>Error Fetching Issue Reports. " . mysqli_error($conn) . "</h2>";
                    };
                    // Loop through the table and get information
                    // Display each row 
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<p class='result-paragraph'><span class='result-attribute'>Name: </span> ". $row["Name"] . "</p>";

                        echo "<p class='result-paragraph'><span class='result-attribute'>Email: </span> ". $row["Email"] . "</p>";

                        echo "<p class='result-paragraph'><span class='result-attribute'>Date: </span> ". $row["SubmissionDate"] . "</p>";

                        echo "<p class='result-paragraph'><span class='result-attribute'>Issue Type: </span> ". $row["IssueType"] . "</p>";

                        echo "<p class='result-paragraph'><span class='result-attribute'>Suggestion: </span> ". $row["Suggestion"] . "</p>";

                        echo "<p class='result-paragraph'><span class='result-attribute'>Issue: </span> ". $row["Issue"] . "</p>";
                        echo "<hr>";
                    }
                    
                    // Add a line break
                    echo "<p>Have another issue to report? <a href='reportingpage.html'> Click Here! </a></p>";
                ?>
            </div>
            <!-- Div Issue Container end here -->
        </div>
        <!-- Div Main Container end here -->
    </div>
    <!-- Div Container end here -->
</body>

</html>