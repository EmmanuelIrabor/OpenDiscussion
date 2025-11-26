const input = document.getElementById('profileImage');
  const previewBox = document.getElementById('profilePreview');

  input.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    const allowedTypes = ['image/jpeg', 'image/png'];
    if (!allowedTypes.includes(file.type)) {
      alert('Only JPG and PNG images are allowed.');
      input.value = ''; 
      return;
    }

    const reader = new FileReader();
    reader.onload = function (e) {
      previewBox.style.backgroundImage = `url('${e.target.result}')`;
    }
    reader.readAsDataURL(file);
  });


 