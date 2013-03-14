// Gumby is ready to go
Gumby.ready(function() {
	console.log('Gumby is ready to go...', Gumby.debug());

	// placeholder polyfil
	if(Gumby.isOldie || Gumby.$dom.find('html').hasClass('ie9')) {
		$('input, textarea').placeholder();
	}
});

// Oldie document loaded
Gumby.oldie(function() {

});

//Initial App Configuration
var article_type='article';
var article_todo_time='day';
var article_todo_important='false';
var article_todo_urgent='false';

var article_template_article = '<h4>My Works,</h4><p><br>Brain is damaged by<br>Damaging factors<br>Yes!</p>';
var article_template_todo = '<h4>Details:</h4> One Dude <br> One Bro <br> <br>One Yes!<br>One No!';
var article_template_email = '<h4>Hello Sanchit,</h4><br> Keep up the good work <br> -- <br>\m/<br><br>Sent via Pensive';


// Document ready 119911
$(function() {

// Write-Article TYPE manipulation

$("#write-article-type-article").on("click", function(event){
	if(article_type!='article') {
	  article_type = 'article';
	  $("#write-article-type-article").addClass('primary').removeClass('default cursor-link');
	  $("#write-article-type-todo").addClass('default cursor-link').removeClass('primary');
	  $("#write-article-type-email").addClass('default cursor-link').removeClass('primary');
	  $('#write-article-row-todo').hide();
	  $('#write-article-row-email').hide();
	  $('#write-article-row-article').fadeIn();
	  if(check_write_default_ornot()) $('#editable').html(article_template_article);
	  $('#article-save').html('<a>Save</a>');
	  $('#article-save').removeClass('icon-mail').addClass('icon-floppy');
	}
});
$("#write-article-type-todo").on("click", function(event){
	if(article_type!='todo') {
	  article_type = 'todo';
	  $("#write-article-type-todo").addClass('primary').removeClass('default cursor-link');
	  $("#write-article-type-article").addClass('default cursor-link').removeClass('primary');
	  $("#write-article-type-email").addClass('default cursor-link').removeClass('primary');
	  $('#write-article-row-todo').fadeIn();
	  $('#write-article-row-email').hide();
	  $('#write-article-row-article').hide();
	  if(check_write_default_ornot()) $('#editable').html(article_template_todo);
	  $('#article-save').html('<a>Add</a>');
	  $('#article-save').removeClass('icon-mail').addClass('icon-floppy');
	}
});
$("#write-article-type-email").on("click", function(event){
	if(article_type!='email') {
	  article_type = 'email';
	  $("#write-article-type-email").addClass('primary').removeClass('default cursor-link');
	  $("#write-article-type-todo").addClass('default cursor-link').removeClass('primary');
	  $("#write-article-type-article").addClass('default cursor-link').removeClass('primary');
	  $('#write-article-row-todo').hide();
	  $('#write-article-row-email').fadeIn();
	  $('#write-article-row-article').hide();
	  if(check_write_default_ornot()) $('#editable').html(article_template_email);
	  $('#article-save').html('<a>Send</a>');
	  $('#article-save').addClass('icon-mail').removeClass('icon-floppy');
	}
});


// Write-Article-TODO TIME manipulation
$("#write-article-todo-day").on("click", function(event){
	if(article_todo_time!='day') {
	  article_todo_time = 'day';
	  $("#write-article-todo-day").addClass('warning').removeClass('default cursor-link');
	  $("#write-article-todo-week").addClass('default cursor-link').removeClass('warning');
	  $("#write-article-todo-month").addClass('default cursor-link').removeClass('warning');
	}
});

$("#write-article-todo-week").on("click", function(event){
	if(article_todo_time!='week') {
	  article_todo_time = 'week';
	  $("#write-article-todo-week").addClass('warning').removeClass('default cursor-link');
	  $("#write-article-todo-day").addClass('default cursor-link').removeClass('warning');
	  $("#write-article-todo-month").addClass('default cursor-link').removeClass('warning');
	}
});


$("#write-article-todo-month").on("click", function(event){
	if(article_todo_time!='month') {
	  article_todo_time = 'month';
	  $("#write-article-todo-month").addClass('warning').removeClass('default cursor-link');
	  $("#write-article-todo-week").addClass('default cursor-link').removeClass('warning');
	  $("#write-article-todo-day").addClass('default cursor-link').removeClass('warning');
	}
});

$("#write-article-todo-important").on("click", function(event){
	if(article_todo_important!='true') {
	  article_todo_important = 'true';
	  $("#write-article-todo-important").addClass('warning icon-check').removeClass('default icon-cancel');
	} else {
		article_todo_important = 'false';
	  $("#write-article-todo-important").removeClass('warning icon-check').addClass('default icon-cancel');
	}
});

$("#write-article-todo-urgent").on("click", function(event){
	if(article_todo_urgent!='true') {
	  article_todo_urgent = 'true';
	  $("#write-article-todo-urgent").addClass('warning icon-check').removeClass('default icon-cancel');
	} else {
		article_todo_urgent = 'false';
	  $("#write-article-todo-urgent").removeClass('warning icon-check').addClass('default icon-cancel');
	}
});

function check_write_default_ornot(){
	var checktext = $('#editable').html();
	if ((checktext==article_template_article)||(checktext==article_template_todo)||(checktext==article_template_email)) {
		return 1;
	}
	return 0;
}

}); // Document ready end 119911