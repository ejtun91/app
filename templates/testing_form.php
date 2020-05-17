<?php if (isset($_REQUEST["submit"])){
    $self = $_SERVER['PHP_SELF'];
    if (empty($_REQUEST['firstname'])) {
        header("Location: $self");
        exit;
    }
    
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $address = $_REQUEST['address'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];


    echo $firstname;
    echo $lastname;
    echo $address;
    echo $email;
    echo $phone;

}else{ ?><!--end of PHP -->
<!--the html to the user appears here-->
<html>
<head><title>Lab 4 Part 1</title>
    <style></style>
</head>
<body><h1>A PHP processed form </h1>
<div id="wrapper">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"><p>Firstname:</p><input type="text" size="40"
                                                                                             name="firstname">
        <p>Lastname:</p><input type="text" size="20" name="lastname">
        <p>Address:</p><input type="text" size="20" name="address">
        <p>Email:</p><input type="text" size="20" name="email">
        <p>Phone:</p><input type="text" size="20" name="phone"><br><input type="submit" name="submit" value="Submit">
    </form>
</div>
<br>
</html><?php } ?>