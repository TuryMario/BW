$(document).ready(function(){
var exists;
	//function to call inside ajax callback 
	function set_exists(x){
		var exists = x;
		console.log(exists);
	}

	// $.ajax({
	// 	url: "http://localhost/CRPS/dashchart/piecount.php",
	// 	type: "GET",
	// 	async: false,
	// 	success: function(data){
	// 	        if(data == true){
	// 	            set_exists(data);
	// 	        }
	// 	        else{
	// 	            set_exists(false);
	// 	        }
	// 			//console.log(data);

	// 		// return data;//.push(data);// = [];
	// 		// console.log(count);
	// 	},
	// 	error: function(data){
	// 		console.log("Error occured");
	// 	}
	// });

	// if(exists){
	//     var b = exists;
	//     console.log(exists);
	// }
	// else{
	//     return false;
	// }

	var jqxhr = $.ajax({
    type: 'GET',       
    url: "http://localhost/AdCorp/earings.php?email='"email"'",
    // data: queryParams,
    // dataType: 'html',
    context: document.body,
    global: false,
    async:false,
    success: function(data) {
        return data;
    }
	}).responseText;

	var jq = $.ajax({
    type: 'GET',       
    url: "http://localhost/AdCorp/views.php?email='"email"'",
    // data: queryParams,
    // dataType: 'html',
    context: document.body,
    global: false,
    async:false,
    success: function(data2) {
        return data2;
    }
	}).responseText

	document.getElementById("clients").innerHTML = jq;
	document.getElementById("clients").innerHTML = jqxhr;  
	// userData();

	// alert(jqxhr);
	// // or...
	// return jqxhr;
			

	//console.log(count);

	
	// var ctx1 = $("#pie-chartcanvas-1");
	// var b = jqxhr;
	// var c = jq;
	// //var b = exists;

	// var data1 = {
	// 	labels: ["Credible", "Uncredible"],
	// 	datasets: [
	// 	{
	// 		label: "chart",
	// 		data: [b,c],
	// 		backgroundColor: [
	// 		"#2a5fad",
	// 		"#ff5500"//#493d88"
	// 		],
	// 		borderColor: [
	// 		"#AA8887",
	// 		"#BB8887"
	// 		],
	// 		borderWidth: [1, 1]
	// 	}

	// 	]
	// };

	// var options = {
	// 	title : {
	// 		display : true,
	// 		position : "top",
	// 		text : "pie chart",
	// 		fontsize : 18,
	// 		fontcolor : "#fff"
	// 	},
		
	// 	legend : {
	// 		display : true,
	// 		position : "bottom"
	// 	}
	// };

	// var chart1 = new Chart( ctx1, {
	// 	type: 'pie',
	// 	data: data1,
	// 	options: options
	// });

	// function userData() 
	// { 
	     
	//     // fn = parseInt(jqxhr, 10);
	//     // ln = parseInt(jq, 10);
	//     // result =  (fn+ln); 
	//     document.getElementById("clients").innerHTML = result;
	//     document.getElementById("clients").innerHTML = result;  
	// }



	// $.ajax({
	// 	url: "http://localhost/CRPS/dashchart/piecount.php",
	// 	type: "GET",
	// 	success: function(data){
	// 		console.log(data);

	// 		var count = data;//.push(data);// = [];
	// 		// var facebook_follower = [];
	// 		// var twitter_follower = [];
	// 		// var googleplus_follower =[];

	// 		// for (var i in data) {
	// 		// 	userid.push("train"+ data[i].userid);
	// 		// 	facebook_follower.push(data[i].facebook);
	// 		// 	twitter_follower.push(data[i].twitter);
	// 		// 	googleplus_follower.push(data[i].googleplus);
	// 		// }

	// 		var ctx1 = $("#pie-chartcanvas-1");

	// 		var data1 = {
	// 			labels: ["match1", "match2"],
	// 			datasets: [
	// 			{
	// 				label: "chart",
	// 				data: [count,40],
	// 				backgroundColor: [
	// 				"#DE8887",
	// 				"#AB8887"
	// 				],
	// 				borderColor: [
	// 				"#AA8887",
	// 				"#BB8887"
	// 				],
	// 				borderWidth: [1, 1]
	// 			}

	// 			]
	// 		};


	// 		var options = {
	// 			title : {
	// 				display : true,
	// 				position : "top",
	// 				text : "pie chart",
	// 				fontsize : 18,
	// 				fontcolor : "#fff"
	// 			},
				
	// 			legend : {
	// 				display : true,
	// 				position : "bottom"
	// 			}
	// 		};

	// 		var chart1 = new Chart( ctx1, {
	// 			type: 'pie',
	// 			data: data1,
	// 			options: options
	// 		});

	// 	},
	// 	error: function(data){
	// 		console.log("Error occured");
	// 	}
	// });

	


});