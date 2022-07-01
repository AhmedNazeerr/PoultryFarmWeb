function text(x){
if(x==0){
    document.getElementById("mycode").style.display='none';
        document.getElementById("mycode1").style.display='block';
        document.getElementById("mycode2").style.display='block';


}
if(x==1){
        document.getElementById("mycode").style.display='block';
        document.getElementById("mycode1").style.display='none';
        document.getElementById("mycode2").style.display='none';
    
    }
}
function ddlselect(){
    var d=document.getElementById("select");
    var displaytext=d.options[d.selectedIndex].text;
    document.getElementById("ttext").value=displaytext;
// }
}
//     document.getElementById("vi").click();
// var temp=ddlselect();
// $.ajax({
// url:"booking.php",
// method:"POST",
// data:temp,
// success:function(res){
//     console.log(res);
// }
// });