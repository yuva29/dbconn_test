<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("MYSQL_USER");
$dbname = getenv("MYSQL_DATABASE");
$dbpwd = getenv("MYSQL_PASSWORD");
 
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$query = "SELECT * from users" or die("Error connecting to the database" . mysqli_error($connection));

echo "<html><head>";
echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>";
echo "</head>";

echo "<center>";
echo "<br><br>";
echo "<h3>Displaying the query results from \"". $dbname."\"</h3><br>";

echo "<table style='border:1px solid rgb(221, 221, 221);width:500' class='table table-striped'> <tr> <th>ID</th> <th>Name</th> </tr>";

$rs = $connection->query($query);
while ($row = mysqli_fetch_assoc($rs)) {
				echo "<tr><td style='border-right:1px solid black'>" . $row['user_id'] . "</td><td>" . $row['username'] . "</td></tr>";
}

echo "</table>";
echo "</center></html>";

mysqli_close($connection);
?>

