<?php 
	include_once './db/db_config.php';
?>

<?php
    $id = $_POST["id"];
    
    $sql = "select
    			*
    		from
    			members
    		where
    			id = '{$id}'
    		";
    $resource = mysqli_query($con, $sql);
    $num = mysqli_num_rows($resource);
    
    if($id){
	    if($num > 0){
	    	echo "
	    			<script>
	    				alert('이미 존재하는 아이디입니다. 다른 아이디를 입력해 주세요!');
	    				history.go(-1);
	    			</script>
	    		";
	    }
	
	    else{	    	
	    	echo "
	    			<script>
	    				alert('사용 가능한 아이디입니다.');
	    				history.go(-1);
	    			</script>		
	    		";
	    }
    }
    else{
    	echo "
    			<script>
    				alert('아이디를 입력해 주세요!');
    				history.go(-1);
    			</script>
    		";
    }
?>