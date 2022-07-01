const btin =document.querySelector('#inbt');
const btup = document.querySelector ('#upbt');
const cont=document.querySelector('.cont');

btup.addEventListener('click',()=>{
cont.classList.add('sign-up-mode');

});
btin.addEventListener('click',()=>{
    cont.classList.remove('sign-up-mode');
});