


  



  const editor = document.getElementById('post-body-editor');
  const hiddenInput = document.getElementById('body-input');
  const form = document.querySelector('form');

  form.addEventListener('submit', function (e) {
    // Copy HTML content from the editable div to the hidden input
    hiddenInput.value = editor.innerHTML.trim();

    // Optionally check if it's still empty
    if (!hiddenInput.value || hiddenInput.value === '<br>') {
      alert('Post body cannot be empty!');
      e.preventDefault(); // Stop form submission
    }
  });

  // Image upload
  document.querySelector('[title="Add an image"]').addEventListener('click', () => {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';

    input.onchange = () => {
      const file = input.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = () => {
          const img = document.createElement('img');
          img.src = reader.result;
          img.className = 'img-fluid my-2 d-block mx-auto';
          editor.appendChild(img);

          const br = document.createElement('br');
          editor.appendChild(br);
        };
        reader.readAsDataURL(file);
      }
    };

    input.click();
  });

  // Add Video (YouTube or Vimeo) via input
  document.querySelector('[title="Add a Video"]').addEventListener('click', () => {
    const inputBox = document.createElement('input');
    inputBox.placeholder = 'Paste YouTube or Vimeo link here...';
    inputBox.className = 'editor-addon-input';
    inputBox.addEventListener('keydown', function (e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        const embedURL = convertToEmbed(this.value.trim());

    
        if (embedURL) {
           console.log("Embed URL:", embedURL);
          insertIframe(embedURL);
        }
        this.remove();

        if (!embedURL) {
  alert("Invalid YouTube or Vimeo link.");
  return;
}
      }
    });
    editor.appendChild(inputBox);
    inputBox.focus();
  });

  // Add raw embed
  document.querySelector('[title="Add an Embed"]').addEventListener('click', () => {
    const inputBox = document.createElement('input');
    inputBox.placeholder = 'Paste iframe embed code here...';
    inputBox.className = 'editor-addon-input';
    inputBox.addEventListener('keydown', function (e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        const code = this.value.trim();
        const match = code.match(/src="([^"]+)"/);
        if (match) {
          insertIframe(match[1]);
        }
        this.remove();
      }
    });
    editor.appendChild(inputBox);
    inputBox.focus();
  });

//   function convertToEmbed(link) {
//   const ytMatch = link.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\s&]+)/);
//   if (ytMatch) return `https://www.youtube.com/embed/${ytMatch[1]}`;

//   const vimeoMatch = link.match(/vimeo\.com\/(\d+)/);
//   if (vimeoMatch) return `https://player.vimeo.com/video/${vimeoMatch[1]}`;

//   return null;
// }

function convertToEmbed(link) {
  // YouTube
  const ytMatch = link.match(/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([^\s&?/]+)/);
  if (ytMatch) return `https://www.youtube.com/embed/${ytMatch[1]}`;

  // Vimeo
  const vimeoMatch = link.match(/vimeo\.com\/(?:video\/)?(\d+)/);
  if (vimeoMatch) return `https://player.vimeo.com/video/${vimeoMatch[1]}`;

  return null;
}



function insertIframe(src) {
  const container = document.createElement('div');
  container.className = 'embed-container editor-addon-block';

  const iframe = document.createElement('iframe');
  iframe.src = src;
  iframe.width = 560;
  iframe.height = 315;
  iframe.style.display = 'block'; 
  iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share";
  iframe.setAttribute('allowfullscreen', '');
  iframe.style.border = 'none';

  container.appendChild(iframe);
  editor.appendChild(container);
  editor.appendChild(document.createElement('br'));
}



  





  

