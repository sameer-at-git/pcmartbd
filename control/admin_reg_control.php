<?php
///////sameer
       $uname = $_POST["fullname"];
       $email = $_POST["email"];
       $access = $_POST["permit"];
       $number = $_POST["phone"];

       echo "<h2>This is ADMIN registration control </h2><br>";
        if(strlen($uname)<4)
        {
            echo "Name should be at least 4 characters<br>";
        }
        else{
            echo "Admin Full name: "  .($uname) . "<br>";
        }

        if(empty($email))
        {
            echo "Email field is required<br>";
        }

        elseif(!preg_match("/[aiub.edu]$/",$email))
        {
            echo "Email address must contain aiub.edu<br> ";
        }
        else{
            echo "Admin Email: "  .($email). "<br>";
        }


        if(empty($number) )
        {
            echo "Must be Filled<br>";
        }
        elseif(!preg_match("/[0-9]$/",$number)){
            echo "Must be only Number<br>";
        }
        else{
            echo "Admin Phone Number: "  .($number). "<br>";
        }

        if($access==0)
        {
            echo "Must select One <br>";
        }
        else{
            if($access==1){
            echo "Admin Access Type: Full control <br>";}
            elseif($access==2){
                echo "Admin Access Type: Poduct control <br>";}
               else{
                    echo "Admin Access Type: Employee control <br>";}
        }
        
        ?>

