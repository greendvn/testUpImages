<?php

class Note_typeController
{
    protected $connecDB;

    public function __construct()
    {
        $db = new DBConnection("mysql:host=localhost;dbname=iNotesTest", "root", "Dieu1988");
        $this->connecDB = new InotesDB($db->connect());
    }

    public function getListNote_type()
    {
        $note_types = $this->connecDB->listNoteType();
        include_once "view/note_type/listNote_type.php";

    }

    public function addNoteType()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET")
            include_once "view/note_type/addNote_type.php";
        else {
            $name = $_POST["name"];
            $description = $_POST["description"];
            $image = $_FILES["image"];
            $imageName = date("Y-m-d H:i:s").$image["name"];
            $fileTmp = $image['tmp_name'];
            move_uploaded_file($fileTmp, "images/".$imageName);
            $note_type = new Note_type($name);
            $note_type->setDescription($description);
            $note_type->setImage($imageName);
            $this->connecDB->addNoteType($note_type);
            $message = "New Note type created";
             include_once "view/note_type/addNote_type.php";

        }

    }

}