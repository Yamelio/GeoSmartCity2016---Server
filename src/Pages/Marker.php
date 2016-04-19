<?php
namespace Pages;

use Models\MarkerModel;
use Tables\MarkerTable;

class Marker extends Page
{

    public function GET($parameters)
    {
        echo "testGet";
        return "uu";
       // return MarkerTable::getAllMarkers();
    }

    public function POST($parameters)
    {

        //if (!empty($parameters) && isset($parameters["name"],/* $parameters["qrcode"],*/ $parameters["clue1"], $parameters["clue2"], $parameters["clue3"], $parameters["comments"], $parameters["puzzle_id"])) {
        //    return MarkerTable::addHunt(new MarkerModel(6, $parameters["name"],/* $parameters["qrcode"], */array($parameters["clue1"], $parameters["clue2"], $parameters["clue3"]), $parameters["comments"], $parameters["puzzle_id"]));
        //}

        return array("error" => "Invalid parameters", "parameters");
    }

    public function PUT($parameters)
    {
        //if (!empty($parameters) && isset($parameters["id"], $parameters["long"], $parameters["lat"], $parameters["alt"], $parameters["name"], $parameters["qrcode"], $parameters["budget"], $parameters["placed"], $parameters["found"], $parameters["solved"])) {
        //    return false;
        //}
        return array("error" => "Invalid parameters");
    }

    public function DELETE($parameters)
    {
        //if (!empty($parameters) && isset($parameters["id"])) {
        //    return false;
        //}
        return array("error" => "Invalid parameters");
    }

    public function OTHER()
    {
        return array("error" => "Incorrect method");
    }

}
?>