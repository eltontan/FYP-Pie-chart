
// AJAX Call
function doAJAXCall(partialLink, dataToSend, callback, callbackFailed) {

    console.log("Sending data for AJAX : " , dataToSend)
    var url = "http://localhost/fyp/" + partialLink;

    var data = dataToSend;
    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function(arr) {
            console.log("Success")
            callback(arr);
            return "Success";
        },
        error: function(arr) {
            console.log("Failed")
            callback(arr);
            return "Failed";
        }
    });
}

//Callback and format data
var cb = function(res){
    var splitRes = res.split(" | ");
    var formattedResults = {};
    for(var i = 0 ; i < splitRes.length / 3 ; i++){
        
        var type = splitRes[i*3];
        if(type == ""){
            break;
        }
        var time = splitRes[i*3 + 1].substring(0,4);
        var temperature = splitRes[i*3 + 2];
        if(formattedResults[type] == undefined){
            formattedResults[type] = {};
        }
        formattedResults[type][time] = temperature;
    }
    loadChart(formattedResults);

}

//Chart load function
var loadChart = function(data){
    console.log(data)
    var allTime = Object.keys(data[Object.keys(data)[0]]);
    var actualData = [];
    var types = Object.keys(data);
    for(var type of types){
        var d = {}
        d['name'] = type;
        d['data'] = [];
        for(var time of allTime){
            d['data'].push(parseFloat(data[type][time]));
        }
        actualData.push(d);
    }
    console.log(actualData)
    Highcharts.chart('container', {
        chart: {
          type: 'column'
        },
        title: {
          text: 'Temperature'
        },
        subtitle: {
          text: ''
        },
        xAxis: {
          categories: allTime,
          crosshair: true
        },
        yAxis: {
          min: 0,
          title: {
            text: 'Temp'
          }
        },
        tooltip: {
          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} degrees</b></td></tr>',
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
        series: actualData
      });
    
}
doAJAXCall('getdata.php' , {} , cb, cb)
// Set interval
setInterval(function(){  }, 180000);