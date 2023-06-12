(function(){
    
    const sliders = [...document.querySelectorAll('.especialista__body')];
    const buttonNext = document.querySelector('#next');
    const buttonBefore = document.querySelector('#before');
    let value;   

    buttonNext.addEventListener('click', ()=>{ 
        changePosition(1);
    });

    buttonBefore.addEventListener('click', ()=>{
        changePosition(-1);
    });

    const changePosition = (add)=>{
        const currentEspecialista = document.querySelector('.especialista__body--show').dataset.id;
        value = Number(currentEspecialista);
        value+= add;


        sliders[Number(currentEspecialista)-1].classList.remove('especialista__body--show');
        if(value === sliders.length+1 || value === 0){
            value = value === 0 ? sliders.length  : 1;
        }

        sliders[value-1].classList.add('especialista__body--show');

    }

})();