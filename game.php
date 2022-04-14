<?php
/**
 * PHP version 8.0.10
 * @Author: Hatcattt
 * @Mail: hatcattt.dev@gmail.com
 * @GitHub: https://github.com/Hatcattt
 * Date: 10/2021
 * Description: Jeu du pendu en mode cli.
 */

include("dll/dessin.php");
include("dll/fonctions.php");

$vies = 7;

$tab_de_mots = file('dll/mots.txt', FILE_IGNORE_NEW_LINES);
$mot_mystere = $tab_de_mots[mt_rand(0, count($tab_de_mots))];
$len_mot = strlen($mot_mystere);

$lettres_jouees = [];
$lettres_trouvees = [];

$plateau_jeu = setPlateauDeJeu($mot_mystere);

echo titre();

// boucle principale du jeu
while(true) {
    echo dessinPendu($vies) . "\n";
    afficheAvecEspaces($plateau_jeu);
    echo "\n\n";

    if (count($lettres_trouvees) == $len_mot) {
        echo color("Bravo, vous avez gagné la partie !\n", 'v');
        break;
    }
    if ($vies == 0) {
        echo color("Oh non, le pauvre ! Vous avez échoué...\n", 'r');
        echo "Le mot à trouver était : " . color($mot_mystere, 'v');
        break;
    }

    echo "Lettres déjà jouées : ";
    afficheArray($lettres_jouees);

    $lettre_user = strtoupper(readline("Entrez votre lettre : "));

    // boucle pour checker l'input du user
    while (true) {
        if (strlen($lettre_user) != 1 || preg_match('~[A-Z]~', $lettre_user) < 1) {
            echo color("Uniquement une lettre entre A et Z !\n", 'r');
            $lettre_user = strtoupper(readline("Entrez votre lettre : "));

        } elseif (str_contains(implode($lettres_jouees), $lettre_user)) {
            echo color("Oups, vous avez déjà joué la lettre \e[32m$lettre_user\e[0m\n", 'r');
            $lettre_user = strtoupper(readline("Entrez votre lettre : "));

        } else break;
    }

    if (str_contains($mot_mystere, $lettre_user)) {
        array_push($lettres_jouees, color($lettre_user, 'v'));

        for ($i = 0; $i < $len_mot; $i++) {
            if ($lettre_user == $mot_mystere[$i]) {
                $plateau_jeu[$i] = $lettre_user;
                array_push($lettres_trouvees, $lettre_user);
            }
        }
    } else {
        array_push($lettres_jouees, color($lettre_user, 'r'));
        $vies--;
    }
}
