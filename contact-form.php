<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

error_reporting(E_ERROR | E_WARNING | E_PARSE);
// 変数の初期化
$clean = array();
$error = array();
// サニタイズ
if (!empty($_POST)) {
    foreach ($_POST  as $key => $value) {
        $clean[$key] = htmlspecialchars($value, ENT_QUOTES);
    }
}
// 文字成型
$clean['tel'] = str_replace(array('-', 'ー', '−', '―', '‐'), '', $clean['tel']);
$clean['tel'] = str_replace(array(" ", "　"), "", $clean['tel']);
$clean['tel'] = mb_convert_kana($clean['tel'], "n");
$clean['email'] = str_replace(array(" ", "　"), "", $clean['email']);
$clean['email'] = mb_convert_kana($clean['email'], "askhc");


if (!empty($clean['btn_submit'])) {
    $error = validation($clean);

    if (empty($error)) {

        $page_flag = 1;
        // セッションの書き込み
        session_start();
        $_SESSION['page'] = true;

        if (!empty($_SESSION['page']) && $_SESSION['page'] === true) {
            // セッションの削除
            unset($_SESSION['page']);
            $page_flag = 2;
            // 変数とタイムゾーンを初期化
            $header = null;
            $body = null;
            $admin_body = null;
            $auto_reply_subject = null;
            $auto_reply_text = null;
            $admin_reply_subject = null;
            $admin_reply_text = null;
            date_default_timezone_set('Asia/Tokyo');

            // //日本語の使用宣言
            mb_language("ja");
            mb_internal_encoding("UTF-8");

            // // 件名を設定
            $auto_reply_subject = '【資料請求】自動返信メール｜THEHASH';
            // // 本文を設定
            $auto_reply_text .=  $clean['your_name'] . "様\n\n";
            $auto_reply_text .= "この度は、お問い合わせ頂きありがとうございます。\n";
            $auto_reply_text .= "以下の通りに承りました。\n";
            $auto_reply_text .= "内容をご確認の上、担当者より追ってご連絡させていただきますので\n";
            $auto_reply_text .= "今しばらくお待ち頂きますようお願い申し上げます。\n\n";
            $auto_reply_text .= "-----以下送信内容-----\n";
            // $auto_reply_text .= "お問い合わせ内容: " . $_POST['customer_attr'][0] . " - " . $_POST['customer_attr'][1] . " - " . $_POST['customer_attr'][2] . " - " . $_POST['customer_attr'][3] . "\n";
            $auto_reply_text .= "ご用件: " . $clean['selector'] . "\n";
            $auto_reply_text .= "お名前: " . $clean['your_name'] . "\n";
            $auto_reply_text .= "フリガナ: " . $clean['furigana'] . "\n";
            $auto_reply_text .= "メールアドレス: " . $clean['email'] . "\n";
            $auto_reply_text .= "電話番号: " . $clean['tel'] . "\n";
            $auto_reply_text .= "郵便番号: " . $clean['postal'] . "\n";
            $auto_reply_text .= "都道府県・番地: " . $clean['address'] . "\n";
            $auto_reply_text .= "お問い合わせ内容: " . $clean['inquiry'] . "\n";
            // $auto_reply_text .= "お問い合わせ内容: " . nl2br($clean['contents']) . "\n";
            $auto_reply_text .= "プライバシーポリシー: 同意済み\n";
            $auto_reply_text .= "---------------------------- \n";
            $auto_reply_text .= "■本メールは送信専用メールです。\n";
            $auto_reply_text .= "ご返信頂いてもお答えできませんのでご了承ください。\n";
            $auto_reply_text .= "--------------- \n\n";

            $autobody .= $auto_reply_text . "\n";

            // // 運営側へ送るメールの件名
            $admin_reply_subject = "THEHASH";
            // // 本文を設定;
            $admin_reply_text .= "THEHASH\n";
            $admin_reply_text .= "-----以下送信内容--------\n";
            // $admin_reply_text .= "お問い合わせ内容: " . $_POST['customer_attr'][0] . " - " . $_POST['customer_attr'][1] . " - " . $_POST['customer_attr'][2] . " - " . $_POST['customer_attr'][3] . "\n";
            $admin_reply_text .= "ご用件: " . $clean['selector'] . "\n";
            $admin_reply_text .= "お名前: " . $clean['your_name'] . "\n";
            $admin_reply_text .= "フリガナ: " . $clean['furigana'] . "\n";
            $admin_reply_text .= "メールアドレス: " . $clean['email'] . "\n";
            $admin_reply_text .= "電話番号: " . $clean['tel'] . "\n";
            $admin_reply_text .= "郵便番号: " . $clean['postal'] . "\n";
            $admin_reply_text .= "都道府県・番地: " . $clean['address'] . "\n";
            $admin_reply_text .= "お問い合わせ内容: " . $clean['inquiry'] . "\n";
            // $admin_reply_text .= "お問い合わせ内容: " . nl2br($clean['contents']) . "\n";
            $admin_reply_text .= "プライバシーポリシー: 同意済み\n";
            $admin_reply_text .= "---------------------------- \n\n";
            $admin_reply_text .= "送信された日時: " . date("Y/m/d D H:i") . "\n";
            $adminbody .= $admin_reply_text . "\n";

            // MAIL CONSTANT
            $host = 'smtp.gmail.com';
            $port = 465;
            $encryption = "ssl";
            $usernameSmtp = 'gregarsua@bpoc.co.jp';
            $passwordSmtp = '115262308301998';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                // $mail->SMTPDebug = false;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = $host;                         //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $usernameSmtp;           //SMTP username
                $mail->Password   = $passwordSmtp;                             //SMTP password
                $mail->SMTPSecure = $encryption;                                  //Enable implicit TLS encryption
                $mail->Port       = $port;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                $mail->CharSet = 'UTF-8';

                //Recipients
                $mail->setFrom('gregarsua@bpoc.co.jp', 'THEHASH');
                $mail->addReplyTo('gregarsua@bpoc.co.jp', 'THEHASH');

                //Content
                $mail->addAddress($clean['email']);     //Add a recipient
                $mail->isHTML(false);
                $mail->ContentType = 'text/plain';                          //Set email format to HTML
                $mail->Subject = mb_encode_mimeheader($auto_reply_subject, "ISO-2022-JP-MS");
                $mail->Body    = $autobody;
                // $mail->send();

                if ($mail->send()) {
                    if (empty($mail->ClearAllRecipients())) {
                        //Content
                        $mail->addAddress('gregarsua@bpoc.co.jp');             //Add a recipient
                        $mail->isHTML(false);
                        $mail->ContentType = 'text/plain';                          //Set email format to HTML
                        $mail->Subject = mb_encode_mimeheader($admin_reply_subject, "ISO-2022-JP-MS");
                        $mail->Body    = $adminbody;
                        $mail->send();

                        // $url = "https://locaop.hipetest.com/thanks.php";
                        // header('Location: ' . $url, true, 301);
                        require_once($_SERVER['DOCUMENT_ROOT'] . "/inc/thanks.php");
                    }
                }
            } catch (phpmailerException $e) {
                echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
            } catch (Exception $e) {
                echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
            }
        } else {
            $page_flag = 0;
        }
    }
}

function validation($data)
{
    $error = array();

    if (empty($_POST['selector'])) {
        $error['selector'] = "「ご用件」は入力必須項目です。";
    }

    // 氏名のバリデーション
    if (empty($data['your_name'])) {
        $error['your_name'] = "「お名前」は入力必須項目です。";
    } elseif (20 < mb_strlen($data['your_name'])) {
        $error['your_name'] = "20文字以内で入力してください。";
    }

    // if (empty($data['furigana'])) {
    //     $error['furigana'] = "「フリガナ」は入力必須項目です。";
    // } elseif (20 < mb_strlen($data['furigana'])) {
    //     $error['furigana'] = "20文字以内で入力してください。";
    // }

    // メールアドレスのバリデーション//
    if (empty($data['email'])) {
        $error['email'] = "「メールアドレス」は入力必須項目です。";
    } elseif (!preg_match('/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['email'])) {
        $error['email'] = "正しい形式で入力してください。";
    }

    // 氏名のバリデーション
    if (empty($data['address'])) {
        $error['address'] = "「都道府県・番地」は入力必須項目です。";
    } elseif (20 < mb_strlen($data['address'])) {
        $error['address'] = "20文字以内で入力してください。";
    }

    if (empty($data['postal'])) {
        $error['postal'] = "「郵便番号」は入力必須項目です。";
    } elseif (20 < mb_strlen($data['postal'])) {
        $error['postal'] = "20文字以内で入力してください。";
    }

    // 電話番号のバリデーション
    if (empty($data['tel'])) {
        $error['tel'] = "「電話番号」は入力必須項目です。";
    } elseif (!preg_match('/^[0-9]+[0-9.-]+$/', $data['tel'])) {
        $error['tel'] = "正しい形式で入力してください。";
    }

    // 氏名のバリデーション
    // if( empty($data['contents']) ) {
    // 	$error['contents'] = "「お問い合わせ内容」は入力必須項目です。";
    // } elseif( 300 < mb_strlen($data['contents']) ) {
    // 	$error['contents'] = "20文字以内で入力してください。";
    // }

    if (empty($data['agreement'])) {
        $error['agreement'] = "「個人情報の取り扱いについて」に同意します は入力必須項目です。 ";
    }

    // if( empty($data['inquiry_type']) ) {
    // 	$error['inquiry_type'] = "「お問い合わせ種別」は入力必須項目です。";
    // }

    // if( empty($data['time1']) ) {
    // 	$error['time1'] = "「時間」は必須項目です。";
    // }

    return $error;
}
?>


<?php if ($page_flag === 1) :
    // 確認画面読み込み
    require_once(dirname(__FILE__) . "/inc/confirm.php");
?>
<?php elseif ($page_flag === 2) :
    // サンクスページへリダイレクト
    // $url = "https://locaop.hipetest.com/thanks.php";
    // header('Location: ' . $url, true, 301);
    require_once(dirname(__FILE__) . "/inc/thanks.php");
    exit;
?>
<?php else :
    // フォーム画面読み込み
    require_once(dirname(__FILE__) . "/inc/contact.php");
?>
<?php endif; ?>