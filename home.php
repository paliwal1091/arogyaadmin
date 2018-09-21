
<?php session_start();
include './DB.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Arogya</title>
        <!-- Meta Tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="keywords" content="" />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!-- //Meta Tags -->

        <!-- Style-sheets -->
        <!-- Bootstrap Css -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Bootstrap Css -->
        <!-- Common Css -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!--// Common Css -->
        <!-- Nav Css -->
        <link rel="stylesheet" href="css/style4.css">
        <!--// Nav Css -->
        <!-- Fontawesome Css -->
        <link href="css/fontawesome-all.css" rel="stylesheet">
        <!--// Fontawesome Css -->
        <!--// Style-sheets -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   
        
        
        
        
        <script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script><script src="//m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
  	}
})();
</script>
<script>
(function(){
if(typeof _bsa !== 'undefined' && _bsa) {
	// format, zoneKey, segment:value, options
	_bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
}
})();
</script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
  	}
})();
</script>
<script>
	(function(v,d,o,ai){ai=d.createElement("script");ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, "//vdo.ai/core/w3layouts/vdo.ai.js");
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125810435-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125810435-1');
</script><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-30027142-1', 'w3layouts.com');
  ga('send', 'pageview');
</script>


<link rel="stylesheet" href="styles/calendar.css">

    </head>

    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h1>
                        <a href="home.php">Arogya</a>
                    </h1>
                    <span>M</span>
                </div>
                <div class="profile-bg"></div>

                
           
                <?php
                if ($_SESSION['userbean']['user_role'] == 'DOCTOR') {
                    include_once './_tree_doctor.php';
                } else if ($_SESSION['userbean']['user_role'] == 'ACCOUNTANT') {
                    include_once './_tree_accountant.php';
                } else if ($_SESSION['userbean']['user_role'] == 'ADMIN') {
                    include_once './_tree_admin.php';
                } else if ($_SESSION['userbean']['user_role'] == 'LAB') {
                    include_once './_tree_lab.php';
                } else if ($_SESSION['userbean']['user_role'] == 'OPD') {
                    include_once './_tree_opd.php';
                } else if ($_SESSION['userbean']['user_role'] == 'PHARMACIST') {
                    include_once './_tree_pharmacist.php';
                } else if ($_SESSION['userbean']['user_role'] == 'TRANSPORT') {
                    include_once './_tree_transport.php';
                } else if ($_SESSION['userbean']['user_role'] == 'WARD') {
                    include_once './_tree_ward.php';
                }
                ?>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">
                <!-- top-bar -->
              <?php     include_once './_top_bar.php'; ?>
                <!--// top-bar -->
                <!-- main-heading -->
                <!--// main-heading -->
                <!-- Page Content -->
                <div class="blank-page-content"  style="min-height: 480px">
<?php
if ($_SESSION['userbean']['user_role'] == 'DOCTOR') {
    include_once './doctor/home_icons.php';
} else if ($_SESSION['userbean']['user_role'] == 'ACCOUNTANT') {
    include_once './accountant/home_icons.php';
} else if ($_SESSION['userbean']['user_role'] == 'ADMIN') {
    include_once './admin/home_icons.php';
} else if ($_SESSION['userbean']['user_role'] == 'LAB') {
    include_once './lab/home_icons.php';
} else if ($_SESSION['userbean']['user_role'] == 'OPD') {
    include_once './opd/home_icons.php';
} else if ($_SESSION['userbean']['user_role'] == 'PHARMACIST') {
    include_once './pharmacist/home_icons.php';
} else if ($_SESSION['userbean']['user_role'] == 'TRANSPORT') {
    include_once './transport/home_icons.php';
} else if ($_SESSION['userbean']['user_role'] == 'WARD') {
    include_once './ward/home_icons.php';
}
?>

                    
                    
                    
                    
                    
                    
                

            

            <!--// three-grids -->
            <div class="container-fluid">
                <div class="row">
                    <!-- Calender -->
                    <div class="outer-w3-agile col-xl mt-3">
                        <h4 class="tittle-w3-agileits mb-4">Multi range Calender</h4>
                        	<div id='calendar-wrap'>
	</div>
                        <div class="box"></div>
                    </div>
                    <!--// Calender -->
                    <!-- Profile -->
                    <div class="outer-w3-agile col-xl mt-3 mx-xl-3 p-xl-0 px-md-5">
                        <div class="header">
                            <div class="text">
                                <img src="images/profile.jpg" class="img-fluid rounded-circle" alt="Responsive image">
                                <h2>Matthew Scott</h2>
                                <a href="mailto:info@example.com">
                                    <p>@Lorem ipsum</p>
                                </a>
                            </div>
                        </div>
                        <div class="container-flud">
                            <div class="followers row">
                                <div class="f-left col">
                                    <a href="#">
                                        <i class="far fa-comments"></i>
                                    </a>
                                </div>
                                <div class="f-left col border-left border-right">
                                    <a href="#">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                                <div class="f-left col">
                                    <a href="#">
                                        <i class="far fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <ul class="prof-widgt-content">
                            <li class="menu">
                                <ul>
                                    <li class="button">
                                        <a href="#">
                                            <i class="fas fa-envelope"></i> Messages
                                            <span>13</span>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <ul class="icon-navigation">
                                            <li>
                                                <a href="#">Inbox
                                                    <span class="float-right">[09]</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">Outbox
                                                    <span class="float-right">[01]</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">Sent messages
                                                    <span class="float-right">[03]</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu">
                                <ul>
                                    <li class="button">
                                        <a href="#">
                                            <i class="fas fa-user"></i> Profile</a>
                                    </li>
                                    <li class="dropdown">
                                        <ul class="icon-navigation">
                                            <li>
                                                <a href="#">Change your pic</a>
                                            </li>
                                            <li>
                                                <a href="#">Change your username</a>
                                            </li>
                                            <li>
                                                <a href="#">About us</a>
                                            </li>
                                            <li>
                                                <a href="#">Contact me</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--// Profile -->
                    <!-- Browser stats -->
                    <div class="outer-w3-agile col-xl mt-3">
                        <h4 class="tittle-w3-agileits mb-4">Browser Stats</h4>
                        <div class="stats-info stats-body">
                            <ul class="list-unstyled">
                                <li class="pb-3">GoogleChrome
                                    <span class="float-right">85%</span>
                                    <div class="progress progress-striped active progress-right">
                                        <div class="bar green" style="width:85%;"></div>
                                    </div>
                                </li>
                                <li class="py-md-4 py-3">Firefox
                                    <span class="float-right">35%</span>
                                    <div class="progress progress-striped active progress-right">
                                        <div class="bar yellow" style="width:35%;"></div>
                                    </div>
                                </li>
                                <li class="py-md-4 py-3">Internet Explorer
                                    <span class="float-right">78%</span>
                                    <div class="progress progress-striped active progress-right">
                                        <div class="bar red" style="width:78%;"></div>
                                    </div>
                                </li>
                                <li class="py-md-4 py-3">Safari
                                    <span class="float-right">50%</span>
                                    <div class="progress progress-striped active progress-right">
                                        <div class="bar blue" style="width:50%;"></div>
                                    </div>
                                </li>
                                <li class="py-md-4 py-3">Opera
                                    <span class="float-right">80%</span>
                                    <div class="progress progress-striped active progress-right">
                                        <div class="bar light-blue" style="width:80%;"></div>
                                    </div>
                                </li>
                                <li class="last py-md-4 py-3">Others
                                    <span class="float-right">60%</span>
                                    <div class="progress progress-striped active progress-right">
                                        <div class="bar orange" style="width:60%;"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--// Browser stats -->
                </div>
            </div>
            <!--// Three-grids -->
            <!-- Countdown -->
            <div class="outer-w3-agile mt-3 outer-w3-agile-bg">
                <h4 class="tittle-w3-agileits mb-4 text-white">Countdown Timer</h4>
                <div class="simply-countdown-custom" id="simply-countdown-custom"></div>
            </div>
            <!--// Countdown -->
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>

                
                
                
                
                
                
                <!--// Page Content -->

                <!-- Copyright -->
<?php include './_footer.php'; ?>
                <!--// Copyright -->
            </div>
        </div>


        
    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->
    
    <!-- loading-gif Js -->
    <script src="js/modernizr.js"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <!--// loading-gif Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- Graph -->
    <script src="js/SimpleChart.js"></script>
    <script>
        var graphdata4 = {
            linecolor: "Random",
            title: "Thursday",
            values: [{
                    X: "6",
                    Y: 300.00
                },
                {
                    X: "7",
                    Y: 101.98
                },
                {
                    X: "8",
                    Y: 140.00
                },
                {
                    X: "9",
                    Y: 340.00
                },
                {
                    X: "10",
                    Y: 470.25
                },
                {
                    X: "11",
                    Y: 180.56
                },
                {
                    X: "12",
                    Y: 680.57
                },
                {
                    X: "13",
                    Y: 740.00
                },
                {
                    X: "14",
                    Y: 800.89
                },
                {
                    X: "15",
                    Y: 420.57
                },
                {
                    X: "16",
                    Y: 980.24
                },
                {
                    X: "17",
                    Y: 1080.00
                },
                {
                    X: "18",
                    Y: 140.24
                },
                {
                    X: "19",
                    Y: 140.58
                },
                {
                    X: "20",
                    Y: 110.54
                },
                {
                    X: "21",
                    Y: 480.00
                },
                {
                    X: "22",
                    Y: 580.00
                },
                {
                    X: "23",
                    Y: 340.89
                },
                {
                    X: "0",
                    Y: 100.26
                },
                {
                    X: "1",
                    Y: 1480.89
                },
                {
                    X: "2",
                    Y: 1380.87
                },
                {
                    X: "3",
                    Y: 1640.00
                },
                {
                    X: "4",
                    Y: 1700.00
                }
            ]
        };
        $(function () {
            $("#Hybridgraph").SimpleChart({
                ChartType: "Hybrid",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: false,
                data: [graphdata4],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
        });
    </script>
    <!--// Graph -->
    <!-- Bar-chart -->
    <script src="js/rumcaJS.js"></script>
    <script src="js/example.js"></script>
    <!--// Bar-chart -->
    <!-- Calender -->
    <script src="js/moment.min.js"></script>
    <script src="js/pignose.calender.js"></script>
    <script>
        //<![CDATA[
        $(function () {
            $('.calender').pignoseCalender({
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '.');
                }
            });

            $('.multi-select-calender').pignoseCalender({
                multiple: true,
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '~' +
                        (date[1] === null ? 'null' : date[1].format('YYYY-MM-DD')) +
                        '.');
                }
            });
        });
        //]]>
    </script>
    <!--// Calender -->

    <!-- profile-widget-dropdown js-->
    <script src="js/script.js"></script>
    <!--// profile-widget-dropdown js-->

    <!-- Count-down -->
    <script src="js/simplyCountdown.js"></script>
    <link href="css/simplyCountdown.css" rel='stylesheet' type='text/css' />
    <script>
        var d = new Date();
        simplyCountdown('simply-countdown-custom', {
            year: d.getFullYear(),
            month: d.getMonth() + 2,
            day: 25
        });
    </script>
    <!--// Count-down -->

    <!-- pie-chart -->
    <script src='js/amcharts.js'></script>
    <script>
        var chart;
        var legend;

        var chartData = [{
                country: "Lithuania",
                value: 260
            },
            {
                country: "Ireland",
                value: 201
            },
            {
                country: "Germany",
                value: 65
            },
            {
                country: "Australia",
                value: 39
            },
            {
                country: "UK",
                value: 19
            },
            {
                country: "Latvia",
                value: 10
            }
        ];

        AmCharts.ready(function () {
            // PIE CHART
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "country";
            chart.valueField = "value";
            chart.outlineColor = "";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;
            // this makes the chart 3D
            chart.depth3D = 20;
            chart.angle = 30;

            // WRITE
            chart.write("chartdiv");
        });
    </script>
    <!--// pie-chart -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->
    
    <script src="scripts/calendar.js"></script>
	<script src="scripts/index.js"></script>
    </body>

</html>