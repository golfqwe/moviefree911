<?php
function deleteRow(i){
	rowCnt--;
	var tableName = document.getElementById('assetsTab');
	var prev = tableName.rows.length;
 
//			document.getElementById('assetsTab').deleteRow(i);
$('#assetsid'+i).val("");
document.getElementById("row"+i).style.display = 'none';
}
 
function fnAddAssetRow(){
	var rowCnt=1;
	rowCnt++;
 
	var tableName = document.getElementById('assetsTab');
	var prev = tableName.rows.length;
	//console.log(prev);
	//var count = eval(prev)-1;//As the table has two headers, we should reduce the count
	var count = eval(prev);
	var row = tableName.insertRow(prev);
	row.id = "row"+count;
	row.style.verticalAlign = "top";
	
	var colone = row.insertCell(0);
	var coltwo = row.insertCell(1);
	var colthree = row.insertCell(2);
	var colfour = row.insertCell(3);
	var colfive = row.insertCell(4);
 
	var delete_row_count=count;
	/* Product Re-Ordering Feature Code Addition ends */
	//Delete link
	colone.className = "";
	colone.id = row.id+"_col1";
	colone.innerHTML='<i class="fa fa-trash" onclick="deleteRow('+count+')" style="cursor:pointer;"></i><input id="deleted'+count+'" name="deleted'+count+'" type="hidden" value="0">';
 
	//Assets Select
	coltwo.className = ""
	coltwo.innerHTML= '	<div class="input-group" style="margin-bottom:0;"><input type="text" id="serial'+count+'" name="serial'+count+'" class="form-control" value="" readonly /><input type="hidden" id="assetsid'+count+'" name="assetsid[]" value="" /><span class="input-group-btn"><button type="button" class="btn btn-default" id="searchIcon1" title="Assets"  onclick="assetPickList(this,'+count+')" ><i class="fa fa-plus"></i></button></span></div>';	
 
	//Product Name
	colthree.className = ""
	colthree.innerHTML= '<div id="productname'+count+'" class="text-left"></div>';	
 
	//Assets Info
	colfour.className = ""
	colfour.innerHTML= '<div id="desc'+count+'" class="text-left"></div>';	
 
	//Assets Action
	colfive.className = ""
	colfive.innerHTML= '<div id="action'+count+'" class="text-center"></div>';	
	
	return count;
}?>