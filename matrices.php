<?php
$status = "OK";
$result = array();
if (isset($_GET["num1"]))
{
$length = count(explode(";", $_GET["num1"]));
for($i = 0; $i < $length; $i++) {
    $result[] = explode(",",explode(";", $_GET["num1"])[$i]);
    if ($i > 0)
    {
      $rowlength1 = count(explode(",",explode(";", $_GET["num1"])[$i - 1]));
      $rowlength2 = count(explode(",",explode(";", $_GET["num1"])[$i]));
      if ($rowlength1 != $rowlength2)
      {
          $status = "FAIL";
          $result = "Matrix is not set correctly";
      }
    }
  }
}


if (isset($_GET["operation"])) {
    $Operation = $_GET["operation"];
    if ($Operation == "sum" && isset($_GET["num1"]) && isset($_GET["num2"]) && $status != "FAIL")
    {
        $num2 = array();
        $length2 = count(explode(";", $_GET["num2"]));
        if($length1 = $length2)
        {

        for($i = 0; $i < $length2; $i++)
        {
            $num2[] = explode(",",explode(";", $_GET["num2"])[$i]);
            if (count($num2[$i]) != count($result[$i]))
            {
                $status = "FAIL";
                $result = "Matrices do not have equal numbers of rows and columns";
                break;

            }
            else
            {
                for ($j = 0; $j < count($num2[$i]); $j++)
                {

                    $result[$i][$j] = floatval($result[$i][$j]);
                    $result[$i][$j] += floatval($num2[$i][$j]);
                }
            }
        }
        } else {
            $status = "FAIL";
            $result = "Matrices do not have equal numbers of rows and columns";   
        }
    } 

    if ($Operation == "scalmul" && isset($_GET["num1"]) && isset($_GET["num2"]) && $status != "FAIL")
    {
        for($i = 0; $i < $length; $i++) {
            for($j = 0; $j < count(explode(",",explode(";", $_GET["num1"])[$i])); $j++)
            {
                $result[$i][$j] = floatval($result[$i][$j]);
                $result[$i][$j] *= floatval($_GET["num2"]);
            }
        }

    }


    if ($Operation == "transposition" && isset($_GET["num1"]) && $status != "FAIL")
    {
        $temp_arr = array();
        for($i = 0; $i < count(explode(",",explode(";", $_GET["num1"])[0])); $i++) {
            for ($j = 0; $j < $length; $j++)
            {
                $temp_arr[$i][$j] = floatval($result[$j][$i]);
            }
          }
          $result = $temp_arr;
    }
    
} else {
    $status = "FAIL";
    $result = "Operation is not set";
}

echo json_encode(array(
    "status" => $status,
    "result" => $result
  ));

?>
