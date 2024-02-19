<?php

if ($action == 'add') {
    if (!empty($_POST)) {
        //validate
        $errors = [];

        if (empty($_POST['username'])) {
            $errors['username'] = "A username is required";
        } else
          if (!preg_match("/^[a-zA-Z]+$/", $_POST['username'])) {
            $errors['username'] = "Username can only have letters and no spaces";
        }

        $query = "select id from users where email = :email limit 1";
        $email = query($query, ['email' => $_POST['email']]);

        if (empty($_POST['email'])) {
            $errors['email'] = "A email is required";
        } else
          if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email not valid";
        } else
          if ($email) {
            $errors['email'] = "That email is already in use";
        }

        if (empty($_POST['password'])) {
            $errors['password'] = "A password is required";
        } else
          if (strlen($_POST['password']) < 8) {
            $errors['password'] = "Password must be 8 character or more";
        } else
          if ($_POST['password'] !== $_POST['retype_password']) {
            $errors['password'] = "Passwords do not match";
        }

        //validate image
        $allowed = ['image/jpeg', 'image/png', 'image/webp'];
        if (!empty($_FILES['image']['name'])) {
            $destination = "";
            if (!in_array($_FILES['image']['type'], $allowed)) {
                $errors['image'] = "Image format not supported";
            } else {
                $folder = "uploads/";
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }

                $destination = $folder . time() . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                resize_image($destination);
            }
        }

        if (empty($errors)) {
            //save to database
            $data = [];
            $data['username'] = $_POST['username'];
            $data['email']    = $_POST['email'];
            $data['role']     = $_POST['role'];
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $query = "insert into users (username,email,password,role) values (:username,:email,:password,:role)";

            if (!empty($destination)) {
                $data['image']     = $destination;
                $query = "insert into users (username,email,password,role,image) values (:username,:email,:password,:role,:image)";
            }

            query($query, $data);

            redirect('admin/users');
        }
    }
}
