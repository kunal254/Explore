<div class="center">
    <div class="card">

        <?php
        if (isset($_GET['submit'])) {
            // this DEMO_KEY only allows you to make 30 request per hour
            // go to api.nasa.gov and get your API_KEY 
            // which allow you to make 1000 request per hour
            define("API_KEY", "DEMO_KEY");
            $url = "https://api.nasa.gov/mars-photos/api/v1/rovers/";

            // constructing input options
            $rovers = array("curiosity", "opportunity", "spirit");
            $cameras = array("fhaz", "rhaz", "navcam");

            // validations ==================
            if (empty($_GET['rover']) || empty($_GET['camera']) || empty($_GET['sol'])) {
                echo "<p class='got_error' >An error occured :( </p>";
                return;
            }

            // extract() value if not empty 
            $rover = $_GET['rover'];
            $camera = $_GET['camera'];
            $sol = $_GET['sol'];

            // another validation, user should not tamper with query parameter
            if (
                in_array($rover, $rovers) && in_array($camera, $cameras) &&
                ($sol >= 1 && $sol <= 1000)
            ) {
                $url .= $rover . "/photos?sol=" . $sol . "&camera=" . $camera . "&api_key=" . API_KEY;

                $data = json_decode(file_get_contents($url), true)['photos'];
                if ($data) {
                    $data = $data[0];

                    echo "<img src='{$data['img_src']}'>

            <div class='details' style='align-self: flex-start; margin-left: 10px'>
                <p>Rover: <span class='value'>{$data['rover']['name']}</span></p>
                <p>Picture taken by: <span class='value'>{$data['camera']['full_name']}</span></p>
                <p>On earth date: <span class='value'>{$data['earth_date']}</span></p>
                <p>Rover current status: <span class='value'>{$data['rover']['status']}</span></p>
                <p>Launch earth date: <span class='value'>{$data['rover']['launch_date']}</span></p>
                <p>Landing earth date: <span class='value'>{$data['rover']['landing_date']}</span></p>
            </div>
            ";
                } else {
                    echo "<p class='got_error' >Please note that there are sometimes problems with the sensors on Mars that result in missing data! If you see a long gap, a search result may bring up more information on whether it is a long-lasting problem.</p>";
                }
            } else
                echo "<p class='got_error'>An Error Occurred</p>";
        } else {
        ?>
            <p class="info">Browse images taken by mars rovers 🛸</p>

            <div class="line"></div>

            <form action="" method="GET">
                <input type="hidden" name="tab" value="rover">

                <label for="rover">Choose rover</label><br>
                <select id="rover" name="rover">
                    <option value="curiosity">Curiosity</option>
                    <option value="opportunity">Opportunity</option>
                    <option value="spirit">Spirit</option>
                </select><br><br>

                <label for="camera">Choose camera</label><br>
                <select id="camera" name="camera">
                    <option value="fhaz">Front Hazard Avoidance Camera </option>
                    <option value="rhaz">Rear Hazard Avoidance Camera</option>
                    <option value="navcam">Navigation Camera</option>
                </select><br><br>

                <label for="sol">Choose <a href="https://en.wikipedia.org/wiki/Sol_(day_on_Mars)" target="_blank">sol</a> (Martian Days)</label><br>
                <input type="number" name="sol" id="sol" min="1" max="1000" required><br><br>

                <input type="submit" name="submit" value="Submit">
            </form>
        <?php
        }
        ?>
    </div>
</div>