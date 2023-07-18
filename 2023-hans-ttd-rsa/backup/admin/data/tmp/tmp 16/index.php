<?php
$default_url = '../../../data/tmp/tmp 16';
$tema = 'AircraftAdmin/';
$url = $default_url.'/'.$tema;
include '../../../include/all_include.php';
include '../../../include/function/session.php'; 
?>


    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $url;?>lib/font-awesome/css/font-awesome.css">
    <script src="<?php echo $url;?>lib/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="<?php echo $url;?>lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>stylesheets/premium.css">

</head>
<body class=" theme-blue">

    <!-- Demo page code -->

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
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="<?php echo $url;?>index.html"><span class="navbar-brand"><span class="fa fa-paper-plane"></span>  <?php echo ucwords($judul);?></span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
               
                    <a href="<?php logout();?>"><span class="fa fa-user"></span>&nbsp;Logout</a>
                
           

             
            </li>
          </ul>

        </div>
      </div>
    </div>
    

    <div class="sidebar-nav">
    <ul>
	
	 <!-- MENU -->
                <?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
                <!-- SINGLE -->
                <li>
                    <a class="nav-header" href="<?php echo $i->l;?>">
                        <i class="<?php echo $i->i;?>"></i>
                        <span><?php echo $i->n;?></span>

                    </a>
                </li>
				

                <!-- /SINGLE -->
            <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
                <!-- MULTI -->

				
				
				 <li><a href="#" data-target=".<?php echo $idmenu?>" class="nav-header collapsed" data-toggle="collapse"><i class="<?php echo $i->i;?>"></i> <?php echo $i->n;?><i class="fa fa-collapse"></i></a></li>
        <li><ul class="<?php echo $idmenu;?> nav nav-list collapse">
		
		<?php
		$m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
                        <li>
                           
								 <li ><a href="<?php echo $i1->l;?>"><span class="<?php echo $i1->i;?>"></span>&nbsp;&nbsp;<?php echo $i1->n;?>&nbsp;&nbsp;</a></li>
                        </li>
                        <?php }} ?>
		
		
           
           
    </ul></li>
				
				
				
               

            <!-- /MULTI -->
            <?php }} ?>
 <!-- /MENU -->
	
    

   
				
				
			
				
				
            </ul>
    </div>

    <div class="content">
        <div class="header">
            <div class="stats">
   
    
    <p class="stat"><span class="label label-info">Aplikasi : <?php echo $judul; ?></span> </p>
    <p class="stat"><span class="label label-success">Page : <?php tabelnomin(); ?></span> </p>
    <p class="stat"><span class="label label-danger">Login : <?php echo $siapa;?></span> </p>
</div>

        
                   
                   <br>
                   <br>

        </div>
        <div class="main-content">
            




    <div class="panel panel-default">
        <a href="#page-stats" class="panel-heading" data-toggle="collapse"><?php tabelnomin(); ?></a>
        <div id="page-stats" class="panel-collapse panel-body collapse in">

                    <div class="row">
                   
                       
					   <?php include 'halaman.php'; ?>
					   
                   
                    </div>
        </div>
    </div>


            <footer>
                <hr>

               
                <?php echo $copyright; ?>
            </footer>
        </div>
    </div>


    <script src="<?php echo $url;?>lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  
</body></html>
