<?php 



require_once 'core/init.php';

//print_r($_SESSION);

if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin')

{

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

    <link rel="stylesheet" href="/public/css/admin-panel.css">



    <title>Admin Dashboard</title>

    <script

  src="https://code.jquery.com/jquery-3.5.1.js"

  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="

  crossorigin="anonymous"></script>

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

    <div class="create-meeting-content">

        <div class="create-meeting" style="height:70vh">

            <h1>Create a new meeting</h1>

            <h1>Meeting title:</h1>

            <textarea id="ptitle" style="height :50px; width :400px;"></textarea>

            <h1>Problem Statement</h1>

	    <textarea id="ps" style="height :100px; width :400px;"></textarea>

            <button id="create-meeting-btn">Create Meeting</button>

        </div>

    </div>

    <!--===== MAIN JS =====-->

    <script src="/public/js/admin-panel.js"></script>

    <script>

	    $("#create-meeting-btn").click(function(){

	    $.ajax({

		    url : "/liveEditor/create_mw.php",

		    type : "post",

            data : {"prob" : $("#ps").val(),

                    "title" : $("#ptitle").val()},

		    success : function(data){

			    data = JSON.parse(data)

			    window.location.href = "/liveEditor/editor/editor.php?cid="+data["channelID"];

		    }



	    });

	    });

    </script>

</body>



</html>

