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
  if(!$nick)$error="����д�û���";
  if((!isset($error))and CheckNick($nick))$error="���û���������";
  if((!isset($error))and (!password))$error="����д����";
  if(!isset($error))
  {
   $p=User_Password($id);
   if($password!=$p)$error="���벻��ȷ";
  }
  if(!isset($error))
  {
  Add_OneUser();
  header("Location:log_ok.php?ok_info=��ϲ��¼�ɹ���");
  }
  else
  {
  header("Location:log_error.php?error=$error");
  
  }
  
  }
?>

<html>
<head>
   <title>�û���¼</title>
</head>

<body>
<tr>
	<td height="30" colspan="2" bgcolor="#FFFFFF">
	<div align ="center">�û���¼</div>
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







