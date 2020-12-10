<html><head>
<script src="sorttable.js"></script>

<style>
tbody tr td {color:green;border-right:1px solid;width:200px;}
</style>
</head><body>

<?php
$First = array('a', 'b', 'c', 'd');
$Second = array('1', '2', '3', '4');

if (!empty($_POST['myFirstvalues']))
{ $First = explode("\r\n",$_POST['myFirstvalues']); $Second = explode("\r\n",$_POST['mySecondvalues']);}

?>

</br>Hi User. PUT your values</br></br>
<form action="" method="POST">
projectX</br>
<textarea cols="20" rows="20" name="myFirstvalues" style="width:200px;background:url(untitled.PNG);position:relative;top:19px;Float:left;">
<?php foreach($First as $vv) {echo $vv."\r\n";}?>
</textarea>

The due amount</br>
<textarea cols="20" rows="20" name="mySecondvalues" style="width:200px;background:url(untitled.PNG);Float:left;">
<?php foreach($Second as $vv) {echo $vv."\r\n";}?>
</textarea>
<input type="submit">
</form>

<table class="sortable" style="padding:100px 0 0 300px;">
<thead style="background-color:#999999; color:red; font-weight: bold; cursor: default;  position:relative;">
  <tr><th>ProjectX</th><th>Due amount</th></tr>
</thead>
<tbody>

<?php
foreach($First as $indx => $value) {
    echo '<tr><td>'.$First[$indx].'</td><td>'.$Second[$indx].'</td></tr>';
}
?>
</tbody>
<tfoot><tr><td>TOTAL  = &nbsp;<b>111111111</b></td><td>Still to spend  = &nbsp;<b>5555555</b></td></tr></tfoot></br></br>
</table>
</body>
</html>
