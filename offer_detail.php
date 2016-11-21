<?php
require __DIR__.'/vendor/autoload.php';
require  __DIR__.'/functions.php';

class OfferDetailView{
    private $offer;
    private $offer_items;
    private $conn;
    private $message;

    public function __construct()
    {
        if (isset($_GET["id"])){
            $this->conn = getDatabaseConnection();
            $this->getOffer($_GET["id"]);
            $this->getOfferItems($_GET["id"]);
        }
        else{
            $this->message = "Offer not found";
        }
        $this->render();
    }

    private function getOffer($id){
        $result = $this->conn->query("select * from offers where id = " . $id);
        if ($result){
            $this->offer = mysqli_fetch_assoc($result);
        }
        else{
            $this->message = "Offer not found";
        }
    }
    private function getOfferItems($id){
        $result = $this->conn->query("select * from offer_items where offer_id = " . $id);
        $this->offer_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
        for ($i = 0; $i<sizeof($this->offer_items); $i++){
            $this->offer_items[$i]["name"] = $this->getItemName($this->offer_items[$i]["item_id"]);
        }
    }
    private function getItemName($id){
        $result = $this->conn->query("select * from items where id = " . $id);
        if ($result and $result->num_rows) {
            return mysqli_fetch_assoc($result)["name"];
        }
        else{
            return "Item no longer exists";
        }
    }
    private function render(){

        render("offer_detail.html", array("offer" => $this->offer,
                                          "offer_items" => $this->offer_items,
                                          "message" => $this->message));
    }

}

$view = new OfferDetailView();