<?php
require_once("session.php");
$pageTitle = 'LOGIN';
$loginLinkStyle = 'current_page';
require_once __DIR__ . '/_header.php';

$user_id = null;
//create a new instance of the user class
$auth_user = new USER();
//set the user_id for this session
if (!isset($_SESSION['user_session'])) { //assigning user_session
    $_SESSION['user_session'] = null;
} else {
    $user_id = $_SESSION['user_session'];
}
//run the sql statement that selects all the users from the user table that have the id that corresponds to the user that is logging in
$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
$stmt->execute(array(":id" => $user_id));
//return the row in the database in an associative array
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);


//create a new instance of the user
$login = new USER();


if (isset($_POST['submit'])) { //if user clicks on button do the following
    $uname = strip_tags($_POST['txt_username']);
    $umail = strip_tags($_POST['txt_uname_email']);
    $upass = strip_tags($_POST['txt_password']);
    $ids = strip_tags($_POST['id']);
    $users = get_all_users($connection);

    $_SESSION['username'] = $uname;
    $_SESSION['email'] = $umail;
    $_SESSION['password'] = $upass;
    $_session['id'] = $users;


//call this function from the controller  file that verifies the user
    if ($login->checkLogin($uname, $umail, $upass)) {
        $login->redirect('index.php?action=list');
    } else {
        $error = "Wrong Details !";
    }
}

if (isset($_POST['admin_submit'])) {

    $aname = strip_tags($_POST['txt_admin_username']);
    $amail = strip_tags($_POST['txt_admin_uname_email']);
    $apass = strip_tags($_POST['txt_admin_password']);


    if ($login->checkAdminLogin($aname, $amail, $apass)) {
        $login->redirect('index.php?action=admin');
    } else {
        $error = "Wrong Details !";
    }
}


?>
<!--------------------------------------the else part of the program that is HTML---------->
<?php if (isset($_SESSION['user_role'])) { ?>
    <div class="container" style="margin-top: 10%;margin-bottom: 20%">
        <h2>You are already logged in <?= $_SESSION['username'] ?></h2>
        <a href="index.php?action=admin">
            <button type="submit" name="dashboard" class="btn btn-primary btn-raised">ADMIN DASHBOARD</button>
        </a>
    </div>
<?php } elseif (isset($_SESSION['user_session'])) { ?>

    <div class="container" style="margin-top: 10%;margin-bottom: 20%">
        <h2>You are already logged in <?= $_SESSION['username'] ?></h2>
        <a href="index.php?action=showUserAction&id=<?= $_SESSION['user_session'] ?>">
            <button type="submit" name="submit" class="btn btn-primary btn-raised">View Profile</button>
        </a>
    </div>
<?php } else { ?>
    <div id="error">
        <div class="container contact-form" style="margin-top: 10%">
            <div class="row align-items-start">
                <div class="col">
                    <form method="post" id="login-form" align="center">
                        <h2>Login Page</h2>
                        <!-------Format the error in css------->

                        <?php
                        if (isset($error)) {
                            ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?> !
                            </div>
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                            <label for="username" class="bmd-label-floating">Username</label>
                            <input type="text" id="username" name="txt_username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email_log" class="bmd-label-floating">Email address</label>
                            <input type="email" id="email_log" name="txt_uname_email" class="form-control">
                            <span class="bmd-help">We'll never share your email with anyone else.</span>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="pass_log" class="bmd-label-floating">Password</label>
                            <input type="password" id="pass_log" class="form-control" name="txt_password">
                        </div>
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary btn-raised">Login</button>
                        <br>
                        <label>Don't have account yet! <a href="index.php?action=register">Sign Up</a></label><br><br>
                    </form>

                </div>
                <br>
                <div class="col pt-3">
                    <p>
                        <button type="button" class="btn btn-primary btn-raised" data-toggle="collapse"
                                data-target="#admin">Admin
                            User
                        </button>
                    </p>
                    <div id="admin" class="collapse">
                        <form method="post" id="admin-login">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                                <label for="username" class="bmd-label-floating">Username</label>
                                <input type="text" id="username" name="txt_admin_username"
                                       placeholder="Username is: Antonio" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email_log" class="bmd-label-floating">Email address</label>
                                <input type="email" id="email_log" name="txt_admin_uname_email"
                                       placeholder="Email is: antonio@admin.com" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="pass_log" class="bmd-label-floating">Password</label>
                                <input type="password" id="pass_log" class="form-control"
                                       placeholder="Password is: antivirus" name="txt_admin_password">
                            </div>
                            <button type="submit" name="admin_submit" class="btn btn-primary btn-raised">Admin Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="container-fluid px-0">
    <?php require_once '_footer.php' ?>
</div>