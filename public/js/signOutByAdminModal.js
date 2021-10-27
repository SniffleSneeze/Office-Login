const close = document.querySelectorAll('.signOutButtonAdmin')
const model = document.querySelector('#signOutName')
const input = document.querySelector('#hiddenInput')


close.forEach((element) => {
    element.addEventListener('click', (e) => {
        model.textContent = e.target.dataset.name;
        input.value = e.target.dataset.name;
    })
})


