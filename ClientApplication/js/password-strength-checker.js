/***********************************************************************************************************
* Password Strength Checker using Jquery
* Written by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info or vasplusblog@gmail.com

**********************************Copyright Information*****************************************************
* This script has been released with the aim that it will be useful.
* Please, do not remove this copyright information from the top of this page 
* If you want the copyright info to be removed from the script then you have to buy this script.
* This script must not be sold.
* All Copy Rights Reserved by Vasplus Programming Blog
*************************************************************************************************************/



/*********************************** Password Revax ***********************************/
//Minimum characters must be 6
var weak_password = /(?=.{6,}).*/; 
//Must contain lower case letters and at-least one digit.
var good_password = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{6,}$/; 
//Must contain at-least one upper case letter, one lower case letter and one digit.
var just_strong_password = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{6,}$/; 
//Must contain at-least one upper case letter, one lower case letter and one digit.
var very_strong_password = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{6,}$/;




/*********************************** Check the password strength as the user Submits the form ***********************************/
function vpb_submit_data()
{
	 // Password field data
	var vpb_password = $('#pass-word').val() != "" ? $('#pass-word').val() : $('#pass-word-two').val();
	
	// Verify password field data
	var vpb_verify_password = $('#verify-pass-word').val() != "" ? $('#verify-pass-word').val() : $('#verify-pass-word-two').val();
	
	// Submission Status Element
	var vpb_password_status = $('#pass-status'); 
	vpb_password_status.show();
	
	// You can add more input fields here as needed
	
	
	
	
	if(parseInt($('#pass-word-two').val().length)>parseInt($('#pass-word').val().length)) { $('#pass-word').val($('#pass-word-two').val()); } else {}
	if(parseInt($('#verify-pass-word-two').val().length)>parseInt($('#verify-pass-word').val().length)) { $('#verify-pass-word').val($('#verify-pass-word-two').val()); } else {}
	
	
	
	if( vpb_password == "" ) // Password field must not be empty
	{
		vpb_password_status.removeClass().addClass('weak_password').html("Please enter your password in the required field to proceed.");
		// This is just for password field focus to point the field with the error
		if($("#show-hide-passwords").is(":checked")) {
			$('#pass-word-two').focus();
		} else {
			 $('#pass-word').focus();
		}
	}
	else if( vpb_verify_password == "" ) // Verify password field must not be empty
	{
		vpb_password_status.removeClass().addClass('weak_password').html("Please verify your password to proceed.");
		
		// This is just for verify password field focus to point the field with the error
		if($("#show-hide-passwords").is(":checked")) {
			$('#verify-pass-word-two').focus();
		} else {
			 $('#verify-pass-word').focus();
		}
	}
	else if( vpb_password != vpb_verify_password ) // Both password fields must be the same
	{
		vpb_password_status.removeClass().addClass('weak_password').html("Sorry, both password fields must be the same please.");
		
		// This is just for verify password field focus to point the field with the error
		if($("#show-hide-passwords").is(":checked")) {
			$('#verify-pass-word-two').focus();
		} else {
			 $('#verify-pass-word').focus();
		}
	}
	else
	{
		// Accept passwords which are Good, Strong or Very strong only.
		if( very_strong_password.test(vpb_password) || just_strong_password.test(vpb_password) || good_password.test(vpb_password) )
		{	
			// Hide submission Status Element on successful submission
			vpb_password_status.hide();
			
			// Empty all the password fields on successful submission
			$('#pass-word').val('');
			$('#pass-word-two').val('');
			$('#verify-pass-word').val('');
			$('#verify-pass-word-two').val('');
			
			// You can then use "vpb_password" as the user password in your application
			// You can use all your input fields here provided you added more input fields at the index page
			
			alert('The password you chose is: '+ vpb_password);
			
			
		}	
		else if( weak_password.test(vpb_password) )
		{
			vpb_password_status.removeClass().addClass('password_is_weak').html("Still weak! (Enter digits to make good password)");
			
			// This is just for password field focus to point the field with the error
			if($("#show-hide-passwords").is(":checked")) {
				$('#pass-word-two').focus();
			} else {
				 $('#pass-word').focus();
			}
		}
		else
		{
			vpb_password_status.removeClass().addClass('weak_password').html("Very weak! (Must be 6 or more characters)");
			
			// This is just for password field focus to point the field with the error
			if($("#show-hide-passwords").is(":checked")) {
				$('#pass-word-two').focus();
			} else {
				 $('#pass-word').focus();
			}
		}
	}
}








/*********************************** Auto Password Strength Checker ***********************************/
$(document).ready(function() 
{
	var vpb_pass_word = $('#pass-word'); // Password field
	var vpb_verify_password	= $('#verify-pass-word'); // Verify password field
	var vpb_password_status = $('#pass-status'); // Indicator field
	vpb_password_status.hide();
	
	$(".pass-word-field").keyup(function(e) 
	{
		vpb_pass_word = $(this).attr('id') == "pass-word" ? $(this) : $('#pass-word-two');
		
		if ($(vpb_pass_word).val() == "")
		{
			vpb_password_status.hide();
			return false;
		}
		else
		{
			vpb_password_status.show();
			if( very_strong_password.test(vpb_pass_word.val()) )
			{
				vpb_password_status.removeClass().addClass('very_strong_password').html("Very strong! (Awesome, please don't forget your pass now!)");
			}	
			else if( just_strong_password.test(vpb_pass_word.val()) )
			{
				vpb_password_status.removeClass().addClass('just_strong_password').html("Strong! (Enter special chars to make even stronger");
			}	
			else if( good_password.test(vpb_pass_word.val()) )
			{
				vpb_password_status.removeClass().addClass('considrate_pass').html("Good! (Enter uppercase letter to make strong)");
			}
			else if( weak_password.test(vpb_pass_word.val()) )
			{
				vpb_password_status.removeClass().addClass('password_is_weak').html("Still weak! (Enter digits to make good password)");
			}
			else
			{
				vpb_password_status.removeClass().addClass('weak_password').html("Very weak! (Must be 6 or more characters)");
			}
		}
	});
	
	$(".verify-password-field").keyup(function(e) 
	{
		vpb_password_status.show();
		vpb_verify_password = $(this).attr('id') == "verify-pass-word" ? $(this) : $('#verify-pass-word-two');
		
		if(vpb_pass_word.val() !== vpb_verify_password.val())
		{
			vpb_password_status.removeClass().addClass('weak_password').html("Passwords does not match");	
		}
		else
		{
			if( very_strong_password.test(vpb_pass_word.val()) )
			{
				vpb_password_status.removeClass().addClass('very_strong_password').html("Awesome! Very strong and both passwords are OK");
			}	
			else if( just_strong_password.test(vpb_pass_word.val()) )
			{
				vpb_password_status.removeClass().addClass('just_strong_password').html("Strong and both passwords are OK");
			}	
			else if( good_password.test(vpb_pass_word.val()) )
			{
				vpb_password_status.removeClass().addClass('considrate_pass').html("Good and both passwords are OK");
			}
			else if( weak_password.test(vpb_pass_word.val()) )
			{
				vpb_password_status.removeClass().addClass('password_is_weak').html("Still weak but both passwords are the same!");
			}
			else
			{
				vpb_password_status.removeClass().addClass('weak_password').html("Very weak but both passwords are the same!");
			}
		}
			
	});
	
	$("#show-hide-passwords").click(function() 
	{
		if ($(this).is(":checked")) 
		{
			$('#pass-word-two').val($('#pass-word').val());
			$('#pass-word').hide();
			$('#pass-word-two').show();
			
			$('#verify-pass-word-two').val($('#verify-pass-word').val());
			$('#verify-pass-word').hide();
			$('#verify-pass-word-two').show();
		} 
		else 
		{
			$('#pass-word').val($('#pass-word-two').val());
			$('#pass-word-two').hide();
			$('#pass-word').show();
			
			$('#verify-pass-word').val($('#verify-pass-word-two').val());
			$('#verify-pass-word-two').hide();
			$('#verify-pass-word').show();
		}
	});
});