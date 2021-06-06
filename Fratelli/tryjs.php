<script type="text/javascript">
function act1() {

        if (document.getElementById('phtxt1').value > 7.5) {
        document.getElementById('phtxt2').value = "High";
      }
      else
        if(document.getElementById('phtxt1').value < 6.5){
          document.getElementById('phtxt2').value = "Low";   
        }else
        if((document.getElementById('phtxt1').value==6.5 || document.getElementById('phtxt1').value==7.5) || document.getElementById('phtxt1').value > 6.5 && document.getElementById('phtxt1').value < 7.5){
          document.getElementById('phtxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act2() {

        if (document.getElementById('ectxt1').value >=1.0) {
        document.getElementById('ectxt2').value = "High";
      }
      else
        if(document.getElementById('ectxt1').value < 0){
          document.getElementById('ectxt2').value = "Low";   
        }else
        if(document.getElementById('ectxt1').value < 1.0){
          document.getElementById('ectxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act3() {

        if (document.getElementById('carbontxt1').value > 3.0) {
        document.getElementById('carbontxt2').value = "High";
      }
      else
        if(document.getElementById('carbontxt1').value < 1.01){
          document.getElementById('carbontxt2').value = "Low";   
        }else
        if((document.getElementById('carbontxt1').value==1.01 || document.getElementById('carbontxt1').value==3.0)|| document.getElementById('carbontxt1').value > 1.01 && document.getElementById('carbontxt1').value < 3.0){
          document.getElementById('carbontxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act4() {

        if (document.getElementById('ntxt1').value > 150) {
        document.getElementById('ntxt2').value = "High";
      }
      else
        if(document.getElementById('ntxt1').value < 75){
          document.getElementById('ntxt2').value = "Low";   
        }else
        if((document.getElementById('ntxt1').value==150 || document.getElementById('ntxt1').value==75) || document.getElementById('ntxt1').value > 75 && document.getElementById('ntxt1').value < 150){
          document.getElementById('ntxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act5() {

        if (document.getElementById('ptxt1').value > 20) {
        document.getElementById('ptxt2').value = "High";
      }
      else
        if(document.getElementById('ptxt1').value < 10){
          document.getElementById('ptxt2').value = "Low";   
        }else
        if((document.getElementById('ptxt1').value > 10 || document.getElementById('ptxt1').value < 20) || (document.getElementById('ptxt1').value == 10 || document.getElementById('ptxt1').value == 20)){
          document.getElementById('ptxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act6() {

        if (document.getElementById('ktxt1').value > 200) {
        document.getElementById('ktxt2').value = "High";
      }
      else
        if(document.getElementById('ktxt1').value < 120){
          document.getElementById('ktxt2').value = "Low";   
        }else
        if(document.getElementById('ktxt1').value > 120 && document.getElementById('ktxt1').value < 200 || (document.getElementById('ktxt1').value==120 || document.getElementById('ktxt1').value==200)){
          document.getElementById('ktxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act7() {

        if (document.getElementById('catxt1').value > 4500) {
        document.getElementById('catxt2').value = "High";
      }
      else
        if(document.getElementById('catxt1').value < 1000){
          document.getElementById('catxt2').value = "Low";   
        }else
        if(document.getElementById('catxt1').value > 1000 && document.getElementById('catxt1').value < 4500 || (document.getElementById('catxt1').value == 1000 || document.getElementById('catxt1').value == 4500)){
          document.getElementById('catxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act8() {

        if (document.getElementById('mgtxt1').value > 1000) {
        document.getElementById('mgtxt2').value = "High";
      }
      else
        if(document.getElementById('mgtxt1').value < 500){
          document.getElementById('mgtxt2').value = "Low";   
        }else
        if(document.getElementById('mgtxt1').value > 500 && document.getElementById('mgtxt1').value < 1000 || (document.getElementById('mgtxt1').value == 1000 || document.getElementById('mgtxt1').value == 500)){
          document.getElementById('mgtxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act9() {

        if (document.getElementById('stxt1').value > 20) {
        document.getElementById('stxt2').value = "High";
      }
      else
        if(document.getElementById('stxt1').value < 10){
          document.getElementById('stxt2').value = "Low";   
        }else
        if(document.getElementById('stxt1').value > 10 && document.getElementById('stxt1').value < 20 || (document.getElementById('stxt1').value == 20 || document.getElementById('stxt1').value == 10)){
          document.getElementById('stxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act10() {

        if (document.getElementById('fetxt1').value > 5.0) {
        document.getElementById('fetxt2').value = "High";
      }
      else
        if(document.getElementById('fetxt1').value < 3.0){
          document.getElementById('fetxt2').value = "Low";   
        }else
        if(document.getElementById('fetxt1').value > 3.0 && document.getElementById('fetxt1').value < 5.0 ||
          (document.getElementById('fetxt1').value == 3.0 || document.getElementById('fetxt1').value == 5.0)){
          document.getElementById('fetxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act11() {

        if (document.getElementById('mntxt1').value > 1.0) {
        document.getElementById('mntxt2').value = "High";
      }
      else
        if(document.getElementById('mntxt1').value < 0.6){
          document.getElementById('mntxt2').value = "Low";   
        }else
        if(document.getElementById('mntxt1').value > 0.6 && document.getElementById('mntxt1').value < 1.0 || (document.getElementById('mntxt1').value==0.6 || document.getElementById('mntxt1').value==1.0)){
          document.getElementById('mntxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act12() {

        if (document.getElementById('zntxt1').value > 1.5) {
        document.getElementById('zntxt2').value = "High";
      }
      else
        if(document.getElementById('zntxt1').value < 1.0){
          document.getElementById('zntxt2').value = "Low";   
        }else
        if(document.getElementById('zntxt1').value > 1.0 && document.getElementById('zntxt1').value < 1.5 ||(document.getElementById('zntxt1').value == 1.5 || document.getElementById('zntxt1').value == 1.0)){
          document.getElementById('zntxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act13() {

        if (document.getElementById('cutxt1').value > 0.5) {
        document.getElementById('cutxt2').value = "High";
      }
      else
        if(document.getElementById('cutxt1').value < 0.3){
          document.getElementById('cutxt2').value = "Low";   
        }else
        if(document.getElementById('cutxt1').value > 0.3 && document.getElementById('cutxt1').value < 0.5 || (document.getElementById('cutxt1').value == 0.3 || document.getElementById('cutxt1').value == 0.5)){
          document.getElementById('cutxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act14() {

        if (document.getElementById('btxt1').value > 0.5) {
        document.getElementById('btxt2').value = "High";
      }
      else
        if(document.getElementById('btxt1').value < 0){
          document.getElementById('btxt2').value = "Low";   
        }else
        if(document.getElementById('btxt1').value > 0 && document.getElementById('btxt1').value < 0.5 || (document.getElementById('btxt1').value == 0.5 || document.getElementById('btxt1').value == 0)){
          document.getElementById('btxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act15() {

        if (document.getElementById('motxt1').value > 0.5) {
        document.getElementById('motxt2').value = "High";
      }
      else
        if(document.getElementById('motxt1').value < 0){
          document.getElementById('motxt2').value = "Low";   
        }else
        if(document.getElementById('motxt1').value > 0 && document.getElementById('motxt1').value < 0.5 || (document.getElementById('btxt1').value == 0.5 || document.getElementById('btxt1').value == 0)){
          document.getElementById('motxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act16() {

        if (document.getElementById('natxt1').value >= 350) {
        document.getElementById('natxt2').value = "High";
      }
      else
        if(document.getElementById('natxt1').value < 0){
          document.getElementById('natxt2').value = "Low";   
        }else
        if(document.getElementById('natxt1').value <350){
          document.getElementById('natxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act17() {

        if (document.getElementById('cltxt1').value >= 350) {
        document.getElementById('cltxt2').value = "High";
      }
      else
        if(document.getElementById('cltxt1').value < 0){
          document.getElementById('cltxt2').value = "Low";   
        }else
        if(document.getElementById('cltxt1').value <350){
          document.getElementById('cltxt2').value ="Optimal";
        }
}
</script>
<script type="text/javascript">
function act18() {

        if (document.getElementById('caco3txt1').value >= 3) {
        document.getElementById('caco3txt2').value = "High";
      }
      else
        if(document.getElementById('caco3txt1').value < 0){
          document.getElementById('caco3txt2').value = "Low";   
        }else
        if(document.getElementById('caco3txt1').value < 3){
          document.getElementById('caco3txt2').value ="Optimal";
        }
}
</script>
