<?php





require basePath("Framework/Validation.php");


class UserController{


    protected $db;

    public function __construct()
    {
        
        $config = require basePath('config/db.php');
        $this->db = new Database($config);

    }

    public function authentificate(){
         $email = $_POST['email'];
         $password = $_POST['password'];


        $errors = [];


        if(!Validation::email($email)){
            $errors['email'] = 'Please enter a valid email';
        }
          if(!Validation::string($password , 6)){
            $errors['password'] = 'Password must be at least 6 caracters';
        }

        if(!empty($errors)){
          loadView('users/login', [
            'errors' => $errors
          ]);
          exit();
        }

        $params = [
            'email' => $email
        ];

        //check email
        $user = $this->db->query('SELECT * FROM users WHERE email = :email' , $params)->fetch();

        if(!$user) {
            $errors['email'] = 'Wrong email';
              loadView('users/login', [
              'errors' => $errors
          ]);
          exit();
        }


        //check password

        if(!password_verify($password , $user['password'])){
             $errors['password'] = 'Wrong password';
              loadView('users/login', [
            'errors' => $errors
          ]);
          exit();
        }

      



        Session::set('user' , [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['name'],
        ]);

        

        $param = [
        'user_id' => Session::get('user')['id']
        ]; 
        $listings = $this->db->query('SELECT * FROM tasks WHERE user_id = :user_id' , $param)->fetchAll();

        loadView('home', [
             'listings' => $listings
        ]);
       


    }

    public function login(){
       loadView('users/login');
    }



    public function create(){

        loadView('users/create');
    }


    public function logout(){
        Session::clearAll();

       
        $params = session_get_cookie_params();
        setcookie('PHPSESSID' , '' ,time() - 86400 , $params['path'] , $params['domain']);


            
     
         loadView('home');
       

    }


    public function store(){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConfirmation = $_POST['password_confirmation'];
        

        $errors = [];
        if(!Validation::string($name,6)){
            $errors['name'] = 'Username must be at least 6 charachters';
        }

         if(!Validation::string($password,6)){
            $errors['password'] = 'Password must be at least 6 charachters';
        }

        if(!Validation::passwordMatch($password,$passwordConfirmation)){
            $errors['password_confirmation'] = 'Passwords do not match';
        }


         $params = [
              'email' => $email
         ];

        $user = $this->db->query('SELECT * FROM users WHERE email = :email' , $params)->fetch();

      

        
        if($user){
            $errors['email'] = 'That email already exists';
        }


        if(!empty($errors)){

            loadView('users/create' , [
                'errors' => $errors,
            ]);
            exit();
        }



        $params = [ //din POST

            'name' => $name,
            'email' => $email,
            'password'=> password_hash($password , PASSWORD_DEFAULT)


        ];
        $this->db->query('INSERT INTO users (name , email ,password) 
        VALUES (:name , :email ,:password)' , $params);


    
        

        $userId = $this->db->conn->lastInsertId(); //returneaza ultimul id introdus in baza de date

        Session::set('user' , [
            'id' => $userId,
            'name' => $name,
            'email' => $email,
        ]);




    
         $param = [
                'user_id' => Session::get('user')['id']
           ]; 
          $listings = $this->db->query('SELECT * FROM tasks WHERE user_id = :user_id' , $param)->fetchAll();

            loadView('home', [
                'listings' => $listings
            ]);
       


    }









}






?>