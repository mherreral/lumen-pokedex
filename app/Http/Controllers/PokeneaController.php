<?php

namespace App\Http\Controllers;

class PokeneaController extends Controller
{
    public static $pokeneas = array(
        ["id" => 0, "name" => "Poke Gambeta", "height" => "2m", "skill" => "Hablar rápido", "image" => "gambeta.jpg", "philosophyQuote" => "El sol es mi Dios y los tiempos del sol son perfectos"],
        ["id" => 1, "name" => "Poke Fazeta", "height" => "2m", "skill" => "Dj-iar", "image" => "fazeta.jpg", "philosophyQuote" => "Estoy a 5 canciones de estar por encima de mí"],
        ["id" => 2, "name" => "Poke Kaztro", "height" => "2m", "skill" => "Prender el radio", "image" => "kaztro.jpg", "philosophyQuote" => "Yo ya derroté la soledad, ahora estoy en la edad del sol"],
        ["id" => 3, "name" => "Poke Gustavo Quintero", "height" => "2m", "skill" => "Comprar cadenas que lleguen hasta la rodilla", "image" => "gustavo_quinetro.png", "philosophyQuote" => "Brbrbrbbrbrbrbrbrbbrbrbr"],
        ["id" => 4, "name" => "Poke Octavio Mesa", "height" => "", "skill" => "Pelear con el diablo", "image" => "octavio_mesa.jpg", "philosophyQuote" => "Ayer quede con el diablo, que dicen que es que es muy bravo"],
        ["id" => 5, "name" => "Poke Karol G", "height" => "2m", "skill" => "Ser bichota", "image" => "karolg.jpg", "philosophyQuote" => "Ella se cura con rumba y el amor pa' la tumba"],
        ["id" => 6, "name" => "Poke Esk-Lones", "height" => "2m", "skill" => "Estar bien", "image" => "esklones.jpg", "philosophyQuote" => "Aquí estoy bien, en la calle yo respiro relajado friend"],
        ["id" => 7, "name" => "Poke Darío Gómez", "height" => "2m", "skill" => "Ser el rey del despecho", "image" => "dar%C3%ADo_g%C3%B3mez.jpg", "philosophyQuote" => "Hoy por las calles del amor voy alejando, entre las copas tu mal querer"],
        ["id" => 8, "name" => "Poke Arelys Henao", "height" => "2m", "skill" => "Ser la reina del despecho", "image" => "arelys.jpg", "philosophyQuote" => "Lo pasado pisado, no hay tristezas ni amarguras que me impidan seguir"],
        ["id" => 9, "name" => "Poke Suso el Paspi", "height" => "2m", "skill" => "Ser paspi", "image" => "suso.jpg", "philosophyQuote" => "No quiero darles envisdia pero..."]
    );


    public function generateRandomPokenea($callerMethod)
    {
        $totalPokeneas = (count(PokeneaController::$pokeneas));
        $randomNumber = (rand(0, ($totalPokeneas - 1)));
        $randomPokenea = PokeneaController::$pokeneas[$randomNumber];
        $pokeInfo = array();
        if ($callerMethod == "showPokenea") {
            $pokeInfo["id"] = $randomPokenea["id"];
            $pokeInfo["name"] = $randomPokenea["name"];
            $pokeInfo["height"] = $randomPokenea["height"];
            $pokeInfo["skill"] = $randomPokenea["skill"];
        } else {
            $pokeInfo["image"] = $randomPokenea["image"];
            $pokeInfo["philosophyQuote"] = $randomPokenea["philosophyQuote"];
        }
        return $pokeInfo;
    }

    public function showPokenea()
    {
        $containerID = gethostbyname(gethostname());
        $jsonData["pokenea"] = PokeneaController::generateRandomPokenea("showPokenea");
        $jsonData["containerID"] = $containerID;
        return response()->json(['jsonData' => $jsonData]);
    }

    public function showMultimedia()
    {
        $containerID = gethostbyname(gethostname());
        $pokeMultimedia = PokeneaController::generateRandomPokenea("showMultimedia");
        $data["containerID"] = $containerID;
        $data["pokeMultimedia"] = $pokeMultimedia;
        return view('pokeContent')->with("data", $data);
    }
}
