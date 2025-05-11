<?php

class Product{
    public $id;
    public $name;
    public $quantity;
    public $price;
    public $discount;
    public $final_price;
    public $category_id;
    public $uom_id;
    public $barcode;
    public $sku;
    public $manufacturer_id;
    public $description;
   

    // $id, $name, $quantity, $price, $discount, $final_price, $category_id, $uom_id, $barcode, $sku, $manufacturer_id, $description

    public function __construct($id, $name, $quantity, $price, $discount, $final_price, $category_id, $uom_id, $barcode, $sku, $manufacturer_id, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->discount = $discount;
        $this->final_price = $final_price;
        $this->category_id = $category_id;
        $this->uom_id = $uom_id;
        $this->barcode = $barcode;
        $this->sku = $sku;
        $this->manufacturer_id = $manufacturer_id;
        $this->description = $description;
    
    }

    function save()
    {
        global $db;
        $save = $db->query("insert into products(name,quantity,price,discount,final_price,category_id,uom_id,barcode,sku,manufacturer_id,description)values('$this->name', '$this->quantity', '$this->price', '$this->discount','$this->final_price','$this->category_id', '$this->uom_id', '$this->barcode', '$this->sku','$this->manufacturer_id','$this->description')");
        return $save;
    }

    static function search($id)
    {
        global $db;
        $search = $db->query("select * from products where id=$id");
        return $search->fetch_object();
    }

    function update()
    {
        global $db;
        $update = $db->query("update products set name='$this->name',
        quantity='$this->quantity', price='$this->price', discount='$this->discount',final_price='$this->final_price',category_id='$this->category_id', uom_id='$this->uom_id',barcode= '$this->barcode', sku='$this->sku',manufacturer_id='$this->manufacturer_id',description='$this->description'
        where id=$this->id");
        return $update;
    }

    static function delete($id)
    {
        global $db;
        $delete = $db->query("delete from products where id=$id");
        return $delete;
    }

    static function display()
    {
        global $db;
        $display = $db->query("select * from products");
//         $html = "
//         <table class='table table-bordered'>
//     <thead>
//     <tr>
//     <th>ID</th>  
//     <th>Name</th> 
//     <th>Addres</th>
//     <th> Phone </th> 
//     <th> Email</th>
//     <th>Photo</th>
//     <th>Action</th>
//     </tr>
//     </thead>
 
// ";

$html="
<table class=\"table table-bordered\">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>quantity</th>
            <th>price</th>
            <th>discount</th>
            <th>final_price</th>
            <th>category_id</th>
            <th>uom_id</th>
            <th>barcode</th>
            <th>sku</th>
            <th>manufacturer_id</th>
            <th>description</th>
            <th>Action</th>

        </tr>
    </thead><tbody>
    
";



        // print_r($display);
        while ($row = $display->fetch_object()) {
            $html .= "

            
        <tr>
            <td>$row->id</td>
            <td>$row->name</td>
            <td>$row->quantity</td>
            <td>$row->price</td>
            <td>$row->discount</td>
            <td>$row->final_price</td>
            <td>$row->category_id</td>
            <td>$row->uom_id</td>
            <td>$row->barcode</td>
            <td>$row->sku</td>
            <td>$row->manufacturer_id</td>
            <td>$row->description</td>
            <td>
    <a class='btn bg-success' href=\"product/edit?id=$row->id\">Edit</a> 
<a  class='btn bg-danger'href=\"product/delete?id=$row->id\">Delete</a>

</td>
        </tr>
";
        }
        $html .= "    </tbody>
</table>";

        return $html;
    }
}

