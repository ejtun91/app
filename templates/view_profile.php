<?php

$pageTitle = 'view profile page';
require_once __DIR__ . '/_header.php';
?>
<div class="container pt-5">
    <h1>Update Profile</h1>

    <form action="index.php?action=updateUser" method="POST">
        <!-- ****** send ID, but don't let user see this ***** -->
        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <div class="form-group">
            <label for="description" class="bmd-label-floating">Username</label>
            <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>">
        </div>
        <div class="form-group">
            <label for="description" class="bmd-label-floating">Email</label>
            <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>">
        </div>
        <div class="form-group">
            <label for="description" class="bmd-label-floating">New Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter new password">
        </div>
        <button type="submit" class="btn btn-primary btn-raised">Update Profile</button>

    </form>


</div>