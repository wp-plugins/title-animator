function trblink(e,t){var n=t.indexOf("|");var r=1e3;var i=e;var s=t.substring(0,n);var o=t.substring(n+1);if(i==0){main_title=s;i=1}else if(i==1){main_title=o;i=0}document.title=main_title;var u=window.setTimeout("trblink("+i+",title_content)",r)}var title_content=document.title;trblink(0,title_content)