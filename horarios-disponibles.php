<?php



$fecha = $_GET['fecha'];

date("y-m-d-l", strtotime( $fecha));



$day = date("l", strtotime( $fecha));

$custom_date = date("j-n-Y");   
echo $custom_date;


if($day == "Monday"){

    $data = "

    <tr>

        <td class='pd-5' ><button type='button' table-data='09:00' class='tabla btn btn-success'>09:00</button></td>

        <td class='pd-5' ><button type='button' table-data='09:30' class='tabla btn btn-success'>09:30</button></td>

        <td class='pd-5' ><button type='button' table-data='10:00' class='tabla btn btn-success'>10:00</button></td>

        <td class='pd-5' ><button type='button' table-data='10:30' class='tabla btn btn-success'>10:30</button></td>    

        </tr>

    

    

        <tr>

        <td class='pd-5' ><button type='button' table-data='11:00' class='tabla btn btn-success'>11:00</button></td>

        <td class='pd-5' ><button type='button' table-data='11:30' class='tabla btn btn-success'>11:30</button></td>

        <td class='pd-5' ><button type='button' table-data='13:00' class='tabla btn btn-success'>13:00</button></td>

        <td class='pd-5' ><button type='button' table-data='13:30' class='tabla btn btn-success'>13:30</button></td>

        </tr>

    

    

        <tr>    

        

        <td class='pd-5' ><button type='button' table-data='14:00' class='tabla btn btn-success'>14:00</button></td>

        <td class='pd-5' ><button type='button' table-data='14:30' class='tabla btn btn-success'>14:30</button></td> 

        <td class='pd-5' ><button type='button' table-data='15:00' class='tabla btn btn-success'>15:00</button></td> 

        <td class='pd-5' ><button type='button' table-data='15:30' class='tabla btn btn-success'>15:30</button></td>

    

        </tr>

    

       <tr>

 

        <td class='pd-5' ><button type='button' table-data='16:00' class='tabla btn btn-success'>16:00</button></td>       

        <td class='pd-5' ><button type='button' table-data='16:30' class='tabla btn btn-success'>16:30</button></td>       


        <td class='pd-5' ><button type='button' table-data='17:00' class='tabla btn btn-success'>17:00</button></td>

        <td class='pd-5' ><button type='button' table-data='17:30' class='tabla btn btn-success'>17:30</button></td>

 

        </tr>

        ";

    

    

    

        echo $data;

}



















elseif ($day == "Tuesday"){

    $data = "

    <tr>

        <td class='pd-5' ><button type='button' table-data='09:00' class='tabla btn btn-success'>09:00</button></td>

        <td class='pd-5' ><button type='button' table-data='09:30' class='tabla btn btn-success'>09:30</button></td>

        <td class='pd-5' ><button type='button' table-data='10:00' class='tabla btn btn-success'>10:00</button></td>

        <td class='pd-5' ><button type='button' table-data='10:30' class='tabla btn btn-success'>10:30</button></td>    

        </tr>

    

    

        <tr>

        <td class='pd-5' ><button type='button' table-data='11:00' class='tabla btn btn-success'>11:00</button></td>

        <td class='pd-5' ><button type='button' table-data='11:30' class='tabla btn btn-success'>11:30</button></td>

        <td class='pd-5' ><button type='button' table-data='13:00' class='tabla btn btn-success'>13:00</button></td>

        <td class='pd-5' ><button type='button' table-data='13:30' class='tabla btn btn-success'>13:30</button></td>

        </tr>

    

    

        <tr>    

        

        <td class='pd-5' ><button type='button' table-data='14:00' class='tabla btn btn-success'>14:00</button></td>

        <td class='pd-5' ><button type='button' table-data='14:30' class='tabla btn btn-success'>14:30</button></td> 

        <td class='pd-5' ><button type='button' table-data='15:00' class='tabla btn btn-success'>15:00</button></td> 

        <td class='pd-5' ><button type='button' table-data='15:30' class='tabla btn btn-success'>15:30</button></td>

    

        </tr>



        ";

    

    

    

        echo $data;

}

















elseif($day == "Wednesday"){

    $data = "

    <tr>

        <td class='pd-5' ><button type='button' table-data='09:00' class='tabla btn btn-success'>09:00</button></td>

        <td class='pd-5' ><button type='button' table-data='09:30' class='tabla btn btn-success'>09:30</button></td>

        <td class='pd-5' ><button type='button' table-data='10:00' class='tabla btn btn-success'>10:00</button></td>

        <td class='pd-5' ><button type='button' table-data='10:30' class='tabla btn btn-success'>10:30</button></td>    

        </tr>

    

    

        <tr>

        <td class='pd-5' ><button type='button' table-data='11:00' class='tabla btn btn-success'>11:00</button></td>

        <td class='pd-5' ><button type='button' table-data='11:30' class='tabla btn btn-success'>11:30</button></td>

        <td class='pd-5' ><button type='button' table-data='13:00' class='tabla btn btn-success'>13:00</button></td>

        <td class='pd-5' ><button type='button' table-data='13:30' class='tabla btn btn-success'>13:30</button></td>

        </tr>

    

    

        <tr>    

        

        <td class='pd-5' ><button type='button' table-data='14:00' class='tabla btn btn-success'>14:00</button></td>

        <td class='pd-5' ><button type='button' table-data='14:30' class='tabla btn btn-success'>14:30</button></td> 

        <td class='pd-5' ><button type='button' table-data='15:00' class='tabla btn btn-success'>15:00</button></td> 

        <td class='pd-5' ><button type='button' table-data='15:30' class='tabla btn btn-success'>15:30</button></td>

    

        </tr>

    

       <tr>

 

        <td class='pd-5' ><button type='button' table-data='16:00' class='tabla btn btn-success'>16:00</button></td>       

        <td class='pd-5' ><button type='button' table-data='16:30' class='tabla btn btn-success'>16:30</button></td>       


        <td class='pd-5' ><button type='button' table-data='17:00' class='tabla btn btn-success'>17:00</button></td>

        <td class='pd-5' ><button type='button' table-data='17:30' class='tabla btn btn-success'>17:30</button></td>



        </tr>

        ";

    

    

    

        echo $data;

}























elseif($day == "Thursday"){

    $data = "

    <tr>

        <td class='pd-5' ><button type='button' table-data='09:00' class='tabla btn btn-success'>09:00</button></td>

        <td class='pd-5' ><button type='button' table-data='09:30' class='tabla btn btn-success'>09:30</button></td>

        <td class='pd-5' ><button type='button' table-data='10:00' class='tabla btn btn-success'>10:00</button></td>

        <td class='pd-5' ><button type='button' table-data='10:30' class='tabla btn btn-success'>10:30</button></td>    

    </tr>

    

    

        <tr>

        <td class='pd-5' ><button type='button' table-data='11:00' class='tabla btn btn-success'>11:00</button></td>

        <td class='pd-5' ><button type='button' table-data='11:30' class='tabla btn btn-success'>11:30</button></td>

        <td class='pd-5' ><button type='button' table-data='13:00' class='tabla btn btn-success'>13:00</button></td>

        <td class='pd-5' ><button type='button' table-data='13:30' class='tabla btn btn-success'>13:30</button></td>

        </tr>

    

    

        <tr>    

        

        <td class='pd-5' ><button type='button' table-data='14:00' class='tabla btn btn-success'>14:00</button></td>

        <td class='pd-5' ><button type='button' table-data='14:30' class='tabla btn btn-success'>14:30</button></td> 

        <td class='pd-5' ><button type='button' table-data='15:00' class='tabla btn btn-success'>15:00</button></td> 

        <td class='pd-5' ><button type='button' table-data='15:30' class='tabla btn btn-success'>15:30</button></td>

    

        </tr>

    



        ";

    

    

    

        echo $data;

}



















elseif($day == "Friday"){


                $data = "

                <tr>

                <td class='pd-5' ><button type='button' table-data='09:00' class='tabla btn btn-success'>09:00</button></td>
        
                <td class='pd-5' ><button type='button' table-data='09:30' class='tabla btn btn-success'>09:30</button></td>
        
                <td class='pd-5' ><button type='button' table-data='10:00' class='tabla btn btn-success'>10:00</button></td>
        
                <td class='pd-5' ><button type='button' table-data='10:30' class='tabla btn btn-success'>10:30</button></td>    
        
            </tr>

            <tr>

            <td class='pd-5' ><button type='button' table-data='11:00' class='tabla btn btn-success'>11:00</button></td>
    
            <td class='pd-5' ><button type='button' table-data='11:30' class='tabla btn btn-success'>11:30</button></td>
    

    
            </tr>
                ";

                echo $data;
            }


?>