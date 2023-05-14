const getCurrentTimeDate = () => {
    let currentTimeDate = new Date();
    var week = new Array(7);
    week[0] = 'SUN';
    week[1] = 'MON';
    week[2] = 'TUE';
    week[3] = 'WED';
    week[4] = 'THU';
    week[5] = 'FRI';
    week[6] = 'SAT';

    var month = new Array();
    month[0] = "JAN";
    month[1] = "FEB";
    month[2] = "MAR";
    month[3] = "APR";
    month[4] = "May";
    month[5] = "JUN";
    month[6] = "JUL";
    month[7] = "AUG";
    month[8] = "SEP";
    month[9] = "OCT";
    month[10] = "NOV";
    month[11] = "DEC";

    var hours = currentTimeDate.getHours();
    var minutes = currentTimeDate.getMinutes();
    minutes = minutes < 10 ? '0' + minutes : minutes;

    var ampm = hours >= 12 ? 'PM' : 'AM';

    if (hours === 12) {
        hours = 12;
    } else {
        hours > hours % 12;
    }


    var currentTime = `${hours}:${minutes}${ampm}`;
    var currentDay = week[currentTimeDate.getDay()];

    var currentDate = currentTimeDate.getDate();
    var currentMonth = month[currentTimeDate.getMonth()];
    var CurrentYear = currentTimeDate.getFullYear();

    var fullDate = `${currentDate} ${currentMonth} ${CurrentYear}`;


    document.getElementById("time").innerHTML = currentTime;
    document.getElementById("day").innerHTML = currentDay;
    document.getElementById("date").innerHTML = fullDate;

    setTimeout(getCurrentTimeDate, 500);

}


getCurrentTimeDate();






window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        // title: {
        //   text: "Desktop Search Engine Market Share - 2016"
        // },
        height: 160,
        responsive: true,
        data: [{
            type: "pie",
            startAngle: 40,
            yValueFormatString: "##0.00\"%\"",
            indexLabel: "{label} {y}",
            dataPoints: [
                {
                    y: 20,
                    label: "Jatiya Party"
                },
                {
                    y: 4,
                    label: "Bangladesh Nationalist Party"
                },
                {
                    y: 46,
                    label: "Bangladesh Awami League"
                },
                {
                    y: 4,
                    label: "Independent"
                },
                {
                    y: 2,
                    label: "Gano Forum"
                },
                {
                    y: 10,
                    label: "Jatiya Samajtrantik Dal"
                },
                {
                    y: 5,
                    label: "Bikalpa Dhara Bangladesh"
                },
                {
                    y: 5,
                    label: "Bangladesh Tarikat Federation"
                }
    ]
  }]
    });
    chart.render();
}



function resize() {
    $("#chartContainer").outerHeight($(window).height() - $("#chartContainer").offset().top - Math.abs($("#chartContainer").outerHeight(true) - $("#chartContainer").outerHeight()));
}
$(document).ready(function () {
    resize();
    $(window).on("resize", function () {
        resize();
    });
});
