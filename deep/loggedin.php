<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style></style>
</head>
<body>
    
    <?php
        $role = $_POST['role'];
        $name = $_POST['username'];
        $password = $_POST['password'];
        $n = $_POST['name'];


        // echo "$role<br>";
        // echo "$name<br>";
        // echo "$password<br>";



        $host = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "classfriend";
        global $con;
        $con = mysqli_connect($host, $username, $pass, $dbname);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $un = $con->query("SELECT name,username,password from temp where role='$role'");
        $unarr = $un->fetch_row();
        print_r($unarr);
        
        if($n == $unarr[0] && $name == $unarr[1] && $password == $unarr[2]){
            session_start();
            $_SESSION['username'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['name'] = $n;
            $_SESSION['con'] = $con;
        }
        else{
            header('location: https://localhost/deep/login.php');
            exit();
        }

        



        // $sql = "insert into temp (role,name,username,password) values ('$role','$n','$name','$password')";
        // $query = mysqli_query($con,$sql);
        // if($query){
        //     echo "data inserted";
        //     echo"<BR><BR>";
        // }

        
        // if($role == "admin"){
        //     $q1 = "select * from employees";
        //     $q = mysqli_query($con,$q1);
        //     foreach($q as $e){
        //         echo "ename = " . $e['ename']."<BR>";
        //     }
        // }


        echo "username = ".$_SESSION['username']." name = ".$_SESSION['name'];  
        if($role == "manager"){
            $qm = "select product from employees natural join temp where employees.ename='$n' and temp.role='$role'";
            $manager = $con->query($qm);
            $managerArray = $manager->fetch_all();
            // print_r($managerArray);
            // print_r($managerArray[0]);
            $j = json_encode($managerArray);
            $product = $managerArray[0][0];
            $undermanger = $con->query("select * from employees where product = '$product'");
            $employeesunder = $undermanger->fetch_all();
            $e = json_encode($employeesunder);
            include('manager.php');



            // while ($fieldinfo = $manager -> fetch_field()) {
            //     printf("Name: %s\n", $fieldinfo -> name);
            //     printf("Table: %s\n", $fieldinfo -> table);
            //     printf("Max. Len: %d\n", $fieldinfo -> max_length);
            //   }
            //   $manager -> free_result();
            // echo"<BR>";
        
           
        }
        else if($role == "admin"){

            setcookie('con','$con');
            $pro = $con->query("select distinct product from employees");
            
            while($i = $pro->fetch_row()){
                $pro_arr[] = $i;
            }
            print_r($pro_arr);
            $p = json_encode($pro_arr);
            include('admin.php');
        }
    ?>
    


</body>
</html>



