<?php
require __DIR__.'/vendor/autoload.php';
require  __DIR__.'/functions.php';
class CreateOfferView{
    private $itemlist;
    private $conn;

    public function __construct()
    {
        $this->conn = getDatabaseConnection();
        $this->getAllItems();
        $this->render_page();
    }
    private function getAllItems(){
        $result = $this->conn->query("select id, name from items");
        if ($result) $this->itemlist = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    private function render_page(){
        render("create_offer.html", array("item_table" => $this->itemlist));
    }
}

$view = new CreateOfferView();