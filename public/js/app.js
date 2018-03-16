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
    $(".dropdown-trigger").dropdown();
  });
M.textareaAutoResize($('#address'));

$(document).ready(function(){
  $('input#search').on('keyup',function(){
    let str = this.value;
    let cities;
    if(str.length !== 0){
      $.ajax({
        type:'GET',
        url:'/cities/search/'+str,
        dataType:'json',
        success:function(data){
          cities = data.cities;
          console.log(cities);
          document.getElementById('item-table').innerHTML = '';
          for(let i in cities){
            document.getElementById('item-table').innerHTML += `<tr>
                                                            <td>`+cities[i].id+`</td>
                                                            <td>`+cities[i].city_name+`</td>
                                                            <td>`+cities[i].zip_code+`</td>
                                                            <td>`+cities[i].created_at+`</td>
                                                            <td>`+cities[i].updated_at+`</td>
                                                            <td>
                                                            <a href='cities/`+cities[i].id+`/edit'>edit</a></td>
                                                            </tr>`;
          }
        }
      });
    }
  });
});