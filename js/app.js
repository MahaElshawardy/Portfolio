
const btns = document.querySelectorAll('.btnz');




btns.forEach( btn => {
    btn.addEventListener('click', handleBtnClick);
});



function handleBtnClick(event) {
    btns.forEach(btn => {
        btn.classList.remove('current');
    });
    

    if (event.target.classList.contains('btnz')){
        event.target.classList.add('current');
    } else {
        event.target.parentElement.classList.add('current');
    }
    
}
