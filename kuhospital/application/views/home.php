<div class="row">
    
<div class="col-md-6 col-lg-3">
        <div class="mini-stats ">
            <span class="red-skin"><i class="flaticon-combo-chart"></i></span>
            <h3 class="count"><?php echo (!empty($notify->total_app) ? $notify->total_app : null) ?></h3>
            <p>Appointment</p>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="mini-stats ">
            <span class="sky-skin"><i class="flaticon-dollar-coins"></i></span>
            <h3 class="count"><?php echo (!empty($notify->total_patient) ? $notify->total_patient : null) ?></h3>
            <p>Patient</p>

        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="mini-stats ">
            <span class="purple-skin"><i class="flaticon-full-items-inside-a-shopping-bag"></i></span>
            <h3 class="count"><?php echo (!empty($notify->total_doctor) ? $notify->total_doctor : null) ?></h3>
            <p>Doctor</p>

        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="mini-stats ">
            <span class="pink-skin"><i class="flaticon-business"></i></span>
            <h3 class="count"><?php echo (!empty($notify->total_representative) ? $notify->total_representative : null) ?></h3>
            <p>Representative</p>
        </div>
    </div>
</div> <!-- /.row -->
<div class="row">

    <!-- Total Product Sales area -->
    <div class="col-lg-8">
        <div class="panel panel-default" id="js-timer">
            <div class="panel-body">
                <div class="widget-title">
                    <h3>Total Progress</h3>
                    <span>Showing status from the last year</span>
                </div>
                <div id="chartContainer" style="height: 300px; width: 100%;">

                </div>
            </div> <!-- /.panel-body -->
        </div>
    </div>

    <!-- Message area -->
    <div class="col-lg-4">
        <div  class="panel panel-default">
            <div class="panel-body">
                <div class="widget-title">
                    <h3>Enquiry</h3>
                    <span>Latest enquiry</span>
                </div>
                <div class="message-center"> 

                    <?php if (!empty($enquires)) {  ?>
                        <?php foreach ($enquires as $enquiry) {  ?>
                        <a href="<?php echo base_url("enquiry/view/$enquiry->enquiry_id") ?>">
                            <div class="mail-contnet">
                                <h5><?php echo $enquiry->name; ?></h5>
                                <span class="mail-desc"><?php echo character_limiter(strip_tags($enquiry->enquiry),70); ?></span>  </div>
                        </a> 
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div> 
    </div>
    <!-- /.row --> 
</div> <!-- /.row -->

<script type="text/javascript">
$(window).on('load', function(){
    var chart = new CanvasJS.Chart("chartContainer",
    {
        axisX: {
            gridThickness: 0,
            tickLength: 10,
            tickThickness: 1,
            lineThickness: 1
        },
        axisY: {
            gridThickness: 0,
            tickLength: 10,
            tickThickness: 1,
            lineThickness: 1
        },
        animationEnabled: true,
        data: [ 
            {
                cursor: "pointer",
                showInLegend: true,
                type: "splineArea",
                name: "Appointment",
                color: "#11A7FA",
                dataPoints: [  
                <?php 
                    if (!empty($chart[1])) {
                        foreach ($chart[1] as $value) {
                            echo "{label: '".date("F",strtotime($value->date))."',y: $value->appointment},";
                        }
                    }  
                ?>    
                ]
            }

        ]
    });
    chart.render();
});
</script>
