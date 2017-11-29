<template lang="html">
  <div>
    <center>
    <ul id="clock">
      <li id="hour"></li>
      <li id="min"></li>
      <li id="sec"></li>
    </ul>
  </center>
    <div id="date">
      <center>
      <span id="monthDay">{{ month }}</span>
      <span id="year">{{ year }}</span>
      </center>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      month: 'Jan',
      year: '2018',
    }
  },
  created(){
    // Clock Widget's date and time
    const months = ["Jan", "Feb", "March", "April", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"]
    const now = new Date()
    this.month = months[now.getMonth()]+' '+now.getMonth();
    this.year = now.getFullYear();

    // Clock Widget's Rotation
    $(function() {

          setInterval( function() {
          var seconds = new Date().getSeconds();
          var sdegree = seconds * 6;
          var srotate = "rotate(" + sdegree + "deg)";

          $("#sec").css({ "transform": srotate });

          }, 1000 );

          setInterval( function() {
          var hours = new Date().getHours();
          var mins = new Date().getMinutes();
          var hdegree = hours * 30 + (mins / 2);
          var hrotate = "rotate(" + hdegree + "deg)";

          $("#hour").css({ "transform": hrotate});

          }, 1000 );

          setInterval( function() {
          var mins = new Date().getMinutes();
          var mdegree = mins * 6;
          var mrotate = "rotate(" + mdegree + "deg)";

          $("#min").css({ "transform" : mrotate });

          }, 1000 );

    });
  }
}
</script>

<style lang="css">

#clock {
  padding: 0;
  position: relative;
  list-style: none;
  margin: 0px 0px 0 0;
  height: 234px;
  width: 234px;
  display: block;
  float: auto;
  background: url("/img/clock/clockFace.svg") 5% center no-repeat;
  /*  -webkit-box-shadow: 0px 0px 20px rgba(47, 40, 39, 0.4);  */
}

#sec,
#min,
#hour {
  position: absolute;
  width: 24px;
  height: 234px;
  top: 0px;
  left: 102px;
}

#sec {
  background: url("/img/clock/sec.svg");
  z-index: 3;
}

#min {
  background: url("/img/clock/min.svg");
  z-index: 2;
}

#hour {
  background: url("/img/clock/hour.svg");
  z-index: 1;
}

#date {
  float: auto;
  padding: 0 0px 40px 0;
}
#date #monthDay {
  display: block;
  font-size: 60px;
}
#date #year {
  margin: 0px 0 0 20px;
  display: block;
  text-height: 50%;
  font-size: 36px;
  color: rgba(188, 185, 184, 0.7);
}

</style>
