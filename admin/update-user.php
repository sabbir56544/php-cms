<?php include "header.php"; ?>
<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $id = $_POST['user_id'];
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    // $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "UPDATE `users` SET `id`='$id',`first_name`='$fname',`last_name`='$lname',`user`='$user',`email`='$email',`role`='$role' WHERE id='$id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_connect_error());

    if ($result) {
        header("location: users.php");
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <?php
            $ids = $_GET['id'];
            $sql = "SELECT * FROM users WHERE id='$ids'";
            $result = mysqli_query($conn, $sql) or die(mysqli_connect_error());
            $num = mysqli_num_rows($result);

            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="col-md-offset-4 col-md-4">
                        <!-- Form Start -->
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['id']; ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $row['user']; ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>User Role</label>
                                <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                                    <?php
                                    if ($row['role'] == 1) {
                                        echo "<option value='0'>normal User</option>
                                      <option value='1' selected>Admin</option>";
                                    } else {
                                        echo "<option value='0' selected>normal User</option>
                                      <option value='1'>Admin</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                        </form>
                        <!-- /Form -->
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>