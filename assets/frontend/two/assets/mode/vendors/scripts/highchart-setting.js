// chart 1
Highcharts.chart('chart1span1', {
	title: {
		text: 'Jumlah Dosen Institut Pemerintahan Dalam Negeri'
	},
	subtitle: {
		text: 'Sumber: scdb.ipdn.ac.id'
	},
	yAxis: {
		title: {
			text: 'Jumlah'
		}
	},
	chart: {
		type: 'pie',
	},
	plotOptions: {
		series: {
			label: {
				connectorAllowed: false
			},
			pointStart: 2015
		},
		spline: {
			marker: {
				enabled: false
			}
		}
	},
	series: [{
		type: 'pie',
		allowPointSelect: true,
		keys: ['name', 'y', 'selected', 'sliced'],
		data: [
		['Guru Besar', 20, true],
		['Lektor Kepala', 15, false],
		['Lektor', 10, false],
		['Asisten Ahli', 5, false]
		],
		showInLegend: true
	}],
	responsive: {
		rules: [{
			condition: {
				maxWidth: 500
			}
		}]
	}
});

// chart 2
$.getJSON(
	'#',
	function (data) {

		Highcharts.chart('chart2span1', {
			chart: {
				zoomType: 'x'
			},
			title: {
				text: 'Rating Pendapatan IPDN'
			},
			subtitle: {
				text: document.ontouchstart === undefined ?
				'Klik dan seret di area plot untuk memperbesar' : 'drag diagram untuk memperbesar'
			},
			xAxis: {
				type: 'datetime'
			},
			yAxis: {
				title: {
					text: 'Rating'
				}
			},
			legend: {
				enabled: false
			},
			plotOptions: {
				area: {
					fillColor: {
						linearGradient: {
							x1: 0,
							y1: 0,
							x2: 0,
							y2: 1
						},
						stops: [
						[0, Highcharts.getOptions().colors[0]],
						[1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
						]
					},
					marker: {
						radius: 2
					},
					lineWidth: 1,
					states: {
						hover: {
							lineWidth: 1
						}
					},
					threshold: null
				}
			},

			series: [{
				type: 'area',
				name: 'Rupiah',
				data: data
			}]
		});
	}
	);

// chart 3
Highcharts.chart('chart3span1', {
	chart: {
		type: 'area'
	},
	title: {
		text: 'Serapan Dana'
	},
	subtitle: {
		text: 'Sumber: scdb.ipdn.ac.id'
	},
	xAxis: {
		allowDecimals: false,
		labels: {
			formatter: function () {
				return this.value;
			}
		}
	},
	yAxis: {
		title: {
			text: 'Nilai'
		},
		labels: {
			formatter: function () {
				return this.value / 1000 + 'k';
			}
		}
	},
	tooltip: {
		pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
	},
	plotOptions: {
		area: {
			pointStart: 1990,
			marker: {
				enabled: false,
				symbol: 'circle',
				radius: 2,
				states: {
					hover: {
						enabled: true
					}
				}
			}
		}
	},
	series: [{
		name: 'Serapan',
		data: [
		null, null, null, null, null, 6, 11, 32, 110, 235,
		369, 640, 1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468,
		20434, 24126, 27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342,
		26662, 26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
		24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586, 22380,
		21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950, 10871, 10824,
		10577, 10527, 10475, 10421, 10358, 10295, 10104, 9914, 9620, 9326,
		5113, 5113, 4954, 4804, 4761, 4717, 4368, 4018
		]
	}, {
		name: 'Dana',
		data: [null, null, null, null, null, null, null, null, null, null,
		5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
		1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
		11643, 13092, 14478, 15915, 17385, 19055, 21205, 23044, 25393, 27935,
		30062, 32049, 33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000,
		37000, 35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
		21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
		12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
		]
	}]
});

// chart 4
Highcharts.chart('chart4span1', {
	chart: {
		type: 'column'
	},
	title: {
		text: 'Grafik Anggaran Unit Kerja'
	},
	subtitle: {
		text: 'Sumber: scdb.ipdn.ac.id'
	},
	xAxis: {
		categories: [
		'Jan',
		'Feb',
		'Mar',
		'Apr',
		'May',
		'Jun',
		'Jul',
		'Aug',
		'Sep',
		'Oct',
		'Nov',
		'Dec'
		],
		crosshair: true
	},
	yAxis: {
		min: 0,
		title: {
			text: 'Nilai'
		}
	},
	tooltip: {
		headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
		pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
		'<td style="padding:0"><b>{point.y:.1f} Rp</b></td></tr>',
		footerFormat: '</table>',
		shared: true,
		useHTML: true
	},
	plotOptions: {
		column: {
			pointPadding: 0.2,
			borderWidth: 0
		}
	},
	series: [{
		name: 'Laboratorium Dan Bahasa',
		data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

	}, {
		name: 'SDM',
		data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

	}, {
		name: 'Kemahasiswaan',
		data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

	}, {
		name: 'Q.A',
		data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

	}]
});

Highcharts.chart('chart4pok1', {
	chart: {
		type: 'column'
	},
	title: {
		text: 'Grafik P.O.K'
	},
	subtitle: {
		text: 'Sumber: scdb.ipdn.ac.id'
	},
	xAxis: {
		categories: [
		'Jan',
		'Feb',
		'Mar',
		'Apr',
		'May',
		'Jun',
		'Jul',
		'Aug',
		'Sep',
		'Oct',
		'Nov',
		'Dec'
		],
		crosshair: true
	},
	yAxis: {
		min: 0,
		title: {
			text: 'Nilai'
		}
	},
	tooltip: {
		headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
		pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
		'<td style="padding:0"><b>{point.y:.1f} Rp</b></td></tr>',
		footerFormat: '</table>',
		shared: true,
		useHTML: true
	},
	plotOptions: {
		column: {
			pointPadding: 0.2,
			borderWidth: 0
		}
	},
	series: [{
		name: 'Laboratorium Dan Bahasa',
		data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

	}, {
		name: 'SDM',
		data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

	}, {
		name: 'Kemahasiswaan',
		data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

	}, {
		name: 'Q.A',
		data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

	}]
});

Highcharts.chart('chart4sas1', {
	chart: {
		type: 'column'
	},
	title: {
		text: 'Dashboard Sistem Aplikasi Satker'
	},
	subtitle: {
		text: 'Sumber: scdb.ipdn.ac.id'
	},
	xAxis: {
		categories: [
		'Jan',
		'Feb',
		'Mar',
		'Apr',
		'May',
		'Jun',
		'Jul',
		'Aug',
		'Sep',
		'Oct',
		'Nov',
		'Dec'
		],
		crosshair: true
	},
	yAxis: {
		min: 0,
		title: {
			text: 'Nilai'
		}
	},
	tooltip: {
		headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
		pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
		'<td style="padding:0"><b>{point.y:.1f} Rp</b></td></tr>',
		footerFormat: '</table>',
		shared: true,
		useHTML: true
	},
	plotOptions: {
		column: {
			pointPadding: 0.2,
			borderWidth: 0
		}
	},
	series: [{
		name: 'Laboratorium Dan Bahasa',
		data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

	}, {
		name: 'SDM',
		data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

	}, {
		name: 'Kemahasiswaan',
		data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

	}, {
		name: 'Q.A',
		data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

	}]
});

// chart 5
Highcharts.chart('chart5span1', {
	title: {
		text: 'Grafik Program Unit Kerja'
	},
	subtitle: {
		text: 'Sumber: scdb.ipdn.ac.id'
	},
	xAxis: {
		categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
	},
	series: [{
		type: 'pie',
		allowPointSelect: true,
		keys: ['name', 'y', 'selected', 'sliced'],
		data: [
		['LPPM', 29.9, false],
		['Analisis', 71.5, false],
		['Q.A', 106.4, false],
		['SDM', 129.2, false],
		['Kemahasiswaan', 144.0, false],
		['Lab & Bahasa', 176.0, false],
		['PMB', 135.6, true, true],
		['Lain-lain', 148.5, false]
		],
		showInLegend: true
	}]
});

Highcharts.chart('chart5span2', {
	title: {
		text: 'Anggaran Dana Pemerintah'
	},
	subtitle: {
		text: 'Sumber: scdb.ipdn.ac.id'
	},
	series: [{
		type: 'pie',
		data: [
		['Nominal', 2464331600, false],
		['Anggaran Pemerintah', 3112331600, true, true],
		],
	}]
});

Highcharts.chart('chart5pok2', {
	title: {
		text: 'Petunjuk Operasional Kegiatan (POK)'
	},
	subtitle: {
		text: 'Sumber: scdb.ipdn.ac.id'
	},
	series: [{
		type: 'pie',
		data: [
		['Nominal', 2464331600, false],
		['Anggaran Pemerintah', 3112331600, true, true],
		],
	}]
});

Highcharts.chart('chart5sas2', {
	title: {
		text: 'Dashboard Sistem Aplikasi Satker'
	},
	subtitle: {
		text: 'Sumber: scdb.ipdn.ac.id'
	},
	series: [{
		type: 'pie',
		data: [
		['Nominal', 2464331600, false],
		['Anggaran Pemerintah', 3112331600, true, true],
		],
	}]
});

// chart 6
Highcharts.chart('chart6span1', {
	chart: {
		type: 'pie',
		options3d: {
			enabled: true,
			alpha: 45
		}
	},
	title: {
		text: 'Grafik Realisasi Program Kerja'
	},
	subtitle: {
		text: 'Sumber: scdb.ipdn.ac.id'
	},
	plotOptions: {
		pie: {
			innerSize: 100,
			depth: 45
		}
	},
	series: [{
		name: 'Jumlah Realisasi',
		data: [
		['Lab & Bahasa', 8],
		['Kemahasiswaan', 3],
		['LPPM', 1],
		['PMB', 6],
		['Analisis', 8],
		['Lain-lain', 4],
		['Q.A', 4],
		['SDM', 1]
		]
	}]
});

// chart 6
Highcharts.chart('chart61', {
	chart: {
		type: 'pie',
		options3d: {
			enabled: true,
			alpha: 45
		}
	},
	title: {
		text: 'Grafik Realisasi Program Kerja'
	},
	subtitle: {
		text: 'Sumber: scdb.ipdn.ac.id'
	},
	plotOptions: {
		pie: {
			innerSize: 100,
			depth: 45
		}
	},
	series: [{
		name: 'Jumlah Realisasi',
		data: [
		['Lab & Bahasa', 8],
		['Kemahasiswaan', 3],
		['LPPM', 1],
		['PMB', 6],
		['Analisis', 8],
		['Lain-lain', 4],
		['Q.A', 4],
		['SDM', 1]
		]
	}]
});

// chart 7
Highcharts.chart('chart7span1', {
	chart: {
		type: 'gauge',
		plotBackgroundColor: null,
		plotBackgroundImage: null,
		plotBorderWidth: 0,
		plotShadow: false
	},
	title: {
		text: 'Speedometer'
	},
	subtitle: {
		text: 'Sumber: scdb.ipdn.ac.id'
	},
	pane: {
		startAngle: -150,
		endAngle: 150,
		background: [{
			backgroundColor: {
				linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
				stops: [
				[0, '#FFF'],
				[1, '#333']
				]
			},
			borderWidth: 0,
			outerRadius: '109%'
		}, {
			backgroundColor: {
				linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
				stops: [
				[0, '#333'],
				[1, '#FFF']
				]
			},
			borderWidth: 1,
			outerRadius: '107%'
		}, {
		}, {
			backgroundColor: '#DDD',
			borderWidth: 0,
			outerRadius: '105%',
			innerRadius: '103%'
		}]
	},
	yAxis: {
		min: 0,
		max: 200,

		minorTickInterval: 'auto',
		minorTickWidth: 1,
		minorTickLength: 10,
		minorTickPosition: 'inside',
		minorTickColor: '#666',

		tickPixelInterval: 30,
		tickWidth: 2,
		tickPosition: 'inside',
		tickLength: 10,
		tickColor: '#666',
		labels: {
			step: 2,
			rotation: 'auto'
		},
		title: {
			text: 'km/h'
		},
		plotBands: [{
			from: 0,
			to: 120,
			color: '#55BF3B'
		}, {
			from: 120,
			to: 160,
			color: '#DDDF0D'
		}, {
			from: 160,
			to: 200,
			color: '#DF5353'
		}]
	},
	series: [{
		name: 'Speed',
		data: [80],
		tooltip: {
			valueSuffix: ' km/h'
		}
	}]
},
function (chart) {
	if (!chart.renderer.forExport) {
		setInterval(function () {
			var point = chart.series[0].points[0],
			newVal,
			inc = Math.round((Math.random() - 0.5) * 20);

			newVal = point.y + inc;
			if (newVal < 0 || newVal > 200) {
				newVal = point.y - inc;
			}

			point.update(newVal);

		}, 3000);
	}
});

// chart 8
Highcharts.chart('chart8span1', {
	chart: {
		type: 'boxplot'
	},
	title: {
		text: 'Highcharts Box Plot Example'
	},
	subtitle: {
		text: 'Sumber: scdb.ipdn.ac.id'
	},
	legend: {
		enabled: false
	},
	xAxis: {
		categories: ['1', '2', '3', '4', '5'],
		title: {
			text: 'Experiment No.'
		}
	},
	yAxis: {
		title: {
			text: 'Observations'
		},
		plotLines: [{
			value: 932,
			color: 'red',
			width: 1,
			label: {
				text: 'Theoretical mean: 932',
				align: 'center',
				style: {
					color: 'gray'
				}
			}
		}]
	},
	series: [{
		name: 'Observations',
		data: [
		[760, 801, 848, 895, 965],
		[733, 853, 939, 980, 1080],
		[714, 762, 817, 870, 918],
		[724, 802, 806, 871, 950],
		[834, 836, 864, 882, 910]
		],
		tooltip: {
			headerFormat: '<em>Experiment No {point.key}</em><br/>'
		}
	}, {
		name: 'Outlier',
		color: Highcharts.getOptions().colors[0],
		type: 'scatter',
		data: [
		[0, 644],
		[4, 718],
		[4, 951],
		[4, 969]
		],
		marker: {
			fillColor: 'white',
			lineWidth: 1,
			lineColor: Highcharts.getOptions().colors[0]
		},
		tooltip: {
			pointFormat: 'Observation: {point.y}'
		}
	}]

});