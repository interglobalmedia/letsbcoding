class TableSearch {
    //1. create and initiate the object
    constructor() {
        this.tableSearch = document.getElementsByName('table-search')
        this.tableResults = document.querySelector('.table-results')
        this.events()
    }
    //2. events
    events() {
        this.tableSearch.forEach(row => row.addEventListener('keyup', this.searchPets.bind(this)))
    }
    //3. methods (or functions)
    searchPets() {
        const query = q => document.querySelectorAll(q);
        const filters = [...query('th input')].map(e => new RegExp(e.value, 'i'));

        query('tbody tr').forEach(row => row.style.display = 
        filters.every((f, i) => f.test(row.cells[i].textContent)) ? '' : 'none');
    }
}

export default TableSearch