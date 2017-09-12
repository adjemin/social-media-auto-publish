<h1>Republish</h1>

<?php
if (isset($_GET["ok"])) {
    echo "<h2>Ripostato. Controllare.</h2>";
}
?>

<table width="100%">
    <tr>
        <th>ID</th>
        <th>Titolo</th>
        <th>Azioni</th>
    </tr>
    <?php

    foreach(get_posts() as $post) {
        ?>
        <tr>
            <td><?= $post->ID ?></td>
            <td><?= $post->post_title ?></td>
            <td>
                <button onclick="location.href='?page=social-media-auto-publish-re&w=f&id=<?= $post->ID ?>'">Riposta su Facebook</button>
                ::
                <button onclick="location.href='?page=social-media-auto-publish-re&w=t&id=<?= $post->ID ?>'">Riposta su Twitter</button>
                ::
                <button onclick="location.href='?page=social-media-auto-publish-re&w=l&id=<?= $post->ID ?>'">Riposta su LinkedIn</button>
            </td>
        </tr>
        <?php
    }

    ?>
</table>
