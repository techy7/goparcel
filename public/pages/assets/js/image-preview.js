var imageFile = document.getElementById('imageFile');
var imagePreview = document.getElementById('imagePreview');
var previewImage = null;
var previewDefaultText = null;
if (imagePreview) {
  previewImage = imagePreview.querySelector('.image-preview__image');
  previewDefaultText = imagePreview.querySelector('.image-preview__default-text');
}
if (imageFile) {
  var imagePath = imageFile.dataset.image;

  imageFile.addEventListener('change', function () {
      const file = this.files[0];

      if (file){
          const reader = new FileReader();

          previewDefaultText.style.display = 'none';
          previewImage.style.display = 'block';

          reader.addEventListener('load', function () {
              previewImage.setAttribute('src', this.result);
          })

          reader.readAsDataURL(file);
      }
      else {
          previewDefaultText.style.display = '';
          previewImage.style.display = '';
          previewImage.setAttribute('src', '');
      }

  })
}
