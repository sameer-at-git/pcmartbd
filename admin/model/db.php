<?php
class myDB
{
    function openCon()
    {
        $DBHost = "localhost:3306";
        $DBUser = "root";
        $DBPassword = "";
        $DBName = "pcmartbd";
        $connectionObject = new mysqli($DBHost, $DBUser, $DBPassword, $DBName);
        if ($connectionObject->connect_error) {
            die("Connection failed: " . $connectionObject->connect_error);
        }
        return $connectionObject;
    }

    function insertData($uname, $email, $pass, $access, $number, $gender, $bio, $dob, $doj, $preadd, $peradd, $nidPath, $picPath, $table, $connectionobject)
    {
        $sql = "INSERT INTO admin (
            name, email, password, access, number, gender, bio, dob, doj, presentaddress, permanentaddress, 
            nidpic, propic)
             VALUES ('$uname', '$email', '$pass', '$access', '$number', '$gender', '$bio', '$dob', '$doj', '$preadd', '$peradd', 
             '$nidPath', '$picPath')";
        return $connectionobject->query($sql);
    }

    public function getAdminByEmail($email) {
        $conn = $this->openCon();
    
        $query = "SELECT * FROM admin WHERE email = '$email'";
        $result = $conn->query($query);
    
        if ($result) {
            $user = $result->fetch_assoc();
    
            if ($user) {
                return $user;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    function getUserInfo($connectionObject, $id)
    {
        $sql = "SELECT * FROM admin WHERE admin_id=$id";
        $result = $connectionObject->query($sql);
        return $result->fetch_assoc();
    }

    function updateUserInfo($connectionObject, $id, $name, $number,  $bio, $dob,  $preadd, $peradd, $password)
    {
        $sql = "UPDATE admin SET 
                name='$name', 
                number='$number',
                bio='$bio',
                dob='$dob',
                presentaddress='$preadd',
                permanentaddress='$peradd',
                password='$password'
                WHERE admin_id=$id";

        return $connectionObject->query($sql);
    }

    function deleteUserById($connectionObject, $userId)
    {
        $sql = "DELETE FROM admin WHERE admin_id = $userId";
        return $connectionObject->query($sql);
    }
    function getTotalCount($table, $connectionObject)
    {
        $sql = "SELECT COUNT(*) as total FROM $table";
        $result = $connectionObject->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    function getTotalRevenue($connectionObject)
    {
        $sql = "SELECT SUM(price_per_unit*quantity) AS revenue FROM pcmartbd.orders";
        $result = $connectionObject->query($sql);
        $row = $result->fetch_assoc();
        return $row['revenue'];
    }
    function ChangePic($connectionObject,$id)
    {
        
    }

    function closecon($connectionObject)
    {
        $connectionObject->close();
    }
}
