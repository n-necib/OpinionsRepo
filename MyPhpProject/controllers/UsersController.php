<?php


class UsersController extends BaseController
{
    private $opinionsModel;
    public $opinions;
    public $opinion;
    public $page;
    public $columnistId;

    public function __construct()
    {
        $this->opinionsModel = new OpinionsModel();
    }

    public function listOpinionsByColumnist($columnistId, $page = 0){

        $this->columnistId = $columnistId;

        if($page < 0){
            $page = 0;
        }
        $this->page = $page;
        $from = $page * 8;

        return $this->opinions = $this->opinionsModel->getOpinionsByColumnist($columnistId, $from, 8);
    }

    public function getOpinion($opinionId){
        return $this->opinion = $this->opinionsModel->getOpinionById($opinionId);
    }

}