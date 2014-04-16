<?php
  function CheckNick($nick_input)
  {
    global $LOGIN;
	global $nick,$id;
	$sql="select *from $LOGIN where _nick='$nick_input'";
	$result=MySQL_query($sql);
	$row=MySQL_fetch_array($result);
	$id=$row["id"];
	$nicker=$row["_nick"];
	if(!$row["_nick"]) return "error!";
  }
?>

<?php 
function User_Password($id)
{
   global $LOGIN;
   $sql="select _password from $LOGIN where id= '$id'";
   $result=MySQL_query($sql);
   $row=MySQL_fetch_array($result);
   return ($row["_password"]);
}
?>

<?php
  function Add_OneUser()
  {
     global $LOGIN;
	 global $ONLINE;
	 global $id,$nick,$password,$log_ip,$log_time,$REMOTE_ADDR;
	 $log_time="now()";
	 $log_ip=$REMOTE_ADDR;
	 $sql="delete from $ONLINE where id ='$id'";
	 MySQL_QUERY($sql);
	 $sql="insert into $ONLINE values('$id','$nick','$password','$log_ip',$log_time)";
	 MySQL_query($sql);
  }  
?>

<?php
  if($ok)
  {
  if(!$nick)$error="请填写用户名";
  if((!isset($error))and CheckNick($nick))$error="该用户名不存在";
  if((!isset($error))and (!password))$error="请填写密码";
  if(!isset($error))
  {
   $p=User_Password($id);
   if($password!=$p)$error="密码不正确";
  }
  if(!isset($error))
  {
  Add_OneUser();
  header("Location:log_ok.php?ok_info=恭喜登录成功！");
  }
  else
  {
  header("Location:log_error.php?error=$error");
  
  }
  
  }
?>

<html>
<head>
   <title>用户登录</title>
</head>

<body>
<tr>
	<td height="30" colspan="2" bgcolor="#FFFFFF">
	<div align ="center">用户登录</div>
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







