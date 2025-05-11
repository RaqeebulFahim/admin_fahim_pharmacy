<?php
class SupplierApi extends Api{
	public function __construct(){

		// taken from auth_api authentication
		// if(!$this->authorized()){   
		    
		// 	if ($_SERVER['REQUEST_METHOD'] == 'GET') {			  
		// 		http_response_code(401);//Not Authorized
		//   	    die("401 Unauthorized");
		// 	}
			
        //  }		

		//  taken end here 
	}
	function index(){
		echo json_encode(["suppliers"=>Supplier::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["suppliers"=>Supplier::pagination($page,$perpage),"total_records"=>Supplier::count()]);
	}
	function find($data){
		echo json_encode(["supplier"=>Supplier::find($data["id"])]);
	}
	function delete($data){
		Supplier::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}

	// 08 January some changes here to quick result; uncomment it before next  change:start
	function save($data,$file=[]){
		$supplier=new Supplier();
		$supplier->name=$data["name"];
		// $supplier->email=$data["email"];
		$supplier->phone=$data["phone"];
		// $supplier->website=$data["website"];
		$supplier->address=$data["address"];
		$supplier->photo=upload($file["photo"], "../img/react",$data["name"]);
if ($data["name"] !="") {
	$supplier->save();
}

// 08 January some changes here to quick result; uncomment it before next  change:End
	
		echo json_encode(["success" => "yes"]);
	}



	function update($data,$file=[]){
		$supplier=new Supplier();
		$supplier->id=$data["id"];
		$supplier->name=$data["name"];
		$supplier->email=$data["email"];
		$supplier->phone=$data["phone"];
		$supplier->website=$data["website"];
		$supplier->address=$data["address"];
		if(isset($file["photo"]["name"])){
			$supplier->photo=upload($file["photo"], "../img/react",$data["name"]);
		}else{
			$supplier->photo=Supplier::find($data["id"])->photo;
		}
		$supplier->updated_at=$now;

		$supplier->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
