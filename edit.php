<?php

include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $user = array (
                'name' => $_POST['name'],
                'age' => $_POST['age'],
                'email' => $_POST['email']
            );
    
    
    $errorMessage = '';
    foreach ($user as $key => $value) {
        if (empty($value)) {
            $errorMessage .= $key . ' field is empty<br />';
        }
    }
            
    if ($errorMessage) {
        
        echo '<span style="color:red">'.$errorMessage.'</span>';
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";    
    } else {
        
        $db->users->update(
                        array('_id' => new MongoId($id)),
                        array('$set' => $user)
                    );
        
        
        header("Location: index.php");
    }
}
?>

<?php

$id = $_GET['id'];

$result = $db->users->findOne(array('_id' => new MongoId($id)));
 
$name = $result['name'];
$age = $result['age'];
$email = $result['email'];

?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Age</td>
                <td><input type="text" name="age" value="<?php echo $age;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>