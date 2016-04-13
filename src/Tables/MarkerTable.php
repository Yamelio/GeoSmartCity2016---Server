<?php

namespace Tables;

use Database;
use Models\MarkerModel;

class MarkerTable
{
    public static function getAllMarkers() {
        $hunts = array();
        foreach(Database::fetchAll("SELECT id, name, qr_code, clue1, clue2, clue3, comments, puzzle_id FROM hunts") as $hunt)
        {
            $hunts[] = (new MarkerModel($hunt["id"], $hunt["name"], $hunt["qrcode"], array($hunt["clue1"], $hunt["clue2"], $hunt["clue3"]), $hunt["comments"], PuzzlesTable::getPuzzle($hunt["puzzle_id"])))->toArray();
        }
        return $hunts;
    }

    public static function getMarker($id) {
        $hunt = Database::fetchOne("SELECT id, name, qr_code, clue1, clue2, clue3, comments, puzzle_id FROM hunts WHERE id=".$id);
        return (new MarkerModel($hunt["id"], $hunt["name"], $hunt["qrcode"], array($hunt["clue1"], $hunt["clue2"], $hunt["clue3"]), $hunt["comments"], PuzzlesTable::getPuzzle($hunt["puzzle_id"])))->toArray();
    }


    public static function addMarker(MarkerModel $dig)
    {
        $result = Database::exec("INSERT INTO hunts( name, clue1, clue2, clue3, comments, puzzle_id) VALUES(".$dig->getName().",".$dig->getClues()[0].",".$dig->getClues()[1].",".$dig->getClues()[2].",".$dig->getComments().",".$dig->getPuzzle()->getId().")");
        return len($result) > 0;
        //return array("error" => "Not Implemented yet");
    }

    public static function setMarker($id, MarkerModel $dig)
    {
        $result = Database::exec("UPDATE hunts SET name='".$dig->getName()."', qr_code='".$dig->getQRCode()."', clue1='".$dig->getClues
        ()[0]."', clue2='".$dig->getClues()[1]."', clue3='".$dig->getClues()[2]."', comments='".$dig->getComments()."', puzzle_id='".$dig->getPuzzle()->getId()."')");
        return len($result) > 0;
        //return array("error" => "Not Implemented yet");
    }

    public static function removeMarker($id)
    {
        $result = Database::exec("DELETE FROM marker WHERE id=".$id);
        return len($result) > 0;
        //return array("error" => "Not Implemented yet");
    }

}