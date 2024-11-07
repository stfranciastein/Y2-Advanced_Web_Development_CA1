document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-bar');
    const searchResults = document.getElementById('search-results');
    const monsterItems = document.getElementsByClassName('monster-item');

    // Filter monster names as you type in the search bar
    searchInput.addEventListener('input', function () {
        const query = searchInput.value.toLowerCase();

        // Clear previous results
        searchResults.innerHTML = '';

        // If search query is empty, hide the results dropdown
        if (query === '') {
            searchResults.classList.add('hidden');
            return;
        }

        // Find monsters that match the search query
        let matchesFound = false;
        for (let item of monsterItems) {
            const monsterName = item.getAttribute('data-name').toLowerCase();

            // If the monster name matches, show it in the dropdown
            if (monsterName.includes(query)) {
                matchesFound = true;
                const listItem = document.createElement('li');
                listItem.classList.add('px-4', 'py-2', 'cursor-pointer');
                listItem.textContent = item.getAttribute('data-name');
                listItem.addEventListener('click', function () {
                    searchInput.value = item.getAttribute('data-name');
                    searchResults.innerHTML = '';
                    searchResults.classList.add('hidden');
                });
                searchResults.appendChild(listItem);
            }
        }

        // Show the results dropdown if matches are found, otherwise hide it
        if (matchesFound) {
            searchResults.classList.remove('hidden');
        } else {
            searchResults.classList.add('hidden');
        }
    });
});