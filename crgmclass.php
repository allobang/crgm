<?php


Class Crgm {
    private $server = "mysql:host=localhost;dbname=crgm_db";
    private $user = "root";
    private $pass = "";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $con;

    public function openConnection()
    {
        try
        {

            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->con;


        }catch(PDOException $e)
        {
            echo "There is some problem in the connection :". $e->getMessage();
        }
    }

    public function closeConnection()
    {
        $this->con = null;
    }

    public function getUsers()
    {


        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM members");
        $stmt->execute();
        $users = $stmt->fetchAll();
        $userCount = $stmt->rowCount();

        if($userCount > 0){
            return $users;
        }else{
            header("Location: main.php");
        }

    }

    public function login()
    {
        if(isset($_POST['submit'])){

            // print_r($_POST);
            
            // $password = $_POST['password'];
          

            $password = md5($_POST['password']);
            $username = $_POST['email'];
            $access = $_POST['access'];
            

            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM members WHERE email = ? AND password = ? AND access = ?");
            $stmt->execute([$username, $password,$access]);
            $user = $stmt->fetch();
            $total = $stmt->rowCount();
            

            // if($total > 0){

                

            //     header("Location: main.php");
            //     $this->set_userdata($user);
            // }else{
            //     echo "Login Failed";
            // }

            if($username == $user['email'] and $password == $user['password'] and $access == 'administrator'){
                header("Location: index.php");
                $this->set_userdata($user);
            }elseif($username == $user['email'] and $password == $user['password'] and $access == 'crgm'){
                header("Location: crgm_charts/index .php");
                $this->set_userdata($user);
            }elseif($username == $user['email'] and $password == $user['password'] and $access == 'cashier'){
                header("Location: cashiermain.php");
                $this->set_userdata($user);
            }elseif($username == $user['email'] and $password == $user['password'] and $access == 'accounting'){
                header("Location: accountingmain.php");
                $this->set_userdata($user);
            }else{
                    echo "Login Failed";
            }
            
           
        }
    }


    public function set_userdata($array)
    {
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['userdata'] = array(

                    "fullname" =>$array['first_name']." ".$array['last_name'],
                    // "mobile" =>$array['mobile'],
                    // "address" =>$array['address'],
                    "access" =>$array['access']

        );

        return $_SESSION['userdata'];

    }


    public function get_userdata()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if(isset($_SESSION['userdata'])){
            return $_SESSION['userdata'];
        }else{
            return null;
        }
        

    }



    public function logout()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['userdata'] = null;
        unset($_SESSION['userdata']);
    }


    public function check_user_exist($email)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM members WHERE email = ?");
        $stmt->execute([$email]);
        $total = $stmt->rowCount();
            
        return $total; 
    }


    public function add_user()
    {
        if(isset($_POST['add'])){

            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];
            $access = $_POST['access'];
         


            if($this->check_user_exist($email) == 0){
                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO members(`email`,`password`,`first_name`,`last_name`,`mobile`,`address`,`access`)VALUES(?,?,?,?,?,?,?)");
                $stmt->execute([$email, $password, $fname, $lname, $mobile, $address, $access ]);
            }else{
                echo "User already Exists";
            }
            

        }
    }
    

    
    // public function show_404()
    // {
    //     http_response_code(404);
    //     echo "Page not found";
    //     die;
    // }


    // public function check_product_exist($name)
    // {
    //     $connection = $this->openConnection();
    //     $stmt = $connection->prepare("SELECT LOWER('category_name') FROM products WHERE category_name = ?");
    //     $stmt->execute([strtolower($name)]);
    //     $total = $stmt->rowCount();

    //     return $total;
    // }


   


}

$crgm = new Crgm();

 