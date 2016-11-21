<?php
require __DIR__.'/vendor/autoload.php';
require  __DIR__.'/functions.php';


class ItemDetailView {
    private $conn;
    private $loaded_item;
    private $announcement;

    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST["save"])) {
                if (isset($_POST["id"])){
                    $this->save($_POST["name"], $_POST["price"], $_POST["count"],  $_POST["discount_type"],
                                $_POST["gluten"], $_POST["discount_quantity"], $_POST["discount_percentage"], $_POST["id"]);
                }
                else{
                    $this->save($_POST["name"], $_POST["price"], $_POST["count"], $_POST["discount_type"],
                                $_POST["gluten"], $_POST["discount_quantity"], $_POST["discount_percentage"]);
                }
            }
            elseif (isset($_POST["modify"])) {
                $this->load($_POST["id"]);
            }
            elseif (isset($_POST["delete"])) {
                $this->delete($_POST["id"]);
            }
        }
        elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET["modify"])) {
                $this->load($_GET["id"]);
            }
        }

        $this->render_page();

    }
    private function save($name, $price, $count, $discount_type, $gluten, $discount_quantity, $discount_percentage, $id = NULL){
        $this->getDBConnection();
        if (isset($id)){
            $command = "update items set name = '%s', price = '%.2f', count = %d, ".
                       "discount_type = '%s', gluten = %d, discount_quantity = '%d', discount_percentage = '%d' where id  = %d";
            $result = $this->conn->query(sprintf($command, $name, $price, $count, $discount_type, $gluten, $id, $discount_quantity, $discount_percentage));
        }
        else{
            $command = "insert into items (name, price, count, discount_type, gluten, discount_quantity, discount_percentage) ".
                       "values ('%s', %d, %d, '%s', %d, %d, %d)";
            $result = $this->conn->query(sprintf($command, $name, $price, $count, $discount_type, $gluten, $discount_quantity, $discount_percentage));
        }
        if ($result){
            $this->announcement = "Item saved successfully.";
        }
        else{
            $this->announcement = "Item couldn't be saved. Check whether you entered correct values in the fields!";
        }
    }
    private function delete($id){
        $this->getDBConnection();
        $result = $this->conn->query("delete from items where id = " . $id);
        if ($result){
            $this->announcement = "Item deleted successfully.";
        }
        else{
            $this->announcement = "Item couldn't be deleted.";
        }
    }

    private function load($id){
        $this->getDBConnection();
        $result = $this->conn->query("select * from items where id = " . $id);
        if ($result){
            $this->loaded_item = mysqli_fetch_assoc($result);
        }

    }
    private function getDBConnection(){
        $this->conn = getDatabaseConnection();
    }
    private function render_page(){
        render("item_detail.html", array("item_description" => $this->loaded_item,
                                         "announcement" => $this->announcement));
    }

}

$view = new ItemDetailView();
