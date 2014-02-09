// JavaScript Document

$(document).ready(function(){
  
  $('.oculto').hide();
  
  $('.last, #desplegar').hover(function(){
	   $('ul#mainmenu li').not($('ul', this)).stop();// mmmmmmmmmmm
	   $('ul' ,this).slideDown('fast');
	     
  },function(){
	   $('ul' ,this).hide();
  });
  
  
	
});