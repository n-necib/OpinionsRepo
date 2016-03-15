<?php


class HomeController extends BaseController
{
    private $columnistsModel;
    private $usersModel;
    public $page;

    public function __construct()
    {
        $this->columnistsModel = new ColumnistsModel();
        $this->usersModel = new UsersModel();

    }

    public function listColumnists($page = 0){

        if($page < 0){
            $page = 0;
        }
        $this->page = $page;
        $from = $page * 18;

       return $this->columnists = $this->columnistsModel->getAllColumnists($from, 18);
    }

    public function register(){
        if(isset($_POST['submit'])){
            if($_POST['password'] == $_POST['confirm-pass']){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $params = ['username' =>$username, 'password' =>$password];
                if(strlen($params['username']) < 4 || strlen($params['password']) < 4){
                    $_SERVER['message'] = 'The username and password must be longer than 3 letters!';
                    $_SERVER['color'] = '#ff0000';
                }else{
                    $_SERVER['message'] = 'You are registered successfully. Please, login';
                    $_SERVER['color'] = '#00ff00';
                    $this->usersModel->register($params);
                }

            }
        }

    }



    public function login(){
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $currentUser = $this->usersModel->login($username, $password);

            if($currentUser['COUNT(id)'] == 1 && $currentUser['is_admin'] != 1){
                $_SESSION['username'] = $username;
                $this->redirect('/MyPhpProject/home/listColumnists');

            }else if($currentUser['is_admin'] == 1){
                $_SESSION['username'] = $username;
                $_SESSION['admin'] = $username;
                $this->redirect('/MyPhpProject/home/listColumnists');
            }else{
                $_SERVER['message'] = 'Wrong username or password!';
                $_SERVER['color'] = '#ff0000';
            }
        }

    }


}