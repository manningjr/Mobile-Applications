// JavaScript Document
// tutors.js

var requestObject=false;

requestObject = new XMLHttpRequest();

function showTutor()
{
	alert("Here is showTutor");
	//Clear ul
	$('#tutorUL').text('');
	
	var li = $('#tutorLI').clone();
	
	li.removeAttr('id');
	li.appendTo('#tutorUL');
}

function initializeData()
{
	requestObject.open("GET","php/getTutors.php",true);
	requestObject.onreadystatechange=showTutorContent;
	requestObject.send(null);
}

function showTutorContent()
{
	if(requestObject.readyState == 4)
	{
		var text = requestObject.responseText;
		alert(text);
		
		var myTutors = jQuery.parseJSON(text).tutors;
		
		//Clear ul
		$('#tutorUL').text('');
		
		for(var i=0; i< myTutors.length; i++)
		{
			var tutor = myTutors[i];
			var li = $('#tutorLI').clone();
			li.removeAttr('id');
			li.appendTo('#tutorUL');
			
			li.find('.tutorName').text(tutor['tName']);
			li.find('.tutorEmail').text(tutor['tEmail']);
			li.data('tutorID', 'tutor'+i);
			li.find('.tutorEmail').css('visibility','hidden');
			
			li.click( function()
			{
				var clickedTutor = $(this);
				
				var uniqueID = clickedTutor.data('tutorID');
				var email = clickedTutor.find('.tutorEmail').text();
				alert(uniqueID + ' ' + email);
				clickedTutor.removeClass('tutorName');
				clickedTutor.addClass('tutorNameClicked');
			});
		}
	}
}