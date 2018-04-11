$( document ).ready(function() {


$('#submit').click(function()
{
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if($('#name').val() == '' || $('#apelido').val() == '' || $('#localidade').val() == '' || $('#email').val() == '' )
  {
    alert("Preencha todos os campos!");
  }else  if(mail.val().match(mailformat))
  { return ("Sucesso!"); }
  else
  { return ("Email invalido"); }
});

});
