<?php 
	include_once './db/db_config.php';
?>

<?php
    $nickname = $_POST["nickname"];
    
    $sql = "select
    			*
    		from
    			members
    		where
    			nickname = '{$nickname}'
    		";
    $resource = mysqli_query($con, $sql);
    $num = mysqli_num_rows($resource);
    
    if($nickname){
	    if($num > 0){
	    	echo "
	    			<script>
	    				alert('이미 존재하는 닉네임입니다. 다른 닉네임을 입력해 주세요!');
	    				history.go(-1);
	    			</script>
	    		";
	    }
	
	    else{	    	
	    	echo "
	    			<script>
	    				alert('사용 가능한 닉네임입니다.');
	    				history.go(-1);
	    			</script>		
	    		";
	    }
    }
    else{
    	echo "
    			<script>
    				alert('닉네임을 입력해 주세요!');
    				history.go(-1);
    			</script>
    		";
    }
?>