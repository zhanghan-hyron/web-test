<?php

$dsn = 'mysql:host=zhanghan-db-ins.crqmemsomjjy.ap-northeast-1.rds.amazonaws.com;dbname=zhanghan_db';
$username='zhanghan';
$password='zhanghan';

try{
	$pdo=new PDO($dsn,$username,$password);
	$sql="select created_at,info from site_view_history order by created_at desc limit 1";
	$stmt=$pdo->prepare($sql);
	$stmt -> execute();
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	$sqlins="insert into site_view_history (info) values ('insert test from ".exec(hostname)."')";
	$stmtins=$pdo->prepare($sqlins);
	$stmtins->execute();
}catch (PDOException $e){
}

function escape1($str)
{
	return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>test page for db access</title>
</head>

<body>
    Last Access Time<br><br>
	<?php foreach ($rec as $a):?>
	<?=escape1($a)?><br>
	<?php endforeach;?> 
    comment 
</body>
</html>
