
<?php 
include("topo.php");
?>
<br /><br />
<br /><br /><br /><br /><br /><br />
<center>

<script language="JavaScript">
 //By Paul Davis - www.kaosweaver.com 
   var j,d="",l="",m="",p="",q="",z="",list= new Array()

   
    list[list.length]='http://localhost/Sisp/imagem/01.jpg';
    list[list.length]='http://localhost/Sisp/imagem/02.jpg';
    list[list.length]='http://localhost/Sisp/imagem/03.jpg';
    list[list.length]='http://localhost/Sisp/imagem/04.jpg';
    list[list.length]='http://localhost/Sisp/imagem/05.jpg';
    list[list.length]='http://localhost/Sisp/imagem/06.jpg';


   j=parseInt(Math.random()*list.length);
  j=(isNaN(j))?0:j;
    document.write("<img name='seqSlideShow' src='"+list[j]+"' border=0 >");
function seqSlideShow(t,l) {
  x=document.seqSlideShow;
  j=l;
  j++;
  if (j==list.length) j=0;
  x.src=list[j];
  setTimeout("seqSlideShow("+t+","+j+")",t);
  }
 </script>

<script language="JavaScript"> seqSlideShow(5000,0); </script>

</center>
<?php 
include("rodape.php");
?>
