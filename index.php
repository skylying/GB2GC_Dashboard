<!DOCTYPE html>
<html>
<head>
	<title>B2B2C Brand Dashboard</title>
	<!-- Load bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Load boostrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">GB2BC Brabd Dashboard</a>
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a class="nav-link" href="#">Sign out</a>
			</li>
		</ul>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="home"></span>
                Fun88 <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                TLC
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                RB88
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <div id="content" class="col-md-10">
      	<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Daily</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Weekly</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Monthly</a>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				  	<h1 class="today">(Today String)</h1>
				  	<div class="container-fluid">
				  		<div class="row">
				  			<div class="col-md-4">
				  				<h2>Native App</h2>
				  			</div>
				  			<div class="col-md-4">
				  				<div class="kpi">
				  					<div id="ios_daily_new_installation">-</div>
				  					<span>New Installation</span>
				  				</div>
				  				<div class="kpi">
				  					<div id="ios_daily_active_users">-</div>
				  					<span>Active Users</span>
				  				</div>
				  			</div>
				  			<div class="col-md-4">
				  				<div class="kpi">
				  					<div id="android_daily_new_installation">-</div>
				  					<span>New Installation</span>
				  				</div>
				  				<div class="kpi">
				  					<div id="android_daily_active_users">-</div>
				  					<span>Active Users</span>
				  				</div>
				  			</div>
				  		</div>
				  	</div>
				  </div>
				  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				  	<h1>Weekly Content</h1>
				  </div>
				  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				  	<h1>Monthly Content</h1>
				  </div>
				</div>
      </div>	
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			// Initiate tdoay
			//var todayString = 
			//$('.today')

			$.ajax({
			  method: "GET",
			  url: "ajax.php",
			  data: { brand: "fun88", year: "2019", month: "01", day: "07" },
			  success: function(res){
			  	console.log("Ajax request success!");
			  	console.log(res);
			  	var resultArr = JSON.parse(res);
			  	updateDailyReport(resultArr);
			  }
			})

			function updateDailyReport(resultArr) {
				console.log(resultArr);
				resultArr.forEach(function(arr){
					console.log("fuck!!");
					console.log(arr);
					//debugger;
					if (arr["device"] == "ios") {
						var newInstallation = arr["New Installations"];
						var activeUsers = arr["Active Users of day"];
						$('#ios_daily_new_installation').text(newInstallation);
						$('#ios_daily_active_users').text(activeUsers);
					} else {
						var newInstallation = arr["New Installations"];
						var activeUsers = arr["Active Users of day"];
						$('#android_daily_new_installation').text(newInstallation);
						$('#android_daily_active_users').text(activeUsers);
					}
				})

			}

		})
	</script>
</body>
</html>