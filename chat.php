<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            html{
                display: inline-block;
            }
            #outer {
                border-radius: 1px;
                height: auto;
                display: inline-block;
                width: 100%;
                margin-left: 0px;
            }
            #login {
                height: auto;
                width: 300px;
                margin: auto;
                padding: 10px;
                display: inline-block;
                background-color: burlywood;
                box-shadow: 0px 3px 3px black;
                margin-top: 20%;
            }
            p {
                box-shadow: 0px 3px 3px black;
                padding: 5px;
                background-color: whitesmoke;
                margin: 5px;
                border-radius: 10px;
                }
            input[type=text] {
                box-shadow: 0px 3px 3px black;
                width: 100%;
                height: 26px;
                border: 1px solid transparent;
                background-color: azure;
                font-size: 20px;
                display: inline-block;
                float: right;
            }
            input[type=text]:focus {
                border: 1px solid greenyellow;
                box-shadow: 0px 3px 3px black;
            }
            #submit {
                background-color: greenyellow;
                height: 70px;
                width: 100%;
                box-shadow: 0px 3px 3px black;
                border-radius: 1px;
                margin-top: 10px;
                float: right;
                border: 1px solid transparent;
                display: inline-block;
                padding-left: 20px;
            }
            #input-box {
                width: 70%;
                display: inline-block;

            }
            #display-box {
                width: 100%;
                display: inline-block;
                float: right;

            }
            #submit:hover {
                box-shadow: 0px 1px 1px black;
            }
            #text-container {
                height: 300px;
                overflow-y: scroll;
                background-color: azure;
                box-shadow: 0px 3px 3px black;
            }
            #newLine {
                padding: 5px;
                margin: 5px;
                box-shadow: 0px 2px 2px black;
            }
            #center {
                display: flex;
                width: 100%;
            }
            #name {
                margin-top: 10px;
            }
            #input {
                margin-top: 10px;
            }
            #name-label {
                margin-bottom: 10px;
                padding: 5px;
                width: 100%;
                box-shadow: 0px 2px 2px black;
                display: inline-block;
                float: left;
                clear: both;
            }
            #name-box {
                display: inline-block;
                width: 10%;
                float: left;
                margin-right: 5px;
                padding: 10px;
                padding-left: 0px;
                font-size: 17px;
            }
        </style>
    </head>    
    <body>
        <div id="center">    
            <div id="outer">
                <div id="text-container">
                    <?php
                        if (file_exists("log.html") && filesize("log.html") > 0) {
                            $handle = fopen("log.html", "r");
                            $contents = fread($handle, filesize("log.html"));
                            fclose($handle);
                            echo $contents;
                        }
                    ?>
                </div>
                <form action="" name="form">
                    <div id="display-box">
                        <div id="name-box">
                            <div id="name-label">Name: </div>
                            <div id="name-label">Msg:  </div>
                        </div>    
                        <div id="input-box">
                            <input type="text" name="name" id="name" value="">
                            <input type="text" name="input" id ="input" value="">    
                        </div>
                        <div style="display: inline-block; width: 14%;float: right">
                        <input type="button" id="submit" name="submit" value="post">
                        </div>    
                    </div>    
                </form>
            </div>
        </div>
        <script> 
            $('#submit').click(function() {
                var message = $('#input').val();
                var name1 = $('#name').val();
                $.post("post.php", {text: message, name: name1});

                $("#input").val(null);
                return false;                
            });

            function load(){
                var oldScrollHeight = $("#text-container").attr("scrollHeight");
                $.ajax({
                    url: "log.html",
                    cache: false,
                    success: function(html) {
                     $("#text-container").html(html);

                        var newScrollHeight = $("#text-container").attr("scrollHeight") - 20;
                        if (newScrollHeight > oldScrollHeight) {
                            $("#text-container").animate({ scrollTop: newScrollHeight }, 'normal');
                        }
                    },
                });
            }
            setInterval(load, 1000);
        </script>
    </body>  
</html>
    




