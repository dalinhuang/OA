<!DOCTYPE html>
<!--[if IE 6 ]> <html class="ie6 lte_ie6 lte_ie7 lte_ie8 lte_ie9"> <![endif]--> 
<!--[if lte IE 6 ]> <html class="lte_ie6 lte_ie7 lte_ie8 lte_ie9"> <![endif]--> 
<!--[if lte IE 7 ]> <html class="lte_ie7 lte_ie8 lte_ie9"> <![endif]--> 
<!--[if lte IE 8 ]> <html class="lte_ie8 lte_ie9"> <![endif]--> 
<!--[if lte IE 9 ]> <html class="lte_ie9"> <![endif]--> 
<!--[if (gte IE 10)|!(IE)]><!--><html><!--<![endif]-->
 <head>
    <title><?php echo $_CONFIG->config_data('name')?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1" />
<link rel="stylesheet" type="text/css" href="template/default/content/css/style2014.css">
<script type="text/javascript" src="template/default/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="template/default/content/js/lockTableTitle.js"></script>
<script language="javascript" type="text/javascript" src="template/default/content/js/common.js"></script>
<script language="javascript" type="text/javascript" src="DatePicker/WdatePicker.js"></script>
<script type="text/javascript">
    
    var locktb;
    $(function(){
        locktb=new Kkctf.table.lockTableSingle({
            tMain:$('#lockTable'),            //table的层
            padWidth:15,                        //单元格左右的padding的值总和数值
            borWidth:2,                        //表格左右边框宽度总和值
            subtHeig:150,                    //表格高度减去多少
            dinamicDiv:$('#dynamicDiv'),      //动态层的高度.表格会根据动态层的显示或隐藏进行表格大小的动态调整(可选)
            autoHeight:true                 //表格窗口是否随着窗口的高度改变自动调整高度(可选)
        });
    });

    function formview(){
    
        if($('#dynamicDiv').is(':visible')){
            $('#dynamicDiv').hide();
        }else{
            $('#dynamicDiv').show();
        }
        
        locktb.autoHeightFn();
    }
    function sendForm(){
	   document.save.submit();
	}
	function updateform(type){
		if(type==1){
			document.getElementById("uptype").value='1';
		}
		document.update.submit();
	}
</script>
</head>
<body class="body-wrap">
<div class="tabbable work-nav"> <!-- Only required for left/right tabs -->
				<ul id="myTab" class="nav nav-tabs">
					<li <?php echo $_check['ischeck']?>><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" data-toggle="tab">我发布的计划</a></li>
					<li <?php echo $_check['ischeck1']?>><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=1" data-toggle="tab">我参与的计划</a></li>
					<li <?php echo $_check['ischeck2']?>><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=2" data-toggle="tab">我负责的计划</a></li>
					<li <?php echo $_check['ischeck8']?>><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=8" data-toggle="tab">己完成的计划</a></li>
					
				</ul>
			</div>
<div class="search_area">
    <form method="get" action="admin.php" name="save">
	<input type="hidden" name="ac" value="<?php echo $ac?>" />
		<input type="hidden" name="do" value="list" />
		<input type="hidden" name="fileurl" value="<?php echo $fileurl?>" />
		<input type="hidden" name="ischeck" value="<?php echo $ischeck?>" />
        <div class="form-search form-search-top" style="text-align:left;padding-left:10px;">
                        <?php echo get_keyuser($ui,$un);?>    
			            
	        <div class="adv-select-label">主题：</div>
       		<input type="text"  name="title" size="20" class="span3" value="<?php echo urldecode($title)?>">  

            <div class="adv-select-label">日期：</div>
            <input type="text" class="span1" value="<?php echo $vstartdate?>"  style="width:80px;" readonly="readonly"  onClick="WdatePicker();" name='vstartdate'> 至 <input type="text" class="span1" value="<?php echo $venddate?>"  style="width:80px;" readonly="readonly"  onClick="WdatePicker();" name='venddate'>
			
           
            <button id="do_search" type="button" onClick="sendForm();" class="btn btn-primary">查 询</button>&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=3">今天</a>&nbsp;
							<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=4">3天内</a>&nbsp;
							<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=5">1周内</a>&nbsp;
							<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=6">1个月内</a>&nbsp;
							<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=7">6个月内</a>
           <!-- <button  onClick="formview()" type="button" class="btn">切换更多查询</button> -->
        </div>
       
    </form>
</div>


<div class="data-wrap">
	<div class="data-operation">
		<div class="button-operation">
		<button type="button" action="new_work" class="btn btn-success" onClick="javascript:window.location='admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add'">发布计划</button>
<button type="button" onClick="updateform(1);" action="cancel_concern" class="btn btn-danger">清理数据</button>

				<?php echo get_exceldown('excel_6',1);?>
				
		</div>

<div class="pager_operation">
	<?php echo newshowpage($num,$pagesize,$page,$url);?>
	
	
</div>
</div>		
</div>
<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="update" />
		<input type="hidden" name="uptype" id="uptype" value="2" />

<div class="data-list" >
<div  id="lockTable">
<table  class="table table-bordered table-hover" width="100%">
      <tr class="editThead" align="center">
      <td width="40"><input type="checkbox" value="1" name="chkall" onClick="check_all(this)" /></td>
      <td width="100">计划主题</td>
      <td width="100">开始时间</td>
	  <td width="100">结束时间</td>
	  <td width="100">完成时间</td>
	  <td width="80">类型</td>
	  <td width="80">状态</td>
	  <td width="90">发布人</td>
	  <td width="100">操作</td>
   </tr>
<?php
foreach ($result as $row) {
?>
    <tr >
      <td width="40"><?php echo get_boxlistkey("id[]",$row['id'],$row['uid'],$_USER->id)?>
    	</td>
      <td><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views&id=<?php echo $row['id']?>"><?php echo $row['title']?></a></td>
    	<td nowrap align="center"><?php echo str_replace(' ','<br>',$row['startdate'])?></td>
      <td nowrap align="right" ><?php echo str_replace(' ','<br>',$row['enddate'])?>
	  </td>
      <td nowrap align="center" ><?php
						if($row['completiondate']!=''){
						echo str_replace(' ','<br>',$row['completiondate']);
						}else{
						echo "未完成";
						}
						?></td>
	<td nowrap align="center"><?php echo $row['type']?></td>
	<td nowrap align="center"><?php
						if($row['completiondate']!=''){
						echo "已完成";
						}else{
						echo "未完成";
						}
						?></td>
	<td nowrap align="center"><?php echo get_realname($row['uid'])?></td>
	<td nowrap align="center"><?php get_urlkey("编辑","admin.php?ac=".$ac."&fileurl=".$fileurl."&do=add&id=".$row['id']."","".$row['uid']!=$_USER->id)?>
<? if($row['completiondate']==''){?>
|<?php get_urlkey("完成","admin.php?ac=".$ac."&fileurl=".$fileurl."&do=enddate&id=".$row['id']."","".$row['uid']!=$_USER->id)?>
<? }?>|<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=views&id=<?php echo $row['id']?>">查看</a></td>
    </tr>
<?php } ?>	       
    </table>
</div>
</div>
</form>
<form name="excel" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
	<input type="hidden" name="ui" value="<?php echo $ui?>" />
	<input type="hidden" name="un" value="<?php echo $un?>" />
	<input type="hidden" name="title" value="<?php echo $title?>" />
	<input type="hidden" name="vstartdate" value="<?php echo $vstartdate?>" />
	<input type="hidden" name="venddate" value="<?php echo $venddate?>" />
	<input type="hidden" name="ischeck" value="<?php echo $ischeck?>" />
		<input type="hidden" name="do" value="excel" />
		</form>
</body>
</html>