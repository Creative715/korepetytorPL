$(document).ready(function() {
	
	$(window).bind('scroll', function(e) {
		parallax();
	});
	
	$('a.top').click(function() {
		$('html, body').animate({ scrollTop:$('#top').offset().top }, 1000,
			function() {
				parallax();
			});
		return false;
	});
	
		$('a.repetitors').click(function() {
		$('html, body').animate({ scrollTop:$('#repetitors').offset().top }, 1000,
			function() {
				parallax();
			});
		return false;
	});
	
	$('a.steps').click(function() {
		$('html, body').animate({ scrollTop:$('#steps').offset().top }, 1000,
			function() {
				parallax();
			});
		return false;
	});
	
	$('a.experience').click(function() {
		$('html, body').animate({ scrollTop:$('#experience').offset().top }, 1000,
			function() {
				parallax();
			});
		return false;
	});
	
	$('a.portfolio').click(function() {
		$('html, body').animate({ scrollTop:$('#portfolio').offset().top }, 1000,
			function() {
				parallax();
			});
		return false;
	});
	
	$('a.contact').click(function() {
		$('html, body').animate({ scrollTop:$('#contact').offset().top }, 1000,
			function() {
				parallax();
			});
		return false;
	});
	
});

function parallax() {
	var scrollPosition = $(window).scrollTop();
	$('#stars').css('top', (0 - (scrollPosition * .2)) + 'px');
	$('#images').css('top', (0 - (scrollPosition * .5)) + 'px');
}

$('#contact-form').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            Name: {
                validators: {
                    notEmpty: {
                        message: 'The Name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            Message: {
                validators: {
                    notEmpty: {
                        message: 'The Message is required and cannot be empty'
                    }
                }
            }
        }
    });
    
    $('.counter-count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 5000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    
 
