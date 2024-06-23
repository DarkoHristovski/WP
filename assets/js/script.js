let cards = document.querySelectorAll('.section-cards .cards');
let cards2 = document.getElementsByClassName('.cards');
let burgerBtn = document.querySelector('.burger')
let showTextBtn = document.querySelectorAll('button');

console.log('showTextBtn',showTextBtn)

let burgerBtnFunction = (e) =>{
    e.preventDefault;
    document.body.classList.toggle('show-menu');
    }

burgerBtn.addEventListener('click',burgerBtnFunction);



showTextBtn.forEach((button)=>{
    button.addEventListener('click',function(){
        const cardElement = button.closest('.cards');
        if(cardElement){
            let textWrapper = cardElement.querySelector('.text-wrapper p');
            if(textWrapper){
                let textContent = textWrapper.textContent;
                alert(textContent)
            }
        }


    })
})







