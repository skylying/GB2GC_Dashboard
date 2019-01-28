$(document).ready(function(){
	// Initiate tdoay
	var monthMap = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
	var dateObj = new Date();
	// Dashabord only provide yesterday's data
	dateObj.setDate(dateObj.getDate() - 1);
	var year = dateObj.getFullYear().toString();
	var month = monthMap[dateObj.getMonth()];
	var day = dateObj.getDate().toString();


	// Init Today's date
	var fullDateString = year + '-' + month + '-' + day
	$('#todaystring').text(fullDateString);

	// Bind events
	$('#search_fun88').on('click', function(){
		var year = $('#fun88_search_year').val()
		var month = $('#fun88_search_month').val()
		getMonthlyInstallationData(year, month)
	})


	initFun88History();
	//getMonthlyInstallationData(year, month);

	// By default, get yesterday's data
	getDailyInstallationData(year, month, day);






	function getMonthlyInstallationData(year, month){

		var year = year;
		var month = month;

		$.ajax({
		  method: "GET",
		  url: "ajax.php",
		  data: { brand: "fun88", interval:"monthly", year: year, month: month},
		  success: function(res){
		  	console.log("Ajax request success!");
		  	//console.log(res);
		  	var resultArr = JSON.parse(res);

		  	var iOSMonthlyData = [];
		  	var AndroidMonthlyData = [];
		  	resultArr.forEach(function(arr){
		  		if(arr["device"] == "ios") {
		  			iOSMonthlyData.push(arr);
		  		} else {
		  			AndroidMonthlyData.push(arr)
		  		}
		  	})

		  	// Update ios monthly table

		  	//var dayList = getDayListOfMonth(2018, 11);
		  	//console.log(dayList);

		  	var tableRows = [];
		  	var key = 0;
		  	iOSMonthlyData.map(function(day){
		  		var row = '<td>' + iOSMonthlyData[key]["date"] + '</td><td>' + iOSMonthlyData[key]["New Installations"] + '</td><td>' + iOSMonthlyData[key]["Active Users of day"] + '</td><td>' + AndroidMonthlyData[key]["New Installations"] + '</td><td>' + AndroidMonthlyData[key]["Active Users of day"] + '</td>';
		  		tableRows.push($('<tr>').append(row));
		  		key++;
		  	})

		  	$('#fun88_monthly_table_body').empty().append(tableRows);



		  	//updateDailyReport(resultArr);
		  }
		})
	}

	function getDailyInstallationData(year, month, day){

		var year = year;
		var month = month;
		var day = day;

		$.ajax({
		  method: "GET",
		  url: "ajax.php",
		  data: { brand: "fun88", interval: "daily", year: year, month: month, day:day},
		  success: function(res){
		  	console.log("Ajax request success!");
		  	//console.log(res);
		  	var resultArr = JSON.parse(res);
		  	updateDailyReport(resultArr);
		  }
		})

	}


	/*function getDayListOfMonth(year, month) {

		var todayObj = new Date()
		var currentYear = todayObj.getFullYear();
		var currentMonth = todayObj.getMonth();
		var dayList = [];

		// If it's current month, possible to return less days
		if (parseInt(year) == currentYear && parseInt(month == currentMonth)) {
			// return less days
			console.log("Fuck~~do nothing");
		} else {
			var pastDateObj = new Date(year, month, 1);
			//var pastMonth = '' + (pastDateObj.getMonth() + 1);
			while(pastDateObj.getMonth() === month) {
				var date = pastDateObj.getDate();
				dayList.push(year.toString() + '-' + ((parseInt(month) < 10) ? '0' + month.toString() : month.toString()) + '-' + ((date < 10) ? '0' + date.toString() : date.toString()));
				pastDateObj.setDate(pastDateObj.getDate() + 1);
			}
		}

    return dayList;
	}*/

	function updateDailyReport(resultArr) {
		console.log(resultArr);
		resultArr.forEach(function(arr){
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


	/**
	 * Initiate monthly search input fields
	 */
	function initFun88History() {
		$('#fun88_search_year').val(year);
		$('#fun88_search_month').val(month);
	}

})