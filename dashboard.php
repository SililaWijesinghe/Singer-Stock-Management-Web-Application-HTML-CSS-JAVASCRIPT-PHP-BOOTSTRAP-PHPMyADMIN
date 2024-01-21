<?php require_once 'includes/header.php'; ?>

<?php 

$sql = "SELECT * FROM product WHERE status = 1";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM orders WHERE order_status = 1";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$totalRevenue = "";
while ($orderResult = $orderQuery->fetch_assoc()) {
      $totalRevenue = $orderResult['paid'];
}

$lowStockSql = "SELECT * FROM product WHERE quantity <= 3 AND status = 1";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$connect->close();

?>


<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}


body {
    background: url("https://www.singerslfiles.com/images/singer-logos/singer_favicon.png") center/cover fixed; 
}

.panel-default {
    background: rgba(255, 0, 0, 0.2); 
    border: none;
    border-radius: 15px;
    backdrop-filter: blur(10px); 
    padding: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); 
}


.form-control {
    background: rgba(255, 0, 0, 0.2); 
    border: none;
    border-radius: 10px;
    color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}


.btn {
    background: rgba(255, 0, 0, 0.2); 
    border: none;
    border-radius: 10px;
    color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.btn-primary {
    background-color: #D90000;
}


.modal-content {
    background: rgba(255, 0, 0, 0.2); 
    border: none;
    border-radius: 15px;
    backdrop-filter: blur(10px);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); 
}

.modal-header {
    background: none;
    border-bottom: none;
}

.modal-title {
    color: white;
}

.modal-body {
    background: rgba(255, 0, 0, 0.15); 
    border-radius: 10px;
    padding: 20px;
}

.modal-footer {
    background: none;
    border-top: none;
}


.table {
    background: rgba(255, 0, 0, 0.2); 
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); 
}

.table > thead > tr > th {
    color: white;
    border-top: none;
    border-bottom: none;
}


.breadcrumb {
    background: rgba(255, 0, 0, 0.2); 
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.breadcrumb > li > a {
    color: white;
}


.page-heading {
    color: white;
    margin-top: 0;
}


.btn:hover {
    background: rgba(255, 0, 0, 0.3); 
}


</style>

<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


<div class="row">
	
	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a href="product.php" style="text-decoration:none;color:black;">
					Total Product
					<span class="badge pull pull-right"><?php echo $countProduct; ?></span>	
				</a>
				
			</div> 
		</div> 
	</div> 

		<div class="col-md-4">
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="orders.php?o=manord" style="text-decoration:none;color:black;">
					Total Orders
					<span class="badge pull pull-right"><?php echo $countOrder; ?></span>
				</a>
					
			</div> 
		</div> 
		</div> 

	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="product.php" style="text-decoration:none;color:black;">
					Low Stock
					<span class="badge pull pull-right"><?php echo $countLowStock; ?></span>	
				</a>
				
			</div> 
		</div> 
	</div> 

	<div class="col-md-4">
		<div class="card">
		  <div class="cardHeader">
		    <h1><?php echo date('d'); ?></h1>
		  </div>

		  <div class="cardContainer">
		    <p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
		  </div>
		</div> 
		<br/>

		<div class="card">
		  <div class="cardHeader" style="background-color:#245580;">
		    <h1><?php if($totalRevenue) {
		    	echo $totalRevenue;
		    	} else {
		    		echo '0';
		    		} ?></h1>
		  </div>

		  <div class="cardContainer">
		    <p> <i class="glyphicon glyphicon-usd"></i> Total Revenue</p>
		  </div>
		</div> 

	</div>

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> Calendar</div>
			<div class="panel-body">
				<div id="calendar"></div>
			</div>	
		</div>
		
	</div>

	
</div> <!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        }        
      });


    });
</script>

<?php require_once 'includes/footer.php'; ?>