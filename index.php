<?php
//including the database connection file
include_once("config.php");
 
// select data in descending order from table/collection "users"
$result = $db->users->find()->sort(array('_id' => -1));
?>
 
<html>
<head>    
    <title>Homepage</title>
    <style type="text/css">
        a:hover{
            background-color: red;
            text-decoration: none;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
 
<body>
<form action="" method="post">
    
</form>
    <input type="text" name="search" id="search" placeholder="search">
    <input type="submit" name="submit" id="submit" value="Search"> | 
    <a href="add.php">Add User</a><br/><br/>
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Age</td>
        <td>Email</td>
        <td>Update</td>
    </tr>
    <?php     
        foreach ($result as $res) {
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['age']."</td>";
            echo "<td>".$res['email']."</td>";    
            echo "<td><a href=\"edit.php?id=$res[_id]\">Edit</a> | <a href=\"delete.php?id=$res[_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
    ?>
    </table>
</body>
</html>