<?php

class InotesDB
{
    public $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function addNoteType($noteType){
        $sql = "INSERT INTO note_type (name, image, description) VALUES (?, ?, ?)";
        $stmt = $this->connect->prepare($sql);
        $name = $noteType->getName();
        $image = $noteType->getImage();
        $description = $noteType->getDescription();
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $image);
        $stmt->bindParam(3, $description);
        $stmt->execute();
    }
    public function listNoteType(){
        $sql = "SELECT * FROM note_type";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $arr = [];

        foreach ($result as $item){
            $note_type = new Note_type($item["name"]);
            $note_type->setId($item["id"]);
            $note_type->setImage($item["image"]);
            $note_type->setDescription($item["description"]);
            array_push($arr,$note_type);
        }
        return $arr;
    }
}