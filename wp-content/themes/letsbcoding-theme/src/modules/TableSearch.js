class TableSearch {
    //1. create and initiate the object
    constructor() {
        this.tableSearch = document.getElementById('table-search')
        this.events()
    }
    //2. events
    events() {
        this.tableSearch.addEventListener('keyup', this.searchPets.bind(this))
    }
    //3. methods (or functions)
    searchPets() {
        let input, filter, table, tr, td, i, txtValue;
        /* Assigning "this", which is your input, gives you access to the value, etc. */
        input = this.tableSearch

        filter = input.value.toUpperCase()
        table = document.querySelector('.pet-adoption-table')
        tr = table.getElementsByTagName('tr')
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
}

export default TableSearch