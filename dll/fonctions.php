<?php
/**
 * PHP version 8.0.10
 * @Author: Hatcattt
 * @Mail: mercier.prodev@gmail.com
 * @GitHub: https://github.com/Hatcattt
 * Date: 10/2021
 * Description: Fonctions utiles pour le programme du pendu.
 */

/** Crée un plateau de jeu en fonction de la longueur du mot à trouver.
 * @param string $mot Le mot à transformer.
 * @return string string
 */
function setPlateauDeJeu(string $mot): string {
    return str_repeat('_', strlen($mot));
}

/** Affiche un string avec des espaces entre chaques caractères.
 * @param string $string String à afficher.
 */
function afficheAvecEspaces(string $string) : void {
    $chars = str_split($string);
    foreach ($chars as $char) {
        echo $char . " ";
    }
}

/** Affiche un array sous la forme [ element_1 element_2 element_N ]
 * @param array $array Le tableau à afficher.
 */
function afficheArray(array $array) : void {
    echo '[';
    foreach ($array as $element) {
        echo color($element, 'v') . ' - ';
    }
    echo "]\n";
}

/** Renvoie un string coloré.
 * @param string $string string à colorer.
 * @param string $color la couleur (v -> vert, r -> rouge)
 * @return string string
 */
function color(string $string, string $color) : string {
    return match ($color) {
        'v' => "\e[32m$string\e[0m", // vert
        'r' => "\e[31m$string\e[0m", // rouge
        default => $string,
    };
}
