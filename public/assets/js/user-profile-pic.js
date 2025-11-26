 const inputx = document.getElementById('profileImagex');
  const previewBoxx = document.getElementById('profilePreviewx');

  inputx.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    const allowedTypes = ['image/jpeg', 'image/png'];
    if (!allowedTypes.includes(file.type)) {
      alert('Only JPG and PNG images are allowed.');
      inputx.value = ''; 
      return;
    }

    const reader = new FileReader();
    reader.onload = function (e) {
      previewBoxx.style.backgroundImage = `url('${e.target.result}')`;
    }
    reader.readAsDataURL(file);
  });

