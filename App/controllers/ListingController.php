<?php

require basePath('Framework/Validation.php');

class ListingController{

protected $db;    

public function __construct()
{
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
}




public function index(){

    $param = [
        'user_id' => Session::get('user')['id']
    ]; 
    $listings = $this->db->query('SELECT * FROM tasks WHERE user_id = :user_id' , $param)->fetchAll();

    loadView('home', [
        'listings' => $listings
    ]);
       

}

public function create(){
    loadView('listings/create');
}

public function show(){
     $id = $_GET['id'];

    $params = [
        'id' => $id
    ];


    $listing = $this->db->query('SELECT * FROM tasks WHERE id = :id', $params)->fetch(); //:id = placeholder


    loadView('listings/show' , [
        'listing' => $listing
]);
}

//prevent field injection
public function store(){


    $array = ['title' , 'description'];

    $newListingArray = array_intersect_key($_POST , array_flip($array)); // se copiaza valorile din post care au acelasi key cu array;
    $newListingArray = array_map(
        function ($var){ return filter_var(trim($var) , FILTER_SANITIZE_SPECIAL_CHARS);
    } , $newListingArray);


    $errors = [];

    $newListingArray['user_id'] = Session::get('user')['id'];

     $fields = [];
     $values = [];
    foreach($newListingArray as $field => $value){
        $fields[] = $field;
        $values[] = ":". $field;
    }
    $fields = implode(', ', $fields); //transforma aarray-ul in string
    $values = implode(", " , $values);

    foreach($newListingArray as $field => $value){
        if($field == ''){
            $newListingArray[$field] = null;
        }
    }

     $query = "INSERT INTO tasks ({$fields}) VALUES ({$values}) ";

    $this->db->query($query , $newListingArray);




    $param = [
        'user_id' => Session::get('user')['id']
    ]; 
    $listings = $this->db->query('SELECT * FROM tasks WHERE user_id = :user_id' , $param)->fetchAll();

    loadView('home', [
        'listings' => $listings
    ]);

}





public function destroy(){


    $id = $_POST['_listing_id'];


    $params = [
        'id' => $id
    ];

    $this->db->query('DELETE FROM tasks WHERE id = :id', $params);


    $param = [
        'user_id' => Session::get('user')['id']
    ]; 
    $listings = $this->db->query('SELECT * FROM tasks WHERE user_id = :user_id' , $param)->fetchAll();

    loadView('home', [
        'listings' => $listings
    ]);

}

public function edit(){
     $id = $_GET['id'];

    $params = [
        'id' => $id
    ];


    $listing = $this->db->query('SELECT * FROM tasks WHERE id = :id', $params)->fetch(); //:id = placeholder


    loadView('listings/edit' , [
        'listing' => $listing
]);
}





public function update(){

    $id = $_GET['id'];

    $params = [
        'id' => $id
    ];


    

     $allowedFields = ['title' , 'description'];


    $updateValues = [];
    $updateValues = array_intersect_key($_POST , array_flip($allowedFields)); 

    $updateValues = array_map(
        function ($var){ return filter_var(trim($var) , FILTER_SANITIZE_SPECIAL_CHARS);
    } , $updateValues);

    $updateValues['id'] = $id;


    $updateFields = [];
    foreach(array_keys($updateValues) as $field){
        $updateFields[] = "$field = :$field";
    }
    
    $updateFields = implode(", " , $updateFields);
    $updateQuery = "UPDATE tasks SET $updateFields WHERE id = :id";

 
    $this->db->query($updateQuery , $updateValues);

    $listing = $this->db->query('SELECT * FROM tasks WHERE id = :id', $params)->fetch(); //:id = placeholder
 

    
    loadView('listings/show' , [
        "listing" => $listing
    ]);
}

}









?>