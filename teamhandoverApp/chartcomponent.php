<?php
    require_once 'class/Stats.php';

    $create_file = new Stats();
    $create_file -> getChartData();
?>

<div class="container">

   <div class="box">

   <p class="subtitle is-4">Action Stats</p>
   <hr>

    <canvas id="myChart"></canvas>

  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

  const ctx = document.getElementById('myChart');

  fetch('chart_data.json')

  .then(function(response){
    if (response.ok == true){
      return response.json();
    }
  })
  .then(function(data){
    createChart(data);
  })

  function createChart(data){
    

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: data.map(row => row.status),
        datasets: [{
          label: 'Handover Action Stats',
          data: data.map(row => row.count),
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
}
</script>
