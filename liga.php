<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div id="baner">
        <h3>Reprezentacja polski w pilce nozej</h3>
        <img src="obraz1.jpg" alt="Reprezentacja">
    </div>
    <div id="lewy">
        <form action="liga.php" method="post">
            <select name="nazwa" id="lista">
                <option value="1">Bramkarze</option>
                <option value="2">obroncy</option>
                <option value="3">Pomocnicy</option>
                <option value="4">Napastynicy</option>
            </select>
            <button type="submit" name="guzik">Zobacz</button>
        </form>
        <p>AUTOR:000000</p>
    </div>
    <div id="prawy">
        <ol>
        <?php
        $conn = mysqli_connect("localhost","root","","futbol");
       
       if(isset(($_POST["guzik"])))
       {
            $pozycja = ($_POST["nazwa"]);
            $query = mysqli_query($conn,"SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id =  $pozycja");
            while($wynik = mysqli_fetch_row($query))
            {
                
                echo "<li>
                <p>$wynik[0] $wynik[1]</p>              
                </li>";
            }
       }
        mysqli_close($conn);
        ?>
        </ol>
    </div>
    <main>
        <h3>Liga mistrzow</h3>
    </main>
    <div id="liga">
 <?php
 $conn = mysqli_connect("localhost","root","","futbol");
 $query = mysqli_query($conn,"SELECT zespol,punkty,grupa FROM liga GROUP BY punkty DESC");
 while($wynik = mysqli_fetch_row($query))
 {
     echo
     "<div class='generowany'>
     <h2>$wynik[0]</h2>
     <h1>$wynik[1]</h1>
     <p>grupa: $wynik[2]</p>
     </div>";
 }
 mysqli_close($conn);
 ?>
    </div>
</body>
</html>