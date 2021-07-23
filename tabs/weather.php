<div class="center" style="margin: 20px">

<h1 style='text-align:center; color: #9a7812'>Weather Of Mars ⛅</h1>

<p id="source" style="margin: 0; display:none">source: <a target="_blank" href="https://mars.nasa.gov/msl/weather/">NASA</a></p>
<p id="loading"><span></span><i>Loading</i></p>

 <!-- just using the embed option provided at https://mars.nasa.gov/msl/weather/ -->
<iframe onload="loaded()" src='https://mars.nasa.gov/layout/embed/image/mslweather/' width='100%' height='650'  scrolling='no' frameborder='0'></iframe>
    </div>
    <script>
        function loaded(){
            loading.style.display="none";
            source.style.display="block";
        }
    </script>
    