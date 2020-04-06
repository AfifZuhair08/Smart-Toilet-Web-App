( function ( $ ) {

	var charts = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			this.ajaxGetMonthlyEntry();

		},

		ajaxGetMonthlyEntry: function () {
			var urlPath =  'http://' + window.location.hostname + ':8000/get_today_Tdata';
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {
				console.log( response );
				charts.createCompletedJobsChart( response );
			});
		},

		/**
		 * Created the Completed Jobs Chart
		 */
		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("ChartT_Today");
			var myLineChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: response.labels, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "Sensor State",
						lineTension: 0.3,
						backgroundColor: "rgba(2,117,216,0.2)",
						borderColor: "rgba(2,117,216,1)",
						pointRadius: 3.8,
						pointBackgroundColor: "rgba(2,117,216,1)",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "rgba(2,117,216,1)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response.data, // The response got from the ajax request containing data for the entries in the corresponding months
					}],
				},
				options: {
					scales: {
						xAxes: [{
							scaleLabel: {
								display: true,
								labelString: 'Date/Time'
							},
							time: {
								unit: 'time',
								displayFormats: {
									hour: 'h:mm a',
									minute: 'h:mm a',
								}
							},
							gridLines: {
								display: false
							},
							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							scaleLabel: {
								display: true,
								labelString: 'State Value'
							},
							ticks: {
								min: 0,
								max: 20, // The response got from the ajax request containing max limit for y axis
								maxTicksLimit: 5
							},
							gridLines: {
								color: "rgba(0, 0, 0, .125)",
							}
						}],
					},
					legend: {
						display: true
					}
				}
			});
		}
	};

	charts.init();

} )( jQuery );