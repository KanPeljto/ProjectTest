<?php


require_once __DIR__ . "/rest/services/UserService.class.php";
function loginUser($email, $password) {
    $user_service = new UserService();

    try {
        $user = $user_service->login_user($email, $password);
        if ($user) {
            $jwt = $user["jwt"];
            // $username = $user["username"];
            setcookie("jwt", $jwt, time() + (86400), "/");
            return true;
        } else {
            throw new Exception("Login failed no user");
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        echo "Login failed " . $e->getMessage();
    }
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $email = $_POST["email"];
//     $password = $_POST["password"];
//     loginUser($email, $password);
// }

?>
