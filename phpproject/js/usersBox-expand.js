document.querySelector('#usersPanel').addEventListener('click', () => {
    const list = document.querySelector('.usersBox')

    if(list.style.display === 'block') list.style.display = 'none'
        else list.style.display = 'block'
})