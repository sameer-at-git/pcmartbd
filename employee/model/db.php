<?php

class myDB
{
    ///All Employee Functions
    function openCon()
    {
        $DBHost = "localhost:3306";
        $DBUser = "root";
        $DBPassword = "";
        $DBName = "pcmartbd";
        $connectionObject = new mysqli($DBHost, $DBUser, $DBPassword, $DBName);
        return $connectionObject;
    }

    function addEmployee(
        $fname,
        $lname,
        $phone,
        $dob,
        $preAdd,
        $perAdd,
        $gender,
        $martstat,
        $joinDate,
        $employment,
        $email,
        $epass,
        $approved,
        $connectionObject
    ) {
        $sql = "INSERT INTO employee(f_name, l_name, phone, dob, pre_add, per_add, gender, marital_status, joining_date, employment, email, password, approved) 
        VALUES('$fname','$lname','$phone','$dob','$preAdd','$perAdd','$gender','$martstat','$joinDate','$employment','$email','$epass',$approved)";
        if ($connectionObject->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }


    function showUserbyID($id, $connectionObject)
    {
        $sql = "SELECT * FROM employee WHERE  emp_id = $id";
        $result = $connectionObject->query($sql);
        return $result;
    }

    function showEmployee( $connectionObject)
    {
        $sql = "SELECT * FROM employee WHERE 1";
        $result = $connectionObject->query($sql);
        return $result;
    }
    function totalEmployee($connectionObject)
    {
        $sql = "SELECT COUNT(*) as total_employee FROM employee";
        $result = $connectionObject->query($sql);
        return $result;
    }

    function updateEmployee($id, $f_name, $l_name, $phone, $gender, $employment, $connectionObject)
    {
        $sql = "UPDATE employee SET f_name = '$f_name', l_name = '$l_name', phone = '$phone', gender = '$gender', employment = '$employment' WHERE emp_id = $id";
        $result = $connectionObject->query($sql);
        return $result;
    }






    ///All Product Functions
    function addProduct($pType, $pBrand, $pQuantity, $pStatus, $pPic, $pAbout, $pPrice, $connectionObject)
    {
        $sql = "INSERT INTO product(type,brand,quantity,status,photo,about,price)
        VALUES('$pType','$pBrand','$pQuantity','$pStatus','$pPic','$pAbout','$pPrice')";
        if ($connectionObject->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }

    function showProduct($connectionObject)
    {
        $sql = "SELECT * FROM product WHERE 1";
        $result = $connectionObject->query($sql);
        return $result;
    }

    function deleteProduct($id, $connectionObject)
    {
        $sql = "DELETE FROM product WHERE pid = $id";
        $result = $connectionObject->query($sql);
    }

    function updateProduct($id, $brand, $type, $about, $quantity, $price,$status, $connectionObject)
    {
        $sql = "UPDATE product SET type = '$type', brand = '$brand', quantity ='$quantity',status ='$status' ,about = '$about', price ='$price' WHERE pid = $id";
        $result = $connectionObject->query($sql);
        return $result;
    }

    function getTotalProducts($connectionObject)
    {
        $sql = "SELECT COUNT(*) as total_products FROM product";
        $result = $connectionObject->query($sql);
        return $result;
    }

    function getTotalBrands($connectionObject)
    {
        $sql = "SELECT COUNT(DISTINCT brand) as total_brands FROM product";
        $result = $connectionObject->query($sql);
        return $result;
    }



    function closecon($connectionObject)
    {
        $connectionObject->close();
    }
}
