<!DOCTYPE html>
<html lang="ur" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>باخبر ڈیرہ</title>
    <style>
        body {
            font-family: 'Noto Nastaliq Urdu', serif;
            background-color: #f2f2f2;
            direction: rtl;
            padding: 20px;
        }
        .news {
            background-color: white;
            margin-bottom: 15px;
            padding: 15px;
            border-right: 5px solid #2c3e50;
            box-shadow: 0 0 5px #999;
        }
        .title {
            font-size: 24px;
            color: #2c3e50;
        }
        .content {
            font-size: 18px;
            color: #333;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>📰 باخبر ڈیرہ</h1>
    <?php
    $db = new SQLite3('news.db');
    $results = $db->query('SELECT * FROM news ORDER BY id DESC');
    while ($row = $results->fetchArray()) {
        echo "<div class='news'>";
        echo "<div class='title'>{$row['title']}</div>";
        echo "<div class='content'>{$row['content']}</div>";
        echo "</div>";
    }
    ?>
    <div class="footer">© "باخبر ڈیرہ" - تمام حقوق محفوظ ہیں</div>
</body>
</html>
