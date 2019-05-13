<?php
include_once("dbconnection.php");
class TakeMacContract {
    public function GetMac() {
        $query = "SELECT contract_id,mac FROM mac_address";
        $mac_table =  DBconn::Select($query);
        if($mac_table !== null) {
            foreach($mac_table as $macs) {
                $mac[] = $macs;
            }
        }
        return $mac;
    }
}

    $mac = new TakeMacContract();
    $json = json_encode($mac->GetMac());
    
    echo $json;


        ?>