<form>
    search <input type="text" id="realtxt" onkeyup="javascript:searchSel();"/>
      <select id="realitems" onclick="f();">
        <option value="">select...</option>
        <option value="1">Power hungry</option>
        <option value="2">Super man</option>
        <option value="3">Hyperactive</option>
        <option value="4">Bored</option>
        <option value="5">Human</option>
      </select>
    </form>
<script type="text/javascript">
document.getElementById('realtxt').onkeyup = searchSel;
function searchSel() 
    {
      var input = document.getElementById('realtxt').value.toLowerCase();
       
          len = input.length;
          output = document.getElementById('realitems').options;
      for(var i=0; i<output.length; i++)
          if (output[i].text.toLowerCase().indexOf(input) != -1 ){
          output[i].selected = true;
              break;
          }
      if (input == '')
        output[0].selected = true;
    }
</script>
<script type="text/javascript">
   function f()
   {
    alert("hello");
   }
</script>