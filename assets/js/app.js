$(function () {
  $('.cabinet-drop').click(function () {
      $('.sidenav__list').toggleClass('sidenav__list-active');
  })
});

function ClearInput() {
	document.getElementById("pg-td-input1").value = "";
	document.getElementById("pg-td-input2").value = "";
}

$(function () {
	$('.poslygi-drop').click(function () {
		$('.pgnav__list').toggleClass('pgnav__list-active');
	})
});

$(function () {
	$('.item-arrow').click(function () {
		$('.menu-item-list').toggleClass('item-list_active');
	})
});

$(function () {
  $('.menu-open').click(function () {
      $('body').addClass('_lock');
      $('.menu-filter').addClass('show-filter');
      $('.menu-burger').addClass('show-menu');
  })
});

$(function () {
  $('.menu-close').click(function () {
      $('body').removeClass('_lock');
      $('.menu-filter').removeClass('show-filter');
      $('.menu-burger').removeClass('show-menu');

  })
});


$("#js-upload-photo").change(function(){
	if (window.FormData === undefined) {
		alert('В вашем браузере загрузка файлов не поддерживается');
	} else {
		var formData = new FormData();
		$.each($("#js-upload-photo")[0].files, function(key, input){
			formData.append('file[]', input);
		});
 
		$.ajax({
			type: 'POST',
			url: 'upload-images.php',
			cache: false,
			contentType: false,
			processData: false,
			data: formData,
			dataType : 'json',
			success: function(msg){
				msg.forEach(function(row) {
					if (row.error == '') {
						$('#js-cards-list').append(row.data);
					} else {
						alert(row.error);
					}
				});
				$("#js-upload-photo").val(''); 
			}
		});
	}
});
 
/* Видалення завантаженої картини */
function remove_img(target){
	$(target).closest("div").parent().remove();
}
