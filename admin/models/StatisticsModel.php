<?php
class StatisticsModel {
    public $conn;
    function __construct(){
        $this->conn = connectDB();
    }

    function statistics($start_date,$end_date){
        $sql="select coalesce(sum(total),0) as total, coalesce(count(*),0) as total_orders, coalesce(sum(case when status = 5 then 1 else 0 end),0) as canceled_orders from orders where create_at between '$start_date' and '$end_date'";
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute();
        return $stmt->fetch();
    }
}
?>