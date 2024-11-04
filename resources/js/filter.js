document.addEventListener('DOMContentLoaded', function() {
    const monsterList = document.getElementById('monster-list');
    const originalMonsters = Array.from(monsterList.children);
    const monsterAlignments = [];

    // const uniqueAlignments = [];

    // monsters.forEach(monster => {
    //     monster.alignments.forEach(alignment => {
    //         if (!uniqueAlignments.includes(alignment)) {
    //             uniqueAlignments.push(alignment);
    //         }
    //     });
    // });
    // THIS DOES NOTHING SO FAR< I HAD TO UNDO MY SEARCH BAR TO ADD FILTERS.

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
