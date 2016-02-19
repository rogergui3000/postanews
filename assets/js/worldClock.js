
/////////////////////
function startTime(){
	d = new Date();
	

	
	dx = d.toGMTString();
	dx = dx.substr(0,dx.length -3);
	d.setTime(Date.parse(dx))
	d.setSeconds(d.getSeconds() + 28800);
	
	
	var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug', 'Sep','Oct','Nov','Dec'];
	var month = d.getMonth();
	var monthString = months[month];
	
	
	var days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
	var day = d.getDay();
	var dayString = days[day];
	
	var date = d.getUTCDate();
	var year = d.getFullYear();
	
	//document.getElementById("theClock").innerHTML=d;
	
     var h = d.getHours();
     var m = d.getMinutes();
     var s = d.getSeconds();
	
     // add a zero in front of numbers<10
     m = checkTime(m);
     s = checkTime(s);
	
	
     $('#theClock').html(dayString+" "+date+" "+monthString+" "+year+"  "+h+":"+m+":"+s+"GMT+08:00");
	t=setTimeout(function(){startTime()},500);
	
}



function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}




/// running time
	startTime();

///////// annonace
    var quotes = [
        "Get web publishing source code",
        "contact at achillewanguedaniel0@yahoo.com",
        "Fork this project on GitHub using Git",
        "Catch me on Google, IRC, skype,facebook",
        "@achillewanguedaniel0@yahoo.com",
        ];
        
        var i = 0;
        
        setInterval(function() {
            $("#textslide").html(quotes[i]).fadeToggle();
            if (i == quotes.length)
                i=0;
            else
                i++;
        }, 1 * 2500);


////scroll box

  $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

/****** feed reader ********/



