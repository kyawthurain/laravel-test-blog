const replyBtn = document.querySelectorAll('.rp-btn');
replyBtn.forEach(btn => {
    btn.addEventListener('click',function(){
        btn.nextElementSibling.classList.toggle('d-none')
    })
})