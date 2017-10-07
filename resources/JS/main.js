
  <script type="text/javascript" src="resources/JS/jquery-1.11.0.min.js"></script>


    function goToLink(URL) {
                    // div Transition need to add css /*     -webkit-filter: blur(5px) filter: blur(5px);
                    
                    blurAll();
                    document.getElementById("transition").className += "blurTransition ";
                     
                    setTimeout(function () { location.href= URL ; }, 1000);
            };

    