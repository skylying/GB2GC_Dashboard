;
(function($){


	// Prevent global conflict
	if (typeof window.TLCHandler != 'undefined') {
		return;
	}


	window.TLCHandler = {

		init: function(){
			
			this.brand = 'tlc';
			this.monthMap = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
			this.dateObj = new Date();
			
			// Daily dashabord only provide yesterday's full data
			this.dateObj.setDate(this.dateObj.getDate() - 1);

			this.year = this.dateObj.getFullYear().toString();
			this.month = this.monthMap[this.dateObj.getMonth()];
			this.day = this.dateObj.getDate().toString();

			this.fullDateString = this.year + '-' + this.month + '-' + this.day;
			
			//$('#todaystring').text(fullDateString);
			$('#tlc_search_year').val(this.year);
			$('#tlc_search_month').val(this.month);

			// By default, get yesterday's data
			this.getDailyInstallationData(this.year, this.month, this.day);

			this.bindEvents();
		},

		/**
		 * Bind all events
		 */
		bindEvents: function() {

			var self = this;

			// Search History Button
			$('#search_tlc').on('click', function(){
				var year = $('#tlc_search_year').val()
				var month = $('#tlc_search_month').val()
				self.getMonthlyInstallationData(year, month);
			})

		},

		/**
		 * Query monthly installation data
		 */
		getMonthlyInstallationData: function(year, month){

			var year = year;
			var month = month;

			$.ajax({
			  method: "GET",
			  url: "ajax.php",
			  data: { brand: this.brand, interval:"monthly", year: year, month: month},
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

			  	var tableRows = [];
			  	var key = 0;
			  	iOSMonthlyData.map(function(day){
			  		var row = '<td>' + iOSMonthlyData[key]["date"] + '</td><td>' + iOSMonthlyData[key]["New Installations"] + '</td><td>' + iOSMonthlyData[key]["Active Users of day"] + '</td><td>' + AndroidMonthlyData[key]["New Installations"] + '</td><td>' + AndroidMonthlyData[key]["Active Users of day"] + '</td>';
			  		tableRows.push($('<tr>').append(row));
			  		key++;
			  	})

			  	$('#tlc_monthly_table_body').empty().append(tableRows);

			  }
			})
		},

		getDailyInstallationData: function(year, month, day){

			var year = year;
			var month = month;
			var day = day;
			var self = this;

			$.ajax({
			  method: "GET",
			  url: "ajax.php",
			  data: { brand: this.brand, interval: "daily", year: year, month: month, day:day},
			  success: function(res){
			  	console.log("Ajax request success!");
			  	//console.log(res);
			  	var resultArr = JSON.parse(res);
			  	self.updateDailyReport(resultArr);
			  }
			})
		},

		updateDailyReport: function(resultArr){

			resultArr.forEach(function(arr){
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


})(jQuery);