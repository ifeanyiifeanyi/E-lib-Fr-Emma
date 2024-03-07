document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.popup-search input');
    const searchList = document.querySelector('.search-list');

    searchInput.addEventListener('input', function() {
        const query = this.value.trim();

        fetch(`${route('member.search.view')}?query=${query}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                searchList.innerHTML = '';

                if (Array.isArray(data) && data.length > 0) {
                    data.forEach(book => {
                        const listItem = document.createElement('a');
                        listItem.classList.add('gap-2', 'py-1', 'list-group-item', 'list-group-item-action', 'align-items-center', 'd-flex');
                        listItem.href = book.url;
                        const icon = document.createElement('i');
                        icon.classList.add('bx', book.icon);
                        icon.classList.add('fs-4');
                        listItem.appendChild(icon);
                        listItem.textContent = book.title;
                        searchList.appendChild(listItem);
                    });
                } else {
                    const noResults = document.createElement('p');
                    noResults.textContent = 'No results found.';
                    searchList.appendChild(noResults);
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                const errorMessage = document.createElement('p');
                errorMessage.textContent = 'An error occurred while searching.';
                searchList.appendChild(errorMessage);
            });
    });
});
