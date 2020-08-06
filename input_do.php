<!doctype html>
<html lang="ja">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>PHP</title>
  </head>
  <body>
    <header>
    <h1 class="font-weight-normal">PHP</h1>
    </header>

    <main>
    <h2>Practice</h2>
      <!-- Mysqlに接続 -->
      <pre>
        <?php
        // Mysqlに接続
          try{
              $db = new PDO('mysql:dbname=mydb;host=localhost;port=8888;charset=utf8','root','root');
              // フォームに記入された内容をDBにInsertする処理(危険な文字列をそのまま渡さない)
              $statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
              $statement->execute(array($_POST['memo']));
              echo 'メッセージが登録されました';
              // DBにうまくつながらなかったらエラーを表示する処理
          }catch(PDOException $e){
              echo 'DB接続エラー:' . $e->getMessage();
          }
        ?>
      </pre>
    </main>
  </body>
</html>
