//Initialize sideNav
var sideNav = document.querySelector('.sidenav');
M.Sidenav.init(sideNav);

//Initialize Collapsible
var collapsible = document.querySelector('.collapsible');
M.Collapsible.init(collapsible);

//Initialize Modal
var modal = document.querySelector('.modal');
M.Modal.init(modal);

//initialize Form Select
$(document).ready(function(){
    $('select').formSelect();
    $('.datepicker').datepicker();
  });
M.textareaAutoResize($('#address'));