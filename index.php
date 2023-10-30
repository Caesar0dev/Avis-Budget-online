<!DOCTYPE html>
<html>
<head>
    <title>Scraping</title>
</head>
<body>

<form method="post" action="">
    <label for="command">Enter Start Date:</label>
    <input type="text" id="command" name="command" placeholder="2024-01">
    <input type="submit" name="execute" value="START">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['execute'])) {
    // Check if a command is entered
    if (!empty($_POST['command'])) {
        $command = "node avis.js ".$_POST['command'];
        $output = array(); // This will store the output of the command

        // Execute the command
        exec($command, $output, $return_var);

        // Output the result
        echo "<h3>Command: $command</h3>";
        echo "<h3>Output:</h3>";
        echo "<pre>" . implode("\n", $output) . "</pre>";
        echo "<h3>Return value: $return_var</h3>";
    } else {
        echo "<h3>Please enter a command.</h3>";
    }
}
?>

</body>
</html>
