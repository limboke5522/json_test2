<?php
include 'db_cn.php';
// Next dropdown list.
$nextList = isset($_GET['nextList']) ? $_GET['nextList'] : '';

switch($nextList) {
    case 'province':
        $geographyID = isset($_GET['geographyID']) ? $_GET['geographyID'] : '';
        $sql ="
            SELECT PROVINCE_ID,PROVINCE_NAME
            FROM province
            WHERE GEO_ID = '{$geographyID}'
            ORDER BY CONVERT(PROVINCE_NAME USING TIS620) ASC;";
            $stm=$con->prepare($sql);

            try{
                $stm->execute();

            }
            catch (Exception $exc){
                echo $exc->getTraceAsString();
            }

        break;

    case 'amphur':
        $provinceID = isset($_GET['provinceID']) ? $_GET['provinceID'] : '';
        $sql ="
            SELECT AMPHUR_ID,AMPHUR_NAME
            FROM amphur
            WHERE PROVINCE_ID = '{$provinceID}'
            ORDER BY CONVERT(AMPHUR_NAME USING TIS620) ASC;";
            $stm=$con->prepare($sql);

            try{
                $stm->execute();

            }
            catch (Exception $exc){
                echo $exc->getTraceAsString();
            }
        break;
        
        case 'tumbon':
        $amphurID = isset($_GET['amphurID']) ? $_GET['amphurID'] : '';
        $sql ="
            SELECT DISTRICT_ID,DISTRICT_NAME
            FROM district
            WHERE AMPHUR_ID = '{$amphurID}'
            ORDER BY CONVERT(DISTRICT_NAME USING TIS620) ASC;";
            $stm=$con->prepare($sql);

            try{
                $stm->execute();

            }
            catch (Exception $exc){
                echo $exc->getTraceAsString();
            }
        break;
}

$data = array();
while($row=$stm->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row;
}

// Print the JSON representation of a value
echo json_encode($data);
?>