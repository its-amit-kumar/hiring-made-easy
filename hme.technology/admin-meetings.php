<?php 



require_once 'core/init.php';

// print_r($_SESSION);

if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin')

{

    //get meeting history



    $obj = DB::getInstance();

    $data = $obj->getHistory($_SESSION['email']);

    if($data != null)

    {

        //show data

        // print_r($data);

    }else{

        header('Location: admin-Panel.php');

        exit();

    }

    //nothing

}else{

    header('Location: index.html');

    exit();

}



?>



<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="/public/css/member-panel.css">



    <title>Admin Dashboard</title>

</head>



<body id="body-pd">

    <header class="header" id="header">

        <div class="header__toggle">

            <i class='bx bx-menu' id="header-toggle"></i>

        </div>



        <div class="header__img">

            <img src="/public/img/Amazon.jpg" alt="">

        </div>

    </header>



    <div class="l-navbar" id="nav-bar">

        <nav class="nav">

            <div>

                <a href="#" class="nav__logo">

                    <i class='bx bx-layer nav__logo-icon'></i>

                    <span class="nav__logo-name">Hiring Made Easy</span>

                </a>



                <div class="nav__list">

                    <a href="/admin-Panel.php" class="nav__link active">

                        <i class='bx bx-grid-alt nav__icon'></i>

                        <span class="nav__name">Dashboard</span>

                    </a>



                    <a href="/admin-profile.php" class="nav__link">

                        <i class='bx bx-user nav__icon'></i>

                        <span class="nav__name">Profile</span>

                    </a>



                    <a href="/admin-panel-message.php" class="nav__link">

                        <i class='bx bx-message-square-detail nav__icon'></i>

                        <span class="nav__name">Messages</span>

                    </a>



                    <a href="/admin-meetings.php" class="nav__link">

                        <i class='bx bx-bookmark nav__icon'></i>

                        <span class="nav__name">Meetings</span>

                    </a>





                    </a>

                </div>

            </div>



            <a href="logout.php" class="nav__link">

                <i class='bx bx-log-out nav__icon'></i>

                <span class="nav__name">Log Out</span>

            </a>

        </nav>

    </div>

    <div class="meetings">

        <h1>Meetings History</h1>

        <div class="table">

        <table>

            <tr>

              <th>Meeting Title</th>

              <th> Meeting Code</th>

              <th>Date</th>

            </tr>

            <?php

                foreach ($data as $key => $value) {

                    echo '<tr>

              <td>'.$value->title.'</td>

              <td>'.$value->code.'</td>

              <td>'.$value->created.'</td>

            </tr>';

                }

            

            ?>



          </table></div>

    </div>





    <!--===== MAIN JS =====-->

    <script src="/public/js/admin-panel.js"></script>

</body>



</html>
