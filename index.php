<?php
// ****** DB CONNECTION ******
$db_host = "127.0.0.1";
$db_username = "root";
$db_password = "root";
$db_name = "php-csv-import";
$db_port = "8889";

// makes connection
$conn = new mysqli($db_host,$db_username,$db_password,$db_name,$db_port);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connected successfully!";
}

// ****** FILES ******
// CATEGORIE
if (($open = fopen("./csv/categorie.csv", "r")) !== false) {
    // if file can be opened 
    // fopen opens file and r stands for mode 'read'
    // assign everything to $open
    $headers = fgetcsv($open); // reading first line and doing nothing so it skips in the while
    //fget examinate a line from the opened file and check for csv fields
    // assign everything to $data
    // while data are valid and can be read goes on, else stops loops
    while (($data = fgetcsv($open)) !== false) {
        var_dump($data);
    }
    // since data are not readeable close the file
    fclose($open);
} else {
    die("Error: Unable to open the file.");
}


// PRODOTTI
if (($open = fopen("./csv/prodotti.csv", "r")) !== false) {
    // if file can be opened 
    // fopen opens file and r stands for mode 'read'
    // assign everything to $open
    $headers = fgetcsv($open); // reading first line and doing nothing so it skips in the while
    //fget examinate a line from the opened file and check for csv fields
    // assign everything to $data
    // while data are valid and can be read goes on, else stops loops
    while (($data = fgetcsv($open)) !== false) {
        var_dump($data);
    }
    // since data are not readeable close the file
    fclose($open);
} else {
    die("Error: Unable to open the file.");
}