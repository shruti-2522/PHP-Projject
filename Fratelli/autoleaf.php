
<!-- <html>

<head>
<script type="text/javascript">
function insertText () {
    document.getElementById('td1').innerHTML = "Some";
}
</script>
</head>

<body onload="insertText();">
    <table border="1">
        <tr>
            <td id="td1"></td>
        </tr>
        <tr>
            <td ></td>
        </tr>
    </table>
</body>
</html>

 -->
<script type="text/javascript">
function leafauto() {
if(document.getElementById('txtleaf').value=='april')
{
	document.getElementById('lnitro').innerHTML="0.91-1.61";
	document.getElementById('lno3n').innerHTML="700-1200";
	document.getElementById('lnh4n').innerHTML="400-700";
	document.getElementById('lp').innerHTML="0.21-0.51";
	document.getElementById('lk').innerHTML="1.21-2.51";
	document.getElementById('lca').innerHTML="1.51-2.51";
	document.getElementById('lmg').innerHTML="0.31-0.61";
	document.getElementById('ls').innerHTML="0.15-0.51";
	document.getElementById('lfe').innerHTML="80-120";
	document.getElementById('lmn').innerHTML="25-100";
	document.getElementById('lzn').innerHTML="20-50";
	document.getElementById('lcu').innerHTML="5-10";
	document.getElementById('lb').innerHTML="15-30";
	document.getElementById('lmo').innerHTML="0.25-1.51";
	document.getElementById('lna').innerHTML="0.01-0.51";
	document.getElementById('lcl').innerHTML="0.05-0.25";
}
else
if(document.getElementById('txtleaf').value=='recut')
{
	document.getElementById('lnitro').innerHTML="0.91-1.60";
	document.getElementById('lno3n').innerHTML="700-1200";
	document.getElementById('lnh4n').innerHTML="400-700";
	document.getElementById('lp').innerHTML="0.2-0.5";
	document.getElementById('lk').innerHTML="1.2-2.5";
	document.getElementById('lca').innerHTML="1.0-2.50";
	document.getElementById('lmg').innerHTML="0.3-0.60";
	document.getElementById('ls').innerHTML="0.21-0.60";
	document.getElementById('lfe').innerHTML="80-120";
	document.getElementById('lmn').innerHTML="25-100";
	document.getElementById('lzn').innerHTML="20-50";
	document.getElementById('lcu').innerHTML="5.0-15.0";
	document.getElementById('lb').innerHTML="15-30";
	document.getElementById('lmo').innerHTML="0.25-1.50";
	document.getElementById('lna').innerHTML="0.01-0.25";
	document.getElementById('lcl').innerHTML="0.05-0.25";
}
else
if(document.getElementById('txtleaf').value=='prebloom')
{
	document.getElementById('lnitro').innerHTML="1.01-1.61";
	document.getElementById('lno3n').innerHTML="700-1200";
	document.getElementById('lnh4n').innerHTML="700-1000";
	document.getElementById('lp').innerHTML="0.25-0.51";
	document.getElementById('lk').innerHTML="1.51-3.01";
	document.getElementById('lca').innerHTML="0.80-1.2";
	document.getElementById('lmg').innerHTML="0.25-0.51";
	document.getElementById('ls').innerHTML="0.15-0.51";
	document.getElementById('lfe').innerHTML="80-120";
	document.getElementById('lmn').innerHTML="40-100";
	document.getElementById('lzn').innerHTML="50-80";
	document.getElementById('lcu').innerHTML="5-15";
	document.getElementById('lb').innerHTML="30-50";
	document.getElementById('lmo').innerHTML="0.25-0.51";
	document.getElementById('lna').innerHTML="0.01-0.51";
	document.getElementById('lcl').innerHTML="0.05-0.25";
}
else
if(document.getElementById('txtleaf').value=='bloom')
{
	document.getElementById('lnitro').innerHTML="1.01-1.21";
	document.getElementById('lno3n').innerHTML="700-1000";
	document.getElementById('lnh4n').innerHTML="300-600";
	document.getElementById('lp').innerHTML="0.31-0.51";
	document.getElementById('lk').innerHTML="1.51-2.51";
	document.getElementById('lca').innerHTML="0.81-1.51";
	document.getElementById('lmg').innerHTML="0.25-0.51";
	document.getElementById('ls').innerHTML="0.15-0.51";
	document.getElementById('lfe').innerHTML="80-120";
	document.getElementById('lmn').innerHTML="40-100";
	document.getElementById('lzn').innerHTML="30-60";
	document.getElementById('lcu').innerHTML="5-15";
	document.getElementById('lb').innerHTML="30-50";
	document.getElementById('lmo').innerHTML="0.25-0.51";
	document.getElementById('lna').innerHTML="0.01-0.51";
	document.getElementById('lcl').innerHTML="0.05-0.25";
}
else
if(document.getElementById('txtleaf').value=='berry development')
{
	document.getElementById('lnitro').innerHTML="1.51-2.21";
	document.getElementById('lno3n').innerHTML="700-1000";
	document.getElementById('lnh4n').innerHTML="400-700";
	document.getElementById('lp').innerHTML="0.31-0.51";
	document.getElementById('lk').innerHTML="1.51-2.01";
	document.getElementById('lca').innerHTML="1.51-2.21";
	document.getElementById('lmg').innerHTML="0.31-0.61";
	document.getElementById('ls').innerHTML="0.15-0.51";
	document.getElementById('lfe').innerHTML="80-120";
	document.getElementById('lmn').innerHTML="40-100";
	document.getElementById('lzn').innerHTML="50-80";
	document.getElementById('lcu').innerHTML="5-15";
	document.getElementById('lb').innerHTML="25-50";
	document.getElementById('lmo').innerHTML="0.25-0.51";
	document.getElementById('lna').innerHTML="0.01-0.51";
	document.getElementById('lcl').innerHTML="0.05-0.25";
}
else
if(document.getElementById('txtleaf').value=='verasain')
{
	document.getElementById('lnitro').innerHTML="0.91-1.51";
	document.getElementById('lno3n').innerHTML="400-700";
	document.getElementById('lnh4n').innerHTML="300-600";
	document.getElementById('lp').innerHTML="0.16-0.40";
	document.getElementById('lk').innerHTML="2.01-2.51";
	document.getElementById('lca').innerHTML="1.51-2.51";
	document.getElementById('lmg').innerHTML="0.31-0.61";
	document.getElementById('ls').innerHTML="0.15-0.51";
	document.getElementById('lfe').innerHTML="80-120";
	document.getElementById('lmn').innerHTML="40-100";
	document.getElementById('lzn').innerHTML="30-60";
	document.getElementById('lcu').innerHTML="5-15";
	document.getElementById('lb').innerHTML="25-50";
	document.getElementById('lmo').innerHTML="0.25-0.51";
	document.getElementById('lna').innerHTML="0.01-0.51";
	document.getElementById('lcl').innerHTML="0.05-0.25";
}
else
if(document.getElementById('txtleaf').value=='post harvest')
{
	document.getElementById('lnitro').innerHTML="0.91-1.21";
	document.getElementById('lno3n').innerHTML="700-1200";
	document.getElementById('lnh4n').innerHTML="400-700";
	document.getElementById('lp').innerHTML="0.15-0.41";
	document.getElementById('lk').innerHTML="1.61-2.01";
	document.getElementById('lca').innerHTML="2.01-3.01";
	document.getElementById('lmg').innerHTML="0.41-0.61";
	document.getElementById('ls').innerHTML="0.21-0.61";
	document.getElementById('lfe').innerHTML="40-120";
	document.getElementById('lmn').innerHTML="40-150";
	document.getElementById('lzn').innerHTML="30-60";
	document.getElementById('lcu').innerHTML="5-15";
	document.getElementById('lb').innerHTML="25-50";
	document.getElementById('lmo').innerHTML="0.25-1.51";
	document.getElementById('lna').innerHTML="0.01-0.51";
	document.getElementById('lcl').innerHTML="0.05-0.25";
}



}
</script>
