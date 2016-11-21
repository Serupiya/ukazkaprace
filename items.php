<?php
require __DIR__.'/vendor/autoload.php';
require  __DIR__.'/functions.php';
#Twig_Autoloader::register();

class ItemsView {
    private $itemlist;
    private $conn;
    private $selected_filter;

    public function __construct()
    {
        $this->conn = getDatabaseConnection();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST["delete"])){
                $this->deleteItem($_POST["id"]);
            }
            elseif (isset($_POST["filter"])){
                $this->getFilteredItemsFromDB($_POST["filter_select"]);
            }
        }

        if (!isset($this->itemlist)) $this->getItemsFromDB();

        $this->render_page();
    }
    private function getItemsFromDB(){
        $result = $this->conn->query("select * from items");
        if ($result) $this->itemlist = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    private function getFilteredItemsFromDB($gluten_filter){
        if ($gluten_filter == "gluten") {
            $filter = "where gluten = TRUE";
            $this->selected_filter = "gluten";
        }
        elseif ($gluten_filter == "glutenfree"){
            $filter = "where gluten = FALSE";
            $this->selected_filter = "glutenfree";
        }
        else{
            $filter = "";
        }
        $result = $this->conn->query("select * from items " . $filter);
        if ($result) $this->itemlist = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    private function deleteItem($itemID){
        $this->conn->query("delete from items where id = " . $itemID);
    }
    private function render_page(){
        render("items.html", array("table" => $this->itemlist, "selected_filter" => $this->selected_filter));
    }

}

$view = new ItemsView();