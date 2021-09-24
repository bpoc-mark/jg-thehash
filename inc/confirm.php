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
                        <p class="confirm"><?php echo $clean['address']; ?></p>
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

    <!-- <div class="privacy">
        <div class="l-wrap">
            <h1 class="privacy__ttl">Privacy policy</h1>
            <div class="line"></div>

            <div class="privacy__content">
                <div class="privacy__content--item">
                    <p class="title">個人情報保護について</p>
                    <p class="desc">個人情報保護の重要性を認識し、適切に利用し、保護することが社会的責任であると考え、 個人情報の保護に努めることをお約束いたします。</p>
                </div>
                <div class="privacy__content--item">
                    <p class="title">個人情報の定義</p>
                    <p class="desc">個人情報とは、個人に関する情報であり、氏名、生年月日、性別、電話番号、電子メールアドレス、職業、勤務先等、特定の個人を識別し得る情報をいいます。</p>
                </div>
                <div class="privacy__content--item">
                    <p class="title">個人情報の収集・利用</p>
                    <p class="desc">当社は、以下の目的のため、その範囲内においてのみ、個人情報を収集・利用いたします。当社による個人情報の収集・利用は、お客様の自発的な提供によるものであり、お客様が個人情報を提供された場合は、当社が本方針に則って個人情報を利用することをお客様が 許諾したものとします。お客様に有益かつ必要と思われる情報の提供業務遂行上で必要となる当社からの問い合わせ、確認、およびサービス向上のための意見収集、各種のお問い合わせ対応に使用いたします。</p>
                </div>
                <div class="privacy__content--item">
                    <p class="title">個人情報の第三者提供</p>
                    <p class="desc">当社は、法令に基づく場合等正当な理由によらない限り、事前に本人の同意を得ることなく、個人情報を第三者に開示・提供することはありません｡</p>
                </div>
            </div>
            <div class="back-to-top">
                <span></span>
                <p>Back to top</p>
            </div>
        </div>
    </div> -->
</body>

</html>