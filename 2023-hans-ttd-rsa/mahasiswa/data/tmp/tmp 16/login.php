<?php 
include '../include/function/login.php';
$default_url = '../data/tmp/tmp 16';
$tema = 'AircraftAdmin/';
$url = $default_url.'/'.$tema;
?>


    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $url;?>lib/font-awesome/css/font-awesome.css">
    <script src="<?php echo $url;?>lib/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>stylesheets/premium.css">

</head>
<body class=" theme-blue">
    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

  
   

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <a class="" href="index.php"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> <?php echo ucwords($judul);?></span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">

        </div>
      </div>
    </div>
    


        <div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Form Login</p>
        <div class="panel-body">
            <form method="post" action="">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control span12">
                </div>
                <div class="form-group">
                <label>Password</label>
                    <input type="password" name="password" class="form-controlspan12 form-control">
                </div>
                
				
				<a class="btn btn-large btn-warning" href="../../">Cancel</a>&nbsp;
                <button class="btn btn-large btn-success" name="login" type="submit">Login</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
    <p class="pull-right" style=""><a href="index.php" target="blank" style="font-size: .75em; margin-top: .25em;"><?php echo $copyright;?></a></p>
    
</div>



    <script src="<?php echo $url;?>lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  
</body></html>
