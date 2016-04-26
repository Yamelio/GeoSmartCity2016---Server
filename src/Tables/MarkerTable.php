<?php

namespace Tables;

use Database;
use Models\MarkerModel;


class MarkerTable
{
    public static function getAllMarkers() {

        $markers = array();
        foreach(Database::fetchAll("SELECT mid, name, d_start, d_end, position, description, category, visible FROM marker") as $marker)
        {
            $markers[] = (new MarkerModel($marker["mid"], $marker["name"], $marker["d_start"],$marker["d_end"] , unserialize($marker["position"]), $marker["description"],$marker["category"],$marker["visible"]))->toArray();
        }
        return $markers;
    }
    /*
        public static function getMarker($id) {
            $hunt = Database::fetchOne("SELECT id, name, qr_code, clue1, clue2, clue3, comments, puzzle_id FROM hunts WHERE id=".$id);
            return (new MarkerModel($hunt["id"], $hunt["name"], $hunt["qrcode"], array($hunt["clue1"], $hunt["clue2"], $hunt["clue3"]), $hunt["comments"], PuzzlesTable::getPuzzle($hunt["puzzle_id"])))->toArray();
        }

    */
    public static function addMarker(MarkerModel $mark)
    {
        $result = Database::execInser("INSERT INTO marker(name, d_start, d_end, position, description, category, visible) VALUES('".$mark->getName()."','".$mark->getDStart()."','".$mark->getDEnd()."','".$mark->getPosition()."','".$mark->getDescription()."',".$mark->getCategory().",".$mark->getVisible().")");
        if(strlen($result) > 0){
            return $result;
        }
        else{
            return false;
        }
        //return array("error" => "Not Implemented yet");
    }

    public static function updateMarker(MarkerModel $marker)
    {
        $result = Database::exec("UPDATE marker SET name='".$marker->getName()."', d_start='".$marker->getDStart()."', d_end='".$marker->getDEnd()."', position='".$marker->getPosition()."', description='".$marker->getDescription()."', category='".$marker->getCategory()."', visible='".$marker->getVisible()."' where mid='".$marker->getId()."';");
        return strlen($result) > 0;
        //return array("error" => "Not Implemented yet");
    }

    public static function deleteMarker($id)
    {
        $result = Database::exec("DELETE FROM marker WHERE mid=".$id);
        return strlen($result) > 0;
        //return array("error" => "Not Implemented yet");
    }

}
