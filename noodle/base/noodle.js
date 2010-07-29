$(document).ready(function(){

	// ## Foldable comment form:
	$('#comment-form').wrap('<div id="comment-form-wrapper" />');
	// Making sure the form is folded first
	$('#comments #comment-form-wrapper').slideUp('fast');
	// Adding toggle to 'Post new comment'
	$('.comment-hide').toggle(
		function () {
		$('#comment-form-wrapper').slideDown('fast');
		},
		function () {
		$('#comment-form-wrapper').slideUp('fast');
		}
	);

});