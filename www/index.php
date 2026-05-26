<!-- put in ./www directory -->

<html>
 <head>
  <title>Hello...</title>

  <!-- <meta charset="utf-8">  -->

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <h1>Hi! I'm happy</h1>


    <?php
    $conn = mysqli_connect('db', 'user', 'test', 'myDb');

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    $query = "SELECT * From Person";
    $result = mysqli_query($conn, $query);

    echo '<table class="table table-striped">';
    echo '<thead><tr><th></th><th>id</th><th>name</th></tr></thead>';
    while($value = $result->fetch_assoc())
    {
        echo '<tr>';
        echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
        foreach($value as $element){
            echo '<td>' . $element . '</td>';
        }

        echo '</tr>';
    }
    echo '</table>';

    $result->close();

    mysqli_close($conn);

echo "<h3>PostgreSQL:</h3>";

$pg = pg_connect("host=postgresql dbname=postgres_db user=postgres_user password=postgres_password");
$pg_result = pg_query($pg, "SELECT * FROM Person ORDER BY id");

echo '<table class="table table-striped">';
echo '<thead><tr><th>id</th><th>name</th></tr></thead>';

while ($row = pg_fetch_assoc($pg_result)) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '</tr>';
}

echo '</table>';

pg_close($pg);
    ?>
    </div>
</body>
</html>
