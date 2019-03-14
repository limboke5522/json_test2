<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <br>
      <h1 align="center">ที่อยู่</h1>
    <hr>
  <form class="c f">
  
    <div class="form-group col-md-4">
      <label >ภาค</label>
      <select id="selectgeo" class="form-control">
       <option value=""> ------- เลือก ------ </option>
         
     <?php
            require 'db_cn.php';

            $sql="SELECT GEO_ID,GEO_NAME
                  FROM geography
                  ORDER BY CONVERT(GEO_NAME USING TIS620) ASC;";
            $stm=$con->prepare($sql);

            try{
                $stm->execute();

            }
            catch (Exception $exc){
                echo $exc->getTraceAsString();
            }

            
            while($row=$stm->fetch(PDO::FETCH_ASSOC)){
                echo '<option value="', $row['GEO_ID'], '">', $row['GEO_NAME'],'</option>';
                
            }
  
        ?>
      </select>

    </div>
    <div class="form-group col-md-4">
      <label >จังหวัด</label>
      <select id="selectpro" class="form-control">
       <option value=""> ------- เลือก ------ </option>
        
      </select></select><span id="waitProvince"></span>
    </div>

     <div class="form-group col-md-4">
      <label >อำเภอ</label>
      <select id="selectamp" class="form-control">
       <option value=""> ------- เลือก ------ </option>
        
      </select></select><span id="waitAmphur"></span>


    </div>
     <div class="form-group col-md-4">
      <label >ตำบล</label>
      <select id="selecttumbon" class="form-control">
        <option value=""> ------- เลือก ------ </option>
        
      </select></select><span id="waittumbon"></span>
    </div><br>
</form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="jscontrol.js"></script>

    </body>
</html>