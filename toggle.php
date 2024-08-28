<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch Toggle Button</title>
</head>
<body>
    <style>
        :root{
            --transition-effect: 0.25s cubic-bezier(.25,-0.59,.82,1.66) .3s;
        }
        body{
            background: #fff;
            transition: var(--transition-effect);
        }
        body.dark{
            background: #111;
        }
        .switch-toggle{
            width: 90px;
            height: 50px;
            appearance: none;
            background: #83d8ff;
            border-radius: 26px;
            position: relative;
            cursor: pointer;
            box-shadow: inset 0px 0px 16px rgba(0, 0, 0, .3);
            transition: var(--transition-effect);
        }
        .switch-toggle::before{
            content: "";
            width: 44px;
            height: 44px;
            position: absolute;
            top: 3px;
            left: 3px;
            background: #efe2bf;
            border-radius: 50%;
            box-shadow: 0px 0px 6px rgba(0, 0, 0, .3);
            transition: var(--transition-effect);
         
        }
        .switch-toggle:checked{
            background: #749dd6;
        }
        .switch-toggle:checked:before{
            left: 40px;
        }
    </style>
    <div id="wrapper">
        <input type="checkbox" name="" class="switch-toggle" id="light-dark">
    </div>
    <script>
        var checkbox_toggle = document.getElementById('light-dark');
        checkbox_toggle.addEventListener('change', function(){
            // THêm class dark cho body
            document.body.classList.toggle('dark');
        });
    </script>
</body>
</html>