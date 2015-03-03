<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <title>李超测试git</title>
    <script src="jquery-1.9.1.min.js"></script>
</head>

<body>
    <div style="position: absolute;border: 1px solid #195;background:#fff;padding: 10px 10px;cursor: pointer;display: none;">我在这</div>
    <div style="margin-left:40%;margin-top:150px;">计时：<span>60</span></div>
    <div style="margin-left:40%;margin-top:10px;">计分：<span>0</span></div>
    <div style="margin-left:40%;margin-top:10px;"><span style="border:1px solid #614;padding: 3px 10px;cursor: pointer;">开 始</span></div>
    <script>
        var curObj={
            curTime:0,
            status:0,//0：进行中，1：暂停中，
            time:function(){
                curObj.curTime++;

                if(curObj.curTime<60){
                    if(!curObj.status){
                        setTimeout("curObj.time()",1000);
                        $("div:eq(1) span").html(60-curObj.curTime);
                    }
                }else{
                    $("div:eq(0)").hide();
                }

            },
            change:function(){
                if(curObj.curTime<60 && !curObj.status){
                    setTimeout("curObj.change()",800);
                }
                var text=['我在这','点我啊','哈哈哈','哟哟哟','敢点我'];


                $("div:eq(0)").html(text[Math.floor(Math.random()*5)]);

                $("div:eq(0)").css("color",curObj.getColor());

                var curLocation=curObj.getLocation();
                $("div:eq(0)").animate({left:curLocation[0]+"%",top:curLocation[1]+"%"});

            },
            getColor:function(){
                var char=['1','2','3','4','5','6','7','8','9','a','b','c','d','e','f'];
                var curColor="#";
                for(var i=0 ;i<6;i++){
                    curColor += char[Math.floor(Math.random()*15)];
                }
                return curColor;
            },
            getLocation:function(){
               var curLeft=Math.floor(Math.random()*90);
               var curTop=Math.floor(Math.random()*90);
                return [curLeft,curTop];
            },
            countScore:function(){
                $("div:eq(2) span").html(parseInt( $("div:eq(2) span").html())+1);
            },
            control:function(event){

             }
        };
        $("div:eq(3) span").click(function(){
            if($(this).html()=="开 始" || $(this).html()=="继 续"){
                curObj.status=0;
                curObj.time();
                curObj.change();
                $(this).html("暂 停");
                $("div:eq(0)").show().live("click",curObj.countScore);
            }else if($(this).html()=="暂 停"){
                $(this).html("继 续");
                curObj.status=1;
            }
        });


    </script>
</body>
</html>
