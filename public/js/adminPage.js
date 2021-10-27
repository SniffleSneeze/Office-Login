let rows =  document.querySelectorAll('.visitor-details')
let currentPage = 1
const rowsOnPage = 15
const next = document.querySelector('#next')
const previous = document.querySelector('#previous')

rows.forEach((row) => {
    if (parseInt(row.dataset.id) > rowsOnPage) {
        row.classList.add("hideRow")
    }
})

function removeHideRow() {
    rows.forEach((row) => {
        row.classList.remove("hideRow")
    })
}

function recalculatePagination() {
    document.querySelectorAll('.visitor-details:not(.hideElement)').forEach((row, i) => {
        if (i > rowsOnPage - 1) {
            row.classList.add("hideRow")
        }
    })
    if (document.querySelectorAll('.visitor-details:not(.hideElement)').length <= rowsOnPage) {
        next.classList.add('hideElement')
    }

}

document.querySelector('#visitorsIn').addEventListener('click', () => {
    removeHideRow()
    rows.forEach((row) => {
        row.classList.remove("hideElement")
        if (row.dataset.in == 0 ) {
            row.classList.toggle("hideElement");
        }
    })

    previous.classList.add('hideElement')
    next.classList.remove('hideElement')
    currentPage = 1
    recalculatePagination()
})

document.querySelector('#visitorsOut').addEventListener('click', () => {
    removeHideRow()
    rows.forEach((row) => {
        row.classList.remove("hideElement")
        if (row.dataset.in == 1) {
            row.classList.toggle("hideElement");
        }
    })

    previous.classList.add('hideElement')
    next.classList.remove('hideElement')
    currentPage = 1
    recalculatePagination()
})

document.querySelector('#allVisitors').addEventListener('click', () => {
    removeHideRow()
    rows.forEach((row) => {
        row.classList.remove("hideElement")
    })
    previous.classList.add('hideElement')
    next.classList.remove('hideElement')
    currentPage = 1
    recalculatePagination()
})

document.querySelector('#next').addEventListener('click', () => {
    const rowsVisible = document.querySelectorAll('.visitor-details:not(.hideElement)')
    let rowsVisibleCount = rowsVisible.length
    currentPage++
    if (currentPage > 1) {
        previous.classList.remove('hideElement')
    }
    if (currentPage === Math.ceil(rowsVisibleCount/rowsOnPage) ) {
        next.classList.add('hideElement')
    }
    rowsVisible.forEach((row, i) => {
        row.classList.remove("hideRow")
        i++
        if (i > currentPage * rowsOnPage || i <= (currentPage -1) * rowsOnPage) {
            row.classList.add("hideRow")
        }
    })
})

document.querySelector('#previous').addEventListener('click', () => {
    currentPage--
    if (currentPage === 1) {
        previous.classList.add('hideElement')
        next.classList.remove('hideElement')
    }



    document.querySelectorAll('.visitor-details:not(.hideElement)').forEach((row, i) => {
        row.classList.remove("hideRow")
        i++
        if (i > currentPage * rowsOnPage || i <= (currentPage -1) * rowsOnPage) {
            row.classList.add("hideRow")
        }
    })
})


