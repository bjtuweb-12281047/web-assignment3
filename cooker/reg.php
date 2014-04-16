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
	  if(!$nicker) $error="用户名不能为空";
	  if((!isset($error)) and(checknicker($nicker)))$error="用户名已经存在";
	  if((!isset($error))and (!$password ))$error ="密码为空";
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
   
   <title>用户注册与登录</title>
   
 </head>
 
 <body>
    
	<tr>
	<td height="30" colspan="2" bgcolor="#FFFFFF">
	<div align ="center">用户注册</div>
	</td>
	</tr>
	
	<tr>
	<td weidh="81" height="30"  bgcolor="#FFFFFF">
	<div align ="left">用户名：</div>
	</td>
	<td weidh="81" height="30"  bgcolor="#FFFFFF"><input name="nick" type="text" id="nick"/></td>
	</tr>
	
	<tr>
	<td height="30"  bgcolor="#FFFFFF">
	<div align ="left">密码：</div>
	</td>
	<td height="30"  bgcolor="#FFFFFF"><input name="password" type="password" id="password1"/></td>
	</tr>
	
	<tr>
	<td height="30" colspan="2" bgcolor="#FFFFFF">
	<div align ="center">
	<input type="submit" name="ok" value="提交"/>
	</td>
	</tr>
	
	
 </body>
 </html>
