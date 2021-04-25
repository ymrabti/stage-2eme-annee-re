<?php
$nom = $formation['intitule'];
$admis = $formation['nomadmission'];
$domaine = $formation['nomformation'];
$ecoffert = $formation['nomecole'];
$nomtype = $formation['nomtype'];
$diplome = $formation['diplome'];
$ville = $formation['city'];
$site = $formation['lien'];
$ide = $formation['ecoleoffert'];
$idf = $formation['id'];
$info = $formation['infos'];
$chemine = $formation['chemin'];
?>
<table class='infotable'>
    <tr aria-disabled='true'>
        <td class='header1'>Intitulé de la formation</td>
        <td><?= $nom ?></td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Type de la formation</td>
        <td><?= $nomtype ?> </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>domaine de la Formation</td>
        <td>
            <?= $domaine ?>
        </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Admission (Accès):</td>
        <td>
            <?= $admis ?>
        </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Ville :</td>
        <td><?= $ville ?> </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Type de diplome</td>
        <td><?= $diplome ?> </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Site web :</td>
        <td><?= $site ?> </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Informations supplémentaires :</td>
        <td><?= $info ?> </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Ecole offert :</td>
        <td>
            <a href='/ecoles/<?= $ide ?>'><?= $ecoffert ?></a>
        </td>
    </tr>
</table>

<div>
    <div class='map' id='map'>
        <div id='popup'></div>
    </div>
    <div class='logo'>
        <img alt="<?= $nom ?>" src="/<?= $chemine ?>" />
        <p><?= $nom ?></p>
    </div>
</div>