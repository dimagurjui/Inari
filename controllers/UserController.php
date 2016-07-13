<?php

class UserController
{
    public function actionView()
    {
        $user = User::getUser(User::logged());

        if(empty($user))
        {
            header("Location: /login");
        }

        $articles = Article::getUserArticles($user['id_user']);

        $template = new Volpi();

        $template['first_name'] = $user['first_name'];
        $template['last_name'] = $user['last_name'];
        $template['user_name'] = $user['user_name'];
        $template['email'] = $user['email'];

        $template['articles'] = $articles;

        $template->show('user.user_view');
        
        return true;
    }
    
    public function actionRegister()
    {
        $template = new Volpi();

        $unm = filter_input(INPUT_POST, 'unm');
        $fnm = filter_input(INPUT_POST, 'fnm');
        $lnm = filter_input(INPUT_POST, 'lnm');
        $pswd = filter_input(INPUT_POST, 'pswd');
        $pswdr = filter_input(INPUT_POST, 'pswdr');
        $email = filter_input(INPUT_POST, 'email');

        $template['fnm'] = '';
        $template['lnm'] = '';
        $template['unm'] = '';
        $template['email'] = '';

        $template['unm_error'] = 'Invalid User Name, already exists or invalid length, must be between 3 and 20 chars!';
        $template['fnm_error'] = 'Invalid First Name, must be between 3 and 20 chars!';
        $template['lnm_error'] = 'Invalid Last Name, must be between 3 and 20 chars!';
        $template['email_error'] = 'Invalid email!';
        $template['pswd_error'] = 'Invalid Password, must be between 4 and 30 chars!';

        $template['unm_error_v'] = 'hidden';
        $template['fnm_error_v'] = 'hidden';
        $template['lnm_error_v'] = 'hidden';
        $template['email_error_v'] = 'hidden';
        $template['pswd_error_v'] = 'hidden';

        $error_counter = 0;

        if( isset($unm) )
        {
            if(!User::checkUserName($unm))
            {
                $template['unm_error_v'] = 'show';
                $error_counter++;
            }
            else
            {
                $template['unm'] = $unm;
            }
            if(!User::checkName($fnm))
            {
                $template['fnm_error_v'] = 'show';
                $error_counter++;
            }
            else
            {
                $template['fnm'] = $fnm;
            }
            if(!User::checkName($lnm))
            {
                $template['lnm_error_v'] = 'show';
                $error_counter++;
            }
            else
            {
                $template['lnm'] = $lnm;
            }
            if(!User::checkEmail($email))
            {
                $template['email_error_v'] = 'show';
                $error_counter++;
            }
            else
            {
                $template['email'] = $email;
            }
            if(!User::checkPass($pswd,$pswdr))
            {
                $template['pswd_error_v'] = 'show';
                $error_counter++;
            }
            if($error_counter == 0)
            {
                User::registerUser(array(
                    'user_name' => $unm,
                    'first_name' => $fnm,
                    'last_name' => $lnm,
                    'password' => $pswd,
                    'email' => $email
                ));

                header("Location: /login");
            }
        }

        $template->show('user.newuser');
        
        return true;
    }

    public function actionLogin()
    {

        $template = new Volpi();
        $template['error'] = 'Incorrect password or email entered. Please try again.';
        $template['visibility'] = 'hidden';

        $email = filter_input(INPUT_POST, 'email');
        $pswd = filter_input(INPUT_POST, 'pswd');

        if(isset($email))
        {
            $id_user = User::checkUser($email, $pswd);

            User::auth($id_user);

            if(!$id_user)
            {
                $template['visibility'] = 'show';
            }
            else
            {
                header("Location: /profile");
            }
        }

        $template->show('user.login');

        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);

        header("Location: /");

        return true;
    }

}