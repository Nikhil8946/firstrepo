<?php

namespace App\Model;

use App\Libraries\Database;
use mysqli;

class TodoApp
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function addItem($item_name)
    {
        // SQL query to insert a new item into the database
        $sql = "INSERT INTO todo_items (item_name, completed) VALUES ('$item_name', '0')";

        // Execute the SQL query and check if it was successful
        if ($this->db->execute($sql) === TRUE) {
            echo "New item added successfully";
        } else {
            echo "Error adding item: " . $this->db->error();
        }
    }

    public function editItem($item_id, $new_item_name)
    {
        // SQL query to update an existing item in the database
        $sql = "UPDATE todo_items SET item_name='$new_item_name' WHERE id='$item_id'";

        // Execute the SQL query and check if it was successful
        if ($this->db->execute($sql) === TRUE) {
            echo "Item updated successfully";
        } else {
            echo "Error updating item: " . $this->db->error();
        }
    }

    public function deleteItem($item_id)
    {
        // SQL query to delete an existing item from the database
        $sql = "DELETE FROM todo_items WHERE id='$item_id'";

        // Execute the SQL query and check if it was successful
        if ($this->db->execute($sql) === TRUE) {
            echo "Item deleted successfully";
        } else {
            echo "Error deleting item: " . $this->db->error();
        }
    }

    public function markAsDone($item_id)
    {
        // SQL query to mark an existing item as done in the database
        $sql = "UPDATE todo_items SET completed='1' WHERE id='$item_id'";

        // Execute the SQL query and check if it was successful
        if ($this->db->execute($sql) === TRUE) {
            echo "Item marked as done";
        } else {
            echo "Error marking item as done: " . $this->db->error();
        }
    }

    public function getListOfItems()
    {
        // SQL query to retrieve all items from the database
        $sql = "SELECT * FROM todo_items";

        // Execute the SQL query and get the result set
        $result = $this->db->execute($sql);

        // Check if the result set has any rows
        if ($result->num_rows > 0) {

            // Loop through each row of the result set
            while ($row = $result->fetch_assoc()) {
                $item_name = $row["item_name"];
                $item_id = $row["id"];
                $completed = $row["completed"];

                // Add a strikethrough if the item is completed
                if ($completed == 1) {
                    $item_name = "<del>" . $item_name . "</del>";
                }

                echo "<li>" . $item_name . " 
              <form style='display:inline-block;' method='POST' action=''>
                <input type='hidden' name='item_id' value='" . $item_id . "'>";

                // Only show edit and delete buttons if the item is not completed
                if ($completed == 0) {

                    echo "
                    <input type='text' name='new_item_name' placeholder='New item name...'>
                <button type='submit' name='edit_item'>Edit</button>
                <button type='submit' name='delete_item'>Delete</button>
                <button type='submit' name='mark_as_done'>Mark as done</button>";
                }

                echo "</form></li>";
            }
        }
    }
    public function close()
    {
        // Close the database connection
        $this->db->close();
    }
}
