<?php
$site = $ecole['siteweb'];
$nom = $ecole['nomecole'];
$nomtype = $ecole['nomtype'];
$ville = $ecole['vil'];
$chemin = $ecole['chemin'];
$adresse = $ecole['adresse'];
$tel = $ecole['tel'];
$fax = $ecole['fax'];
$info = $ecole['infos'];
?>
<table class='infotable'>
    <tr aria-disabled='true'>
        <td class='header1'>Nom de l’école</td>
        <td><?= $nom ?></td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Type de l’école</td>
        <td><?= $nomtype ?> </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Filières :</td>
        <td>
            <ul>
                <?php foreach ($domaines as $dom) { ?>
                    <li><?= $dom['nom'] ?></li>
                <?php } ?>
            </ul>
        </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Admission (Accès):</td>
        <td>
            <ul>
                <?php foreach ($admission as $ads) { ?>
                    <li><?= $ads['nom'] ?></li>
                <?php } ?>
            </ul>
        </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Ville(s) :</td>
        <td><?= $ville ?> </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Adresse :</td>
        <td><?= $adresse ?> </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Tél :</td>
        <td><?= $tel ?> </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Fax :</td>
        <td><?= $fax ?> </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Site web :</td>
        <td><a href="<?= $site ?>" target="_blank"><?= $site ?></a> </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Informations supplémentaires :</td>
        <td><?= $info ?> </td>
    </tr>
    <tr aria-disabled='true'>
        <td class='header1'>Formations disponibles :</td>
        <td>
            <ul>
                <?php foreach ($formations as $formation) { ?>
                    <li>
                        <a href='/formations/<?= $formation['id'] ?>'><?= $formation['intitule'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </td>
    </tr>
</table>

<div>
    <div class='map' id='map'>
        <div id='popup'></div>
    </div>
    <div class='logo'>
        <img alt="<?= $nom ?>" src="/<?= $chemin ?>" />
        <p><?= $nom ?></p>
    </div>
</div>
