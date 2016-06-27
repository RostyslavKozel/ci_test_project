$(document).ready(function(){
	var currentTime = new Date();
	var currentTimeZone = -currentTime.getTimezoneOffset()/60 + ":00GTM";
	var newTimeZone = $('#newTimeZone');
	var previosTimeZone = $('#previosTimeZone');
	var change = $('#change');
	var timeZoneMessage = $('#myModal');
	var updateTimezoneBtn = $('#updateBtn');
	var dontUpdateLink = $('#dontUpdateLink');
	var closeBtn = $('#closeBtn');


	updateTimezoneBtn.click(updateSettings);
	dontUpdateLink.click(invertRemindChanges);
	closeBtn.click(hideTZMessage);
	
	newTimeZone.text(currentTimeZone);
	
	if((newTimeZone.text() !== previosTimeZone.text()) && +userRemindChanges){
		timeZoneMessage.removeClass('hidden');
	}

	function updateSettings(){
		$.ajax({
			type: "GET",
			url: "http://testtask.com/index.php/main/timezone",
			data: {'id' : userId,
					'time_zone': currentTimeZone},
			success: function(data){
				previosTimeZone.text(data);
				hideTZMessage();
			}
		});		
	}

	function hideTZMessage(){
		timeZoneMessage.addClass('hidden');
	}

	function invertRemindChanges(){
		$.ajax({
			type: "GET",
			url: "http://testtask.com/index.php/main/invert_remind_tz",
			data: {'id' : userId},
			success: function(data){
				hideTZMessage();
			}
		});	
	}
});