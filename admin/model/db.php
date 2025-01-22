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
        // Insert into admin table
        $sql_admin = "INSERT INTO admin (
            name, email, password, access, number, gender, bio, dob, doj, presentaddress, permanentaddress, 
            nidpic, propic)
            VALUES ('$uname', '$email', '$pass', '$access', '$number', '$gender', '$bio', '$dob', '$doj', '$preadd', '$peradd', 
            '$nidPath', '$picPath')";
        
        $admin_result = $connectionobject->query($sql_admin);

        // Insert into user table
        $sql_user = "INSERT INTO user (email, password, user_type, subtype) 
                    VALUES ('$email', '$pass', 'Admin', '$access')";
        
        $user_result = $connectionobject->query($sql_user);

        return ($admin_result && $user_result);
    }

     function getAdminByEmail($email) {
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

    function insertAdmin($uname, $email, $pass, $access, $number, $gender, $bio, $dob, $doj, $preadd, $peradd, $nidPath, $picPath, $connectionobject) {
        try {
            // Start transaction
            $connectionobject->begin_transaction();

            // Insert into admin table
            $sql_admin = "INSERT INTO admin (name, email, password, access, number, gender, bio, dob, doj, presentaddress, permanentaddress, nidpic, propic) 
                         VALUES ('$uname', '$email', '$pass', '$access', '$number', '$gender', '$bio', '$dob', '$doj', '$preadd', '$peradd', '$nidPath', '$picPath')";
            
            $admin_result = $connectionobject->query($sql_admin);

            // Insert into user table
            $sql_user = "INSERT INTO user (email, password, user_type, subtype) 
                        VALUES ('$email', '$pass', 'Admin', '$access')";
            
            $user_result = $connectionobject->query($sql_user);

            if ($admin_result && $user_result) {
                $connectionobject->commit();
                return true;
            } else {
                $connectionobject->rollback();
                return false;
            }

        } catch (Exception $e) {
            // Rollback transaction on error
            $connectionobject->rollback();
            return false;
        }
    }

    // Add a helper function to check if email exists
    function checkEmailExists($email, $connectionObject) {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = $connectionObject->query($sql);
        return ($result && $result->num_rows > 0);
    }

    function getAllTechnicians($connectionObject) {
        $sql = "SELECT * FROM technician";
        return $connectionObject->query($sql);
    }

    function updateTechnician($connectionObject, $data) {
        $sql = "UPDATE technician SET 
                first_name = '{$data['first_name']}',
                last_name = '{$data['last_name']}',
                father_name = '{$data['father_name']}',
                gender = '{$data['gender']}',
                dob = '{$data['dob']}',
                phone = '{$data['phone']}',
                address = '{$data['address']}',
                experience = '{$data['experience']}',
                work_area = '{$data['work_area']}',
                work_hour = '{$data['work_hour']}',
                nidpic = '{$data['nidpic']}',
                photo = '{$data['photo']}',
                cv = '{$data['cv']}',
                email = '{$data['email']}',
                password = '{$data['password']}'
            WHERE technician_id = {$data['technician_id']}";

        return $connectionObject->query($sql);
    }

    function deleteTechnician($connectionObject, $technician_id) {
        $sql = "DELETE FROM technician WHERE technician_id = $technician_id";
        return $connectionObject->query($sql);
    }

    function getAllAdmins($connectionObject) {
        $sql = "SELECT * FROM admin";
        return $connectionObject->query($sql);
    }

    function updateAdmin($connectionObject, $admin_id, $name, $access, $number, $bio, $presentaddress, $permanentaddress) {
        $sql = "UPDATE admin SET 
                name = '$name', 
                access = '$access', 
                number = '$number', 
                bio = '$bio',
                presentaddress = '$presentaddress',  
                permanentaddress = '$permanentaddress'
                WHERE admin_id = $admin_id";
        
        return $connectionObject->query($sql);
    }

    function deleteAdmin($connectionObject, $admin_id) {
        $sql = "DELETE FROM admin WHERE admin_id = $admin_id";
        return $connectionObject->query($sql);
    }

    // Customer related methods
    public function getAllCustomers($conn) {
        $sql = "SELECT * FROM customer ORDER BY customer_id";
        return $conn->query($sql);
    }

    public function addCustomer($conn, $name, $email, $password, $address, $phone) {
        $sql = "INSERT INTO customer (email, password, name, address, phone) 
                VALUES ('$email', '$password', '$name', '$address', '$phone')";
        return $conn->query($sql);
    }

    public function updateCustomer($conn, $customer_id, $name, $email, $password, $address, $phone) {
        $sql = "UPDATE customer 
                SET name='$name', 
                    email='$email', 
                    password='$password', 
                    address='$address', 
                    phone='$phone' 
                WHERE customer_id=$customer_id";
        return $conn->query($sql);
    }

    public function deleteCustomer($conn, $customer_id) {
        $sql = "DELETE FROM customer WHERE customer_id=$customer_id";
        return $conn->query($sql);
    }

    public function getCustomerById($conn, $customer_id) {
        $sql = "SELECT * FROM customer WHERE customer_id=$customer_id";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }

    public function getProducts() {
        $sql = "SELECT * FROM product ORDER BY pid";
        return $this->conn->query($sql);
    }

    public function addProduct($type, $brand, $quantity, $price, $about, $photo, $added_by) {
        $sql = "INSERT INTO product (type, brand, quantity, price, about, photo, added_by, status) 
                VALUES ('$type', '$brand', $quantity, $price, '$about', '$photo', '$added_by', 1)";
        return $this->conn->query($sql);
    }

    public function updateProduct($pid, $type, $brand, $quantity, $price, $about, $photo, $status) {
        $sql = "UPDATE product 
                SET type='$type', 
                    brand='$brand', 
                    quantity=$quantity, 
                    price=$price, 
                    about='$about', 
                    photo='$photo',
                    status=$status 
                WHERE pid=$pid";
        return $this->conn->query($sql);
    }

    public function deleteProduct($pid) {
        $sql = "DELETE FROM product WHERE pid=$pid";
        return $this->conn->query($sql);
    }

    public function getProductById($pid) {
        $sql = "SELECT * FROM product WHERE pid=$pid";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    // Get all employees
    public function getAllEmployees() {
        $conn = $this->openCon();
        $sql = "SELECT * FROM employee";
        $result = $conn->query($sql);
        $this->closecon($conn);
        return $result;
    }

    // Update employee
    public function updateEmployee($emp_id, $f_name, $l_name, $phone, $email, $dob, $pre_add, $per_add, $gender, $marital_status, $employment) {
        $conn = $this->openCon();
        $sql = "UPDATE employee SET 
                f_name = '$f_name',
                l_name = '$l_name',
                phone = '$phone',
                email = '$email',
                dob = '$dob',
                pre_add = '$pre_add',
                per_add = '$per_add',
                gender = '$gender',
                marital_status = '$marital_status',
                employment = '$employment'
                WHERE emp_id = $emp_id";
        $result = $conn->query($sql);
        $this->closecon($conn);
        return $result;
    }

    // Delete employee
    public function deleteEmployee($emp_id) {
        $conn = $this->openCon();
        $sql = "DELETE FROM employee WHERE emp_id = $emp_id";
        $result = $conn->query($sql);
        $this->closecon($conn);
        return $result;
    }

    // Get employee by ID
    public function getEmployeeById($emp_id) {
        $conn = $this->openCon();
        $sql = "SELECT * FROM employee WHERE emp_id = $emp_id";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        $this->closecon($conn);
        return $data;
    }

    // Get employee by email
    public function getEmployeeByEmail($email) {
        $conn = $this->openCon();
        $sql = "SELECT * FROM employee WHERE email = '$email'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        $this->closecon($conn);
        return $data;
    }

    // Update employee profile picture
    public function updateEmployeePhoto($emp_id, $pic) {
        $conn = $this->openCon();
        $sql = "UPDATE employee SET pic = '$pic' WHERE emp_id = $emp_id";
        $result = $conn->query($sql);
        $this->closecon($conn);
        return $result;
    }

    // Update employee CV
    public function updateEmployeeCV($emp_id, $cv) {
        $conn = $this->openCon();
        $sql = "UPDATE employee SET cv = '$cv' WHERE emp_id = $emp_id";
        $result = $conn->query($sql);
        $this->closecon($conn);
        return $result;
    }
}
