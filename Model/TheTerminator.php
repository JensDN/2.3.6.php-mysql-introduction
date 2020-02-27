<?php


class TheTerminator
{
    public function registration()
    {
        $link = new MyPDO;
        if ($link === false) {
            die("ERROR: Could not connect. ");
        }
        // Define variables and initialize with empty values
        $username = $password = $confirm_password = "";
        $username_err = $password_err = $confirm_password_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Validate username
            if (empty(trim($_POST["username"]))) {
                $username_err = "Please enter a username.";
            } else {
                // Prepare a select statement
                $sql = 'SELECT id FROM student WHERE username = ?';

                if ($stmt = $link->prepare($link, $sql)) {
                    // Bind variables to the prepared statement as parameters
                    // Set parameters
                    $param_username = trim($_POST["username"]);
                    $stmt->bindParam($sql, $param_username, PDO::PARAM_STR);
                    // Attempt to execute the prepared statement
                    if ($stmt->execute()) {
                        /* store result */
                        $stmt->fetch();

                        if ((int)$stmt->rowCount() === 1) {
                            $username_err = "This username is already taken.";
                        } else {
                            $username = trim($_POST["username"]);
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    $link = null;
                }
            }

            // Validate password
            if (empty(trim($_POST["password"]))) {
                $password_err = "Please enter a password.";
            } elseif (strlen(trim($_POST["password"])) < 10) {
                $password_err = "Password must have atleast 6 characters.";
            } else {
                $password = trim($_POST["password"]);
            }

            // Validate confirm password
            if (empty(trim($_POST["confirm_password"]))) {
                $confirm_password_err = "Please confirm password.";
            } else {
                $confirm_password = trim($_POST["confirm_password"]);
                if (empty($password_err) && ($password != $confirm_password)) {
                    $confirm_password_err = "Password did not match.";
                }
            }

            // Check input errors before inserting in database
            if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

                // Prepare an insert statement
                $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

                if ($stmt = mysqli_prepare($link, $sql)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                    // Set parameters
                    $param_username = $username;
                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt)) {
                        // Redirect to login page
                        header("location: login.php");
                    } else {
                        echo "Something went wrong. Please try again later.";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }

            // Close connection
            mysqli_close($link);
        }
    }
}
?>