

const buttons = document.querySelectorAll('.artist-name');

for (let i = 0; i < buttons.length; i++) {
  buttons[i].onclick = function() {
    const bio = this.nextElementSibling;
    bio.classList.toggle('hidden');
  };
}

