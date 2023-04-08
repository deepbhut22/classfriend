<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin:<?php echo $n ?></title>
    <style>
        td{
            width: 200px;
        }
        #pros{
            margin: auto;
            width: 90%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 40px;
        }
        #pro{
            width: 100%;
            margin: 30px;
        }
        .btn{
            padding: 10px;
        }
        #button{
            margin: 20px;
        }
        #t{
            margin: auto;
        }
        
    </style>
</head>
<body>


        <?php
        if(isset($_SESSION['username'])){
            // echo $_SESSION['username'] ." ". $_SESSION['name'];
        }
        else{
            echo "login "; 
            header('location: http://localhost/deep/login.php');
            exit();
        }
        $host = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "classfriend";
        global $con;
        $con = mysqli_connect($host, $username, $pass, $dbname);

        $d = $con->query("select * from employees where product='pencil'");
                        $data = $d->fetch_all();
                        $dat = json_encode($data);
                        print_r($dat);
        ?>

          

    <h1>hello <?php echo $n ?></h1>
    <!-- <h1 style="text-align: center;">Currently Producing</h1> -->
    <table id="mytable" style="width:60%;" align="center" border="5px solid gray" cellspacing="2px" cellpadding="10px">
    <thead>
        <tr>
            <th id="head">Current Products</th>
        </tr>

    </thead> 
        <tbody style="text-align: center;">
        </tbody>
    </table>

        <div id="pro">
            <div id="pros">
                <btn class="btn">

                </btn>
            </div>
        </div>
        <div id="new">
            <table id="t" border="3px" align="center" style="display: none;">
                <tbody>

                </tbody>
            </table>
        </div>
               
               <script>
                
                var x = (<?php echo $p ?>);
                var n = x.length;
                document.getElementById('head').setAttribute('colspan',n);
                // document.writeln(x[0][1]);
                
                var t = document.querySelector('#mytable tbody');
                var row = document.createElement('tr');
                for(let i=0 ; i<n ; i++){

                        let cell = document.createElement('td');
                        cell.textContent = x[i];
                        row.appendChild(cell);
                    // document.writeln("</tr><BR>");
                    
                }
                t.appendChild(row);
          
            </script>
            <script>
                var y = (<?php echo $p ?>);
                var m =y.length;
                var btn = document.querySelector('#pro #pros btn');
                for(let i=0 ; i<n ; i++){
                    var b = document.createElement('button');
                    b.textContent = y[i];
                    b.value = y[i];
                    b.id="button";
                    btn.appendChild(b);
                }
                
                <?php
                    $d = $con->query("select * from employees where product='pencil'");
                    $data = $d->fetch_all();
                    $dat = json_encode($data);
                    print_r($dat);
                ?>;
                document.getElementById('button').addEventListener("click",function(){
                        var value = this.value;

                        var tb = document.querySelector('#new #t tbody');
                        var x = <?php echo $dat; ?>;
                        document.getElementById('t').style.display='table';
                        tb.innerHTML = "";
                        
                        for(let i=0 ; i<x.length ; i++){

                            var row = document.createElement('tr');

                            for(let j=0 ; j<5;j++){
                                let cell = document.createElement('td');
                                cell.textContent = x[i][j];
                                row.appendChild(cell);

                            }
                            tb.appendChild(row); 
                        }
                        
                    });
                    
                      
            

        
            </script>
</body>
</html>