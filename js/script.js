


const profileBtn = document.getElementById('profilebtn');
const dropdown = document.getElementById('dropdownContent');

profileBtn.addEventListener('click', function (e) {
    e.stopPropagation(); // არ დაახუროს იმწამსვე სხვა event-ების გამო
    // Toggle dropdown
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
});

// დაახუროს dropdown როცა სხვა ადგილზე დააწკაპუნებ
window.addEventListener('click', function () {
    dropdown.style.display = 'none';
});

// არ დაემალოს, თუ თვითონ dropdown-ზე დააწკაპუნე
dropdown.addEventListener('click', function (e) {
    e.stopPropagation();
});

// document.querySelectorAll('.artist-name').forEach(button => {
//     button.addEventListener('click', () => {
//         const bio = button.nextElementSibling;
//         bio.classList.toggle('hidden');
//     });
// });

const buttons = document.querySelectorAll('.artist-name');

for (let i = 0; i < buttons.length; i++) {
  buttons[i].onclick = function() {
    const bio = this.nextElementSibling;
    bio.classList.toggle('hidden');
  };
}

