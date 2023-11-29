<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <header>
        <?php //include('../../navbar.php'); ?>
    </header>
</head>

<body class="justify-content-start">
    <div class="container my-5">
        <?php 
        // Replace this with the actual value from the session
        $_SESSION['user_id'] = 3;

        // Check if $data is defined and not empty
        if (isset($data) && is_array($data) && !empty($data)) {
            $user = User::read(); // FOR NOW. NEED TO MODIFY ONCE I'VE CONNECTED TO A LINK
            
            echo '<h1 class="py-4 text-center mx-auto">Hi, ' . $user['FNAME'] . '!</h1>';
            echo '<h2 class="py-4 text-left mx-auto">MANAGE MY ACCOUNT</h2>';
            echo '<table class="table">'; // Corrected class name
            echo '<tr>
                    <td>
                        <h3 class="py-2 text-left mx-auto">Email</h3>
                        <p class="py-2 text-left mx-auto">' . $user['EMAIL'] . '</p>
                    </td>
                    <td><button type="button" class="btn btn-primary" style="margin-top: 20px;" name="update">CHANGE</button></td>
                </tr>';
            echo '<tr>
                    <td>
                        <h3 class="py-2 text-left mx-auto">Password</h3>
                        <p class="py-2 text-left mx-auto">' . str_repeat('*', strlen($user['PASSWORD'])) . '</p>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" style="margin-top: 20px;" name="update">CHANGE</button>
                    </td>
                </tr>';
            echo '<tr>
                    <td>
                        <h3 class="py-2 text-left mx-auto">Delete My Account</h3>
                        <p class="py-2 text-left mx-auto">NOTE: Account will NOT BE RECOVERABLE once deleted.</p>
                    </td>
                    <td>
                        <form method="post" action="index.php?controller=user&action=delete">
                            <input type="hidden" name="user_id" value="' . $user['USER_ID'] . '">
                            <input type="hidden" name="group_id" value="' . $user['GROUP_ID'] . '">
                            <button type="button" class="btn btn-danger" style="margin-top: 20px;" name="delete">DELETE</button>
                        </form>
                    </td>
                </tr>';
            echo '</table>';
        }
        ?>
    </div>

    <!-- Bootstrap JS (optional, for Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

<footer>
    <?php include_once("../../footer.html"); ?>
</footer>

</html>
