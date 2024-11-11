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
                listItem.classList.add('px-4', 'py-2', 'cursor-pointer', 'w-1/2');
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

    //Hides/shows filter button
    document.getElementById('filter-toggle').addEventListener('click', function () {
        const filterForm = document.getElementById('filter-form'); // Make sure to set the ID for the filter form
        const toggleIcon = document.getElementById('toggle-icon');
        const toggleButton = document.getElementById('filter-toggle');

        // Toggle visibility of the filter form
        filterForm.classList.toggle('hidden');
        
        // Change the SVG icon and button text
        if (filterForm.classList.contains('hidden')) {
            // Set icon and text to "Show Filters"
            toggleButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" /></svg> Show Filters`;
        } else {
            // Set icon and text to "Hide Filters"
            toggleButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path d="M6 12a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 1 1 1.5 0v7.5A.75.75 0 0 1 6 12ZM18 12a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 0 1 1.5 0v7.5A.75.75 0 0 1 18 12ZM6.75 20.25v-1.5a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0ZM18.75 18.75v1.5a.75.75 0 0 1-1.5 0v-1.5a.75.75 0 0 1 1.5 0ZM12.75 5.25v-1.5a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0ZM12 21a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 0 1 1.5 0v7.5A.75.75 0 0 1 12 21ZM3.75 15a2.25 2.25 0 1 0 4.5 0 2.25 2.25 0 0 0-4.5 0ZM12 11.25a2.25 2.25 0 1 1 0-4.5 2.25 2.25 0 0 1 0 4.5ZM15.75 15a2.25 2.25 0 1 0 4.5 0 2.25 2.25 0 0 0-4.5 0Z" /></svg> Hide Filters`;
        }
    });
});

