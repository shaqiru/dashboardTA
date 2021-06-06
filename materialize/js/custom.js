$(window).on('load', () => {  
  // Inisialisasi variable  
  let data = 0 // Variable untuk fetching data  
 
  
  let labels = []  
  let history_kekeruhan = []  
  let history_ph = []  
  let history_suhu = []
  let history_kekeruhan2 = []  
  let history_ph2 = []  
  let history_suhu2 = []    
   

  // Variable untuk menampilkan data  
  const data1 = document.getElementById("data1")   
  const data2 = document.getElementById("data2")   
  const data3 = document.getElementById("data3")
  const data4 = document.getElementById("data4")   
  const data5 = document.getElementById("data5")   
  const data6 = document.getElementById("data6")   
  
  
  // Inisialisasi fungsi mengambil data dari API  
  getEndpoint1 = () => {  
      return new Promise((resolve, reject) => {  
          $.ajax({  
          url : 'get.php',  
          type : 'GET',  
              success : (res) => {  
                  resolve(res)  
              },  
              error : (res) => {  
                  reject(res)  
              }  
          })  
      })  
  } 
  
   
  
  // Update HTML dari data API  
  const update1 = () => {  
      let js_obj_data = JSON.parse(data["m2m:cin"].con)  
  
      convertData(js_obj_data)  
  
      data1.innerHTML = js_obj_data["Kelembaban"]  
      data2.innerHTML = js_obj_data["Suhu"]  
      data3.innerHTML = js_obj_data["Pengukuran Air Hujan"]    
    
  
      M.toast({html: "Data Updated!"})  
  }
  

    M.toast({html: "Data Updated!"})  
}  

  
  // Inisialisasi fungsi run   
  const run = () => {  
      data1.innerHTML = "Loading data..."  
      data2.innerHTML = "Loading data..."  
      data3.innerHTML = "Loading data..."
      
         
      setTimeout(() => {  
          getEndpoint1()  
              .then((result) => {  
                  data = JSON.parse(JSON.parse(result))  
                  update1()  
              })  
              .catch((error) => {  
                  console.log(error)  
                  M.toast({html: "Error while getting data!"})  
              })
 
      }, 1000)  
  }  
  
  // Menjalankan fungsi run di awal load page  
  run()  
  
  // Memberikan attribut onclick pada elemen dengan id upd (button update)  
  $("#upd").click(function() {  
      run()  
  })  
    
  
  // Chart  
  let convertData = (jsdata) => {  
      let addZero = (i) => {  
          if (i < 10) {  
              i = "0" + i;  
          }  
          return i;  
      }  
  
      let today = new Date();  
      let time = addZero(today.getHours()) + ":" + addZero(today.getMinutes()) + ":" + addZero(today.getSeconds());  
        
      if (labels.length > 4){  
          labels.shift()  
          history_kekeruhan.shift()  
          history_ph.shift()  
          history_suhu.shift()
         
          
            
           
  
          labels.push(time)  
          history_kekeruhan.push(parseInt(jsdata["Kekeruhan"]))  
          history_ph.push(parseInt(jsdata["pH"]))  
          history_suhu.push(parseInt(jsdata["Suhu"]))
         
            
      } else {  
          labels.push(time)  
          history_kekeruhan.push(parseInt(jsdata["Kekeruhan"]))  
          history_ph.push(parseInt(jsdata["pH"]))  
          history_suhu.push(parseInt(jsdata["Suhu"]))
          
      }  
  
  
      let options = {  
        type: 'line',  
        data: {  
              labels: labels,  
              datasets: [  
                  {  
                      label: 'Kekeruhan',  
                      data: history_kekeruhan,  
                      borderWidth: 1,  
                      backgroundColor: 'rgba(255, 99, 132, 0.2)',  
                      borderColor: 'rgba(255, 99, 132, 1)'  
                  },  
                  {  
                      label: 'pH',  
                      data: history_ph,  
                      borderWidth: 1,  
                      backgroundColor: 'rgba(54, 162, 235, 0.2)',  
                      borderColor: 'rgba(54, 162, 235, 1)'  
                  },  
                  {  
                      label: 'Suhu',  
                      data: history_suhu,  
                      borderWidth: 1,  
                      backgroundColor: 'rgba(255, 206, 86, 0.2)',  
                      borderColor: 'rgba(255, 206, 86, 1)'  
                  },
                  
              ]  
            },  
            options: {  
              scales: {  
                  yAxes: [{  
                      ticks: {  
                          reverse: false  
                      }  
                  }]  
              },  
              maintainAspectRatio : false,  
              aspectRatio : 1  
          }  
      }  
  
      execChart(options)  
  }  
  
  const execChart = (options) => {  
      let ctx = document.getElementById('chart').getContext('2d');  
      new Chart(ctx, options);  
  }  
})  