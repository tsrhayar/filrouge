<?php

function checkIfExists($select, $from, $value)
{
    global $db;
    $statement = $db->prepare(("SELECT $select FROM $from WHERE $select = ?"));
    $statement->execute(array($value));

    $check = $statement->rowCount();
    return $check;
}

function fetchOne($from, $where, $myVar)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM $from WHERE $where = ? LIMIT 1");
    $stmt->execute(array($myVar));
    return  $stmt->fetch();
}

function fetchAll($from)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM $from");
    $stmt->execute(array());
    return  $stmt->fetchAll();
}
