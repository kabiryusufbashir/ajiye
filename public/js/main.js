// Accounts Module
let accounts = document.querySelector('#accounts')
let accountNav = document.querySelector('#accountNav')
let addAccount = document.querySelector('#addAccount')
let addSubAccount = document.querySelector('#addSubAccount')
let addAccountForm = document.querySelector('#addAccountForm')
let addSubAccountForm = document.querySelector('#addSubAccountForm')
let accountWorkSpace = document.querySelector('#accountWorkSpace')
let closeModalAccount = document.querySelector('#closeModalAccount')

// Account Navigation 
accountNav.addEventListener('click', ()=>{
    accounts.classList.remove('hidden')
    accountWorkSpace.classList.remove('hidden')
    accountWorkSpace.classList.add('block')
})

// Add Account 
addAccount.addEventListener('click', ()=>{
    if(accountWorkSpace.classList.contains('block')){
        accountWorkSpace.classList.remove('block')
        accountWorkSpace.classList.add('hidden')
    }
    addAccountForm.classList.remove('hidden')
})

// Sub Account 
addSubAccount.addEventListener('click', ()=>{
    if(accountWorkSpace.classList.contains('block')){
        accountWorkSpace.classList.remove('block')
        accountWorkSpace.classList.add('hidden')
    }
    addSubAccountForm.classList.remove('hidden')
    addAccountForm.classList.add('hidden')
})

// Close Modal 
closeModalAccount.addEventListener('click', ()=>{
    accountWorkSpace.classList.add('block')
    accounts.classList.add('hidden')
    addAccountForm.classList.add('hidden')
    addSubAccountForm.classList.add('hidden')
})

