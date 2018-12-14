<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            $.post('../includes/ajaxData2.php',
                    function (data) {
                        var ask = window.confirm("Your session has ended."); 
                       if (ask) {
                            window.location.replace("../index.php");
                        }
                    });
        }, 21600000);
    });

//    $(document).ready(function () {
//        $(window).bind('unload', function () {
//            $.post('../includes/ajaxData2.php',
//                    function (data) {
//                        var ask = window.confirm("Your session has ended.");
//                        if (ask) {
//                            window.location.replace("../index.php");
//                        }
//                    });
//        });
//    });


    var idleTime = 0;
    $(document).ready(function () {
        //Increment the idle time counter every minute.
        var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

        //Zero the idle timer on mouse movement.
        $(this).mousemove(function (e) {
            idleTime = 0;
        });
        $(this).keypress(function (e) {
            idleTime = 0;
        });
    });

    function timerIncrement() {
        idleTime = idleTime + 1;
        if (idleTime > 59) { // 60 minutes
            $.post('../includes/ajaxData2.php',
                    function (data) {
                        var ask = window.confirm("Your session has ended.");
                        if (ask) {
                            window.location.replace("../index.php");
                        }
                    });
        }
    }

</script>

