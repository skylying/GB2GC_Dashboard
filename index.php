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
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">GB2BC Brand Dashboard</a>
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
				  	<h1 class="today">2019-01-14</h1>
				  	<div class="container-fluid">
				  		<!-- Daily Statistic Row -->
				  		<div class="row">
				  			<div class="col-md-4">
				  				<h2>Native App</h2>
				  				<h2>2019-01-13</h2>
				  			</div>
				  			<div class="col-md-4">
				  				<div class="row">
				  					<h3>iOS</h3>
				  				</div>
				  				<div class="row">
				  					<div class="kpi">
				  						<div id="ios_daily_new_installation">-</div>
				  						<span>New Installation</span>
				  					</div>
				  					<div class="kpi">
				  						<div id="ios_daily_active_users">-</div>
				  						<span>Active Users</span>
				  					</div>
				  				</div>
				  			</div>
				  			<div class="col-md-4">
				  				<div class="row">
				  					<h3>Android</h3>
				  				</div>
				  				<div class="row">
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
				  		<!-- End of Daily Statistic Row -->

				  		<!-- Search History Row -->
				  		<h2>Search History</h2>
				  		<form>
			  				<div class="form-row">
			  					<div class="col-3">
			  						<select id="fun88_search_year" class="form-control">
			  							<option value="2019">2019</option>
			  							<option value="2018">2018</option>
			  						</select>
			  					</div>
			  					<div class="col-3">
			  						<select id="fun88_search_month" class="form-control">
			  							<option value="01">January</option>
			  							<option value="02">Febuary</option>
			  							<option value="03">March</option>
			  							<option value="04">April</option>
			  							<option value="05">May</option>
			  							<option value="06">June</option>
			  							<option value="07">July</option>
			  							<option value="08">August</option>
			  							<option value="09">September</option>
			  							<option value="10">October</option>
			  							<option value="11">November</option>
			  							<option value="12">December</option>
			  						</select>
			  					</div>
			  					<div class="col-3">
			  						<button class="btn btn-dark">Search</button>
			  					</div>
			  				</div>
			  			</form>
			  			<!--End of Search History Row -->

							<br>
			  			<!-- History table row -->
			  			<div class="row">
			  				<table class="table table-striped">
			  					<thead>
			  						<tr>
			  							<th>Fun88</th>
			  							<th colspan="2">iOS</th>
			  							<th colspan="2">Android</th>
			  						</tr>
			  						<tr>
			  							<th>Date</th>
			  							<th>Installations</th>
			  							<th>Active Users</th>
			  							<th>Installations</th>
			  							<th>Active Users</th>
			  						</tr>
			  					</thead>
			  					<tbody id="fun88_monthly_table_body">
			  					</tbody>
			  				</table>
			  			</div>
			  			<!--End of History table row -->
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
	<script type="text/javascript" src="main.js"></script>
</body>
</html>