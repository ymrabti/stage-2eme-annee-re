<table class="result_search">
    <thead>
        <th class='header1'>Intitule</th>
        <th class='header1'>Logo</th>
        <th class='header1'>Site Web</th>
        <th class='header1'>Informations</th>
        <th class='header1'>Ecole</th>
    </thead>
    <tbody>
        <?php foreach ($formations as $formation) {
            $id = $formation['id'];
            $formation_name = $formation['intitule'];
            $site = $formation['lien'];
            $logoindex = $formation['chemin'];
            $logopath = $formation['chemin'];
            $infos = $formation['infos'];
        ?>
            <tr>
                <td>
                    <a href='formations/<?= $id ?>'> <?= $formation_name ?><br></a>
                </td>
                <td>
                    <a href="/<?= $logopath ?>" onclick="window.open(this.href,'Image','scrollbars=yes,resizable=yes,status=no,width=600,height=450'); return false;">
                        <img alt='no data' src='/<?= $logopath ?>' style='max-height: 70px' />
                    </a>
                </td>
                <td>
                    <a type='button' class='sitecole' href="<?= $site ?>">
                        <?= $site ?>
                    </a>
                </td>
                <td>
                    <div style='max-height: 300px;'>
                        <?= substr($infos, 0, 75) ?>
                    </div>
                </td>
                <td>
                    <a href='ecoles/<?= $formation['ecoleoffert'] ?>'>
                        <?= $formation['nom'] ?>
                    </a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>
<nav>
    <?= $pager->only(['typeEtablissement', 'typeDiplome', 'acces-ecole', 'domaineFormation', 'ville-ecole=1'])->links(); ?>
</nav>