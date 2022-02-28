<?php
defined('_JEXEC') || die('Resctriced access');
use Joomla\CMS\HTML\HTMLHelper;
?>

<style>
/* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}*/


.slideshow-container {
  /*max-width: 770px;*/
  position: relative;
  text-align: center;
  /*max-height: 400px;*/
  font-size: 14px;
  font-weight: normal;
}


.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: black;
  /*font-weight: bold;*/
  font-size: 12px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;

}


.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

.prev{
  left: 0;
}


.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}




.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.activeActive, .dot:hover {
  background-color: #717171;
}

.icon{
    width: 6%;
    height: 6%;
    margin-left: auto;
    margin-right: auto;
}




@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
<div class="slideshow-container">
<?php
    $konwersja['Monday'] = 'poniedziałek';
    $konwersja['Tuesday'] = 'wtorek';
    $konwersja['Wednesday'] = 'środa';
    $konwersja['Thursday'] = 'czwartek';
    $konwersja['Friday'] = 'piątek';
    $konwersja['Saturday'] = 'sobota';
    $konwersja['Sunday'] = 'niedziela';
    echo "<b>"."Pogoda dla miasta " . $address."</b><br>";
    $dzien = (date("Y-m-d"));
    foreach($value["daily"] as $day){
        echo "<div class=".'"'."mySlides".'"'.">";
            echo "<b>Dzień: ".$konwersja[date('l', strtotime($dzien))]." ".$dzien."".""."</b><br>";
            switch ($day["weather"][0]["description"]) {
                case "słabe opady śniegu":
                    echo "<img src='/images/pogoda/snowy2.png' class=".'"'."icon".'"'."/>";
                    echo "<b>"."słabe opady śniegu </b><br>";
                    break;
                case "zachmurzenie duże":
                    echo "<img src='/images/pogoda/cloudybig.png' class=".'"'."icon".'"'."/>";
                    echo "<b>zachmurzenie duże</b><br>";
                    break;
                case "bezchmurnie":
                    echo "<img src='/images/pogoda/sun.png' class=".'"'."icon".'"'."/>";
                    echo "<b>bezchmurnie</b><br>";
                    break;
                case "opady śniegu":
                    echo "<img src='/images/pogoda/snowy.png' class=".'"'."icon".'"'."/>";
                    echo "<b>opady śniegu </b><br>";
                    break;
                case "śnieg z deszczem":
                    echo "<img src='/images/pogoda/mrainy.png' class=".'"'."icon".'"'."/>";
                    echo "<b>śnieg z deszczem </b><br>";
                    break;
                case "słabe opady deszczu":
                    echo "<img src='/images/pogoda/cloudy2.png' class=".'"'."icon".'"'."/>";
                    echo "<b>słabe opady deszczu</b><br>";
                    break;
                case "umiarkowane opady deszczu":
                    echo "<img src='/images/pogoda/mrainy.png' class=".'"'."icon".'"'."/>";
                    echo "<b>umiarkowane opady deszczu</b><br>";
                    break;
                case "zachmurzenie umiarkowane":
                    echo "<img src='/images/pogoda/cloud.png' class=".'"'."icon".'"'."/>";
                    echo "<b>zachmurzenie umiarkowane</b>";
                    break;
                case "zachmurzenie małe":
                    echo "<img src='/images/pogoda/cloudy.png' class=".'"'."icon".'"'."/>";
                    echo "<b>zachmurzenie małe</b>";
                    break;
                case "pochmurnie":
                    echo "<img src='/images/pogoda/cloudylow.png' class=".'"'."icon".'"'."/>";
                    echo "<b>pochmurnie</b>";
                    break;
                default:
                    echo "<b>".($day["weather"][0]["description"]). "</b><br>";
            }
            echo "<img src='/images/pogoda/avg.png' class=".'"'."icon".'"'."/>";
            echo "<b>".round(($day["temp"]["day"])-273.15,2)." °C"."</b>";
            echo "<img src='/images/pogoda/min.png' class=".'"'."icon".'"'."/>";
            echo "<b>".round(($day["temp"]["min"])-273.15,2)." °C"."</b>";
            echo "<img src='/images/pogoda/max.png' class=".'"'."icon".'"'."/>";
            echo "<b>".round(($day["temp"]["max"])-273.15,2)." °C"."</b>";
            echo "<img src='/images/pogoda/humidity.png' class=".'"'."icon".'"'."/>";
            echo "<b>".($day["humidity"]). " % </b><br>";
            echo "<img src='/images/pogoda/windy.png' class=".'"'."icon".'"'."/>";
            echo "<b>".($day["wind_speed"]). " km/h </b>";
        //https://www.flaticon.com/packs/weather-161
        echo "</div>";
        $dzien = date('Y-m-d', strtotime($dzien. ' + 1 days'));
    }
    ?>
  
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>


<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
  <span class="dot" onclick="currentSlide(6)"></span>
  <span class="dot" onclick="currentSlide(7)"></span>
  <span class="dot" onclick="currentSlide(8)"></span>
</div>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" activeActive", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " activeActive";
}
</script>