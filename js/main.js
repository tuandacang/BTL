// Modal
const logins = document.querySelectorAll('.login');
const modal = document.querySelector('.js-modal');
const modalClose = document.querySelector('.js-modal-close');
const modalContainer = document.querySelector('.js-modal-container');

function loginAccount(){
  modal.classList.add('open');


}

// Hàm ẩn đăng nhập
function exitLoginAccount(){
  modal.classList.remove('open')
}
for(const login of logins){
  login.addEventListener('click', loginAccount)
}

modalClose.addEventListener('click', exitLoginAccount)

modal.addEventListener('click',exitLoginAccount )

modalContainer.addEventListener('click', function(event){
  event.stopPropagation();
})

var counter =0;
$('#next').click(function(){
  var pos = $('#fig').position();
  if(counter < 4){
    console.log(counter);
    counter++;
      $('#fig').css("left",pos.left-( $(window).innerWidth() ));
  }
  else{
    $('#fig').css("left","0px");
    counter=0;
  }
});