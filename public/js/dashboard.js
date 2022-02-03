//Client caret 
const clientCaret = document.querySelector("#clientCaret");
const clientMenu = document.querySelector("#clientMenu");
const clientPointer = document.querySelector("#clientPointer");

clientCaret.addEventListener('click', ()=>{
    if(clientMenu.classList.contains('hidden')){
        clientMenu.classList.remove('hidden');
        clientPointer.classList.add('transform');
        clientPointer.classList.add('rotate-90');
        clientCaret.classList.add('transition');
    }else{
        clientMenu.classList.add('hidden');
        clientPointer.classList.remove('transform');
        clientPointer.classList.remove('roate-90');
    }
});
