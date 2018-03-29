//Initialize sideNav
var sideNav = document.querySelector('.sidenav');
M.Sidenav.init(sideNav);

//Initialize Modal
var modal = document.querySelector('.modal');
M.Modal.init(modal);

//initialize Form Select
$(document).ready(function(){
    $('select').formSelect();
    $('.datepicker').datepicker();
    $(".dropdown-trigger").dropdown();
    $('.collapsible').collapsible();
  });
if(document.getElementById('address')){
  M.textareaAutoResize($('#address'));
}