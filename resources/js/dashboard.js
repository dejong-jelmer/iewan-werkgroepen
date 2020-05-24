$(document).ready(function () {
	//	$('.dropdown-toggle').each(function () {
	//		$(this).click(function () {
	//			$(this).next('ul').slideToggle();
	//		})
	//	});
	// navbar hamburger toggle https://bulma.io/documentation/components/navbar/#navbar-burger
	// Check for click events on the navbar burger icon
	//	$('.navbar-burger').click(function () {
	//		// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
	//		$('#' + $(this).data('target')).toggleClass('is-active')
	//		$(this).toggleClass('is-active');
	//	});
	// make workgroup tile clickable and link to workgroup page
	//	$('.workgroup-tile').dblclick(function () {
	//		$(this).find('form').submit();
	//	});
	$('.reply-btn').click(function () {
		console.log($(this).data('response'));
		$('#response-to-' + $(this).data('response')).slideToggle();
	});
	$('.toggle').click(function () {
		$('#' + $(this).data('target')).slideToggle();
	});
	// show / hide forum post field
	$('.toggle-forumpost-field').click(function () {
		$('#forum-post').slideToggle();
	});

	// show / hide file upload field
	$('.toggle-upload-field').click(function () {
		$('#file-upload').slideToggle();
	});

	// show / hide send binderform field
	$('.toggle-send-field').click(function () {
		$('#send-form').slideToggle();
	});


	$('.scroll').click(function () {
			$('html, body').delay(400).animate({
				scrollTop: $('#' + $(this).data('target')).offset().top
			}, 1000)
		}),







		//	$('.message-row').click(function () {
		//		$route = $(this).data('target');
		//		window.location.href = $route;
		//	}).hover(function () {
		//		if ($(this).is(":hover")) {
		//			$(this).addClass('is-selected');
		//		} else {
		//			$(this).removeClass('is-selected');
		//		}
		//	});

		//	$('.workgroup-button').click(function () {
		//		window.location.href = $(this).attr('href');
		//	});
		$('.prevent-default').click(function (event) {
			event.preventDefault;
		});


		$('#toggle-edit-profile').click(function () {
			$('.profile-field').toggleClass('is-hidden').prev().toggleClass('is-hidden');
		});
	// profile picuter is loaded on the profile page so user can see the uploaded file
	$('.upload-avatar').change(function (event) {
		var filename = $(this).val().split('\\').pop();
		var newFilePath = URL.createObjectURL(event.target.files[0])
		$('#avatar').attr('src', newFilePath);
	});
	//	$('#add_binderform_field').click(function () {
	//		$('.remove_binderform_field').show();
	//		var field = $('.binderform_fields_row:last').clone(true);
	//		$(field).find('input, select').val('');
	//		$(field).find('input[type=hidden]').val('0');
	//		$(field).find('input:checkbox').prop('checked', false);
	//		$(field).appendTo('.form');
	//	});

	//	$('.remove_binderform_field').click(function () {
	//		if ($(this).closest('.binderform_fields_row').parent().children('div').length == 2) {
	//			$('.form:first-child').find('.remove_binderform_field').hide();
	//		}
	//		if ($(this).closest('.binderform_fields_row').parent().children('div').length >= 2) {
	//			$(this).closest('.binderform_fields_row').remove();
	//		}
	//	});










	// text editor (https://ckeditor.com/docs/ckeditor5)
	if (document.querySelector('.editor')) {
		$('.editor').each(function () {
			ClassicEditor.create(this, {
					removePlugins: ['Heading', 'blockQuote'],
					toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'link']
				})
				.then(editor => {
					// console.log( editor );
				})
				.catch(error => {
					console.error(error);
				});


		});

	}



});


