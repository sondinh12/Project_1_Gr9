<?php
class StatisticsController{
    public $StatisticsModel;
    function __construct(){
        $this->StatisticsModel = new StatisticsModel();
    }
    function statistics(){
        if(isset($_POST['btn_statistics'])){
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $data = [];
            if($start_date && $end_date){
                $data = $this->StatisticsModel->statistics($start_date,$end_date);
            }
            
        }
        require_once 'views/statistics/statistics.php';    
    }
}
?>