<script type="text/javascript">

      function act1() {

        if(document.getElementById('txtleaf').value=='april')
        {
              if (document.getElementById('txtn1').value > 1.61) {
              document.getElementById('txtn2').value = "High";
              }
              else
              if(document.getElementById('txtn1').value < 0.91)
              {
              document.getElementById('txtn2').value = "Low";   
              }else
              if(document.getElementById('txtn1').value==0.91  || document.getElementById('txtn1').value==1.61 || (document.getElementById('txtn1').value < 1.61 && document.getElementById('txtn1').value > 0.91)){
              document.getElementById('txtn2').value ="Optimal";
              }
        }
        else if(document.getElementById('txtleaf').value=='recut')
        {
              if (document.getElementById('txtn1').value > 1.60) {
              document.getElementById('txtn2').value = "High";
              }
              else
              if(document.getElementById('txtn1').value < 0.91)
              {
              document.getElementById('txtn2').value = "Low";   
              }else
              if(document.getElementById('txtn1').value==0.91  || document.getElementById('txtn1').value==1.60 ||(document.getElementById('txtn1').value < 1.60 && document.getElementById('txtn1').value > 0.91)){
              document.getElementById('txtn2').value ="Optimal";
              }
        }
        else if(document.getElementById('txtleaf').value=='prebloom')
        {
              if (document.getElementById('txtn1').value > 1.61) {
              document.getElementById('txtn2').value = "High";
              }
              else
              if(document.getElementById('txtn1').value < 1.01)
              {
              document.getElementById('txtn2').value = "Low";   
              }else
              if(document.getElementById('txtn1').value==1.61  || document.getElementById('txtn1').value==1.01 ||(document.getElementById('txtn1').value < 1.61 && document.getElementById('txtn1').value > 1.01)){
              document.getElementById('txtn2').value ="Optimal";
              }
        }else 
        if(document.getElementById('txtleaf').value=='bloom')
        {
              if (document.getElementById('txtn1').value > 1.21) {
              document.getElementById('txtn2').value = "High";
              }
              else
              if(document.getElementById('txtn1').value < 1.01)
              {
              document.getElementById('txtn2').value = "Low";   
              }else
              if(document.getElementById('txtn1').value==1.21  || document.getElementById('txtn1').value==1.01 ||(document.getElementById('txtn1').value < 1.21 && document.getElementById('txtn1').value > 1.01)){
              document.getElementById('txtn2').value ="Optimal";
              }
        }else 
        if(document.getElementById('txtleaf').value=='berry development')
        {
              if (document.getElementById('txtn1').value > 2.21) {
              document.getElementById('txtn2').value = "High";
              }
              else
              if(document.getElementById('txtn1').value < 1.51)
              {
              document.getElementById('txtn2').value = "Low";   
              }else
              if(document.getElementById('txtn1').value==2.21  || document.getElementById('txtn1').value==1.51 ||(document.getElementById('txtn1').value < 2.21 && document.getElementById('txtn1').value > 1.51)){
              document.getElementById('txtn2').value ="Optimal";
              }
        }else 
        if(document.getElementById('txtleaf').value=='verasain')
        {
              if (document.getElementById('txtn1').value > 1.51) {
              document.getElementById('txtn2').value = "High";
              }
              else
              if(document.getElementById('txtn1').value < 0.91)
              {
              document.getElementById('txtn2').value = "Low";   
              }else
              if(document.getElementById('txtn1').value==1.51  || document.getElementById('txtn1').value==0.91 ||(document.getElementById('txtn1').value < 1.51 && document.getElementById('txtn1').value > 0.91)){
              document.getElementById('txtn2').value ="Optimal";
              }
        }else 
        if(document.getElementById('txtleaf').value=='post harvest')
        {
              if (document.getElementById('txtn1').value > 1.21) {
              document.getElementById('txtn2').value = "High";
              }
              else
              if(document.getElementById('txtn1').value < 0.91)
              {
              document.getElementById('txtn2').value = "Low";   
              }else
              if(document.getElementById('txtn1').value==1.21  || document.getElementById('txtn1').value==0.91 || (document.getElementById('txtn1').value < 1.21 && document.getElementById('txtn1').value > 0.91)){
              document.getElementById('txtn2').value ="Optimal";
              }
        }
  }

</script>
<script type="text/javascript">
function act2() {
        if(document.getElementById('txtleaf').value=='april' || document.getElementById('txtleaf').value=='recut' || document.getElementById('txtleaf').value=='prebloom' || document.getElementById('txtleaf').value=='post harvest')
        {
                if (document.getElementById('no3ntxt1').value > 1200) {
                document.getElementById('no3ntxt2').value = "High";
                }
                else
                if(document.getElementById('no3ntxt1').value < 700){
                  document.getElementById('no3ntxt2').value = "Low";   
                }else
                if(document.getElementById('no3ntxt1').value== 1200 || document.getElementById('no3ntxt1').value== 700 || (document.getElementById('no3ntxt1').value < 1200 && document.getElementById('no3ntxt1').value > 700)){
                  document.getElementById('no3ntxt2').value ="Optimal";
                }
        }else
          if(document.getElementById('txtleaf').value=='bloom' || document.getElementById('txtleaf').value=='berry development')
        {
                if (document.getElementById('no3ntxt1').value > 1000) {
                document.getElementById('no3ntxt2').value = "High";
                }
                else
                if(document.getElementById('no3ntxt1').value < 700){
                  document.getElementById('no3ntxt2').value = "Low";   
                }else
                if(document.getElementById('no3ntxt1').value== 1000 || document.getElementById('no3ntxt1').value== 700 || (document.getElementById('no3ntxt1').value < 1000 && document.getElementById('no3ntxt1').value > 700)){
                  document.getElementById('no3ntxt2').value ="Optimal";
                }
          } else
          if(document.getElementById('txtleaf').value=='verasain')
        {
                if (document.getElementById('no3ntxt1').value > 700) {
                document.getElementById('no3ntxt2').value = "High";
                }
                else
                if(document.getElementById('no3ntxt1').value < 400){
                  document.getElementById('no3ntxt2').value = "Low";   
                }else
                if(document.getElementById('no3ntxt1').value== 700 || document.getElementById('no3ntxt1').value== 400 || (document.getElementById('no3ntxt1').value < 700 && document.getElementById('no3ntxt1').value > 400)){
                  document.getElementById('no3ntxt2').value ="Optimal";
                }
          }
  }
</script>
<script type="text/javascript">
function act3() {
  if(document.getElementById('txtleaf').value=='april' || document.getElementById('txtleaf').value=='recut' || document.getElementById('txtleaf').value=='berry development' || document.getElementById('txtleaf').value=='post harvest')
    {
              if (document.getElementById('nh4ntxt1').value > 700) {
              document.getElementById('nh4ntxt2').value = "High";
            }
            else
              if(document.getElementById('nh4ntxt1').value < 400){
                document.getElementById('nh4ntxt2').value = "Low";   
              }else
              if(document.getElementById('nh4ntxt1').value == 700 || document.getElementById('nh4ntxt1').value == 400 || (document.getElementById('nh4ntxt1').value < 700 && document.getElementById('nh4ntxt1').value > 400)){
                document.getElementById('nh4ntxt2').value ="Optimal";
              }
    } else
    if(document.getElementById('txtleaf').value=='prebloom')
    {

             if (document.getElementById('nh4ntxt1').value > 1000) {
              document.getElementById('nh4ntxt2').value = "High";
            }
            else
              if(document.getElementById('nh4ntxt1').value < 700){
                document.getElementById('nh4ntxt2').value = "Low";   
              }else
              if(document.getElementById('nh4ntxt1').value == 700 || document.getElementById('nh4ntxt1').value == 1000 || (document.getElementById('nh4ntxt1').value < 1000 && document.getElementById('nh4ntxt1').value > 700)){
                document.getElementById('nh4ntxt2').value ="Optimal";
              }
    }
     else
    if(document.getElementById('txtleaf').value=='bloom' || document.getElementById('txtleaf').value=='verasain')
    {

             if (document.getElementById('nh4ntxt1').value > 600) {
              document.getElementById('nh4ntxt2').value = "High";
            }
            else
              if(document.getElementById('nh4ntxt1').value < 300){
                document.getElementById('nh4ntxt2').value = "Low";   
              }else
              if(document.getElementById('nh4ntxt1').value == 600 || document.getElementById('nh4ntxt1').value == 300 || (document.getElementById('nh4ntxt1').value < 600 && document.getElementById('nh4ntxt1').value > 300)){
                document.getElementById('nh4ntxt2').value ="Optimal";
              }
    }
  }
</script>
<script type="text/javascript">
function act4() {
          if(document.getElementById('txtleaf').value=='april')
          {
                  if (document.getElementById('ptxt1').value > 0.51) {
                    document.getElementById('ptxt2').value = "High";
                  }
                  else
                    if(document.getElementById('ptxt1').value < 0.21){
                      document.getElementById('ptxt2').value = "Low";   
                    }else
                    if(document.getElementById('ptxt1').value==0.51 || document.getElementById('ptxt1').value==0.21 || (document.getElementById('ptxt1').value < 0.51 && document.getElementById('ptxt1').value > 0.21)){
                      document.getElementById('ptxt2').value ="Optimal";
                    }
        }
        else 
         if(document.getElementById('txtleaf').value=='recut')
        {
                  if (document.getElementById('ptxt1').value > 0.5) {
                    document.getElementById('ptxt2').value = "High";
                  }
                  else
                    if(document.getElementById('ptxt1').value < 0.2){
                      document.getElementById('ptxt2').value = "Low";   
                    }else
                    if(document.getElementById('ptxt1').value==0.5 || document.getElementById('ptxt1').value==0.2 || (document.getElementById('ptxt1').value < 0.5 && document.getElementById('ptxt1').value > 0.2)){
                      document.getElementById('ptxt2').value ="Optimal";
                    }
        }     else 
         if(document.getElementById('txtleaf').value=='prebloom')
        {
                  if (document.getElementById('ptxt1').value > 0.51) {
                    document.getElementById('ptxt2').value = "High";
                  }
                  else
                    if(document.getElementById('ptxt1').value < 0.25){
                      document.getElementById('ptxt2').value = "Low";   
                    }else
                    if(document.getElementById('ptxt1').value==0.51 || document.getElementById('ptxt1').value==0.25 || (document.getElementById('ptxt1').value < 0.51 && document.getElementById('ptxt1').value > 0.25)){
                      document.getElementById('ptxt2').value ="Optimal";
                    }
        }     else 
         if(document.getElementById('txtleaf').value=='bloom' || document.getElementById('txtleaf').value=='berry development')
        {
                  if (document.getElementById('ptxt1').value > 0.51) {
                    document.getElementById('ptxt2').value = "High";
                  }
                  else
                    if(document.getElementById('ptxt1').value < 0.31){
                      document.getElementById('ptxt2').value = "Low";   
                    }else
                    if(document.getElementById('ptxt1').value==0.51 || document.getElementById('ptxt1').value==0.31 || (document.getElementById('ptxt1').value < 0.51 && document.getElementById('ptxt1').value > 0.31)){
                      document.getElementById('ptxt2').value ="Optimal";
                    }
        } else 
         if(document.getElementById('txtleaf').value=='verasain')
        {
                  if (document.getElementById('ptxt1').value > 0.40) {
                    document.getElementById('ptxt2').value = "High";
                  }
                  else
                    if(document.getElementById('ptxt1').value < 0.16){
                      document.getElementById('ptxt2').value = "Low";   
                    }else
                    if(document.getElementById('ptxt1').value==0.40 || document.getElementById('ptxt1').value==0.16 || (document.getElementById('ptxt1').value < 0.40 && document.getElementById('ptxt1').value > 0.16)){
                      document.getElementById('ptxt2').value ="Optimal";
                    }
        }     else 
         if(document.getElementById('txtleaf').value=='post harvest')
        {
                  if (document.getElementById('ptxt1').value > 0.41) {
                    document.getElementById('ptxt2').value = "High";
                  }
                  else
                    if(document.getElementById('ptxt1').value < 0.15){
                      document.getElementById('ptxt2').value = "Low";   
                    }else
                    if(document.getElementById('ptxt1').value==0.41 || document.getElementById('ptxt1').value==0.15 || (document.getElementById('ptxt1').value < 0.41 && document.getElementById('ptxt1').value > 0.15)){
                      document.getElementById('ptxt2').value ="Optimal";
                    }
        }    
      
  }
</script>
<script type="text/javascript">
function act5() {
       if(document.getElementById('txtleaf').value=='april')
         {

                 if (document.getElementById('ktxt1').value > 2.51) {
                  document.getElementById('ktxt2').value = "High";
               }
              else
                if(document.getElementById('ktxt1').value < 1.21){
                  document.getElementById('ktxt2').value = "Low";   
                 }else
                 if(document.getElementById('ktxt1').value == 2.51 ||document.getElementById('ktxt1').value == 1.21 || (document.getElementById('ktxt1').value < 2.51 && document.getElementById('ktxt1').value > 1.21)){
                   document.getElementById('ktxt2').value ="Optimal";
                 }
         }
         else
         if(document.getElementById('txtleaf').value=='recut')
         {
                if (document.getElementById('ktxt1').value > 2.5) {
                document.getElementById('ktxt2').value = "High";
              }
              else
                 if(document.getElementById('ktxt1').value < 1.2){
                   document.getElementById('ktxt2').value = "Low";   
                 }else
                 if(document.getElementById('ktxt1').value == 2.5 ||document.getElementById('ktxt1').value == 1.2 || (document.getElementById('ktxt1').value < 2.5 && document.getElementById('ktxt1').value > 1.2)){
                   document.getElementById('ktxt2').value ="Optimal";
                 }
       }
      else
         if(document.getElementById('txtleaf').value=='prebloom')
        {
                if (document.getElementById('ktxt1').value > 3.01) {
                document.getElementById('ktxt2').value = "High";
              }
              else
                if(document.getElementById('ktxt1').value < 1.51){
                  document.getElementById('ktxt2').value = "Low";   
                }else
                if(document.getElementById('ktxt1').value == 3.01 ||document.getElementById('ktxt1').value == 1.51 || (document.getElementById('ktxt1').value < 3.01 && document.getElementById('ktxt1').value > 1.51)){
                  document.getElementById('ktxt2').value ="Optimal";
                }
        }else
        if(document.getElementById('txtleaf').value=='bloom')
        {
                if (document.getElementById('ktxt1').value > 2.51) {
                document.getElementById('ktxt2').value = "High";
              }
              else
                if(document.getElementById('ktxt1').value < 1.51){
                  document.getElementById('ktxt2').value = "Low";   
                }else
                if(document.getElementById('ktxt1').value == 2.51 ||document.getElementById('ktxt1').value == 1.51 || (document.getElementById('ktxt1').value < 2.51 && document.getElementById('ktxt1').value > 1.51)){
                  document.getElementById('ktxt2').value ="Optimal";
                }
        }else
         if(document.getElementById('txtleaf').value=='berry development')
        {
                if (document.getElementById('ktxt1').value > 2.01) {
                document.getElementById('ktxt2').value = "High";
              }
              else
                if(document.getElementById('ktxt1').value < 1.51){
                  document.getElementById('ktxt2').value = "Low";   
                }else
                if(document.getElementById('ktxt1').value == 2.01 ||document.getElementById('ktxt1').value == 1.51 ||(document.getElementById('ktxt1').value < 2.01 && document.getElementById('ktxt1').value > 1.51)){
                  document.getElementById('ktxt2').value ="Optimal";
                }
        }else
         if(document.getElementById('txtleaf').value=='verasain')
        {
                if (document.getElementById('ktxt1').value > 2.51) {
                document.getElementById('ktxt2').value = "High";
              }
              else
                if(document.getElementById('ktxt1').value < 2.01){
                  document.getElementById('ktxt2').value = "Low";   
                }else
                if(document.getElementById('ktxt1').value == 2.51 ||document.getElementById('ktxt1').value == 2.01 || (document.getElementById('ktxt1').value < 2.51 && document.getElementById('ktxt1').value > 2.01)){
                  document.getElementById('ktxt2').value ="Optimal";
                }
        }else
        if(document.getElementById('txtleaf').value=='post harvest')
        {
                if (document.getElementById('ktxt1').value > 2.01) {
                document.getElementById('ktxt2').value = "High";
              }
              else
                if(document.getElementById('ktxt1').value < 1.61){
                  document.getElementById('ktxt2').value = "Low";   
                }else
                if(document.getElementById('ktxt1').value == 2.01 ||document.getElementById('ktxt1').value == 1.61 || (document.getElementById('ktxt1').value < 2.01 && document.getElementById('ktxt1').value > 1.61)){
                  document.getElementById('ktxt2').value ="Optimal";
                }
        }
      }
</script>

<script type="text/javascript">
function act6() {
    if(document.getElementById('txtleaf').value=='april' || document.getElementById('txtleaf').value=='verasain')
        {
              if (document.getElementById('catxt1').value > 2.51) {
              document.getElementById('catxt2').value = "High";
            }
            else
              if(document.getElementById('catxt1').value < 1.51){
                document.getElementById('catxt2').value = "Low";   
              }else
              if(document.getElementById('catxt1').value == 2.51 || document.getElementById('catxt1').value == 1.51 ||  (document.getElementById('catxt1').value < 2.51 && document.getElementById('catxt1').value > 1.51)){
                document.getElementById('catxt2').value ="Optimal";
              }
         }else
        if(document.getElementById('txtleaf').value=='recut')
        {
              if (document.getElementById('catxt1').value > 2.50) {
              document.getElementById('catxt2').value = "High";
            }
            else
              if(document.getElementById('catxt1').value < 1.0){
                document.getElementById('catxt2').value = "Low";   
              }else
              if(document.getElementById('catxt1').value < 2.50 && document.getElementById('catxt1').value > 1.0 || (document.getElementById('catxt1').value == 2.50 || document.getElementById('catxt1').value == 1.0)){
                document.getElementById('catxt2').value ="Optimal";
              }
        }else 
        if(document.getElementById('txtleaf').value=='prebloom')
        {
              if (document.getElementById('catxt1').value > 1.2) {
              document.getElementById('catxt2').value = "High";
            }
            else
              if(document.getElementById('catxt1').value < 0.80){
                document.getElementById('catxt2').value = "Low";   
              }else
              if(document.getElementById('catxt1').value == 1.2|| document.getElementById('catxt1').value == 0.80 || (document.getElementById('catxt1').value < 1.2 && document.getElementById('catxt1').value > 0.80)){
                document.getElementById('catxt2').value ="Optimal";
              }
        }else 
        if(document.getElementById('txtleaf').value=='bloom')
        {
              if (document.getElementById('catxt1').value > 1.51) {
              document.getElementById('catxt2').value = "High";
            }
            else
              if(document.getElementById('catxt1').value < 0.81){
                document.getElementById('catxt2').value = "Low";   
              }else
              if(document.getElementById('catxt1').value < 1.51 && document.getElementById('catxt1').value > 0.81 || (document.getElementById('catxt1').value == 1.51 || document.getElementById('catxt1').value == 0.81)){
                document.getElementById('catxt2').value ="Optimal";
              }
        }else 
        if(document.getElementById('txtleaf').value=='berry development')
        {
              if (document.getElementById('catxt1').value > 2.21) {
              document.getElementById('catxt2').value = "High";
            }
            else
              if(document.getElementById('catxt1').value < 1.51){
                document.getElementById('catxt2').value = "Low";   
              }else
              if(document.getElementById('catxt1').value < 2.21 && document.getElementById('catxt1').value > 1.51 || (document.getElementById('catxt1').value == 1.51 || document.getElementById('catxt1').value == 2.21)){
                document.getElementById('catxt2').value ="Optimal";
              }
        }else 
        if(document.getElementById('txtleaf').value=='post harvest')
        {
              if (document.getElementById('catxt1').value > 3.01) {
              document.getElementById('catxt2').value = "High";
            }
            else
              if(document.getElementById('catxt1').value < 2.01){
                document.getElementById('catxt2').value = "Low";   
              }else
              if(document.getElementById('catxt1').value < 3.01 && document.getElementById('catxt1').value > 2.01 ||(document.getElementById('catxt1').value == 3.01 || document.getElementById('catxt1').value == 2.01)){
                document.getElementById('catxt2').value ="Optimal";
              }
        }
        
  }
</script>
<script type="text/javascript">
function act7() {
    if(document.getElementById('txtleaf').value=='april' || document.getElementById('txtleaf').value=='berry development' || document.getElementById('txtleaf').value=='verasain')
        {
              if (document.getElementById('mgtxt1').value > 0.61) {
                document.getElementById('mgtxt2').value = "High";
              }
              else
                if(document.getElementById('mgtxt1').value < 0.31){
                  document.getElementById('mgtxt2').value = "Low";   
                }else
                if(document.getElementById('mgtxt1').value < 0.61 && document.getElementById('mgtxt1').value > 0.31 ||(document.getElementById('mgtxt1').value == 0.61 || document.getElementById('mgtxt1').value == 0.31)){
                  document.getElementById('mgtxt2').value ="Optimal";
                }
        }else
        if(document.getElementById('txtleaf').value=='recut')
        {
              if (document.getElementById('mgtxt1').value > 0.6) {
                document.getElementById('mgtxt2').value = "High";
              }
              else
                if(document.getElementById('mgtxt1').value < 0.3){
                  document.getElementById('mgtxt2').value = "Low";   
                }else
                if(document.getElementById('mgtxt1').value < 0.6 && document.getElementById('mgtxt1').value > 0.3 || (document.getElementById('mgtxt1').value == 0.6 || document.getElementById('mgtxt1').value == 0.3)){
                  document.getElementById('mgtxt2').value ="Optimal";
                }
        } else
        if(document.getElementById('txtleaf').value=='prebloom' || document.getElementById('txtleaf').value=='bloom')
        {
              if (document.getElementById('mgtxt1').value > 0.51) {
                document.getElementById('mgtxt2').value = "High";
              }
              else
                if(document.getElementById('mgtxt1').value < 0.25){
                  document.getElementById('mgtxt2').value = "Low";   
                }else
                if(document.getElementById('mgtxt1').value < 0.51 && document.getElementById('mgtxt1').value > 0.25 || (document.getElementById('mgtxt1').value == 0.51 || document.getElementById('mgtxt1').value == 0.25)){
                  document.getElementById('mgtxt2').value ="Optimal";
                }
        } else 
        if(document.getElementById('txtleaf').value=='post harvest')
        {
              if (document.getElementById('mgtxt1').value > 0.61) {
                document.getElementById('mgtxt2').value = "High";
              }
              else
                if(document.getElementById('mgtxt1').value < 0.41){
                  document.getElementById('mgtxt2').value = "Low";   
                }else
                if(document.getElementById('mgtxt1').value < 0.61 && document.getElementById('mgtxt1').value > 0.41 || (document.getElementById('mgtxt1').value == 0.61 || document.getElementById('mgtxt1').value == 0.41)){
                  document.getElementById('mgtxt2').value ="Optimal";
                }
        }
  }
</script>
<script type="text/javascript">
function act8() {
    if(document.getElementById('txtleaf').value=='recut')
    {
                if (document.getElementById('stxt1').value > 0.60) {
                document.getElementById('stxt2').value = "High";
              }
              else
                if(document.getElementById('stxt1').value < 0.21){
                  document.getElementById('stxt2').value = "Low";   
                }else
                if(document.getElementById('stxt1').value < 0.60 && document.getElementById('stxt1').value > 0.21 || (document.getElementById('stxt1').value == 0.60 || document.getElementById('stxt1').value == 0.21)){
                  document.getElementById('stxt2').value ="Optimal";
                }
     } else 
     if(document.getElementById('txtleaf').value=='april' || document.getElementById('txtleaf').value=='prebloom' || document.getElementById('txtleaf').value=='bloom' || document.getElementById('txtleaf').value=='berry development' || document.getElementById('txtleaf').value=='verasain')
    {
                if (document.getElementById('stxt1').value > 0.51) {
                document.getElementById('stxt2').value = "High";
              }
              else
                if(document.getElementById('stxt1').value < 0.15){
                  document.getElementById('stxt2').value = "Low";   
                }else
                if(document.getElementById('stxt1').value < 0.51 && document.getElementById('stxt1').value > 0.15 || (document.getElementById('stxt1').value == 0.51 || document.getElementById('stxt1').value == 0.15)){
                  document.getElementById('stxt2').value ="Optimal";
                }
    } else
    if(document.getElementById('txtleaf').value=='post harvest')
    {
                if (document.getElementById('stxt1').value > 0.61) {
                document.getElementById('stxt2').value = "High";
              }
              else
                if(document.getElementById('stxt1').value < 0.21){
                  document.getElementById('stxt2').value = "Low";   
                }else
                if(document.getElementById('stxt1').value < 0.61 && document.getElementById('stxt1').value > 0.21 || (document.getElementById('stxt1').value == 0.61 || document.getElementById('stxt1').value == 0.21)){
                  document.getElementById('stxt2').value ="Optimal";
                }
     }

  }
</script>
<script type="text/javascript">
function act9() {
  if(document.getElementById('txtleaf').value=='april' || document.getElementById('txtleaf').value=='prebloom' || document.getElementById('txtleaf').value=='bloom' || document.getElementById('txtleaf').value=='recut' || document.getElementById('txtleaf').value=='berry development' || document.getElementById('txtleaf').value=='verasain')
    {
    
                if (document.getElementById('fetxt1').value > 120) {
                document.getElementById('fetxt2').value = "High";
              }
              else
                if(document.getElementById('fetxt1').value < 80){
                  document.getElementById('fetxt2').value = "Low";   
                }else
                if(document.getElementById('fetxt1').value < 120 && document.getElementById('fetxt1').value > 80 || (document.getElementById('fetxt1').value == 120 || document.getElementById('fetxt1').value == 80)){
                  document.getElementById('fetxt2').value ="Optimal";
                }
      } else 
      if(document.getElementById('txtleaf').value=='post harvest')
    {
    
                if (document.getElementById('fetxt1').value > 120) {
                document.getElementById('fetxt2').value = "High";
              }
              else
                if(document.getElementById('fetxt1').value < 40){
                  document.getElementById('fetxt2').value = "Low";   
                }else
                if(document.getElementById('fetxt1').value < 120 && document.getElementById('fetxt1').value > 40 || (document.getElementById('fetxt1').value == 120 || document.getElementById('fetxt1').value == 40)){
                  document.getElementById('fetxt2').value ="Optimal";
                }
      }
  

  }
</script>
<script type="text/javascript">
function act10() {
        if(document.getElementById('txtleaf').value=='april' || document.getElementById('txtleaf').value=='recut')
        {
       
              if (document.getElementById('mntxt1').value > 100) {
              document.getElementById('mntxt2').value = "High";
              }
              else
              if(document.getElementById('mntxt1').value < 25){
              document.getElementById('mntxt2').value = "Low";   
              }else
              if(document.getElementById('mntxt1').value < 100 && document.getElementById('mntxt1').value > 25 || (document.getElementById('mntxt1').value == 100 || document.getElementById('mntxt1').value == 25)){
              document.getElementById('mntxt2').value ="Optimal";
             }
      }
      else   if(document.getElementById('txtleaf').value=='prebloom' || document.getElementById('txtleaf').value=='bloom' || document.getElementById('txtleaf').value=='berry development' || document.getElementById('txtleaf').value=='verasain')
        {
       
              if (document.getElementById('mntxt1').value > 100) {
              document.getElementById('mntxt2').value = "High";
              }
              else
              if(document.getElementById('mntxt1').value < 40){
              document.getElementById('mntxt2').value = "Low";   
              }else
              if(document.getElementById('mntxt1').value < 100 && document.getElementById('mntxt1').value > 40 || (document.getElementById('mntxt1').value == 100 || document.getElementById('mntxt1').value == 40)){
              document.getElementById('mntxt2').value ="Optimal";
             }
      }
      else
        if(document.getElementById('txtleaf').value=='post harvest')
        {
       
              if (document.getElementById('mntxt1').value > 150) {
              document.getElementById('mntxt2').value = "High";
              }
              else
              if(document.getElementById('mntxt1').value < 40){
              document.getElementById('mntxt2').value = "Low";   
              }else
              if(document.getElementById('mntxt1').value < 150 && document.getElementById('mntxt1').value > 40 || (document.getElementById('mntxt1').value == 150 || document.getElementById('mntxt1').value == 40)){
              document.getElementById('mntxt2').value ="Optimal";
             }
      }
  }
</script>
<script type="text/javascript">
function act11() {
    if(document.getElementById('txtleaf').value=='april'|| document.getElementById('txtleaf').value=='recut')
        {

              if (document.getElementById('zntxt1').value > 50) {
              document.getElementById('zntxt2').value = "High";
            }
            else
              if(document.getElementById('zntxt1').value < 20){
                document.getElementById('zntxt2').value = "Low";   
              }else
              if(document.getElementById('zntxt1').value < 50 && document.getElementById('zntxt1').value > 20 || (document.getElementById('zntxt1').value == 50 || document.getElementById('zntxt1').value == 20)){
                document.getElementById('zntxt2').value ="Optimal";
              }
        }else 
         if(document.getElementById('txtleaf').value=='prebloom'|| document.getElementById('txtleaf').value=='berry development')
        {

              if (document.getElementById('zntxt1').value > 80) {
              document.getElementById('zntxt2').value = "High";
            }
            else
              if(document.getElementById('zntxt1').value < 50){
                document.getElementById('zntxt2').value = "Low";   
              }else
              if(document.getElementById('zntxt1').value < 80 && document.getElementById('zntxt1').value > 50 || (document.getElementById('zntxt1').value == 80 || document.getElementById('zntxt1').value == 50)){
                document.getElementById('zntxt2').value ="Optimal";
              }
        }else 
         if(document.getElementById('txtleaf').value=='bloom'|| document.getElementById('txtleaf').value=='verasain' || document.getElementById('txtleaf').value=='post harvest')
        {

              if (document.getElementById('zntxt1').value > 60) {
              document.getElementById('zntxt2').value = "High";
            }
            else
              if(document.getElementById('zntxt1').value < 30){
                document.getElementById('zntxt2').value = "Low";   
              }else
              if(document.getElementById('zntxt1').value < 60 && document.getElementById('zntxt1').value > 30 || (document.getElementById('zntxt1').value == 60 || document.getElementById('zntxt1').value == 30)){
                document.getElementById('zntxt2').value ="Optimal";
              }
        } 
  }
</script>
<script type="text/javascript">
function act12() {
      if(document.getElementById('txtleaf').value=='april')
        {
               if (document.getElementById('cutxt1').value > 10) {
                document.getElementById('cutxt2').value = "High";
              }
              else
                if(document.getElementById('cutxt1').value < 5){
                  document.getElementById('cutxt2').value = "Low";   
                }else
                if(document.getElementById('cutxt1').value < 10 && document.getElementById('cutxt1').value > 5 || (document.getElementById('cutxt1').value == 10 || document.getElementById('cutxt1').value == 5)){
                  document.getElementById('cutxt2').value ="Optimal";
                }
        }
        else
        if(document.getElementById('txtleaf').value=='april'|| document.getElementById('txtleaf').value=='verasain' || document.getElementById('txtleaf').value=='post harvest' || document.getElementById('txtleaf').value=='prebloom' || document.getElementById('txtleaf').value=='bloom' || document.getElementById('txtleaf').value=='recut' || document.getElementById('txtleaf').value=='berry development')
        {

               if (document.getElementById('cutxt1').value > 15) {
                document.getElementById('cutxt2').value = "High";
              }
              else
                if(document.getElementById('cutxt1').value < 5){
                  document.getElementById('cutxt2').value = "Low";   
                }else
                if(document.getElementById('cutxt1').value < 15 && document.getElementById('cutxt1').value > 5 || (document.getElementById('cutxt1').value == 15 || document.getElementById('cutxt1').value == 5)){
                  document.getElementById('cutxt2').value ="Optimal";
                }
        }
  }
</script>
<script type="text/javascript">
function act13() {
       if(document.getElementById('txtleaf').value=='april'|| document.getElementById('txtleaf').value=='recut')
        {
              if (document.getElementById('btxt1').value > 30) {
              document.getElementById('btxt2').value = "High";
            }
            else
              if(document.getElementById('btxt1').value < 15){
                document.getElementById('btxt2').value = "Low";   
              }else
              if(document.getElementById('btxt1').value < 30 && document.getElementById('btxt1').value > 15 || (document.getElementById('btxt1').value == 30 || document.getElementById('btxt1').value == 15)){
                document.getElementById('btxt2').value ="Optimal";
              }
        }else 
        if(document.getElementById('txtleaf').value=='bloom'|| document.getElementById('txtleaf').value=='prebloom')
        {
              if (document.getElementById('btxt1').value > 50) {
              document.getElementById('btxt2').value = "High";
            }
            else
              if(document.getElementById('btxt1').value < 30){
                document.getElementById('btxt2').value = "Low";   
              }else
              if(document.getElementById('btxt1').value < 50 && document.getElementById('btxt1').value > 30 || (document.getElementById('btxt1').value == 50 || document.getElementById('btxt1').value == 30)){
                document.getElementById('btxt2').value ="Optimal";
              }
        }else 
       if(document.getElementById('txtleaf').value=='berry development'|| document.getElementById('txtleaf').value=='verasain' || document.getElementById('txtleaf').value=='post harvest')
        {
              if (document.getElementById('btxt1').value > 50) {
              document.getElementById('btxt2').value = "High";
            }
            else
              if(document.getElementById('btxt1').value < 25){
                document.getElementById('btxt2').value = "Low";   
              }else
              if(document.getElementById('btxt1').value < 50 && document.getElementById('btxt1').value > 25 || (document.getElementById('btxt1').value == 50 || document.getElementById('btxt1').value == 25)){
                document.getElementById('btxt2').value ="Optimal";
              }
        }

  }
</script>
<script type="text/javascript">
function act14() {
    if(document.getElementById('txtleaf').value=='recut')
      {
      
                if (document.getElementById('motxt1').value > 1.50) {
                document.getElementById('motxt2').value = "High";
              }
              else
                if(document.getElementById('motxt1').value < 0.25){
                  document.getElementById('motxt2').value = "Low";   
                }else
                if(document.getElementById('motxt1').value < 1.50 && document.getElementById('motxt1').value > 0.25 || (document.getElementById('motxt1').value == 1.50 || document.getElementById('motxt1').value == 0.25)){
                  document.getElementById('motxt2').value ="Optimal";
                }
      }
      else
        if(document.getElementById('txtleaf').value=='prebloom' || document.getElementById('txtleaf').value=='bloom' || document.getElementById('txtleaf').value=='berry development' || document.getElementById('txtleaf').value=='verasain')
      {
      
                if (document.getElementById('motxt1').value > 0.51) {
                document.getElementById('motxt2').value = "High";
              }
              else
                if(document.getElementById('motxt1').value < 0.25){
                  document.getElementById('motxt2').value = "Low";   
                }else
                if(document.getElementById('motxt1').value < 0.51 && document.getElementById('motxt1').value > 0.25 || (document.getElementById('motxt1').value == 0.51 || document.getElementById('motxt1').value == 0.25)){
                  document.getElementById('motxt2').value ="Optimal";
                }
      }
      else 
         if(document.getElementById('txtleaf').value=='april' || document.getElementById('txtleaf').value=='post harvest')
       {
                if (document.getElementById('motxt1').value > 1.51) {
                document.getElementById('motxt2').value = "High";
              }
              else
                if(document.getElementById('motxt1').value < 0.25){
                  document.getElementById('motxt2').value = "Low";   
                }else
                if(document.getElementById('motxt1').value < 1.51 && document.getElementById('motxt1').value > 0.25 || (document.getElementById('motxt1').value == 1.51 || document.getElementById('motxt1').value == 0.25)){
                  document.getElementById('motxt2').value ="Optimal";
                }
      }
  }
</script>

<script type="text/javascript">
function act15() {
    if(document.getElementById('txtleaf').value=='recut')
      {
      
              if (document.getElementById('natxt1').value > 0.25) {
              document.getElementById('natxt2').value = "High";
            }
            else
              if(document.getElementById('natxt1').value < 0.01){
                document.getElementById('natxt2').value = "Low";   
              }else
              if(document.getElementById('natxt1').value < 0.25 && document.getElementById('natxt1').value > 0.01 || (document.getElementById('natxt1').value == 0.25 || document.getElementById('natxt1').value == 0.01)){
                document.getElementById('natxt2').value ="Optimal";
              }
      }
      else
      if(document.getElementById('txtleaf').value=='april' || document.getElementById('txtleaf').value=='bloom' || document.getElementById('txtleaf').value=='prebloom' || document.getElementById('txtleaf').value=='berry development' || document.getElementById('txtleaf').value=='verasain' || document.getElementById('txtleaf').value=='post harvest')
      {
      
              if (document.getElementById('natxt1').value > 0.51) {
              document.getElementById('natxt2').value = "High";
            }
            else
              if(document.getElementById('natxt1').value < 0.01){
                document.getElementById('natxt2').value = "Low";   
              }else
              if(document.getElementById('natxt1').value < 0.51 && document.getElementById('natxt1').value > 0.01 || (document.getElementById('natxt1').value == 0.51 || document.getElementById('natxt1').value == 0.01)){
                document.getElementById('natxt2').value ="Optimal";
              }
      }
  }
</script>
<script type="text/javascript">
function act16() {
      if(document.getElementById('txtleaf').value=='recut' || document.getElementById('txtleaf').value=='april' || document.getElementById('txtleaf').value=='bloom' || document.getElementById('txtleaf').value=='prebloom' || document.getElementById('txtleaf').value=='berry development' || document.getElementById('txtleaf').value=='verasain' || document.getElementById('txtleaf').value=='post harvest')
      {
              if (document.getElementById('cltxt1').value > 0.25) {
              document.getElementById('cltxt2').value = "High";
            }
            else
              if(document.getElementById('cltxt1').value < 0.05){
                document.getElementById('cltxt2').value = "Low";   
              }else
              if(document.getElementById('cltxt1').value < 0.25 && document.getElementById('cltxt1').value > 0.05 || (document.getElementById('cltxt1').value == 0.25 || document.getElementById('cltxt1').value == 0.05)){
                document.getElementById('cltxt2').value ="Optimal";
              }
        }
  }
</script>
