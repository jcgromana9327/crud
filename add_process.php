<?php
//including the database connection file
include_once("config.php");

 
if(isset($_POST['Submit'])) {    
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
        
        $db->users->insert($user);
        
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>