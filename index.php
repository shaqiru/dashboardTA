<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard IoT</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href='./materialize/css/materialize.min.css'>
    <link type="text/css" rel="stylesheet" href='./materialize/css/custom.css'> 
    <meta name="theme-color" content="#90caf9" />
    <link rel="apple-touch-icon" href="./materialize/1.png" />
    <link rel="shortcut icon" href="./materialize/1.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    
</head>
<body>
    <header>
        <!-- Title Section -->
        <div class="title blue lighten-3 valign-wrapper z-depth-2">
            <h3>Monitoring Parameter Kekeringan</h3>
        </div>
   </header>

   <main>  
       <!-- Display Data Section -->  
       <div class="container">  
           <div class="row">  
               <div class="col s12 m6 l4">  
                   <div class="card-panel">  
                       <img src="./materialize/1.png" class="responsive-image">  
                       <h1>Kelembaban</h1>
                       <h1>Nilai</h1>  
                       <span class="black-text force-center" id="data1"></span>
                   </div>  
               </div>  
               <div class="col s12 m6 l4">  
                   <div class="card-panel">  
                       <img src="./materialize/2.png" class="responsive-image">  
                       <h1>Suhu</h1>
                       <h1>Nilai</h1>  
                       <span class="black-text force-center" id="data2"></span>   
                   </div>  
               </div>  
               <div class="col s12 m6 l4">  
                   <div class="card-panel">  
                       <img src="./materialize/3.png" class="responsive-image">  
                       <h1>Tingkat Air Hujan</h1>
                       <h1>Nilai</h1>  
                       <span class="black-text force-center" id="data3"></span>
                
                   </div>  
               </div>  
           </div>  
         
  
           <!-- Button Update -->  
           <div class="force-center">  
               <a class="waves-effect waves-light btn blue darken-1 pulse" id="upd">Update</a>  
           </div>  
  
           <!-- Chart -->  
           <div class="chart-data">  
               <canvas id="chart"></canvas>  
           </div>  
       </div>  
       
   </main>
  
   <script>
// Function ini dijalankan ketika Halaman ini dibuka pada browser
$(function(){
setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
});
 
//Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
function timestamp() {
$.ajax({
url: 'time.php',
success: function(data) {
$('#timestamp').html(data);
},
});
}
</script>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./materialize/js/materialize.min.js"></script>
<script src="./materialize/js/custom.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>