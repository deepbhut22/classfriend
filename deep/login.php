

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/logo.css">
</head>
<body>
    <!-- <div class="u"> -->
        <div class="nav">
            <div class="bname">
                <h2><img class="logo" src="./images/logo.png" alt=""></h2>
            </div>
            <div class="list">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    <!-- </div> -->
    <div class="page">
        <div class="form">
            <form action="loggedin.php" method="post">
                <fieldset>
                    <legend>User Info</legend>
                    <select name="role" id="role" value="Choose Your Role" class="role">
                        <option value="">Choose Your Role</option>
                        <option value="admin">Admin</option>
                        <option value="manager">Manager</option>
                    </select>
                    <br><br><br>
                    <input type="text" name="name" id="name" placeholder="Enter name" >
                    <br><br><br>
                    <input type="text" name="username" id="username" placeholder="Enter Username" onchange="fun1()">
                    
                    <br><br><p id="errusr"></p><br>
                    <input type="password" name="password" id="password" placeholder="Enter Password" minlength="6" maxlength="12">
                    <br><br><p class="errpass"> </p><br><br>
                    <button onclick="role()">Next</button>
                    <br>
                </fieldset>
                    
                
            </form>
        </div>
        
    </div>

    <script>
        function fun1(){
            var un = document.getElementById('username').value;
            var regname = /^[A-Z][0-9][a-z0-9@#$%^&*]{1,10}$/;
            if(!regname.test(un)){
                document.getElementById('errusr').innerText="invalid";
            }
            else{
                document.getElementById('errusr').innerText="";
            }
        }

        function fun2(){
            
        }
    </script>
    
    <footer>
        <p>copyright, @classfriend</p>
        <div class="fc">
            <a href=""><img class="fl" src="./images/instagram.png" alt=""></a>
            <a href=""><img class="fl" src="./images/twitter.png" alt=""></a>
            <a href=""><img class="fl" src="./images/facebook.png" alt=""></a>
            <a href=""><img class="fl" src="./images/youtube.png" alt=""></a>
        </div>
    </footer>
</body>
</html><?php

// include('login.html');


// $name = $_POST('username');



// ?>