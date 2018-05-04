﻿$(document).ready(function() {
	var s = document.location;
	$(".nav a").each(function() {
		if (this.href == s.toString().split("#")[0]) {
			$(this).addClass("active");
			return false;
		}
	});
});

zbp.plugin.unbind("comment.reply", "system");
zbp.plugin.on("comment.reply", "default", function(id) {
	var i = id;
	$("#inpRevID").val(i);
	var frm = $('#divCommentPost'),
		cancel = $("#cancel-reply");

	frm.before($("<div id='temp-frm' style='display:none'>")).addClass("reply-frm");
	$('#AjaxComment' + i).before(frm);

	cancel.show().click(function() {
		var temp = $('#temp-frm');
		$("#inpRevID").val(0);
		if (!temp.length || !frm.length) return;
		temp.before(frm);
		temp.remove();
		$(this).hide();
		frm.removeClass("reply-frm");
		return false;
	});
	try {
		$('#txaArticle').focus();
	} catch (e) {}
	return false;
});

zbp.plugin.on("comment.get", "default", function (logid, page) {
	$('span.commentspage').html("Waiting...");
	$.get(bloghost + "zb_system/cmd.php?act=getcmt&postid=" + logid + "&page=" + page, function(data) {
		$('#AjaxCommentBegin').nextUntil('#AjaxCommentEnd').remove();
		$('#AjaxCommentEnd').before(data);
		$("#cancel-reply").click();
	});
})

zbp.plugin.on("comment.postsuccess", "default", function () {
	$("#cancel-reply").click();
});

$(function(){
$('.logo').after('<i class="fa fa-bars nav-btn"></i><nav id="mnav" class="inner"></nav>');
	$('.header .nav').clone(false).appendTo('#mnav');
	$('.nav-btn').click(function(){
		$('#mnav').slideToggle('500');
});
});