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

// prepared statement categories
$stmt_ctg = $conn->prepare('INSERT IGNORE INTO categorie (id, nome) VALUES (?, ?)');
$stmt_ctg->bind_param('is',$id, $name);

// prepared statement products
$stmt_prdct = $conn->prepare('INSERT IGNORE INTO prodotti (id, nome, prezzo, categoria_id) VALUES (?, ?, ?, ?)');
$stmt_prdct->bind_param('isdi',$id, $name, $price, $category_id);

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
        $id = (int) $data[0];
        $name = $data[1];
        $stmt_ctg->execute();
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
        $id = (int) $data[0];    
        $name = $data[1];
        $price = (float) $data[2];    
        $category_id = (int) $data[3];
        $stmt_prdct->execute();
    }
    // since data are not readeable close the file
    fclose($open);
} else {
    die("Error: Unable to open the file.");
}