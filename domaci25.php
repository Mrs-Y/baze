<?php
$conn = new mysqli("localhost", "root", "", "turisticka_agencija");
if (is_null($conn->connect_error)) {
    echo "Uspesna konekcija";
} else {
    die("Konekcija nije uspesna Greska $conn->connect_error");
}

echo "<hr>";
echo "Baza: turisticka_agencija. Tabela: spisak_putnika";
$upit = "INSERT INTO `spisak_putnika`(`ime_prezime`, `br_pasosa`, `putovanje`) VALUES (?,?,?)";
$statement = $conn->prepare($upit);
$ime_prezime = "DM";
$br_pasosa = 145;
$putovanje = 1;
$statement->bind_param("sii", $ime_prezime, $br_pasosa, $putovanje);
$statement->execute();

$upit = "DELETE FROM `spisak_putnika` WHERE br_pasosa = 56";
$statement = $conn->prepare($upit);
$statement->execute();


$ime_prezime = "JR";
$putovanje = 6;
$upit = "UPDATE `spisak_putnika` SET `putovanje`=$putovanje WHERE ime_prezime='$ime_prezime'";
$statement = $conn->prepare($upit);
$statement->execute();

$upit = "SELECT * FROM `spisak_putnika` WHERE 'cena'=123";
$res = $conn->query($upit);
var_dump($res);
$upit = "SELECT `ime_prezime` FROM `spisak_putnika` WHERE 'id_putovanja'=17";
$res = $conn->query($upit);
var_dump($res);
$upit = "SELECT * FROM spisak_putnika";
$res = $conn->query($upit);
var_dump($res);

echo "<hr>";
echo "Baza: turisticka_agencija. Tabela: putovanja";
$upit = "INSERT INTO `putovanja`(`datum_polaska`, `datum_povratka`, `destinacija`, `cena`, `id_putovanja`) VALUES (?,?,?,?,?)";
$statement = $conn->prepare($upit);
$datum_polaska = "2020-12-15";
$datum_povratka = "2022-02-16";
$destinacija = 1;
$cena = 123;
$statement->bind_param("sssii", $datum_polaska, $datum_povratka, $destinacija, $cena, $id_putovanja);
$statement->execute();

$upit = "DELETE FROM `putovanja` WHERE cena = '280'";
$statement = $conn->prepare($upit);
$statement->execute();


$datum_polaska = "2020-12-15";
$datum_povratka = "2022-01-10";
$upit = "UPDATE `putovanja` SET `datum_povratka`=$datum_povratka WHERE datum_polaska='$datum_polaska'";
$statement = $conn->prepare($upit);
$statement->execute();


$upit = "SELECT * FROM `putovanja` WHERE cena=123";
$res = $conn->query($upit);
var_dump($res);
$upit = "SELECT `cena` FROM `putovanja` WHERE 'id_destinacije'=15";
$res = $conn->query($upit);
var_dump($res);
$upit = "SELECT * FROM putovanja";
$res = $conn->query($upit);
var_dump($res);


echo "<hr>";
echo "Baza: turisticka_agencija. Tabela: destinacije";

$upit = "INSERT INTO `destinacije`(`drzava`, `grad`, `viza`, `id_destinacije`) VALUES (?,?,?,?)";
$statement = $conn->prepare($upit);
$drzava = "Madjarska";
$grad = "Budimpesta";
$viza = 1;
$statement->bind_param("ssii", $drzava, $grad, $viza, $id_destinacije);
$statement->execute();

$upit = "DELETE FROM `destinacije` WHERE drzava = 'Spanija'";
$statement = $conn->prepare($upit);
$statement->execute();


$viza = 1;
$id_destinacije = 6;
$upit = "UPDATE `destinacije` SET viza=$viza WHERE 'id_destinacije'=$id_destinacije";
$statement = $conn->prepare($upit);
$statement->execute();

$upit = "SELECT * FROM `destinacije` WHERE drzava='Bugarska'";
$res = $conn->query($upit);
var_dump($res);
$upit = "SELECT `drzava` FROM `destinacije` WHERE 'id_destinacije'=10";
$res = $conn->query($upit);
var_dump($res);
$upit = "SELECT * FROM destinacije";
$res = $conn->query($upit);
var_dump($res);




// $upit = "SELECT * FROM `spisak_putnika`";
// $res = $conn->query($upit);
// foreach ($res as $row) {
//     foreach ($row as $key => $value) {
//         var_dump($row);
//     }
// }

// 
