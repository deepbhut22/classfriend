<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manager</title>
</head>
<body>
<h1 style="text-align: center;">Hello! <?php echo $n; ?></h1>
    <table id="mytable" style="width:60%;" align="center" border="5px solid gray" cellspacing="2px" cellpadding="10px">
    <thead>
        <tr>
            <th colspan="5">employees of your product</th>
        </tr>
        <tr>
            <th>eid</th>
            <th>ename</th>
            <th>role</th>
            <th>salary</th>
            <th>product</th>
        </tr>
    </thead> 
        <tbody style="text-align: center;">
        </tbody>
    </table>
               <script>
                var x = (<?php echo $e ?>);
                var n = x.length;
                // document.writeln(x[0][1]);
                
                var t = document.querySelector('#mytable tbody');

                for(let i=0 ; i<n ; i++){

                    var row = document.createElement('tr');

                    for(let j=0 ; j<5;j++){
                        let cell = document.createElement('td');
                        cell.textContent = x[i][j];
                        row.appendChild(cell);

                    }
                    // document.writeln("</tr><BR>");
                    t.appendChild(row);
                }
          
                
            </script>

</body>
</html>