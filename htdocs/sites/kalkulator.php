<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    
</head>
<body>
<header>
    <div class="container py-3 mb-4">
        <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between align-items-center">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 link-body-emphasis text-decoration-none">
                <span class="fs-4">Kalkulator Doboru odpowiedniej felgi</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="../index.html" class="nav-link active" aria-current="page">Strona główna</a></li>
                        <li class="nav-item"><a href="serwis.html" class="nav-link">Serwis</a></li>
                        <li class="nav-item"><a href="kalkulator.php" class="nav-link">Kalkulator</a></li>
                        <li class="nav-item"><a href="opinia.html" class="nav-link">Opinie</a></li>
                        <li class="nav-item"><a href="galeria.html" class="nav-link">Galeria</a></li>
                    </ul>
                </div>
        </nav>
    </div>
</header>

    

    <?php

$srednicaKolaWzorca = null;
$srednicaKolaZamiennika = null;
$roznicaSrednicyKola = null;
$procentowaRoznicaSrednicy = null;


function obliczRozniceSrednicyKola($szerokosc, $profil, $srednicaFelgi)
{
    // KONWERSJA Z CALI NA MM
    $srednicaMilimetry = $srednicaFelgi * 25.4;

    // OBLICZANIE SREDNICY KOŁA
    $srednicaKola = $szerokosc * $profil / 100 + 2 * $srednicaMilimetry;

    return $srednicaKola;
}





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz dane z formularza
    $szerokoscWzorca = $_POST["widthPattern"];
    $profilWzorca = $_POST["profilePattern"];
    $srednicaFelgiWzorca = $_POST["rimSizePattern"];
    
    $szerokoscZamiennika = $_POST["widthReplacement"];
    $profilZamiennika = $_POST["profileReplacement"];
    $srednicaFelgiZamiennika = $_POST["rimSizeReplacement"];
    
    // Tutaj możesz wykonać obliczenia lub operacje na wprowadzonych danych
    // Na przykład, możesz porównać wartości opony wzorcowej i zamiennika

    $srednicaKolaWzorca = obliczRozniceSrednicyKola($szerokoscWzorca, $profilWzorca, $srednicaFelgiWzorca);
    $srednicaKolaZamiennika = obliczRozniceSrednicyKola($szerokoscZamiennika, $profilZamiennika, $srednicaFelgiZamiennika);

    $roznicaSrednicyKola = abs($srednicaKolaZamiennika - $srednicaKolaWzorca);
    $procentowaRoznicaSrednicy = round(abs(($roznicaSrednicyKola / $srednicaKolaWzorca) * 100), 1);

    
}
?>
<main>
<div class="container mt-5">
    <h2>Kalkulator</h2>
    
    <div class="row">
        <div class="col-md-6">
            <form method="post"> <!-- Dodano atrybut 'method' -->
            <h4>Opona wzorcowa</h4>
            
                <!-- Formularz dla opony wzorcowej -->
                <div class="form-group">
                    <label for="widthPattern">Szerokość:</label>
                    <input type="number" class="form-control" id="widthPattern" name="widthPattern" placeholder="Szerokość" required>
                </div>
                <div class="form-group">
                    <label for="profilePattern">Profil:</label>
                    <input type="number" class="form-control" id="profilePattern" name="profilePattern" placeholder="Profil" required>
                </div>
                <div class="form-group">
                    <label for="rimSizePattern">Średnica felgi (cale):</label>
                    <input type="number" class="form-control" id="rimSizePattern" name="rimSizePattern" placeholder="Średnica felgi" required>
                </div>
           
        </div>
        <div class="col-md-6">
            <h4>Opona zamiennik</h4>
            
                <!-- Formularz dla opony zamiennika -->
                <div class="form-group">
                    <label for="widthReplacement">Szerokość:</label>
                    <input type="number" class="form-control" id="widthReplacement" name="widthReplacement" placeholder="Szerokość" required>
                </div>
                <div class="form-group">
                    <label for="profileReplacement">Profil:</label>
                    <input type="number" class="form-control" id="profileReplacement" name="profileReplacement" placeholder="Profil" required>
                </div>
                <div class="form-group">
                    <label for="rimSizeReplacement">Średnica felgi (cale):</label>
                    <input type="number" class="form-control" id="rimSizeReplacement" name="rimSizeReplacement" placeholder="Średnica felgi" required>
                </div>
            
        </div>
        <button type="submit" class="btn btn-primary my-3">Oblicz</button>
        </form>
    </div>
</div>
</main>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Poniżej wyświetlę tylko przykładowy komunikat, dostosuj go do swoich potrzeb
echo '<div class="container">';
echo "<h2>Wyniki</h2>";
echo "<p>Srednica koła wzorca: " . $srednicaKolaWzorca . " mm</p>";
echo "<p>Srednica koła zamiennika: " . $srednicaKolaZamiennika . " mm</p>";
echo "<p>Różnica średnicy koła: " . $roznicaSrednicyKola . " mm</p>";
echo "<p>Procentowa różnica średnicy: " . $procentowaRoznicaSrednicy . "%</p>";

if ($procentowaRoznicaSrednicy > 2) {
    echo '<p class="bad">Różnica w średnicy koła przekracza dopuszczalne wartości.
    Zamiennik niezalecany!</p>';
} else {
    echo '<p class="good">Różnica w średnicy koła nie przekracza dopuszczalnych wartości.
    Zamiennik dobrze dobrany!</p>';
}

echo '</div>';

}
?>


        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- FOOTER -->
    <footer class="text-body-secondary py-5">
      <div class="container">
        <p class="float-end mb-1">
          <a href="#">Back to top</a>
        </p>
        <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      </div>
    </footer>
</body>
</html>