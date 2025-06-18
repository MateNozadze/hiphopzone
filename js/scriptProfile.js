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