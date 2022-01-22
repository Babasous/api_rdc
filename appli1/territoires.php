<?php
$territoires = json_decode(file_get_contents("http://localhost/api_rdc/API/provinces"));
ob_start();
?>

<table class="table">
    <tr>
        <td>Id</td>
        <td>Nom</td>
        <td>Desciption</td>
        <td>Superficie</td>
        <td>Province</td>
    </tr>
    <?php foreach($territoires as $territoire) : ?>
        <tr>
            <td><?= $territoire->id ?></td>
            <td><?= $territoire->libelle ?></td>
            <td><?= $territoire->description ?></td>
            <td><?= $territoire->superficie ?></td>
            <td><?= $territoire->province ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
$content = ob_get_clean();
include("template.php");

