<?php
    require "database.php";

    class User extends Database
    {
        public function createUser($first_name, $last_name, $username, $password, $photo)
        {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `users`(`first_name`, `last_name`, `username`, `password`, `photo`) VALUES ('$first_name', '$last_name', '$username', '$password', '$photo')";

            if($this->conn->query($sql))
            {
                header("location: ../views");
                exit;
            }
            else
            {
                die("Error". $this->conn->error);
            }
        }
    

    public function login($username, $password){
        $sql = "SELECT `user_id`, username, `password` FROM users WHERE username = '$username'";

        if($result = $this->conn->query($sql))
        {
            //check if the username is existing
            if($result->num_rows == 1)
            {
                //check the password is correct
                $user_details = $result->fetch_assoc();
                //user details is an associative array
                //print_($user_details);
                if(password_verify($password, $user_details['password']))
                {
                    session_start();
                    $_SESSION['user_id'] = $user_details['user_id'];
                    $_SESSION['username'] = $user_details['username'];

                    header("location: ../views/dashboard.php");
                    exit;
                }else
                {
                    //password is incorrect
                    die("Password is incorrect.");
                }
            }else
            {
                //username is incorrect
                die("username not found.");
            }
        }else
        {
            die("Error logging in: " .$this->conn->error);
        }
    }

    public function getAllUsers($user_id)
    {
        $sql = "SELECT `user_id`, first_name, last_name, username FROM users WHERE `user_id` != $user_id";

        if($result = $this->conn->query($sql))
        {
            //expecting one ormore rows 
            return $result;
        }else
        {
            die("Error retrieving all user: " .$this->conn->error);
        }
    }


    public function getUser($user_id)
    {
        $sql = "SELECT * FROM users WHERE user_id = $user_id";

        if($result = $this->conn->query($sql))
        {
            //expecting one row only
            return $result->fetch_assoc();
        }else
        {
            die("Error retrieving user: " .$this->conn->error);
        }
    }

    public function updateUser($user_id, $first_name, $last_name, $username)
    {
        $sql = "UPDATE users SET first_name='$first_name',last_name='$last_name',username='$username' WHERE `user_id` = $user_id";

        if($this->conn->query($sql))
            {
                header("location: ../views/dashboard.php");
                exit;
            }
            else
            {
                die("Error updating user". $this->conn->error);
            }
    }

    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM `users` WHERE `user_id` = $user_id";

        if($this->conn->query($sql))
            {
                header("location: ../views/dashboard.php");
                exit;
            }
            else
            {
                die("Error updating user". $this->conn->error);
            }
    }

    public function uploadPhoto($user_id, $photo_name, $photo_tmp)
    {
        $sql = "UPDATE `users` SET photo = '$photo_name'  WHERE `user_id` = $user_id";

        if($this->conn->query($sql))
            {
                $destination = "../assets/images/$photo_name";
                
                if(move_uploaded_file($photo_tmp, $destination))
                {
                header("location:../views/profile.php");
                exit; 
                }
                else
                {
                    die("Error moving the photo.");
                }
                
               
               
            }
            else
            {
                die("Error in uploading the photo". $this->conn->error);
            }
    }

}
?>