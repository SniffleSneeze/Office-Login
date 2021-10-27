
let timeout

function createTimeout()
{
    timeout = setTimeout(() => {
        window.location.href = '/logout'
    } ,300000)

}

document.querySelector('body').addEventListener('click', () => {
    clearTimeout(timeout);
    createTimeout()
})

document.querySelector('body').addEventListener('scroll', () => {
    clearTimeout(timeout);
    createTimeout()
})

document.querySelector('body').addEventListener('touch', () => {
    clearTimeout(timeout);
    createTimeout()
})

createTimeout()
