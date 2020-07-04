<?php
function connectdb()
{
    $servername = "127.0.0.1";
    $username = "root";
    $password = "root";
    $dbname = "produsen_sepeda";
    $port = 8889;
    try {
        $dsn = "mysql:host=$servername;port=$port;dbname=$dbname";
        $conn = new PDO($dsn, $username, $password);
    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function get_all($table)
{
    $conn = connectdb();
    $stmt = $conn->prepare("select * from $table");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


$a = get_all("produk_tb");
print_r($a);
