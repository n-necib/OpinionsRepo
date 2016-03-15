<?php


class AdminController extends BaseController
{
    private $columnistsModel;
    private $opinionsModel;
    public $columnists;

    public function __construct()
    {
        $this->columnistsModel = new ColumnistsModel();
        $this->opinionsModel = new OpinionsModel();
    }

    public function addColumnist(){
        if(isset($_POST['submit'])){
            if(!empty($_FILES['upImg']['tmp_name']) && !empty($_POST['name'])){
                $image = file_get_contents($_FILES['upImg']['tmp_name']);
                $name = $_POST['name'];
                $params = ['name' =>$name, 'img' =>$image];
                if(strlen($params['name']) >3 || !empty($params['img'])){
                    $_SERVER['message'] = 'The new columnist was added successfully';
                    $_SERVER['color'] = '#00ff00';
                    $this->columnistsModel->createColumnist($params);
                }
            }else{
                $_SERVER['message'] = 'Wrong parameters!';
                $_SERVER['color'] = '#ff0000';

            }

        }
    }

    public function addOpinion(){
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $columnist = $_POST['columnist'];
            $postedOn = date("Y/m/d");

            $params = ['title' =>$title, 'content' =>$content,
            'columnist_id' =>$columnist, 'posted_on' =>$postedOn];
            if(strlen($params['title']) <3 || strlen($params['content'] > 50)){
                $_SERVER['message'] = 'Wrong parameters!';
                $_SERVER['color'] = '#ff0000';
            }else{
                $_SERVER['message'] = 'The new opinion was added successfully';
                $_SERVER['color'] = '#00ff00';
                $this->opinionsModel->createOpinion($params);
            }

        }
        $this->columnists = $this->columnistsModel->getColumnists();

    }
}