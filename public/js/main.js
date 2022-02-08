let accounts = document.querySelector('#accounts')
let accountNav = document.querySelector('#accountNav')
let closeModalAccount = document.querySelector('#closeModalAccount')

accountNav.addEventListener('click', ()=>{
    accounts.classList.remove('hidden')
})

closeModalAccount.addEventListener('click', ()=>{
    accounts.classList.add('hidden')
})

