<?php

require_once dirname(__DIR__).'/core/init.php';


class Credential {


    public static function RegisterNewUser($data = array())
    {   
        $db = DB::getInstance();
        return $db->signup($_POST);
    }


    public static function Login($data = array())
    {
        $db = DB::getInstance();
        $status = $db->login($_POST);

        $obj = array('status'=>false);
        if($status != null)
        {
            // print_r($status->phone);
            if($status->password == $data['pass'])
            {
                $_SESSION['name'] = $status->name;
                $_SESSION['age'] = $status->age;
                $_SESSION['email'] = $status->email;

                $_SESSION['phone'] = $status->phone;

                $_SESSION['type'] =
                $status->memberType;

                $obj['status'] = true;
                if($status->memberType == 'admin')
                {
                    $obj['url'] = 'admin-Panel.php';
                }else{
                    $obj['url'] = 'member-panel.php';
                }
                

                

            
                return $obj;
            }


        }

        return $obj;
    }


    public static function logout()
    {
        session_destroy();
    }

}


?>
