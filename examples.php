<?php
    
    $myName = "Peter";
    
    // Link Strings to variables
    echo "inside PHP " . $myName;

    // comparison returns true or false
    echo "inside PHP " and $myName;

    $people = array("Alice", "Bob", "Peter");
    // Arrays must be converted
    // echo $people;

    print_r($people);
    echo $people[1];

    // it sicles through and sets each element in the array to the temp variable $person which can be out but in the browser
    foreach ($people as $person) {
        echo $person . ' ';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="process.php" method="post">
        Enter your name <input name="name" type="text">
        <input type="submit">
    </form>
</body>
</html>