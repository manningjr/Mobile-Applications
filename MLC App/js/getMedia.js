// JavaScript Document
// getMedia.js

var requestObject = false;
requestObject = new XMLHttpRequest();

function initializeData()
{
	requestObject.open("GET","http://ylis.gcsu.edu/~mjohn/MLC App/php/getTitle.php",true);
	requestObject.onreadystatechange = showTitleContent;
	requestObject.send(null);
}

function showTitleContent()
{
	if (requestObject.readyState == 4)
	{
		var text = requestObject.responseText;
	    var myMedia = jQuery.parseJSON(text).media;	
		$('#mediaUL').text('');
	
		for(var i=0; i< myMedia.length; i++)
		{
			var media = myMedia[i];
			var li =$('#mediaLI').clone();
			li.removeAttr('id');
			li.appendTo('#mediaUL');
			
			li.find('.mediaTitle').text(media['title']);
			li.find('.mediaType').text(media['mediaType']);
			li.find('.mediaYear').text(media['year']);
			li.find('.mediaLanguage').text(media['language']);
			li.find('.mediaAvaliable').text('Avaliable: ' + media['available']);
			li.find('.mediaImage').attr('src', "http://ylis.gcsu.edu/~mjohn/MLC App/sites/default/files/" + media['imageTitle']);
			li.data('mediaID','media'+i);			
		}
	}		
}

//Reads the form and querys the database based on user input.
function searchDB(){
	var title = $("#name-a").val();
	var type = $("#select-choice-1").val();
	var language = $("#select-choice-2").val();

	requestObject.open("GET","http://ylis.gcsu.edu/~mjohn/MLC App/php/getTitle.php?title=" + title + "&type=" + type + "&language=" + language + "",true);
	requestObject.onreadystatechange = showTitleContent;
	requestObject.send(null);
}