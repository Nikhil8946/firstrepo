<?php

namespace App\Controllers;

use App\Model\TodoApp as user_model;

class Home
{

    private $db;
    public $mail;
    public function __construct()
    {

        $this->db = new user_model();
        require_once APPROOT . "/View/Homepage.php";
    }
    public function edit()
    {
        if (isset($_POST['add_item'])) {
            $item_name = $_POST['item_name'];
            $this->db->addItem($item_name);
        }
        // If the edit_item button is clicked, the editItem method is called with the item id and the new item name entered by the user.
        if (isset($_POST['edit_item'])) {
            $item_id = $_POST['item_id'];
            $new_item_name = $_POST['new_item_name'];
            $this->db->editItem($item_id, $new_item_name);
        }
        // If the delete_item button is clicked, the deleteItem method is called with the item id.
        if (isset($_POST['delete_item'])) {
            $item_id = $_POST['item_id'];
            $this->db->deleteItem($item_id);
        }
        // If the mark_as_done button is clicked, the markAsDone method is called with the item id.
        if (isset($_POST['mark_as_done'])) {
            $item_id = $_POST['item_id'];
            $this->db->markAsDone($item_id);
        }
        // After the above operations, the getListOfItems method is called to display the list of items in the Todo app.
        $this->db->getListOfItems();
    }
}
