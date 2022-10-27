             <div class="page-content-wrapper">
                <div class="page-content">
                     <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?=base_url()?>index.php/mainPageController/index">صفحه اصلی</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <b>گراف شاگردان</b>
                </li>
            </ul>
        </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">گراف تعداد شاگردان</span>
                                    </div>
                                   
                                </div>
                                <div class="col-md-6"  >
                                    <div style="text-align:right;  border-right: 15px solid #0000cc;margin-left:100px;font-weight: bolder" >&nbsp شاگردان حاضر در صبح : <?php echo($kandid);?></div>
                                    <br>
                                    <div style="text-align: right; margin-left:  100px;border-right: 15px solid #e600e6;font-weight: bolder">&nbsp شاگردان حاضر در چاشت : <?php echo($kandid);?></div><br>
                                    <div style="text-align: right; margin-left:  100px;border-right: 15px solid #00ff80;font-weight: bolder">&nbsp شاگردان  حاضر در شب : <?php echo($kandid);?></div>
                                    <canvas id="student" height="370px" style="margin-right:50px ">
                                </div>
                                <div class=" col-md-6" >
                                   <div style="text-align:right;  border-right: 15px solid #cc0052;margin-left:100px;font-weight: bolder" >&nbsp  شاگردان غیر حاضر در صبح : <?php echo($kandid);?></div>
                                   <br>
                                   <div style="text-align:right;  border-right: 15px solid #e62e00;margin-left:100px;font-weight: bolder" >&nbsp  شاگردان غیر حاضر در چاشت : <?php echo($kandid);?></div>
                                   <br>
                                    <div style="text-align: right; margin-left:  100px;border-right: 15px solid #00e6e6;font-weight: bolder">&nbsp شاگردان غیر حاضر در شب : <?php echo($kandid);?></div>
                                    <canvas id="students"  height="370px"  style="margin-right:50px ">
                                </div>
                              <div class="portlet-body" >
                              </div>
                            </div>
                        </div>
                    </div>
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div> 
            </div>
         <script src="<?= base_url()?>assets/layouts/layout2/scripts/jquerychart.js" type="text/javascript"></script>
        <script src="<?= base_url()?>assets/layouts/layout2/scripts/Chart.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
                var ctx = $("#student").get(0).getContext("2d");
                 var kandid = <?=$kandid?>;           
                 var kandid=<?=$kandid?>;
                 var kandid=<?=$kandid?>;
                 var sum=kandid+kandid+kandid;

                var data = [
                    {
                        value: kandid,
                        color: "#0000cc",
                        highlight: "#0000cc",
                        label: "شاگردان حاضر در صبح"
                    },
                    {
                        value: kandid,
                        color: "#e600e6",
                        highlight: "#e600e6",
                        label: "شاگردان حاضر در چاشت"
                    },
                    {
                        value: kandid,
                        color: "#00ff80",
                        highlight: "#00ff80",
                        label: "شاگردان حاضر در شب"
                    }
                    
                ];
                var piechart = new Chart(ctx).Doughnut(data);
            });
             $(document).ready(function(){
                var ctx = $("#students").get(0).getContext("2d");
                 var kandid = <?=$kandid?>;           
                 var kandid=<?=$kandid?>;
                 var kandid=<?=$kandid?>;
                 var sum=kandid+kandid+kandid;
                var data = [
                  
                     {
                        value: morningP,
                        color: "#cc0052",
                        highlight: "#cc0052",
                        label: "شاگردان غیر حاضر در صبح"
                    },
                     {
                        value: lunchP,
                        color: "#e62e00",
                        highlight: "#e62e00",
                        label: "شاگردان غیر حاضر در چاشت"
                    },
                     {
                        value: nightP,
                        color: "#00e6e6",
                        highlight: "#00e6e6",
                        label: "شاگردان غیر حاضر در شب"
                    }
                ];
                //draw
                var piechart = new Chart(ctx).Pie(data);
            }); 
        </script>

        <!-- BEGIN LIN CHARTS  -->
        <script src="<?=base_url()?>../assets/layouts/layout2/scripts/highcharts.js"></script>
<script src="<?=base_url()?>../assets/layouts/layout2/scripts/exporting.js"></script>
        <script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'گزارش سالانه شاگردان'
    },
    xAxis: {
        categories: [
            'حمل',
            'ثور',
            'جوزا',
            'سرطان',
            'اسد',
            'سنبله',
            'میزان',
            'عقرب',
            'قوس',
            'جدی',
            'دلو',
            'حوت'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'گزارش سالانه شاگردان'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}:person</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{

        name: 'شاگردان غیر حاضر در صبح',
        data: [lunchP,morningP]

    }, {
        name: 'شاگردان غیر حاضر در چاشت',
        data: [morningP,lunchP]

    }, {
        name: 'شاگردان غیر حاضر در شب',
        data: [nightP,morningP]

    },{
        name: 'شاگردان حاضر در صبح',
        data: [lunchP,nightP]

    },{
        name: 'شاگردان حاضر در چاشت',
        data:[nightP,lunchP]

    }, {
        name: 'شاگردان حاضر در شب',
        data: [nightP,morningP]

    }]
}); 

</script>     
<script type="text/javascript"> 
$(document).ready(function(){
    setInterval(function(){
    $.ajax({
        type:'ajax',
        url:'<?php echo base_url()?>index.php/mainPageController/report',
        dataType:'json',
        success:function(data){
            var kandid= data['kandid'];
            var kandid=data['kandid'];
            var kandid=data['kandid'];
          Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'گزارش سالانه شاگردان'
    },
    xAxis: {
        categories: [
            'حمل',
            'ثور',
            'جوزا',
            'سرطان',
            'اسد',
            'سنبله',
            'میزان',
            'عقرب',
            'قوس',
            'جدی',
            'دلو',
            'حوت'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'گزارش سالانه شاگردان'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}:person</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{

        name: 'شاگردان غیر حاضر در صبح',
        data: [morningP,lunchP,nightP,morningP,lunchP,morningP,lunchP,nightP,nightP,morningP,lunchP,nightP,]

    }, {
        name: 'شاگردان غیر حاضر در چاشت',
        data: [morningP,morningP,lunchP,morningP,nightP,morningP,morningP,lunchP,nightP,morningP,lunchP,nightP,]

    }, {
        name: 'شاگردان غیر حاضر در شب',
        data: [morningP,lunchP,nightP,lunchP,lunchP,nightP,morningP,nightP,nightP,lunchP,lunchP,nightP,]

    },{
        name: 'شاگردان حاضر در صبح',
        data: [morningP,lunchP,nightP,morningP,lunchP,nightP,morningP,morningP,nightP,lunchP,lunchP,nightP,]

    },{
        name: 'شاگردان حاضر در چاشت',
        data:[morningP,lunchP,nightP,morningP,lunchP,nightP,morningP,lunchP,nightP,morningP,lunchP,nightP,]

    }, {
        name: 'شاگردان حاضر در شب',
        data: [lunchP,morningP,nightP,morningP,lunchP,nightP,morningP,nightP,morningP,nightP,lunchP,nightP,]

    }]
}); 



        },error:function(data){
            

        }
    });
},6000);
});
</script>

       
        