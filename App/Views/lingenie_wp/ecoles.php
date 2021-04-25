<table class="result_search">
    <thead>
        <th class='header1'>Nom de l'école</th>
        <th class='header1'>Logo</th>
        <th class='header1'>Site Web</th>
        <th class='header1'>Informations</th>
    </thead>
    <tbody>
        <?php foreach ($ecoles as $ecole) {
            $id = $ecole['idecole'];
            $ecole_name = $ecole['nom'];
            $site = $ecole['siteweb'];
            $logoindex = $ecole['img'];
            $logopath = $ecole['chemin'];
            $utf8inf = $ecole['infos'];
        ?>
            <tr>
                <td>
                    <a href='ecoles/<?= $id ?>'> <?= $ecole_name ?></a>
                </td>
                <td>
                    <a href="/<?= $logopath ?>" onclick="window.open(this.href,'Image','scrollbars=yes,resizable=yes,status=no,width=600,height=450'); return false;">
                        <img alt="<?= $logoindex ?>" src="/<?= $logopath ?>" style='max-height: 70px;' />
                    </a>
                </td>
                <td>
                    <a type='button' target="_blank" class='sitecole' href="<?= $site ?>">
                        <?= $site ?>
                    </a>

                </td>
                <td>
                    <div style='max-height: 300px;'>
                        <?= substr($utf8inf, 0, 75) ?>
                    </div>
                </td>
            </tr>
        <?php } ?>

    </tbody>

</table>
<nav>
    <?= $pager->only(['typeEtablissement','typeDiplome','acces-ecole','domaineFormation','ville-ecole=1'])->links(); ?>
</nav>