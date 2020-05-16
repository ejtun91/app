<?php
//we will be using sessions
if(!isset($_SESSION)){
    session_start();
}

$pageTitle = 'login page';

$indexLinkStyle = '';
$aboutLinkStyle = '';
$listLinkStyle = '';
$contactLinkStyle = '';
$sitemapLinkStyle = '';
$loginLinkStyle = '';
$registerLinkStyle = 'current_page';

require_once __DIR__ . '/_header.php';

require_once __DIR__ . '/../model/dbconfig.php';

//create a new instance of the user (remember the functions below are in that class file)
$user = new USER();

if(isset($_POST['register']))
{
    $uname = strip_tags($_POST['username']); //all tags stripped from the string
    $umail = strip_tags($_POST['email']);
    $upass = strip_tags($_POST['password']);

    //some extra validation on top of any HTML% validation below in the form (e.g required. pattern etc)

    if($uname=="")	{
        $error = "provide username !";
    }
    else if($umail=="")	{
        $error = "provide email id !";
    }
    //filter_var validates the email
    else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
        $error = 'Please enter a valid email address !';
    }
    else if($upass=="")	{
        $error = "provide password !";
    }
    else if(strlen($upass) < 6){
        $error = "Password must be at least 6 characters";
    }
    else
    {
        try
        {
            //we will look at all the usernames and emails in the DB to see if they are already taken
            $stmt = $user->runQuery("SELECT username, email FROM users WHERE username=:uname OR email=:umail");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            //compare with the data in the database
            if($row['username']==$uname) {
                $error = "sorry username already taken !";
            }
            else if($row['email']==$umail) {
                $error = "sorry email id already taken !";
            }
            else
            {
                if($user->register($uname,$umail,$upass))
                {
                    $user->redirect('index.php?action=login');
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

?>
<!--------------------------------------the else part of the program that is HTML---------->

<div class="container pt-5">
<form method="post" id="login-form" align ="center">
    <h2>Registration Page</h2>
    <!-------Format the error in css------->
    <div id="error">
        <?php
        if(isset($error))
        {
            ?>
            <div class="alert alert-danger">
                <?php echo $error; ?> !
            </div>
            <?php
        }
        ?>
        <div class="form-group">
            <label for="username_reg" class="bmd-label-floating">Enter Username</label>
            <input type="text" class="form-control" id="username_reg" name="username" required value="<?php if(isset($error)){echo $uname;}?>" />
        <br>
        </div>
        <div class="form-group">
            <label for="email_reg" class="bmd-label-floating">Email address</label>
            <input type="text" name="email" id="email_reg" class="form-control" required value="<?php if(isset($error)){echo $umail;}?>" />
        <br>
        </div>
        <div class="form-group">
            <label for="pass_reg" class="bmd-label-floating">Enter Password</label>
            <input type="password" id="pass_reg" class="form-control" name="password">
        </div>
        <br>
        <button type="submit" name="register" class="btn btn-primary btn-raised">Register</button>
        <br>
</form>
</div>
<div class="container-fluid px-0 fixed-bottom">
    <?php
    require_once __DIR__ . '/_footer.php'; ?>
</div>