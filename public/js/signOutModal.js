const close = document.querySelector('.closeSearch')
const model = document.querySelector('#signOutName')
const input = document.querySelector('#hiddenInput')

close.addEventListener('click', (e) => {
    model.textContent = e.target.dataset.name;
    input.value = close.dataset.name;
})