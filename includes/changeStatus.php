<?php
include "./includes/__head.php";
if (isset($_POST['orderedToSent'])) {
    $commande_id = $_POST['commande_id'];
    $stmt = $db->prepare("UPDATE commande SET commande_status=? WHERE commande_id=?");
    $stmt->execute(array("2sent", $commande_id));
    header("location: allCommande.php");
} elseif (isset($_POST['sentToCompleted'])) {
    $commande_id = $_POST['commande_id'];
    $stmt = $db->prepare("UPDATE commande SET commande_status=? WHERE commande_id=?");
    $stmt->execute(array("3completed", $commande_id));

    header("location: commande.php");
}
