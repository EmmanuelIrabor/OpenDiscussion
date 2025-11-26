const mobileDropBtn = document.getElementById("mobile-drop");
const mobileDropMenu = document.getElementById("mobile-drop-menu");

const menuBtn = document.getElementById("menu-btn");
const mobileMenu = document.getElementById("mobile-menu");
const menuIcon = menuBtn.querySelector("i");


mobileDropBtn.addEventListener("click", (e) => {
  e.stopPropagation();
  mobileDropMenu.classList.toggle("active");
});


menuBtn.addEventListener("click", (e) => {
  e.stopPropagation();
  mobileMenu.classList.toggle("active");
  if (mobileMenu.classList.contains("active")) {
    menuIcon.classList.replace("ph-list", "ph-x-circle");
  } else {
    menuIcon.classList.replace("ph-x-circle", "ph-list");
  }
});


mobileDropMenu.addEventListener("click", (e) => e.stopPropagation());
mobileMenu.addEventListener("click", (e) => e.stopPropagation());

document.addEventListener("click", () => {
  
  if (mobileDropMenu.classList.contains("active")) {
    mobileDropMenu.classList.remove("active");
  }

 
  if (mobileMenu.classList.contains("active")) {
    mobileMenu.classList.remove("active");
    menuIcon.classList.replace("ph-x-circle", "ph-list");
  }
});


//Preofile-img 

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

