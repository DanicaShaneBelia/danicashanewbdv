<?php include_once './usersHandler.php'; ?>

<style>

#main {
        width: 85.5%;
        height: 100%;
        background-color: #f0f0f0;
        /* Background color */
        padding: 50px  100px;
        color: #333;
    }

    
        .charts {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .chart-container {
        background-color: white;
        width: 100%;
        padding: 1rem;
        border-radius: 2rem;
        margin-bottom: 1rem;
        border: 2px solid #012970;


    }

    .chart-container h2{
        margin: 1rem;
    }
</style>
<script>
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
        )
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
        )
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
        )
</script>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<main  id="main" class="main"> 

<div class="charts">
    <div id="pie" class="chart-container">
        <h2>Male to Female Ratio</h2>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#pie"), {
                series: [<?php echo getMaleCount() . ',' . getFemaleCount() ?>],
                chart: {
                    height: 450,
                    type: 'pie',
                    toolbar: {
                        show: true
                    }
                },
                labels: ['Male', 'Female']
            }).render();
        });
    </script>


    <div class="bar chart-container" id="bar">
        <h2>Activities Per month</h2>
    </div>

    <script>
     
        document.addEventListener("DOMContentLoaded", () => {
            let dataOutput = <?php echo getEveryActivitiesMonth() ?>;
        const formattedOutput =dataOutput.map(item => ({
            x:item.x,
            y:parseInt(item.y)
        }))

        
        console.log(formattedOutput)
            new ApexCharts(document.querySelector("#bar"), {
                chart: {
                    type: 'bar',
                    height: 350,
                },
                series: [{
                    data: formattedOutput,
                }],
            }).render();
        });
    </script>


</div>
</main>
