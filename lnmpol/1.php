<?
    header('content-type:text/html;charset=utf-8');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<center>
    <form>
    <table>
        <tr>
            <td>姓名</td>
            <td><input type="text" name="n" id="n" onblur="fun1()"/><span style="color: blue" id="n1">请输入您的姓名</span></td>
            <td></td>
        </tr>
        <tr>
            <td>请输入您的手机号</td>
            <td><input type="text" name="h" id="h" onblur="fun2()"/><span style="color: blue" id="h1">请输入您的手机号</span></td>
            <td><input type="button" id="btn" value="免费获取验证码"  onblur="fun3()" /></td>

        </tr>
        <tr>
            <td>请输入接收的验证码：</td>
            <td><input type="text" id="y" onblur="fun4()"/><span style="color: blue" id="y1">请输入您的验证码</span></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><button>提交</button></td>
        </tr>
        <tr>
        	<td><iframe name="kuaidi100" src="https://www.kuaidi100.com/frame/index.html" width="960" height="880" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe>
</td>
        	<td></td>
        </tr>
    </table>
    </form>
    <script>
        var yan = 0;
        var result = Math.floor(Math.random()*10000);
        if(result<10){
            yan = "000"+result;
        }else if(result<100){
            yan = "00"+result;
        }else if(result<1000){
            yan = "0"+result;
        }else{
            yan = result;
        }
        function fun1(){
            var name = document.getElementById("n").value;
            if(name == ""){
                document.getElementById("n1").innerHTML = "<span style='color: red'>姓名不能为空</span>  "
            }else{
                document.getElementById("n1").innerHTML = "<span style='color: #002DFF'>正确</span>"
            }
        }
        function fun2(){
            var nameJie = document.getElementById("h");
            var yanZh = /^1[3,6,7,5,8][0-9]{9}$/;
            if(yanZh.test(nameJie.value)){
                document.getElementById("h1").innerHTML = "<span style='color:blue'>√手机号输入正确</span>";
                document.getElementById("btn").removeAttribute("disabled");
                document.getElementById("btn").value="免费获取验证码";
                return 1;
            }else{
                document.getElementById("h1").innerHTML = "<span style='color:red'>×手机格式不正确</span>";
                document.getElementById("btn").setAttribute("disabled", true);
                document.getElementById("btn").value="请输入正确的手机号";
                return 0;
            }
        }
        function fun3(){
            var t = document.getElementById("h").value;
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function(){
                if(ajax.readyState == 4&&ajax.status == 200){
                    var res = ajax.responseText;alert(res);
                }
            }
            ajax.open('get','2.php?t='+t+'&y='+yan,true);
            ajax.send();
        }
        function fun4(){
            var n = document.getElementById("y").value;
            if(yan == n){
                document.getElementById("y1").innerHTML = "<span style='color:blue'>√验证码输入正确</span>";
                return 1;
            }else{
                document.getElementById("y1").innerHTML = "<span style='color:red'>×验证码输入错误</span>";
                return 0;
            }
        }
    </script>
    <script>
        var wait=60;
        function time(o) {
            if (wait == 0) {
                o.removeAttribute("disabled");
                o.value="免费获取验证码";
                wait = 60;
            } else {
                o.setAttribute("disabled", true);
                o.value="重新发送(" + wait + ")";
                wait--;
                setTimeout(function() {
                        time(o)
                    },
                    1000)
            }
        }
        document.getElementById("btn").onclick=function(){time(this);}

    </script>
</center>
</body>
</html>