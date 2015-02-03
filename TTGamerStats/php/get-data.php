<?php

require(dirname(__DIR__) . "/php/objects/tournament.php");



//require(dirname(__DIR__) . "php/query/json.php");

?>
<html>
<table  style="width:100%; border:solid 2px black; height: 124px;">
    <tr>
        <td bgcolor="#666699" class="style7" align="center" 
            style="color: white; font-size: medium">
            Bracket</td>
        <td bgcolor="#666699" class="style13" align="center" 
            style="color: white; font-size: medium">
            Date</td>
        <td bgcolor="#666699" class="style13" align="center" 
            style="color: white; font-size: medium">
            Type</td>
        <td bgcolor="#666699" class="style9" align="center" 
            style="color: white; font-size: medium">
            Players No</td>
        <td bgcolor="#666699" class="style13" align="center" 
            style="color: white; font-size: medium">
            Winner</td>
        <td bgcolor="#666699" class="style13" align="center" 
            style="color: white; font-size: medium">
            View</td>
        <td bgcolor="#666699" class="style13" align="center" 
            style="color: white; font-size: medium">
            Edit</td>
        <td bgcolor="#666699" class="style13" align="center" 
            style="color: white; font-size: medium">
            Submit</td>
    </tr>
	
	
<?php	

$arr = getTournaments();



foreach ($arr as $value){
	

$dat= preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $value->e_date, $output_array);
if (isset($output_array[0])){
$dat = $output_array[0];
}else
{
	$dat=0;
	
	}
	
echo    "<tr>
        <td class=\"style14\" align=\"center\"><a href=\"".$value->e_img."\" ><img src=\"".$value->e_img."\" style=\" width: 100px; height:50px;\" /> </a>
            </td>
        <td class=\"style15\" align=\"center\">".$dat."
            </td>
        <td class=\"style15\" align=\"center\">".$value->e_type."
            </td>
        <td class=\"style16\" align=\"center\">".$value->e_count."
            </td>
        <td class=\"style15\" align=\"center\">".$value->e_winner."
            </td>
        <td class=\"style15\" align=\"center\">
            <input id=\"Button4\" type=\"button\" value=\"View\" /></td>
        <td class=\"style15\" align=\"center\">
            <input id=\"Button2\" type=\"button\" value=\"Edit\" /></td>
        <td class=\"style15\" align=\"center\">
            <input id=\"Button3\" type=\"button\" value=\"Submit\" /></td>
    </tr>";
	
	
}	



?>    </table>








