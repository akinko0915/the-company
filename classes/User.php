<?php
    require_once "Database.php";

    class User extends Database{
        public function store($request){
            #Receive the data
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $username = $request['username'];
            $password = $request['password'];

            #hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            #Create query string
            $sql = "INSERT INTO users(first_name, last_name, username, db_password) VALUES('$first_name', '$last_name', '$username', '$hashed_password')";

            #Execute the query string
            if($this->conn->query($sql)){
                header ("location: ../views");  //index.php
                exit;  //same as die
            } else {
                die ("Error in creating user" . $this->conn->error);
            }
        }


        public function login($request){
            $username = $request['username'];
            $password = $request['password'];

            $sql = "SELECT * FROM users WHERE username = '$username'";

            #Execute the query
            $result = $this->conn->query($sql);

            #check for the username
            if($result->num_rows == 1){
                #Check for the password
                $user = $result->fetch_assoc();
                //$user = ['id' => 1, 'first_name' => 'Mary', 'last_name' => 'Watson', 'username' => 'marywatson',.....]

                if (password_verify($password, $user['db_password'])){
                    #If the password is matched, then create a SESSION VARIABLES for the future use
                    session_start();
                    $_SESSION['id'] = $user['id'];  
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fullname'] = $user['first_name'] . " " . $user['last_name'];   

                    header("location:../views/dashboard.php");
                    exit;
                } else {
                    die ("Password is incorrect.");
                }
              
            } else {
                die ("Username not found");
            }
        }

        public function logout(){
            session_start();
            session_unset();
            session_destroy();

            header("location: ../views");
            exit;
        }

        #retreived all users in the database
        public function getAllUsers(){
            $sql = "SELECT id, first_name, last_name, username, photo FROM users";

            if($result=$this->conn->query($sql)){
                return $result;
            } else {
                die ("Error in retrieving the users" . $this->conn->error);
            }
        }

        public function getUser(){
            // session_start();
            $id = $_SESSION['id'];

            $sql = "SELECT first_name, last_name, username, photo FROM users WHERE id = '$id'";

            if($result = $this->conn->query($sql)){
                return $result->fetch_assoc();

            } else {
                die ("Error retreving the user" . $this->conn->error);
            }
        }

        public function update($request, $files){
            session_start();
            $id         = $_SESSION['id'];
            $first_name = $request['first_name'];
            $last_name  = $request['last_name'];
            $username   = $request['username'];
            $photo      = $files['photo']['name'];  
            //2 dimensional array[][]  [photo of <input> field in edit-user][name of the file]
            $tmp_photo  = $files['photo']['tmp_name'];
            //tmp_name ---> the file is placed in a temporary storage/folder before moving ot the destination

            $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username='$username' WHERE id = '$id'";

            #Execute the query above
            if($this->conn->query($sql)){
                $_SESSION['username'] = $username;
                $_SESSION['fullname'] = "$first_name $last_name";

                #If there is an uploaded photo, save it to the Db and save the file to images folder
                if($photo){ //If this is True, then 
                    #Create a query string
                    $sql = "UPDATE users SET photo = '$photo' WHERE id = '$id'";
                    $destination = "../assets/images/$photo";

                    #Save the image name to the database
                    if($this->conn->query($sql)){
                        #Save the image to the images of folder
                        if(move_uploaded_file($tmp_photo, $destination)){
                            header('location: ../views/dashboard.php');
                            exit;
                        } else {
                            die("Error in moving the file.");
                        }
                    } else {
                        die ("Error uploading the photo");
                    } 
                }

                header("location: ../views/dashboard.php");
                exit;
            } else {
                    die ("Error in updating the user" . $this->conn->error);
            }
        }

        public function delete(){
            session_start();
            $id =$_SESSION['id'];

            $sql = "DELETE FROM users WHERE id = '$id'";

            if($this->conn->query($sql)){
                $this->logout(); // call the logout method
            } else {
                die ("Error in deleting the account" . $this->conn->error);
            }
        }
    }
?>