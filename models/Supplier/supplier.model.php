<?php

class Supplier{
    public $id;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $photo;


    public function __construct($id, $name, $address, $phone, $email, $photo)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->photo = $photo;
    }

    function save()
    {
        global $db;
        $save = $db->query("insert into suppliers (name, address, phone, email, photo)values('$this->name', '$this->address', '$this->phone', '$this->email','$this->photo')");
        return $save;
    }

    static function search($id)
    {
        global $db;
        $search = $db->query("select * from suppliers where id=$id");
        return $search->fetch_object();
    }

    function update()
    {
        global $db;
        $update = $db->query("update suppliers set name='$this->name', address='$this->address', email='$this->email', phone='$this->phone',   photo='$this->photo' where id=$this->id");
        return $update;
    }

    static function delete($id)
    {
        global $db;
        $delete = $db->query("delete from suppliers where id=$id");
        return $delete;
    }

    static function display()
    {
        global $db;
        $display = $db->query("select * from suppliers");
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
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>PHoto</th>
            
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
            <td>$row->address</td>
            <td>$row->phone</td>
            <td>$row->email</td>
            <td>$row->photo</td>
            <td>
    <a class='btn bg-success' href=\"supplier/edit?id=$row->id\">Edit</a> 
<a  class='btn bg-danger'href=\"supplier/delete?id=$row->id\">Delete</a>

</td>
        </tr>
";
        }
        $html .= "    </tbody>
</table>";

        return $html;
    }
}

