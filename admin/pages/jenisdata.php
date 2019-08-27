<?php
/* Database connection start */
include "../config/config.php";
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'ID_LAUNDRY',
	1 => 'NAMA_LAUNDRY'
);

// getting total number records without any search
$sql = "SELECT * FROM jenis_laundry ";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT * FROM jenis_laundry ";
	$sql.=" WHERE ID_LAUNDRY LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR NAMA_LAUNDRY LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT * FROM jenis_laundry ";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	
}
$nomor=1;
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$nestedData[] = $nomor++;
    $nestedData[] = $row["NAMA_LAUNDRY"];
    $nestedData[] = '<td><center>
    				  <a href="?page=edit_jenis&id_jenis='.$row['ID_LAUNDRY'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning"> <i class="menu-icon icon-pencil"></i> </a>
                     <a href="admin/Model.php?delete_jenis='.$row['ID_LAUNDRY'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i> </a>
				     </center></td>';		
	
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
