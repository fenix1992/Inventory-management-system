<?php
	include('session.php');
    $sql = 'SELECT * FROM product';
	$result = mysqli_query($db,$sql); 
	$rows = array();
	while($row = mysqli_fetch_array($result)){
    	$rows[] = $row;
	}
	
	$sql = 'SELECT * FROM comment';
	$CommentResult = mysqli_query($db,$sql); 
	$CommentRows = array();
	while($row = mysqli_fetch_array($CommentResult)){
    	$CommentRows[] = $row;
	}
?>


<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard</title>
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">
		<script src="js/dashboard.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
		<script>
			var comments = <?php echo json_encode( $CommentRows ) ?>;
		</script>

	</head>
	<body>
		
		<script>
			//看这个code拿数据，那个alert只是展示
			var products = <?php echo json_encode( $rows ) ?>;
			//我的的第一个物品是id=1,item=apple,income=1,expend=1; 这里alert会出现apple
			for(var i = 0; i <products.length; i++) {
				for(var j = 0; j < 8; j++) {
				}
			}
		
		
		</script>
		
	<div id="top-bar">
		<nav>
			<ul>
				<li><a href="dashboard.php">Home</a></li>
				<li><a href="comment.php">Message</a></li>
				<li><a href="#">About</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			
			
		</nav>
	</div>	
		

		<div id = "side-navagate-bar">
			<div class = "toggle-btn" onclick="toggleSideBar()">
				<span></span>
				<span></span>
				<span></span>
				
			</div>
			
			<ul>
				<li><h2 id="logo">Inventory Sales Management</h2></li>
				<li><a href="#">Sales</a></li>
				<li><a href="inventory.php">Inventory</a></li>
				<li><a href="#">link3</a></li>
			</ul>
			
		</div>



	<div id="block">

		<div id="main-area">
			
			<div id="welcome">
				<h1>Welcome</h1>
			</div>
			
			<div id="mini_nav">
				<div id="mini_board">
					<div class = "mini_font"><a href="javascript:openSales()">Sales</a></div>
					<img src="img/sales.png"/>
				</div>
				
				<div id="mini_board">
					<div class = "mini_font"><a href="javascript:openIncome()">Income</a></div>
					<img src="img/income.png"/>
				</div>
				
				<div id="mini_board">
					<div class = "mini_font"><a href="#">OnBoard</a></div>
					<img src="img/chat.png" />
				</div>
				
				<div id="mini_board">
					<div class = "mini_font"><a href="#">Profile</a></div>
					<?php echo '<img src="' . $avatar . '"/>';?>
				</div>
			</div>
			
			<div id="first_row">
				<div id="linechar">
					<canvas id="canvas" ></canvas>
				</div>
				<div id="barchar">
					<canvas id="canvas1" ></canvas>
				</div>
			</div>
			
			
			<div id="second_row">
				<div id="Tasks_Panel">
					<h4>Tasks Panel</h4>
					<h4>     </h4>
					<div id="message"> </div>
				</div>
			</div>
			
		</div>	
	</div>
		
		
	<script>

		var myChart = {
		  type: 'line',
		  data: {
		    labels: ['Jan', 'Feb', 'Mar', 'April', 'May', 'Jun', 'Jul', 'Aug','Sep', 'Oct', 'Nov', 'Dec'],
		    datasets: [{
		      label: 'Revenue',
		      data: [12, 19, 3, 17, 6, 3, 7, 9, 10, 14, 17, 16],
		     
		      backgroundColor: "rgba(104, 163, 221, 0.5)"
		      
		    }, {
		      label: 'Expend',
		      data: [2, 29, 5, 5, 2, 3, 10, 7, 8, 10, 9, 14],
		      backgroundColor: "rgba(245, 0, 0, 0.5)"
		    }]
		  },
		
		  options: {
			responsive: true,
            title:{
                display:true,
                text:'Product Revenue and Expend'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            }
		  }
		};
		
		var ctx = document.getElementById('canvas').getContext('2d');
		var index = new Chart(ctx, myChart);
		
		var myBarChart = {
				  type: 'bar',
				  data: {
				    labels: ['Jan', 'Feb', 'Mar', 'April', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				    datasets: [{
				      label: 'Revenue',
				      data: [12, 19, 3, 17, 6, 3, 7, 7, 9, 10, 14, 17],
				     
				      backgroundColor: "rgba(104, 163, 221, 0.5)"
				      
				    }, {
				      label: 'Expend',
				      data: [2, 29, 5, 5, 2, 3, 10, 12, 19, 3, 17, 6],
				      backgroundColor: "rgba(245, 0, 0, 0.5)"
				    }]
				  },
				  options: {
						responsive: true,
			            title:{
			                display:true,
			                text:'Product Revenue and Expend'
			            },
			            tooltips: {
			                mode: 'index',
			                intersect: false,
			            },
			            hover: {
			                mode: 'nearest',
			                intersect: true
			            },
			            scales: {
			                xAxes: [{
			                    display: true,
			                    scaleLabel: {
			                        display: true,
			                        labelString: 'Month'
			                    }
			                }],
			                yAxes: [{
			                    display: true,
			                    scaleLabel: {
			                        display: true,
			                        labelString: 'Value'
			                    }
			                }]
			            }
					  }
				  
				};
				
				var ctx = document.getElementById('canvas1').getContext('2d');
				var index = new Chart(ctx, myBarChart);

		</script>
	</body>
</html>