$(function () {
  $('.input-foto').on('click', function () {
    var form = $(this).siblings('[type=file]')
    form.click()
  })

  $('.input-foto-wrapper [type=file]').on('change', function () {
    var preview = $(this).siblings('.input-foto').children('.preview-foto')
    readURL(this, preview)
  })

  function readURL(input, preview) {
    if (input.files && input.files[0]) {
      if (input.files[0].type.indexOf('image/') > -1) {
        if($(input).attr('max-size') && (input.files[0].size / 1000) > parseInt($(input).attr('max-size'))) {
          $(input).val('')
          flashMessage('ni ni-fat-remove', 'Ukuran file terlalu besar', 'danger', 'top', 'center')
          return true
        }
        var reader = new FileReader();
        reader.onloadstart = function () {
          preview.append(`
          <div class="loading">
          <span class="fas fa-spinner"></span>
          </div>
          `)
        }
        reader.onload = function (e) {
          if (preview.children('img').length) {
            preview.children('img').attr('src', e.target.result);
          } else {
            preview.append('<img src="' + e.target.result + '" />')
          }
        }
        reader.onloadend = function () {
          preview.children('.loading').remove()
        }
        reader.readAsDataURL(input.files[0]);
      } else {
        $(input).val('')
        flashMessage('ni ni-fat-remove', 'Tipe file tidak didukung', 'danger', 'top', 'center')
        preview.children('img').remove()
      }
    } else {
      preview.children('img').remove()
    }
  }

  $('form [type=reset]').on('click', function () {
    var form = $(this).parents('form')
    form.find('.input-foto .preview-foto').find('img').remove()
  })
})