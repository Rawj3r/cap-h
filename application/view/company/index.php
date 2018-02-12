<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-5 cell">
                <!-- echo out the system feedback (error and success messages) -->
                <?php $this->renderFeedbackMessages(); ?>
                <h3>Tell us about your company</h3>
                <br><br>
                <form method="post" action="<?php echo Config::get('URL');?>company/create">
                    <label class="form-label">What is your company name?</label>
                        <input type="text" name="company_name" placeholder="xyz holdings" />
                    <label class="form-label">Company type</label>
                        <input type="text" name="type" />
                    <label class="form-label">Num of employees</label>
                        <input type="text" name="size" placeholder="100" />
                    <label class="form-label">Address</label>
                        <input type="text" name="address" placeholder="Address 1"/>
                    <label class="form-label">City</label>
                        <input type="text" name="city" placeholder="Johannesburg" />
                    <label class="form-label">Province</label>
                        <select name="province">
                            <option>Please select one</option>
                            <option>Gauteng</option>
                            <option>Limpopo</option>
                            <option>Mpumalanga</option>
                            <option>North West</option>
                            <option>Free State</option>
                            <option>Kwa-Zula Natal</option>
                            <option>Northern Cape</option>
                            <option>Eastern Cape</option>
                            <option>Western Cape</option>
                        </select>
                    <br>
                    <label for="accurate" class="">
                                    <input type="checkbox" name="accurate" class="" />
                                    I confirm this information is correct and accurate.
                                </label><br>
                        <input type="submit" value='Save information' class="button" autocomplete="off" />
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <p><button class="button" data-open="exampleModal1">Click me for a modal</button></p>
<?php

    $strt_date = date_create('2017-01-01');
    $end_date = date_create('2017-12-31');

    date_sub($strt_date, date_interval_create_from_date_string('1 day'));

    $interval = date_diff($strt_date, $end_date);
    $num = $interval->format('%a');

    for($i = 0; $i < $num; $i++){

        date_add($strt_date, date_interval_create_from_date_string('1 day'));
        $next_day = date_format($strt_date, 'd-m-Y');
        echo "<br>";

        $new_date = new DateTime($next_day);
        $weeknum = $new_date->format('w');

        if(($weeknum != 0) && ($weeknum != 6)){

            //echo "not a holiday :$next_day ";
        }
    }
?>
<div class="reveal large" id="exampleModal1" data-reveal data-animation-in="zoom-in" data-animation-out="zoom-out">
  <p class="lead">Your couch. It is mine.</p>
  <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
  <a href="" class="button large-3">Save</a>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div> -->