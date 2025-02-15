<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;..." rel="stylesheet">

    <!-- Script -->
    <script src="../../assets/script/script.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/c37ac7a1ae.js" crossorigin="anonymous"></script>

    <!-- CSS files -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="icon" type="image/x-icon" href="../../assets/pic/customLogo.png">

    <!-- jQuery first -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>




    <title>Admin Section</title>
</head>

<body class="posts-body">

    <!-- Header -->
    <?php include(ROOT_PATH . "/app/fix/adminHeader.php"); ?>
    <!-- Header -->

    <div class="admin-wrap">

        <!-- left sidebar -->
        <?php include(ROOT_PATH . "/app/fix/sidebar.php"); ?>
        <!-- left sidebar -->

        <div class="admin-content">
            <div class="header-actions">
                <a href="<?php echo BASE_URL . "/admin/users/create.php" ?>"><button class="btn btn-primary">Add User</button></a>
                <!-- <button class="btn btn-secondary">Manage Posts</button> -->
            </div>
            <h1 class="page-title">Manage Users</h1>

            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-<?php echo $_SESSION['type']; ?>">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Num</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $key => $user): ?> <!-- Added $key to track user number -->
                            <tr>
                                <td><?php echo $key + 1; ?></td> <!-- Display the user number -->
                                <td><?php echo $user['username'] ?></td> <!-- Display username -->
                                <td><?php echo $user['admin'] == 1 ? 'Admin' : 'User'; ?></td> <!-- Display role -->
                                <td class="action-buttons">
                                    <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn-edit">Edit</a>
                                    <a href="index.php?delete_id=<?php echo $user['id']; ?>" class="btn-delete">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
