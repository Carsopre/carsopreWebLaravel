    var data = [
        {
        value: 30,
        color:"#F7464A"
    },
    {
        value : 10,
        color : "#E2EAE9"
    },
    {
        value : 30,
        color : "#D4CCC5"
    },
    {
        value : 15,
        color : "#949FB1"
    },
    {
        value : 15,
        color : "#4D5360"
    }
    ];
    var ctx = document.getElementById("hobbies-chart").getContext("2d");
    new Chart(ctx).Doughnut(data);

    var data1 = {
    labels : ["1999","2002","2005","2008","2011","2014"],
    datasets : [
        {
            fillColor : "rgba(99,123,133,0.4)",
            strokeColor : "rgba(220,220,220,1)",
            pointColor : "rgba(220,220,220,1)",
            pointStrokeColor : "#fff",
            data : [80,100,120,120,120,120]
        },
        {
            fillColor : "rgba(219,186,52,0.4)",
            strokeColor : "rgba(220,220,220,1)",
            pointColor : "rgba(220,220,220,1)",
            pointStrokeColor : "#fff",
            data : [80,100,120,120,120,120]
        },
        {
            fillColor : "rgba(19,186,52,0.2)",
            strokeColor : "rgba(20,220,220,1)",
            pointColor : "rgba(20,220,220,1)",
            pointStrokeColor : "#fff",
            data : [20,40,70,80,100,110]
        },
        {
            fillColor : "rgba(219,18,52,0.2)",
            strokeColor : "rgba(220,20,220,1)",
            pointColor : "rgba(220,20,220,1)",
            pointStrokeColor : "#fff",
            data : [0,0,0,0,30,30]
        },
        {
            fillColor : "rgba(219,186,2,0.1)",
            strokeColor : "rgba(220,220,0,1)",
            pointColor : "rgba(220,220,0,1)",
            pointStrokeColor : "#fff",
            data : [0,0,0,0,0,30]
        },
        ]
    }
    var options1 = {
        scaleOverride: true,
        scaleSteps: 6,
        scaleStepWidth: 20,
        scaleStartValue: 0
    }
    var canvas = document.getElementById("languages-chart");
    var ctx = canvas.getContext("2d");
    new Chart(ctx).Line(data1, options1);

    var data2 = {
        labels: ["Hard working", "Versatil", "Collaborative", "Self-aware", "Persistent", "Organizing", "Responsible", "Patient", "Energetic"],
        datasets : [
            {
                fillColor : "rgba(199,185,163,0.7)",
                strokeColor : "rgba(102, 93, 78, 1)",
                pointColor : "rgba(102, 93, 78, 1)",
                pointStrokeColor : "#fff",
                data : [95,70, 80, 65,90, 95, 85,  60, 95]
            }
        ]
    }
    var options2 = {
        animation: true,
        datasetFill: true,
        scaleOverride: true,
        scaleStartValue: 0,
        scaleStepWidth: 10,
        scaleSteps: 10,
        scaleLineColor: "rgba(102, 93, 78, 0.2)"

    }
    var canvas = document.getElementById("overall-chart");
    var ctx = canvas.getContext("2d");
    new Chart(ctx).Radar(data2,options2);