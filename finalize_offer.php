<?php
require __DIR__.'/vendor/autoload.php';
require  __DIR__.'/functions.php';

class FinalizeOfferView
{
    private $conn;

    public function __construct()
    {
        $this->conn = getDatabaseConnection();
        if (isset($_POST["confirm"])){
            $this->saveOffer($_POST);
            $this->render_success_page();
        }
        else {
            $offer_name = $_POST["offer_name"];
            $summary = $this->createSummary($_POST);
            $total_price = $this->getTotalPrice($summary);
            $this->render_page($summary, $total_price, $offer_name);
        }
    }

    private function createSummary($list)
    {
        $summary = array();
        for ($x = 1; $x<=$list["item_count"]; $x++) {
            $item_id = $list["item" . $x];
            if ($item_id) {
                $item_count = $list["count" . $x];
                if ($item_count > 0) {
                    $item_name = $this->getItemName($item_id);
                    $item_price = $this->getItemPrice($item_id, $item_count);
                    $item_stock = $this->getItemStock($item_id);
                    if ($item_stock < $item_count) {
                        $message = "(Currently only " . $item_stock . " in stock)";
                    } else {
                        $message = "";
                    }
                    array_push($summary, array("name" => $item_name, "id" => $item_id, "count" => $item_count,
                        "price" => $item_price, "message" => $message));
                }
            }
        }
        return $summary;
    }

    private function saveOffer($list){
        $offer_id = $this->createOffer($list["offer_name"], $list["total_price"]);
        for ($x = 1; $x <= $list["total_items"]; $x++){
            $this->addItemToOffer($list["id".$x], $list["count".$x], $list["price".$x], $offer_id);
        }
    }
    private function createOffer($offer_name, $total_price){
        $this->conn->query("insert into offers (offer_name, cost) values ('". $offer_name ."', " .$total_price .")");
        return mysqli_insert_id($this->conn);
    }
    private function addItemToOffer($item_id, $count, $price, $offer_id){
        $command = "insert into offer_items (item_id, count, cost, offer_id) values (%d, %d, %d, %d)";
        $result = $this->conn->query(sprintf($command, $item_id, $count, $price, $offer_id));
        echo var_dump($result);
    }
    private function getItemPrice($item_id, $item_count){
        $result = $this->conn->query("select price, discount_type, discount_quantity, discount_percentage from items where id = " . $item_id);
        $price_array= mysqli_fetch_assoc($result);
        $price_for_each = $price_array["price"];
        if ($price_array["discount_type"] == "quantity_discount"){
            if ($price_array["discount_quantity"] <= $item_count ){
                return $item_count * $price_for_each * (100 - $price_array["discount_percentage"])/100;
            }
            else{
                return $item_count * $price_for_each;
            }

        }
        elseif ($price_array["discount_type"] == "3_plus_1"){
            return $price_for_each * ($item_count - floor($item_count/4));
        }
        else{
            return $item_count * $price_for_each;
        }

    }
    private function getItemName($item_id){
        $result = $this->conn->query("select name from items where id = " . $item_id);
        $name = mysqli_fetch_assoc($result)["name"];
        return $name;
    }
    private function getItemStock($item_id){
        $result = $this->conn->query("select count from items where id = " . $item_id);
        $stock = mysqli_fetch_assoc($result)["count"];
        return $stock;
    }
    private function getTotalPrice($summary){
        $total_price = 0;
        foreach ($summary as $item){
            $total_price += $item["price"];
        }
        return $total_price;
    }
    private function render_page($summary, $total_price, $offer_name){
        if (!empty($summary)){
            render("finalize_offer.html", array("summary" => $summary, "total_price" => $total_price, "offer_name" => $offer_name));
        }
        else{
            render("finalize_offer_failure.html", array());
        }
    }
    private function render_success_page(){
        render("successful_offer_creation.html", array());
    }
}

$view = new FinalizeOfferView();
