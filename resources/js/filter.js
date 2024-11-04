document.addEventListener('DOMContentLoaded', function() {
    const monsterList = document.getElementById('monster-list');
    const originalMonsters = Array.from(monsterList.children);

    // Sort A-Z
    document.getElementById('sort-az-toggle').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('sort-za-toggle').checked = false;
            sortMonsters(true);
        } else {
            resetSort();
        }
    });

    // Sort Z-A
    document.getElementById('sort-za-toggle').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('sort-az-toggle').checked = false;
            sortMonsters(false);
        } else {
            resetSort();
        }
    });

    // Filter by Alignment
    document.getElementById('alignment-filter').addEventListener('change', function() {
        const selectedAlignment = this.value;
        if (selectedAlignment) {
            const filteredMonsters = originalMonsters.filter(monster => 
                monster.getAttribute('data-alignment') === selectedAlignment
            );
            updateMonsterList(filteredMonsters);
        if (selectedAlignment = showingAll);
        } else {
            resetSort();
        }
    });

    // Search Bar
    document.getElementById('search-bar').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const filteredMonsters = originalMonsters.filter(monster => {
            const monsterName = monster.getAttribute('data-name').toLowerCase();
            return monsterName.includes(searchTerm);
        });
        updateMonsterList(filteredMonsters);
    });
    

    function sortMonsters(ascending) {
        const monsters = Array.from(monsterList.children);
        monsters.sort((a, b) => {
            const nameA = a.getAttribute('data-name').toLowerCase();
            const nameB = b.getAttribute('data-name').toLowerCase();
            return ascending ? nameA.localeCompare(nameB) : nameB.localeCompare(nameA);
        });
        updateMonsterList(monsters);
    }

    function updateMonsterList(monsters) {
        monsterList.innerHTML = '';
        monsters.forEach(monster => {
            monsterList.appendChild(monster);
        });
    }

    function resetSort() {
        updateMonsterList(originalMonsters);
        document.getElementById('sort-az-toggle').checked = false;
        document.getElementById('sort-za-toggle').checked = false;
    }
});
