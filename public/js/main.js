// Accounts Module
let accounts = document.querySelector('#accounts')
let accountNav = document.querySelector('#accountNav')
let addAccount = document.querySelector('#addAccount')
let addSubAccount = document.querySelector('#addSubAccount')
let addAccountForm = document.querySelector('#addAccountForm')
let addSubAccountForm = document.querySelector('#addSubAccountForm')
let accountWorkSpace = document.querySelector('#accountWorkSpace')
let allAccount = document.querySelector('#allAccount')
let allAccountSpace = document.querySelector('#allAccountSpace')
let closeModalAccount = document.querySelector('#closeModalAccount')

    // Account Navigation 
    accountNav.addEventListener('click', ()=>{
        accounts.classList.remove('hidden')
        accountWorkSpace.classList.remove('hidden')
        accountWorkSpace.classList.add('block')
        allAccountSpace.classList.add('hidden')
    })

    // Add Account 
    addAccount.addEventListener('click', ()=>{
        if(accountWorkSpace.classList.contains('block')){
            accountWorkSpace.classList.remove('block')
            accountWorkSpace.classList.add('hidden')
        }
        addAccountForm.classList.remove('hidden')
        addSubAccountForm.classList.add('hidden')
        allAccountSpace.classList.add('hidden')
    })

    // Sub Account 
    addSubAccount.addEventListener('click', ()=>{
        if(accountWorkSpace.classList.contains('block')){
            accountWorkSpace.classList.remove('block')
            accountWorkSpace.classList.add('hidden')
        }
        addSubAccountForm.classList.remove('hidden')
        addAccountForm.classList.add('hidden')
        allAccountSpace.classList.add('hidden')
    })

    // All Account 
    allAccount.addEventListener('click', ()=>{
        if(accountWorkSpace.classList.contains('block')){
            accountWorkSpace.classList.remove('block')
            accountWorkSpace.classList.add('hidden')
        }
        allAccountSpace.classList.remove('hidden')
        addSubAccountForm.classList.add('hidden')
        addAccountForm.classList.add('hidden')
    })

    // Close Modal 
    closeModalAccount.addEventListener('click', ()=>{
        accountWorkSpace.classList.add('block')
        accounts.classList.add('hidden')
        addAccountForm.classList.add('hidden')
        addSubAccountForm.classList.add('hidden')
    })

//Record Module
let recordNav = document.querySelector('#recordNav')
let records = document.querySelector('#records')
let addRecordForm = document.querySelector('#addRecordForm')
let closeModalRecord = document.querySelector('#closeModalRecord')

    // Record Navigation 
    recordNav.addEventListener('click', ()=>{
        records.classList.remove('hidden')
        addRecordForm.classList.remove('hidden')
    })

    // Close Modal 
    closeModalRecord.addEventListener('click', ()=>{
        records.classList.add('hidden')
    })

//Imprest Module
// let imprestNav = document.querySelector('#imprestNav')
// let imprest = document.querySelector('#imprest')
// let addImprestForm = document.querySelector('#addImprestForm')
// let closeModalImprest = document.querySelector('#closeModalImprest')

//     // Record Navigation 
//     imprestNav.addEventListener('click', ()=>{
//         imprest.classList.remove('hidden')
//         addImprestForm.classList.remove('hidden')
//     })

//     // Close Modal 
//     closeModalImprest.addEventListener('click', ()=>{
//         imprest.classList.add('hidden')
//     })

// View Report 
let viewReportNav = document.querySelector('#viewReportNav')
let viewReport = document.querySelector('#viewReport')
let viewReportForm = document.querySelector('#viewReportForm')
let closeModalReport = document.querySelector('#closeModalReport')

    // Record Navigation 
    viewReportNav.addEventListener('click', ()=>{
        viewReport.classList.remove('hidden')
        viewReportForm.classList.remove('hidden')
    })

    // Close Modal 
    closeModalReport.addEventListener('click', ()=>{
        viewReport.classList.add('hidden')
    })