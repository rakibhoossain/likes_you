<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["userid"])){
header("Location: index.php");
exit(); }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Who likes your post in facebook</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<style type="text/css">
  #alert_slot {
    position: fixed;
    z-index: 9999;
    bottom: 5%;
    left: 5%;
    right:5%;
    width: 100%;
  }
  #selectedAssets{
    width: 90%;
    transition: all 0.5s;
  }
</style>

</head>
<body>


  <div class="container-fluid">
   <div class="jumbotron">
    <h1 class="display-4">Facebook Name,ID fiender from like list </h1>
    <h2><?php echo $_SESSION['userid']; ?></h2>
  </div>
</div>


<div class="container-fluid">
 <div class="col-12">
  <form>
   <textarea class="form-control" id="input_mncc_id" rows="10"></textarea> 
   <div class="form-group row">
    <div class="col-sm-10">
      <div class="form-inline">
        <div class="form-group mx-sm-3 mb-2 mt-2">
            <select id="dateDdropdow" class="form-control" width="200">
            </select>
        </div>        
        <div class="form-group mx-sm-3 mb-2 mt-2">
          <input type="text" name="date" id="json_mncc_date"  width="276">  
        </div>
        <input type="button" name="process" id="json_mncc_id" class="btn btn-primary mt-2 mb-2" value="Download">   
      </div>
    </div>
  </div>
</form>
</div>
</div>

<div id="list_mncc_id" class="d-none"></div>

<div class="container-fluid" id="table_ctn" style="display:none">
  <h2>Name and ID List:</h2>            
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>S\n:</th>
        <th>Name</th>
        <th>ID</th>
        <th>Photo</th>
      </tr>
    </thead>
    <tbody id="table_list_mncc_id">
    </tbody>
  </table>
</div>

<div id="alert_slot">
  <div id="selectedAssets" class="alert alert-info alert-dismissible" role="alert" style="display: none">
    <button type="button" class="close" onclick="$('#selectedAssets').hide()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div id="mncc_message"></div>
  </div>
</div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript">

  let jsonData = [];
  let tableRow = document.getElementById("table_list_mncc_id");

//list element to json
function createJSON(li, date){
 let row = '';
let count =0;
 li.forEach(function (elem, index) {
  const link =  elem.querySelector(`a._5i_s`).getAttribute('data-hovercard');

  const url = new URL('http://demo.com'+encodeURI(link));
  const search_params = new URLSearchParams(url.search);


  if(search_params.has('id')) {

   const name =  elem.querySelector(`._2ar2 img`).getAttribute('aria-label');
   const id = search_params.get('id');
   const img = `http://graph.facebook.com/${id}/picture?type=square`;

  count++;

   row += `
   <tr>
   <td>${count}</td>
   <td>${name}</td>
   <td>${id}</td>
   <td><a href="https://www.facebook.com/${id}" target="_blank"><img src="${img}"></a></td>
   </tr>
   `;
  
   let item = {}
   item ["id"] = id;
   item ["name"] = name;
   item ["date"] = date;
   jsonData.push(item);
 }

});
 document.getElementById("table_ctn").style.display = "none";
 tableRow.innerHTML = row;
 document.getElementById("table_ctn").style.display = "block";
}

//valid data
function validData(li){
  const date = document.getElementById("json_mncc_date").value;
  if (li.length && date) {
    createJSON(li, date);
    saveToDB();
    saveData(jsonData, 'data.json');
  }
}

//Save as json file
var saveData = (function () {
  var a = document.createElement("a");
  document.body.appendChild(a);
  a.style = "display: none";
  return function (data, fileName) {
    var json = JSON.stringify(data),
    blob = new Blob([json], {type: "octet/stream"}),
    url = window.URL.createObjectURL(blob);
    a.href = url;
    a.download = fileName;
    a.click();
    window.URL.revokeObjectURL(url);
  };
}());


//Save to db
function saveToDB(){

  $.ajax({
    url: "adaptar/db.php",
    type: "POST",
    data: {
     json: jsonData
   },
   success: function(data){
    document.getElementById("input_mncc_id").value= '';
    document.getElementById("list_mncc_id").innerHTML= '';
    document.getElementById("json_mncc_date").value = '';
    document.getElementById("mncc_message").innerHTML= data;
    $('#selectedAssets').show();
  }        
  });
}

//Click event for html input
document.getElementById("json_mncc_id").addEventListener('click',function ()
{

  const htmlData = document.getElementById("input_mncc_id").value;
  const container = document.getElementById("list_mncc_id").innerHTML= htmlData;

  const li = document.querySelectorAll(`#list_mncc_id li._5i_q`);
  validData(li);
}); 


document.getElementById("dateDdropdow").addEventListener('change',function (e)
{
  document.getElementById("json_mncc_date").value = $(this).val();
}); 

$('#json_mncc_date').datetimepicker({
  // uiLibrary: 'bootstrap4',
  format: 'yyyy-mm-dd HH:MM:ss',
  footer: true,
  modal: true
});


//Save to db
function get_dates(){
  $.ajax({
    url: "adaptar/db.php",
    type: "POST",
    data: {
     date: '00-00-00'
   },
   success: function(response){
    document.getElementById("dateDdropdow").innerHTML = response;
    document.getElementById("json_mncc_date").value = $('#dateDdropdow').val();
  }        
  });
}

get_dates();


// $('#dateDdropdow').dropdown();
</script>

</body>
</html>