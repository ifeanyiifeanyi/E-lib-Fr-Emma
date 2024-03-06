  <!-- ================================================
jQuery Library
================================================ -->
<script src="{{ asset("") }}user/js/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="{{ asset("") }}user/js/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script src="{{ asset("") }}user/js/plugins.js"></script>

<!-- ================================================
Bootstrap Select
================================================ -->
<script src="{{ asset("") }}user/js/bootstrap-select/bootstrap-select.js"></script>

<!-- ================================================
Bootstrap Toggle
================================================ -->
<script src="{{ asset("") }}user/js/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
<!-- main file -->
<script src="{{ asset("") }}user/js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>
<!-- bootstrap file -->
<script src="{{ asset("") }}user/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<!-- ================================================
Summernote
================================================ -->
<script src="{{ asset("") }}user/js/summernote/summernote.min.js"></script>

<!-- ================================================
Flot Chart
================================================ -->
<!-- main file -->
<script src="{{ asset("") }}user/js/flot-chart/flot-chart.js"></script>
<!-- time.js -->
<script src="{{ asset("") }}user/js/flot-chart/flot-chart-time.js"></script>
<!-- stack.js -->
<script src="{{ asset("") }}user/js/flot-chart/flot-chart-stack.js"></script>
<!-- pie.js -->
<script src="{{ asset("") }}user/js/flot-chart/flot-chart-pie.js"></script>
<!-- demo codes -->
<script src="{{ asset("") }}user/js/flot-chart/flot-chart-plugin.js"></script>

<!-- ================================================
Chartist
================================================ -->
<!-- main file -->
<script src="{{ asset("") }}user/js/chartist/chartist.js"></script>
<!-- demo codes -->
<script src="{{ asset("") }}user/js/chartist/chartist-plugin.js"></script>

<!-- ================================================
Easy Pie Chart
================================================ -->
<!-- main file -->
<script src="{{ asset("") }}user/js/easypiechart/easypiechart.js"></script>
<!-- demo codes -->
<script src="{{ asset("") }}user/js/easypiechart/easypiechart-plugin.js"></script>

<!-- ================================================
Rickshaw
================================================ -->
<!-- d3 -->
<script src="{{ asset("") }}user/js/rickshaw/d3.v3.js"></script>
<!-- main file -->
<script src="{{ asset("") }}user/js/rickshaw/rickshaw.js"></script>
<!-- demo codes -->
<script src="{{ asset("") }}user/js/rickshaw/rickshaw-plugin.js"></script>

<!-- ================================================
Data Tables
================================================ -->
<script src="{{ asset("") }}user/js/datatables/datatables.min.js"></script>

<!-- ================================================
Sweet Alert
================================================ -->
<script src="{{ asset("") }}user/js/sweet-alert/sweet-alert.min.js"></script>

<!-- ================================================
Kode Alert
================================================ -->
<script src="{{ asset("") }}user/js/kode-alert/main.js"></script>

<!-- ================================================
jQuery UI
================================================ -->
<script src="{{ asset("") }}user/js/jquery-ui/jquery-ui.min.js"></script>

<!-- ================================================
Moment.js
================================================ -->
<script src="{{ asset("") }}user/js/moment/moment.min.js"></script>

<!-- ================================================
Full Calendar
================================================ -->
<script src="{{ asset("") }}user/js/full-calendar/fullcalendar.js"></script>

<!-- ================================================
Bootstrap Date Range Picker
================================================ -->
<script src="{{ asset("") }}user/js/date-range-picker/daterangepicker.js"></script>

<!-- ================================================
Below codes are only for index widgets
================================================ -->
<!-- Today Sales -->
<script>
    // set up our data series with 50 random data points

    var seriesData = [
        []
        , []
        , []
    ];
    var random = new Rickshaw.Fixtures.RandomData(20);

    for (var i = 0; i < 110; i++) {
        random.addData(seriesData);
    }

    // instantiate our graph!

    var graph = new Rickshaw.Graph({
        element: document.getElementById("todaysales")
        , renderer: 'bar'
        , series: [{
            color: "#33577B"
            , data: seriesData[0]
            , name: 'Photodune'
        }, {
            color: "#77BBFF"
            , data: seriesData[1]
            , name: 'Themeforest'
        }, {
            color: "#C1E0FF"
            , data: seriesData[2]
            , name: 'Codecanyon'
        }]
    });

    graph.render();

    var hoverDetail = new Rickshaw.Graph.HoverDetail({
        graph: graph
        , formatter: function(series, x, y) {
            var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
            var swatch = '<span class="detail_swatch" style="background-color: ' + series.color +
                '"></span>';
            var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
            return content;
        }
    });

</script>

<!-- Today Activity -->
<script>
    // set up our data series with 50 random data points

    var seriesData = [
        []
        , []
        , []
    ];
    var random = new Rickshaw.Fixtures.RandomData(20);

    for (var i = 0; i < 50; i++) {
        random.addData(seriesData);
    }

    // instantiate our graph!

    var graph = new Rickshaw.Graph({
        element: document.getElementById("todayactivity")
        , renderer: 'area'
        , series: [{
            color: "#9A80B9"
            , data: seriesData[0]
            , name: 'London'
        }, {
            color: "#CDC0DC"
            , data: seriesData[1]
            , name: 'Tokyo'
        }]
    });

    graph.render();

    var hoverDetail = new Rickshaw.Graph.HoverDetail({
        graph: graph
        , formatter: function(series, x, y) {
            var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
            var swatch = '<span class="detail_swatch" style="background-color: ' + series.color +
                '"></span>';
            var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
            return content;
        }
    });

</script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>

@yield('js')
