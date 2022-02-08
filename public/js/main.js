// Accounts Module
let accounts = document.querySelector('#accounts')
let accountNav = document.querySelector('#accountNav')
let addAccount = document.querySelector('#addAccount')
let addAccountForm = document.querySelector('#addAccountForm')
let accountWorkSpace = document.querySelector('#accountWorkSpace')
let closeModalAccount = document.querySelector('#closeModalAccount')

accountNav.addEventListener('click', ()=>{
    accounts.classList.remove('hidden')
    accountWorkSpace.classList.remove('hidden')
    accountWorkSpace.classList.add('block')
})

addAccount.addEventListener('click', ()=>{
    if(accountWorkSpace.classList.contains('block')){
        accountWorkSpace.classList.remove('block')
        accountWorkSpace.classList.add('hidden')
    }
    addAccountForm.classList.remove('hidden')
})

closeModalAccount.addEventListener('click', ()=>{
    accounts.classList.add('hidden')
    accountWorkSpace.classList.add('block')
    addAccountForm.classList.add('hidden')
})

