<style>
    .flip-card-3D-wrapper {
        width: 100%;
        height: 100%;
        position: center;
        -webkit-perspective: 900px;
        perspective: 900px;
        margin: 0 auto;
    }

    #flip-card {
        width: 100%;
        height: 100%;
        text-align: center;
        -o-transition: all 1s ease-in-out;
        -webkit-transition: all 1s ease-in-out;
        transition: all 1s ease-in-out;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }

    .do-flip {
        -o-transform: rotateY(180deg);
        -webkit-transform: rotateY(180deg);
        -ms-transform: rotateY(180deg);
        transform: rotateY(180deg);
    }

    #flip-card .flip-card-front,
    #flip-card .flip-card-back {
        z-index: 2;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        width: 100%;
        height: 100%;
        position: absolute;
    }

    #flip-card .flip-card-front .flip-card-back {
        border: 1px solid grey;
    }

    #flip-card .flip-card-back {
        -o-transform: rotateY(180deg);
        -webkit-transform: rotateY(180deg);
        -ms-transform: rotateY(180deg);
        transform: rotateY(180deg);
    }

    #flip-card .flip-card-front,
    #flip-card .flip-card-back {
        /**/
        color: black;
        display: block;
        width: 100%;
    }

    .flip-card-3D-wrapper,
    form {
        padding: 10px;
    }

    .flip-card-3D-wrapper {
        max-width: 700px;
        width: 100%;
    }

    .autocomplete {
        position: relative;
        display: inline-block;
    }

    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
        padding-right: 20px;
    }
</style>
<?php

/**
 * Search tab
 * php version 7.3.11
 * 
 * @category Php
 * @package  Php
 * @author   Display Name <younesmrabti50@gmail.com>
 * @license  "younes.ma" Not
 * @link     "younes.ma"
 */
/**
 * Daram requ

 * @param $resultat 
 * @param $champs 
 * 
 * @return $array 
 */
function resultotab($resultat, $champs)
{
    $array = array();
    foreach ($resultat as $element) {
        array_push($array, $element[$champs]);
    }
    return $array;
}

$ecoletab = resultotab($ecoles, 'nom');
$forms = resultotab($formations, 'intitule');

?>
<div class="flip-card-3D-wrapper">
    <div id="flip-card">
        <div class="flip-card-front">
            <div class="header">
                <h2>Rechercher une ecole</h2>
            </div>
            <form autocomplete="off" action="/ecoles" method="get">
                <div class="autocomplete">
                    <input id="ecole" type="search" placeholder="Rechercher une école" aria-label="Search" name="eq">
                </div>
                <input type="submit" value="Search">
            </form>
            <form class="form1" action="/ecoles" method="get">
                <table name="table_search_form">
                    <tr>
                        <td>
                            <label style="margin: 10px 5px 10px 5px;
                    padding: 3px;border-radius: 5px;">Type d’Etablissement </label>
                        </td>
                        <td>
                            <select name="typeEtablissement" style="margin: 10px 5px 10px 5px;padding: 
                    3px;border-radius: 5px;">
                                <option value="1">Tout *</option>
                                <?php foreach ($types as $type) { ?>
                                    <option value="<?= $type['id'] ?>">
                                        <?= ($type['nom']) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="margin: 10px 5px 10px 5px;padding: 
                    3px;border-radius: 5px;">Type de Diplôme </label>
                        </td>
                        <td>
                            <select style="margin: 10px 5px 10px 5px;padding: 
                    3px;border-radius: 5px;" name="typeDiplome">
                                <option value="1">Tout *</option>
                                <?php foreach ($diplomes as $diplome) : ?>
                                    <option value="<?= $diplome['id'] ?>">
                                        <?= $diplome['nom'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="margin: 10px 5px 10px 5px;
                    padding: 3px;border-radius: 5px;">
                                Niveau d’accès à l'établissement
                            </label>
                        </td>
                        <td>
                            <select style="margin: 10px 5px 10px 5px;padding: 
                    3px;border-radius: 5px;" name="acces-ecole">
                                <option value="1">Tout *</option>
                                <?php foreach ($accesecoles as $admission) : ?>
                                    <option value="<?= $admission['id'] ?>">
                                        <?= ($admission['nom']) ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="margin: 10px 5px 10px 5px;padding: 3px;
                    border-radius: 5px;">Domaine de formation </label>
                        </td>
                        <td>
                            <select style="margin: 10px 5px 10px 5px;padding: 3px;
                    border-radius: 5px;" name="domaineFormation">
                                <option value="1">Tout *</option>
                                <?php foreach ($domaines as $domaine) : ?>
                                    <option value="<?= $domaine['id'] ?>">
                                        <?= ($domaine['nom']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="margin: 10px 5px 10px 5px;padding: 3px;
                    border-radius: 5px;">Ville </label>
                        </td>
                        <td>
                            <select style="margin: 10px 5px 10px 5px;padding: 3px;
                    border-radius: 5px;" name="ville-ecole">
                                <option value="1">Tout * </option>
                                <?php foreach ($villes as $ville) : ?>
                                    <option value="<?= esc($ville['id']) ?>">
                                        <?= esc($ville['nom']) ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                </table>


                <button class="button1">
                    Lancer la recherche</button>
                <br><br>

            </form>
            <h3>vous recherchez une <a id="flip-card-btn-turn-to-back" class="button">formation</a> ?</h3>


        </div>

        <div class="flip-card-back">
            <div class="header">
                <h2>Rechercher une formation</h2>
            </div>
            <form autocomplete="off" action="/formations" method="get">
                <div class="autocomplete">
                    <input id="formation" type="search" placeholder="Rechercher une formation" aria-label="Search" name="ef">
                </div>
                <input type="submit" value="Search">
            </form>
            <form class="form1" action="/formations" method="get">
                <table name="table_search_form">
                    <tr>
                        <td>
                            <label style="margin: 10px 5px 10px 5px;
                    padding: 3px;border-radius: 5px;">Type de formation </label>
                        </td>
                        <td>
                            <select style="margin: 10px 5px 10px 5px;
                    padding: 3px;border-radius: 5px;" name="typeFormation">
                                <option value="1">Tout *</option>
                                <?php foreach ($types as $type) : ?>
                                    <option value="<?= $type['id'] ?>">
                                        <?= ($type['nom']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="margin: 10px 5px 10px 5px;
                    padding: 3px;border-radius: 5px;">Type de Diplôme </label>
                        </td>
                        <td>
                            <select style="margin: 10px 5px 10px 5px;
                    padding: 3px;border-radius: 5px;" name="typeDiplomeff">
                                <option value="1">Tout *</option>
                                <?php foreach ($diplomes as $diplome) : ?>
                                    <option value="<?= $diplome['id'] ?>">
                                        <?= ($diplome['nom']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="margin: 10px 5px 10px 5px;
                    padding: 3px;border-radius: 5px;">Niveau d’accès à la formation
                            </label>
                        </td>
                        <td>
                            <select style="margin: 10px 5px 10px 5px;padding: 3px;
                    border-radius: 5px;" name="acces-formation">
                                <option value="1">Tout *</option>
                                <?php foreach ($accesecoles as $admission) : ?>
                                    <option value="<?= $admission['id'] ?>">
                                        <?= ($admission['nom']) ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="margin: 10px 5px 10px 5px;padding: 3px;
                    border-radius: 5px;">Domaine de formation </label>
                        </td>
                        <td>
                            <select style="margin: 10px 5px 10px 5px;padding: 3px;
                    border-radius: 5px;" name="domaineFormationff">
                                <option value="1">Tout *</option>
                                <?php foreach ($domaines as $domaine) : ?>
                                    <option value="<?= $domaine['id'] ?>">
                                        <?= ($domaine['nom']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="margin: 10px 5px 10px 5px;padding: 3px;
                    border-radius: 5px;">Ville </label>
                        </td>
                        <td>
                            <select style="margin: 10px 5px 10px 5px;padding: 3px;
                    border-radius: 5px;" name="ville-formation">
                                <option value="1">Tout * </option>
                                <?php foreach ($villes as $ville) : ?>
                                    <option value="<?= $ville['id'] ?>">
                                        <?= ($ville['nom']) ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                </table>

                <button class="button1">
                    Lancer la recherche</button>
                <br><br>
            </form>
            <h3>vous recherchez une <a id="flip-card-btn-turn-to-front" class="button">ecole</a> ?</h3>

        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById('flip-card-btn-turn-to-back')
            .style.visibility = 'visible';
        document.getElementById('flip-card-btn-turn-to-front')
            .style.visibility = 'visible';

        document.getElementById('flip-card-btn-turn-to-back')
            .onclick = function() {
                document.getElementById('flip-card')
                    .classList.toggle('do-flip');
            };

        document.getElementById('flip-card-btn-turn-to-front')
            .onclick = function() {
                document.getElementById('flip-card').classList.toggle('do-flip');
            };

    });
    console.log(<?php echo json_encode($ecoletab); ?>);
    $("#ecole").autocomplete({
        source: <?php echo json_encode($ecoletab); ?>,
        minLength: 2
    });
    $("#formation").autocomplete({
        source: <?php echo json_encode($forms); ?>,
        minLength: 2
    });
</script>