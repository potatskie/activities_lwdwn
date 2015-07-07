/*(function($){
	$(document).ready(function() {
	    $('.page1add').css({
	        "background":"url('../img/change/1.jpg')",
	        "background-size":"cover"
	    });
	    $('.page1').css({
	        "opacity":0,
	        "background":"url('../img/change/2.jpg')",
	        "background-size":"cover"
	    });
	    var i = 2;
	    setInterval(function(){
	        if(i>6) {
	            i = 1;
	            j = 6;
	        } else {
	            j = i - 1;
	        }
	        $('.page1add').css({
	            "background":"url('../img/change/" + j + ".jpg')",
	            "background-size":"cover"
	        });
	        $('.page1').css({
	            "opacity":0,
	            "background":"url('../img/change/" + i + ".jpg')",
	            "background-size":"cover"
	        });
	        $('.page1').animate({ opacity: 1 }, { duration: 3000 });
	        i = i + 1;
	    },5000);
	});
})(jQuery);*/