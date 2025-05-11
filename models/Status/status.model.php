<?php
class Status{
    public $id;
    public $name;
    // public $created_at;
    // public $updated_at;


    public function __construct($id, $name){
        $this->id= $id;
        $this->name=$name;
    //     $this->created_at=$created_at;
    //     $this->updated_at=$updated_at;
    }
 
//  $created_at, $updated_at
//  '$this->created_at'
// , created_at, updated_at

    public function save(){
        global $db;
        $save=$db->query("insert into status(name)values('$this->name')");
        return $save;
    }


    static function search($id){
        global $db;
        $search=$db->query("select * from status where id='$id'");
        return $search;
    }

   function update(){
        global $db;
        $update= $db->query("update status set name='$this->name' where id='$this->id'");
        return $update;
    }

    static function delete($id){
        global $db;
        $delete= $db->query("delete from status where id=$id");
        return $delete;
    }

    static function display(){
        global $db;
        $display=$db->query("select * from status");
       $html=" <table class='table'>
<thead>
<tr>
<th>ID</th>
<th>Name</th><th>Action</th></tr></thead><tbody>
       
       ";

       while($row=$display->fetch_object()){
        $html.="
        <tr><td>$row->id</td><td>$row->name</td>
<td>
<a href='status/edit?id=$row->id'>Edit</a>
<a href='status/delete?id=$row->id'>Delete</a>
</td>
</tr>;
        ";
       }
$html.="
       </tbody>
       </table>";
       return $html;

    }

}


