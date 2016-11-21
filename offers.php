<?php
require __DIR__.'/vendor/autoload.php';
require  __DIR__.'/functions.php';

class OffersView{
    private $conn;
    private $loaded_offers;
    public function __construct()
    {
        $this->getOffers();
        $this->render_page();

    }
    private function getOffers(){
        $this->conn = getDatabaseConnection();
        $result = $this->conn->query("select * from offers");
        if ($result){
            $this->loaded_offers = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }
    private function render_page(){
        render("offers.html", array("table" => $this->loaded_offers));
    }

}

$view = new OffersView();