
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Online Quiz System</title>
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
    <link rel="stylesheet" href="css/welcome.css">
    <link  rel="stylesheet" href="css/font.css">
    
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    <script type="text/javascript">
        function logout() {
            // Clear the user's session
            sessionStorage.clear();

            // Redirect to the login page
            window.location.href = '../login.php';
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-default title1">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Javascript:void(0)"><b>Online Quiz System</b></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dashboard.php?q=0">Select Quize<span class="sr-only">(current)</span></a></li>
                    <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="result.php?q=1">Last Results</a></li>
                    <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="course.php?q=2">Courses Notes</a></li>
                    <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">

                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="#" onclick="logout()"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Log out</a></li>

                </ul>
            </div>
        </div>
    </nav>