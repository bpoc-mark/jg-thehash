<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/common.css">
    <title>Document</title>

    <script>
        (function(d) {
            var config = {
                    kitId: 'utn7uue',
                    scriptTimeout: 3000,
                    async: true
                },
                h = d.documentElement,
                t = setTimeout(function() {
                    h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
                }, config.scriptTimeout),
                tk = d.createElement("script"),
                f = false,
                s = d.getElementsByTagName("script")[0],
                a;
            h.className += " wf-loading";
            tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
            tk.async = true;
            tk.onload = tk.onreadystatechange = function() {
                a = this.readyState;
                if (f || a && a != "complete" && a != "loaded") return;
                f = true;
                clearTimeout(t);
                try {
                    Typekit.load(config)
                } catch (e) {}
            };
            s.parentNode.insertBefore(tk, s)
        })(document);
    </script>


    <style>
        .error_msg {
            color: #ea4335 !important;
            font-size: 12px;
            z-index: 100;
        }
    </style>
</head>

<body>
    <div class="thanks">
        <div class="l-wrap">
            <div class="ttl_cont">
                <h1 class="thanks__ttl">Thank you!</h1>
                <div class="line"></div>
            </div>
        </div>
        <div class="img_div">
            <img src="../img/thanks/handshake.jpg" alt="">
        </div>
        <div class="thanks_ttl_cont">
            <p class="thanks__desc">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
            </p>
            <a href="http://jg-thehash.test/contact-form.php">
                <input type="submit" class="btn" name="btn_submit" value="Back To Top Page">
            </a>
        </div>
    </div>
</body>

</html>