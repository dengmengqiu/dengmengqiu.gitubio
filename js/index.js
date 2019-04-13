	
// 使用关闭按钮关闭弹窗
function closeWindow(a){
   var close = document.getElementById(a);
   close.style.display = "none";
}
//打开弹窗
function openWindow(a){
    var open = document.getElementById(a);
    open.style.display = "block";
}
//全选checkbox
function selectAll(c){
   var selectAll= document.getElementsByClassName('select');
   for(i=0;i<selectAll.length;i++)
   {
       if(!selectAll[i].checked)
       {
           selectAll[i].checked=true;
       }
   }
}
function deSelectAll(c){
    var selectAll= document.getElementsByClassName('select');
    for(i=0;i<selectAll.length;i++)
    {
        if(selectAll[i].checked)
        {
            selectAll[i].checked=false;
        }
    }
 }