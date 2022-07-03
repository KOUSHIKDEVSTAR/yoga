   <!-- BEGIN: Content-->
   <style>
:root {
    --c2: rgba(241, 91, 181, 0.6);
    /*magenta*/
    --c3: rgba(254, 228, 64, 1);
    /*yellow*/
    --c4: rgba(0, 187, 249, 0.5);
    /*blue*/
    --c5: rgba(0, 245, 212, 0.5);
    /*green*/
    --w: rgba(255, 255, 255, 0.1);
    --fontfam: "Poppins", sans-serif;
    --color: #000;
    --bordercolor: rgba(65, 65, 65, 0.1);
}

html,
body {
    height: 100%;
}

#container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, var(--c2), var(--w) 75%),
        radial-gradient(circle at 10% 20%, var(--c3) 40%, var(--w) 40%),
        linear-gradient(20deg, var(--c5) 30%, var(--w) 30%),
        linear-gradient(-20deg, var(--c4) 30%, var(--w) 30%);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: row;
}

.glass {
    position: absolute;
    box-sizing: border-box;
    width: 90%;
    height: 65%;
    background: linear-gradient(107.18deg,
            rgba(255, 255, 255, 0.6) 0%,
            rgba(255, 255, 255, 0.3) 100%);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-radius: 30px;
    border: 1px solid rgba(255, 255, 255, 0.7);
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
}

.picker {
    display: grid;
    height: 100%;
    grid-template-columns: 100%;
    grid-template-rows: 17% 15% 65%;
}

h1 {
    padding: 0;
    margin: 0;
    font-size: 26px;
    font-family: var(--fontfam);
    font-weight: bold;
    color: var(--color);
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    /*background: #39a;*/
}

#picker_container {
    grid-row-start: 2;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: left;
    flex-direction: row;
    font-family: var(--fontfam);
    /*background: #69a;*/
}

#pbox {
    grid-row-start: 3;
    overflow-y: auto;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-direction: column;
    /*background: #34a;*/
}

p {
    width: 80%;
    font-family: var(--fontfam);
    text-align: center;
}

/*Desktop Stuff*/
@media only screen and (min-width: 900px) {
    .glass {
        width: 70%;
        height: 60%;
    }

    .picker {
        grid-template-rows: 30% 20% 40%;
    }

    p {
        width: 50%;
    }
}

/*Datepicker Stuff*/
#picker_container {
    width: 100%;
    /*background: #56f;*/
    display: flex;
    align-items: center;
    justify-content: left;
    flex-direction: row;
}

#month_container,
#date_container,
#year_container {
    grid-row-start: 2;
    height: 50px;
    display: grid;
    grid-template-columns: 110px 30px;
    grid-template-rows: 50% 50%;
    margin: 2px;
    background: linear-gradient(107.18deg,
            rgba(255, 255, 255, 0.2) 0%,
            rgba(255, 255, 255, 0.05) 100%);
    backdrop-filter: blur(13px);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

#date_container {
    grid-template-columns: 50px 30px;
}

#year_container {
    grid-template-columns: 60px 30px;
}

#monthpicker,
#datepicker,
#yearpicker {
    width: 110px;
    height: 50px;
    /*background: var(--pickercolor);*/
    border-radius: 10px 0 0 10px;
    text-align: center;
    line-height: 50px;
    color: rgba(0, 0, 0, 1);
    cursor: ns-resize;
}

#datepicker {
    width: 50px;
}

#yearpicker {
    width: 60px;
}

.buttone {
    background: none;
    grid-column-start: 2;
    grid-column-stop: 2;
    grid-row-start: 1;
    /*background: var(--pickercolor);*/
    background: rgba(255, 255, 255, 0.1);
    border-radius: 0 10px 0 0;
    cursor: pointer;
    border-left: 1px solid var(--bordercolor);
    touch-action: manipulation;
}

.bdown {
    grid-row-start: 2;
    grid-row-stop: 2;
    border-radius: 0 0 10px 0;
    border-top: 1px solid var(--bordercolor);
}

/*style reset*/
button {
    display: inline-block;
    border: none;
    padding: none;
    margin: 0;
    outline: none;
    -webkit-appearance: none;
    -moz-appearance: none;
}

button:hover,
button:focus {
    background: rgba(255, 255, 255, 0.2);
}

button:focus {
    outline: none;
}

button:active {
    transform: scale(1);
}

a,
a:link,
a:visited {
    color: var(--color);
    text-decoration-style: dotted;
}

div#date_container {
    display: none;
}



.btn-booking {
    top: 30%;
    position: absolute;
    right: 5%;
}

.btn-booking a {
    width: 200px !important;
}

.card-body ul li {
    list-style: none !important;
    line-height: 20px !important;
}
   </style>

   <div class="app-content custom-mobile-no-pd booking-content">

       <div class="misc-wrapper custom-misc-wrapper content-wrapper container-xxl p-0">
           <div class="content-header row">
           </div>
           <div class="content-body">
               <section class="app-user-view-account">
                   <div class="container-xxl">
                       <div class="row">
                           <!-- User Sidebar -->
                           <div class="col-xxl-10 col-lg-10 col-md-10 order-1 order-md-0 offset-md-1">

                               <!-- User Card -->
                               <div class="card">
                                   <div class="card">
                                       <div class="card-body">
                                           <div class="row">
                                               <div class="col-md-12">


                                                   <?php if($this->session->flashdata('success')): ?>
                                                   <div class="demo-spacing-0">
                                                       <div class="alert alert-primary alert-dismissible fade show"
                                                           role="alert">
                                                           <div class="alert-body">
                                                               <?php echo $this->session->flashdata('success'); ?>
                                                           </div>
                                                           <button type="button" class="btn-close"
                                                               data-bs-dismiss="alert" aria-label="Close"></button>
                                                       </div>
                                                   </div>

                                                   <?php elseif($this->session->flashdata('error')): ?>
                                                   <div class="alert alert-danger alert-dismissible fade show"
                                                       role="alert">
                                                       <div class="alert-body">
                                                           
                                                           <span>The value is <strong>
                                                                   <?php echo $this->session->flashdata('error'); ?></strong>.
                                                       </div>
                                                       <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                           aria-label="Close"></button>
                                                   </div>

                                                   <?php endif; ?>






                                               </div>
                                           </div>
                                           <div class="top-wraper">
                                    <div class="branch">
                                    <select name="branch" id="branch" class="form-control">
                                                <option value="0">select branch</option>
                                                <?php foreach($branch_data as $branch){?>
                                                    <option value="<?= $branch->id;?>"><?= $branch->name;?></option>
                                                    

                                                <?php } ?>
                                                
                                            </select>
                                        </div>
                                        <div id="picker_container">

                                            <div id="date_container">
                                                <button class="buttone" id="dup" aria-label="date up"><svg width="100%"
                                                        height="100%" viewBox="0 0 135 60"
                                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:square;stroke-miterlimit:1.5;">
                                                        <path d="M15,44.133l52.067,-29.133l52.066,29.133"
                                                            style="fill:none;stroke:#000;stroke-width:20px;" />
                                                    </svg></button>

                                                <div id="datepicker"></div>

                                                <button class="buttone bdown" id="ddown" aria-label="date down"><svg
                                                        width="100%" height="100%" viewBox="0 0 135 60"
                                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:square;stroke-miterlimit:1.5;">
                                                        <path d="M15,15l52.067,29.133l52.066,-29.133"
                                                            style="fill:none;stroke:#000;stroke-width:20px;" />
                                                    </svg></button>
                                            </div>

                                            <div id="month_container">
                                                <button class="buttone" id="mup" aria-label="month up"><svg width="100%"
                                                        height="100%" viewBox="0 0 135 60"
                                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:square;stroke-miterlimit:1.5;">
                                                        <path d="M15,44.133l52.067,-29.133l52.066,29.133"
                                                            style="fill:none;stroke:#000;stroke-width:20px;" />
                                                    </svg></button>

                                                <div id="monthpicker"></div>

                                                <button class="buttone bdown" id="mdown" aria-label="month down"><svg
                                                        width="100%" height="100%" viewBox="0 0 135 60"
                                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:square;stroke-miterlimit:1.5;">
                                                        <path d="M15,15l52.067,29.133l52.066,-29.133"
                                                            style="fill:none;stroke:#000;stroke-width:20px;" />
                                                    </svg></button>
                                            </div>

                                            <div id="year_container">

                                                <button class="buttone" id="yup" aria-label="year up"><svg width="100%"
                                                        height="100%" viewBox="0 0 135 60"
                                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:square;stroke-miterlimit:1.5;">
                                                        <path d="M15,44.133l52.067,-29.133l52.066,29.133"
                                                            style="fill:none;stroke:#000;stroke-width:20px;" />
                                                    </svg></button>

                                                <div id="yearpicker"></div>

                                                <button class="buttone bdown" id="ydown" aria-label="year down"><svg
                                                        width="100%" height="100%" viewBox="0 0 135 60"
                                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:square;stroke-miterlimit:1.5;">
                                                        <path d="M15,15l52.067,29.133l52.066,-29.133"
                                                            style="fill:none;stroke:#000;stroke-width:20px;" />
                                                    </svg></button>
                                            </div>

                                        </div>
                                        </div>
                                           <div class="card-datatable table-responsive pt-0" id="old_div">

                                        <?php
                                            foreach($schedule_management_curent_date as $current_date){
                
                                                $timestamp = $current_date->time_from;
                                                $today = new DateTime("today"); // This object represents current date/time with time set to midnight
                                                $match_date = DateTime::createFromFormat( "Y-m-d", $timestamp );
                                                $match_date->setTime( 0, 0, 0 ); // set time part to midnight, in order to prevent partial comparison
                                                $diff = $today->diff( $match_date );
                                                $diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval
                                                if($diffDays >= 0 ){ 
                                                    $this->db->select('*');
                                                    $this->db->from('sch_booking');
                                                    $this->db->where('schedule_id',$current_date->sch_id);
                                                    $allCount =  $this->db->get()->result();
                                                    $cust_id = $this->session->userdata('cust_id');
                                                    $this->db->select('*');
                                                    $this->db->from('sch_booking');
                                                    $this->db->where('schedule_id',$current_date->sch_id);
                                                    $this->db->where('user_bas_id',$cust_id);
                                                    $booking_sta = $this->db->get()->result();

                                                        ?>
                                                    
                                               <?php } } ?>


                                               


                                           </div>
                                           <div class="row">
                                            <div id="result"></div>


                                        </div>

                                       </div>
                                   </div>
                               </div>

                           </div>
                           <!--/ User Sidebar -->


                       </div>

                   </div>

               </section>


           </div>
       </div>
   </div>

   <script>
$(document).ready(function() {

$(".branch").on('change', function() {
    var branch = $('#branch').val();
    $.ajax({
    url: "<?php echo base_url(); ?>welcome/schedule_load_by_branch",
    method: "POST",
    data: {
        branch:branch
    },
    success: function(data) {
        
     $('#result').html(data);
       

       
    }
});

});


});

$(document).ready(function() {

    load_data();

     function load_data(query) {
        var user = '<?php $this->session->userdata('cust_id');?>';
        $.ajax({
            url: "<?php echo base_url(); ?>welcome/schedule_load",
            method: "POST",
            data: {
                query: query
            },
            success: function(data) {
              $('#result').html(data);
            
               
                
            }
        })
    }

    $('#search_text').keyup(function() {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        } else {
            load_data();
        }
    });
});
$(document).ready(function() {
   
   $(".buttone").on('click', function() {
     var monthpicker = $('#monthpicker').text();
     var yearpicker = $('#yearpicker').text();

     if(monthpicker =="January"){
        var monthVal = "01";
     }else if(monthpicker =="February"){
        var monthVal = "02";
     }else if(monthpicker =="March"){
        var monthVal = "03";

    }else if(monthpicker =="April"){
        var monthVal = "04";

    }else if(monthpicker =="May"){
        var monthVal = "05";

    }else if(monthpicker =="June"){
        var monthVal = "06";

    }else if(monthpicker =="July"){
        var monthVal = "07";

    }else if(monthpicker =="August"){
        var monthVal = "08";

    }else if(monthpicker =="September"){
        var monthVal = "09";

    }else if(monthpicker =="October"){
        var monthVal = "10";

    }else if(monthpicker =="November"){
        var monthVal = "11";

    }else if(monthpicker =="December"){
        var monthVal = "12";
    }

    console.log("monthVal",monthVal);


    $.ajax({
        url: "<?php echo base_url(); ?>welcome/schedule_load_by_date",
        method: "POST",
        data: {
            year:yearpicker,month:monthVal,
        },
        success: function(data) {
             $('#result').html(data);
            
           // if(user){

           //  }else{
           //      $('#result').html(data);
           //  $('#old_div').hide();

           //  }
        }
    })
        
     // console.log(monthpicker);
     // console.log(yearpicker);
   });
});
   </script>
   <!-- END: Content-->
   <script>
//elements
const container = document.getElementById("container");
//setColor(false);

const datepicker = document.getElementById("datepicker");
const monthpicker = document.getElementById("monthpicker");
const yearpicker = document.getElementById("yearpicker");

const dup = document.getElementById("dup");
const ddown = document.getElementById("ddown");
const mup = document.getElementById("mup");
const mdown = document.getElementById("mdown");
const yup = document.getElementById("yup");
const ydown = document.getElementById("ydown");

//vars
let lastscrollp = 0;
let lasttouchp = 0;

const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];

//set start date
let today = new Date();
let date_now = today.getDate();
let month_now = today.getMonth();
let year_now = today.getFullYear();
console.log(date_now, month_now + 1, year_now);

datepicker.innerHTML = date_now + ".";
monthpicker.innerHTML = months[month_now];
yearpicker.innerHTML = year_now;

//button events
dup.addEventListener("click", (e) => {
    adjustDate(1);
});
ddown.addEventListener("click", (e) => {
    adjustDate(-1);
});

mup.addEventListener("click", (e) => {
    adjustMonth(1);
});
mdown.addEventListener("click", (e) => {
    adjustMonth(-1);
});

yup.addEventListener("click", (e) => {
    adjustYear(1);
});
ydown.addEventListener("click", (e) => {
    adjustYear(-1);
});

//wheel & touch events
datepicker.addEventListener("wheel", (e) => {
    console.log("scroll " + e.deltaY);
    //debug.innerHTML = e.deltaY;

    lastscrollp = lastscrollp + e.deltaY;
    if (lastscrollp > 0 && e.deltaY < 0) {
        lastscrollp = 0;
    }
    if (lastscrollp < 0 && e.deltaY > 0) {
        lastscrollp = 0;
    }
    console.log(lastscrollp);

    if (lastscrollp > 10 || lastscrollp < -10) {
        adjustDate(e.deltaY);
        lastscrollp = 0;
    }
});

datepicker.addEventListener("touchstart", (e) => {
    lasttouchp = e.changedTouches[0].pageY;
});

datepicker.addEventListener("touchmove", (e) => {
    e.preventDefault();
    console.log("touch " + e.changedTouches[0].pageY);
    let diff = e.changedTouches[0].pageY - lasttouchp;
    let updown = 0;
    if (diff > 10) {
        updown = -1;
        lasttouchp = e.changedTouches[0].pageY;
    } else {
        if (diff < -10) {
            updown = 1;
            lasttouchp = e.changedTouches[0].pageY;
        }
    }
    adjustDate(updown);
});

monthpicker.addEventListener("wheel", (e) => {
    console.log("scroll " + e.deltaY);
    //debug.innerHTML = e.deltaY;

    lastscrollp = lastscrollp + e.deltaY;
    if (lastscrollp > 0 && e.deltaY < 0) {
        lastscrollp = 0;
    }
    if (lastscrollp < 0 && e.deltaY > 0) {
        lastscrollp = 0;
    }
    console.log(lastscrollp);

    if (lastscrollp > 10 || lastscrollp < -10) {
        adjustMonth(e.deltaY);
        lastscrollp = 0;
    }
});

monthpicker.addEventListener("mouseout", (e) => {
    setMaxDays();
});

monthpicker.addEventListener("touchstart", (e) => {
    lasttouchp = e.changedTouches[0].pageY;
});

monthpicker.addEventListener("touchmove", (e) => {
    e.preventDefault();
    console.log("touch " + e.changedTouches[0].pageY);
    let diff = e.changedTouches[0].pageY - lasttouchp;
    let updown = 0;
    if (diff > 10) {
        updown = -1;
        lasttouchp = e.changedTouches[0].pageY;
    } else {
        if (diff < -10) {
            updown = 1;
            lasttouchp = e.changedTouches[0].pageY;
        }
    }
    adjustMonth(updown);
});

monthpicker.addEventListener("touchend", (e) => {
    setMaxDays();
});

yearpicker.addEventListener("wheel", (e) => {
    console.log("scroll " + e.deltaY);
    //debug.innerHTML = e.deltaY;

    lastscrollp = lastscrollp + e.deltaY;
    if (lastscrollp > 0 && e.deltaY < 0) {
        lastscrollp = 0;
    }
    if (lastscrollp < 0 && e.deltaY > 0) {
        lastscrollp = 0;
    }
    console.log(lastscrollp);

    if (lastscrollp > 10 || lastscrollp < -10) {
        adjustYear(e.deltaY);
        lastscrollp = 0;
    }
});

yearpicker.addEventListener("mouseout", (e) => {
    setMaxDays();
});

yearpicker.addEventListener("touchstart", (e) => {
    lasttouchp = e.changedTouches[0].pageY;
});

yearpicker.addEventListener("touchmove", (e) => {
    e.preventDefault();
    console.log("touch " + e.changedTouches[0].pageY);
    let diff = e.changedTouches[0].pageY - lasttouchp;
    let updown = 0;
    if (diff > 10) {
        updown = -1;
        lasttouchp = e.changedTouches[0].pageY;
    } else {
        if (diff < -10) {
            updown = 1;
            lasttouchp = e.changedTouches[0].pageY;
        }
    }
    adjustYear(updown);
});

yearpicker.addEventListener("touchend", (e) => {
    setMaxDays();
});


//functions
function adjustDate(v) {
    if (v != 0) {
        let maxdays = new Date(year_now, month_now + 1, 0).getDate();
        if (v > 0) {
            if (date_now === maxdays) {
                date_now = 1;
            } else {
                date_now = date_now + 1;
            }
        } else {
            if (date_now === 1) {
                date_now = maxdays;
            } else {
                date_now = date_now - 1;
            }
        }
        datepicker.innerHTML = date_now + ".";
        window.navigator.vibrate(8);
    }
}

function adjustMonth(v) {
    if (v != 0) {
        if (v > 0) {
            if (month_now === 11) {
                month_now = 0;
            } else {
                month_now = month_now + 1;
            }
        } else {
            if (month_now === 0) {
                month_now = 11;
            } else {
                month_now = month_now - 1;
            }
        }
        monthpicker.innerHTML = months[month_now];
        window.navigator.vibrate(8);
    }
}

function adjustYear(v) {
    if (v != 0) {
        if (v > 0) {
            year_now = year_now + 1;
        } else {
            year_now = year_now - 1;
        }
        if (year_now < 0) {
            yearpicker.innerHTML = year_now * -1 + " BC";
        } else {
            yearpicker.innerHTML = year_now;
        }
        window.navigator.vibrate(8);
        if (year_now === 2020) {
            setColor(true);
        } else {
            setColor(false);
        }
    }
}

function setMaxDays() {
    let maxdays = new Date(year_now, month_now + 1, 0).getDate();
    if (date_now > maxdays) {
        date_now = maxdays;
        datepicker.innerHTML = date_now + ".";
    }
}

function setColor(g) {
    if (g) {
        container.style.setProperty("--c2", "rgba(166, 166, 166, .6)");
        container.style.setProperty("--c3", "rgba(158, 158, 158, 1)");
        container.style.setProperty("--c4", "rgba(125, 125, 125, .5)");
        container.style.setProperty("--c5", "rgba(122, 122, 122, .5)");
    } else {
        container.style.setProperty("--c2", "rgba(241, 91, 181, .6)");
        container.style.setProperty("--c3", "rgba(254, 228, 64, 1)");
        container.style.setProperty("--c4", "rgba(0, 187, 249, .5)");
        container.style.setProperty("--c5", "rgba(0, 245, 212, .5)");
    }
}

//prevent ape-scrolling on iOS
let letTouchMove = false;
container.addEventListener("touchmove", (e) => {
    if (letTouchMove === false) {
        e.preventDefault();
    }
});

const pbox = document.getElementById("pbox");
pbox.addEventListener("touchstart", (e) => {
    letTouchMove = true;
});
pbox.addEventListener("touchend", (e) => {
    letTouchMove = false;
});
   </script>