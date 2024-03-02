$(document).ready(function(){
			var url = "https://api.covid19india.org/data.json";
			$.getJSON(url,function(data){
				// console.log(data);
				var total_confirmed, total_active, total_recovered, total_deaths;
				//  count all the covid cases
				total_confirmed = data.statewise[0].confirmed;
				total_active = data.statewise[0].active;
				total_recovered = data.statewise[0].recovered;
				total_deaths = data.statewise[0].deaths;
				$("#confirmed").append(total_confirmed);
				$("#active").append(total_active);
				$("#recovered").append(total_recovered);
				$("#deceased").append(total_deaths);
				//for chart
				var states = [];
				var confirmed = [];
				var active = [];
				var recovered = [];
				var deaths = [];
				$.each(data.statewise,function(id,obj){
					states.push(obj.state);
					confirmed.push(obj.confirmed);
					active.push(obj.active);
					recovered.push(obj.recovered);
					deaths.push(obj.deaths);
				});
				states.shift();
				confirmed.shift();
				active.shift();
				recovered.shift();
				deaths.shift();
				// console.log(states);
				var myChart = document.getElementById("myChart").getContext('2d');
				var chart = new Chart(myChart,{
					type:'line',
					data:{
						labels : states,
						datasets:[{
							label: 'Confirmed Cases',
							data: confirmed,
							backgroundColor: '#EFF34F',
							borderColor: '#5A5A5A',
							minBarLength: 100
						},
						{
							label: 'Active Cases',
							data: active,
							backgroundColor: '#64B4EA',
							borderColor: '#5A5A5A',
							minBarLength: 100
						},
						{
							label: 'Recovered Cases',
							data: recovered,
							backgroundColor: '#52E373',
							borderColor: '#5A5A5A',
							minBarLength: 100
						},
						{
							label: 'Deceased Cases',
							data: deaths,
							backgroundColor: '#E35252',
							borderColor: '#5A5A5A',
							minBarLength: 100
						}]
					},
					option:{
					}
				});
			});
		});
		$(document).ready(function(){
			var url = "https://api.covid19india.org/data.json";
			$.getJSON(url,function(data){
				// console.log(data);
				var total_confirmed, total_active, total_recovered, total_deaths;
				//  count all the covid cases
				total_confirmed = data.statewise[0].confirmed;
				total_active = data.statewise[0].active;
				total_recovered = data.statewise[0].recovered;
				total_deaths = data.statewise[0].deaths;
				$("#confirmed1").append(total_confirmed);
				$("#active1").append(total_active);
				$("#recovered1").append(total_recovered);
				$("#deceased1").append(total_deaths);
			});
		});
		function fetch(){
				$.get("https://api.covid19api.com/summary",function(data){
					// console.log(data);
					var total_confirmed = document.getElementById('confirmed2');
					var total_recovered = document.getElementById('recovered2');
					var total_deaths = document.getElementById('deceased2');

					total_confirmed.innerHTML = data['Global']['TotalConfirmed'];
					total_recovered.innerHTML = data['Global']['TotalRecovered'];
					total_deaths.innerHTML = data['Global']['TotalDeaths'];

					var crn_tbl = document.getElementById('corona_tbl');
					for(var i=1; i<(data['Countries'].length);i++){
						var x = crn_tbl.insertRow();

						x.insertCell(0);
						crn_tbl.rows[i].cells[0].innerHTML = data['Countries'][i-1]['Country'];
						crn_tbl.rows[i].cells[0].style.background = '#b8daff';
						crn_tbl.rows[i].cells[0].style.fontWeight = 'bold';

						x.insertCell(1);
						crn_tbl.rows[i].cells[1].innerHTML = data['Countries'][i-1]['TotalConfirmed'];
						crn_tbl.rows[i].cells[1].style.background = '#ffeeba';
						
						x.insertCell(2);
						crn_tbl.rows[i].cells[2].innerHTML = data['Countries'][i-1]['TotalRecovered'];
						crn_tbl.rows[i].cells[2].style.background = '#c3e6cb';
						
						x.insertCell(3);
						crn_tbl.rows[i].cells[3].innerHTML = data['Countries'][i-1]['TotalDeaths'];
						crn_tbl.rows[i].cells[3].style.background = '#f5c6cb';
						
						x.insertCell(4);
						crn_tbl.rows[i].cells[4].innerHTML = data['Countries'][i-1]['NewConfirmed'];
						crn_tbl.rows[i].cells[4].style.background = '#ffeeba';
						
						x.insertCell(5);
						crn_tbl.rows[i].cells[5].innerHTML = data['Countries'][i-1]['NewRecovered'];
						crn_tbl.rows[i].cells[5].style.background = '#c3e6cb';
						
						x.insertCell(6);
						crn_tbl.rows[i].cells[6].innerHTML = data['Countries'][i-1]['NewDeaths'];
						crn_tbl.rows[i].cells[6].style.background = '#f5c6cb';					
					}
				})
			}