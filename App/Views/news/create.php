<style>
    label,
    input,
    textarea {
        margin: 5px;
        padding: 7px;
    }

    h2 {
        margin: 5rem 0px 0in 5rem;
    }
</style>
<h2><?= esc($title) ?></h2>

<?php if (!empty($errors)) : ?>
    <div style="color: orangered;background: yellow;">
        <?php foreach ($errors as $field => $error) : ?>
            <p><?= $error ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>
<form action="/news/create" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="body">Text</label>
    <textarea name="body"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />
</form>