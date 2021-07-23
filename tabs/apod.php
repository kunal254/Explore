<div class="center">
    <div class="card">

        <?php
        if (isset($_GET['submit']) && !empty($_GET['date'])) {

            // this DEMO_KEY only allows you to make 30 request per hour
            // go to api.nasa.gov and get your API_KEY 
            // which allow you to make 1000 request per hour    
            define("API_KEY", "DEMO_KEY");
            $url = "https://api.nasa.gov/planetary/apod?api_key=";

            $url .= API_KEY . "&date=" . $_GET['date'];

            // make request
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = json_decode(curl_exec($ch), true);

            if (isset($data['code'])) {
                echo "<p class='got_error' >{$data['msg']}</p>";
            } else {

                echo "<div class='row' >";


                if ($data['media_type'] == 'image') {
                    echo "<img src='{$data['url']}'>";
                    if (isset($data['copyright']))
                        echo "<p class='copy' >copyright: {$data['copyright']}</p>";
                } else
                    echo "<a target='_blank' href='{$data['url']}' ><img src='./img/play_button.svg'>Watch video</a>";


                echo "
        <div class='details'>
        <p>Title: <span class='value'>{$data['title']}</span></p>
        <p>Date: <span class='value'>{$data['date']}</span></p>

            <div class='explain'>
                <p>Explanation: </p>
                <p class='value' >{$data['explanation']}</p>
            </div>
        </div>
        ";
                //  div.row ends
                echo "</div>";
            }
        } else {
        ?>
            <p class="info">Astronomy Picture of the Day 🏆</p>
            <div class="line"></div>
            <form action="" method="GET">
                <input type="hidden" name="tab" value="apod">

                <label for="date">Choose date</label><br>
                <input type="date" name="date" id="date" value="<?php echo date("Y-m-d") ?>"><br><br>

                <input type="submit" name="submit" value="submit">
            </form>

        <?php
        }
        ?>
    </div>
</div>