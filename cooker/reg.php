<?php
   include "common.inc.php";
   function Checknick($nick)
   {
      global $LOGIN;
	  $sql="select _nick from $LOGIN where _nick='$nick'";
	  $a=MySQL_query($sql);
	  $row=MySQL_fetch_array($a);
	  $nicker=$row["_nick"];
	  return $nick;
   }
   ?>
   
   <?php
      if($ok)
	  {
	  if(!$nicker) $error="�û�������Ϊ��";
	  if((!isset($error)) and(checknicker($nicker)))$error="�û����Ѿ�����";
	  if((!isset($error))and (!$password ))$error ="����Ϊ��";
	  if(!isset($error))
	  {
	    AddUser();
		header("Location:on_ok.php?id=$id&pws=$password");
	  }
	  else
	  {
	    header("Location:on_error.php?error=$error");
	  }
	  exit;
	  }
	  ?>
	  
	  <?
	  function  AddUser()
	  {
	    globle $LOGIN;
		global $id,$nick,$password;
		$sql="insert into $LOGIN values('',$nick,$password)";
		MySQL_query($sql);
		$b="select * from $LOGIN where _nick='$nick'";
		$result=MySQL_query($b);
		$row=MySQL_fetch_array($result);
		$id=$row[id];
		$password=$row[password];
	  }
	  ?>



<html>
<head>
   
   <title>�û�ע�����¼</title>
   
 </head>
 
 <body>
    
	<tr>
	<td height="30" colspan="2" bgcolor="#FFFFFF">
	<div align ="center">�û�ע��</div>
	</td>
	</tr>
	
	<tr>
	<td weidh="81" height="30"  bgcolor="#FFFFFF">
	<div align ="left">�û�����</div>
	</td>
	<td weidh="81" height="30"  bgcolor="#FFFFFF"><input name="nick" type="text" id="nick"/></td>
	</tr>
	
	<tr>
	<td height="30"  bgcolor="#FFFFFF">
	<div align ="left">���룺</div>
	</td>
	<td height="30"  bgcolor="#FFFFFF"><input name="password" type="password" id="password1"/></td>
	</tr>
	
	<tr>
	<td height="30" colspan="2" bgcolor="#FFFFFF">
	<div align ="center">
	<input type="submit" name="ok" value="�ύ"/>
	</td>
	</tr>
	
	
 </body>
 </html>
