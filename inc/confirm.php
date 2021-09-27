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
    <div class="contact">
        <div class="l-wrap">
            <div class="ttl_cont">
                <h1 class="contact__ttl">Contact form</h1>
                <div class="line"></div>
                <p class="contact__desc">ご予約その他お問合せは下記フォームから送信くださいませ。<br>
                    折り返し店舗よりご連絡させていただきます。<br>
                    ※ご希望連絡時間帯がございましたらお問合せ内容の欄にご記入くだ<br>
                    さいませ
                </p>
            </div>

            <form action="#form" method="post" enctype="multipart/form-data" novalidate>
                <div class="form-group_1">
                    <div class="row">
                        <label for="">ご用件<span>※必須</span></label>
                    </div>
                    <div class="row">
                        <p class="confirm"><?php echo $clean['selector']; ?></p>
                    </div>
                </div>
                <div class="form-group_1">
                    <div class="row">
                        <label>お名前<span>※必須</span></label>
                    </div>
                    <div class="row">
                        <p class="confirm"><?php echo $clean['your_name']; ?></p>
                    </div>

                </div>
                <div class="form-group_1">
                    <div class="row">
                        <label for="">フリガナ</label>
                    </div>
                    <div class="row">
                        <p class="confirm"><?php echo $clean['furigana']; ?></p>
                    </div>
                </div>
                <div class="form-group_1">
                    <div class="row">
                        <label for="email">メールアドレス<span>※必須</span></label>
                    </div>
                    <div class="row">
                        <p class="confirm"><?php echo $clean['email']; ?></p>
                    </div>
                </div>
                <div class="form-group_1">
                    <div class="row">
                        <label for="">メールアドレス確認用<span>※必須</span></label>
                    </div>
                    <div class="row">
                        <p class="confirm"><?php echo $clean['email']; ?></p>
                    </div>
                </div>
                <div class="form-group_1">
                    <div class="row">
                        <label for="">電話番号<span>※必須</span></label>
                    </div>
                    <div class="row">
                        <p class="confirm"><?php echo $clean['tel']; ?></p>
                    </div>
                </div>
                <div class="form-group_1">
                    <div class="row">
                        <label for="">ご住所<span>※必須</span></label>
                    </div>
                    <div class="row">
                        <p class="confirm"><?php echo $clean['postal']; ?></p><br>
                        <p class="confirm"><?php echo $clean['inquiry']; ?></p>
                    </div>
                </div>
                <div class="form-group_1">
                    <div class="row">
                        <label for="">お問い合わせ内容</label>
                    </div>
                    <div class="row">
                        <p class="confirm"><?php echo $clean['inquiry']; ?></p>
                    </div>
                </div>

                <input type="hidden" name="selector" value="<?php echo $clean['selector']; ?>">
                <input type="hidden" name="your_name" value="<?php echo $clean['your_name']; ?>">
                <input type="hidden" name="furigana" value="<?php echo $clean['furigana']; ?>">
                <input type="hidden" name="email" value="<?php echo $clean['email']; ?>">
                <input type="hidden" name="tel" value="<?php echo $clean['tel']; ?>">
                <input type="hidden" name="postal" value="<?php echo $clean['postal']; ?>">
                <input type="hidden" name="address" value="<?php echo $clean['address']; ?>">
                <input type="hidden" name="inquiry" value="<?php echo $clean['inquiry']; ?>">


                <div class="agree">
                    <ul>
                        <li>
                            <input type="radio" id="下記プライバシーポリ シーに同意します。" checked name="agreement" value="下記プライバシーポリ シーに同意します。">
                            <label for="下記プライバシーポリ シーに同意します。">下記プライバシーポリ シーに同意します。</label>
                            <div class="check"></div>
                        </li>
                    </ul>
                    <input type="submit" class="btn" value="Back">
                    <input type="submit" class="btn" name="btn_submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>