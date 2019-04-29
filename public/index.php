<?php

require_once '../lib/_require.php';

Conf::load('wanchain');
Game_score::get_score_list();

?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo Game_style::$title; ?> - Proof Of Stake gamefication - POS training</title>

    <meta name="robots" content="noindex, nofollow">
    <!-- Include CSS File Here -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="<?php echo Game_style::$theme_dir; ?>index.css">
    <!-- Include CSS File Here -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="<?php echo Game_style::$theme_dir; ?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo Game_style::$theme_dir; ?>favicon.png" type="image/png"/>
    <link rel="icon" sizes="32x32" href="<?php echo Game_style::$theme_dir; ?>favicon-32.png" type="image/png">
    <link rel="icon" sizes="64x64" href="<?php echo Game_style::$theme_dir; ?>favicon-64.png" type="image/png">
    <link rel="icon" sizes="96x96" href="<?php echo Game_style::$theme_dir; ?>favicon-96.png" type="image/png">
    <link rel="icon" sizes="196x196" href="<?php echo Game_style::$theme_dir; ?>favicon-196.png" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo Game_style::$theme_dir; ?>apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo Game_style::$theme_dir; ?>apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo Game_style::$theme_dir; ?>apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?php echo Game_style::$theme_dir; ?>apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
          href="<?php echo Game_style::$theme_dir; ?>apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
          href="<?php echo Game_style::$theme_dir; ?>apple-touch-icon-144x144.png">
    <meta name="msapplication-TileImage" content="<?php echo Game_style::$theme_dir; ?>favicon-144.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">

    <script>
        let conf_theme_name = "<?php echo Game_style::$theme_name; ?>";
        let conf_theme_dir = "<?php echo Game_style::$theme_dir; ?>";
        let conf_title = "<?php echo Game_style::$title; ?>";
        let conf_title_leet = "<?php echo Game_style::$title_leet; ?>";

        let conf_game_text = <?php echo json_encode(get_class_vars('Game_text')); ?>;

        let conf_game_style = <?php echo json_encode(get_class_vars('Game_style')); ?>;

        let conf_game_score = <?php echo json_encode(get_class_vars('Game_score')); ?>;

    </script>
</head>
<body>
<div id="header">
    <a href="index.php"><img src="<?php echo Game_style::$theme_dir; ?>download.png" class="#logo"></a>
</div>
<div class="container">
    <div class="main">
        <form class="form" action="#" id="access">
            <h2><?php echo Game_style::$title_leet; ?> </h2>

            <label>Public address:</label>
            <input type="text" name="address" id="address">

            <label>Password:</label>
            <input type="password" name="password" id="password">

            <label>Node (IP:port):</label>
            <input type="text" name="node" id="node" placeholder="127.0.0.1:8546">

            <input type="button" name="login" id="login" value="Login">
            <input type="button" name="register" id="register" value="Register">
        </form>
    </div>
    <div id="aside"></div>
    <script>
        function asideScoreCreateButton(id, name) {

            var $button = $('<button class="accordion" id="' + id + '">' + name + '</button>');
            $button.appendTo($("#aside"));

            var $div = $('<div class="panel" id="panel_' + id + '"></div>');
            $div.appendTo($("#aside"));
        }

        function asideButtonDetailAdd(id, id_added, title) {

            var $content = $('<h4 id="' + id_added + '">' + title + '</h4>');
            $content.appendTo($('#panel_' + id));
        }

        function asideButtonListAdd(id_added, itemList) {

            var ili = '';

            $.each(itemList, function (index2, value2) { //87

                ili += value2.avatar + " " + value2.score + "<br>";
            });
            var $li = $("<div>" + ili + "</div>");
            $li.appendTo($('#' + id_added));
        }

        function asideScoreCreateButtonAddEventListener(id) {

            $("#" + id).click(function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }

        function asideScore() {

            var $epoch = $('<h3>EPOCH: 4</h3>');
            $epoch.appendTo($("#aside"));

            $.each(conf_game_score.type_list, function (index, value) {

                var id_type = 'score_' + value.name;
                asideScoreCreateButton(id_type, value.name_translated);

                $.each(conf_game_score.list, function (index2, value2) {

                    if (value2.type == value.name) {

                        asideButtonDetailAdd(id_type, value2.name, value2.name_translated);

                        asideButtonListAdd(value2.name, value2.list);
                    }
                });
                asideScoreCreateButtonAddEventListener(id_type);
            });
        }

        asideScore();
    </script>
</div>
<div id="footer">
    Chain Accelerator for <?php echo Conf::$company; ?> 2019 - <a href="legal.html">Legal</a> - <a href="rules.html">Rules</a>
</div>
<script>


    $.ajax({
        method: "POST",
        url: "api/form.php",
        xhrFields: {
            withCredentials: true
        },
        data: {address: $("#address").valueOf(), password: $("#password").valueOf(), node: $("#node").valueOf()}
    })
        .done(function (msg) {
            alert("Data Saved: " + msg);
        });

</script>
</body>
</html>