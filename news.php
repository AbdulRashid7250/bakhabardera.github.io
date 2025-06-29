<?php
$db = new SQLite3("news.db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $image = $_POST["image"];

    $stmt = $db->prepare("INSERT INTO news (title, content, image) VALUES (:t, :c, :i)");
    $stmt->bindValue(":t", $title);
    $stmt->bindValue(":c", $content);
    $stmt->bindValue(":i", $image);
    $stmt->execute();

    header("Location: news.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ur" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>📝 باخبر ڈیرہ ─ خبر شامل کریں</title>
    <style>
        body { font-family: sans-serif; background: #f9f9f9; padding: 20px; direction: rtl; }
        h1 { color: #222; }
        form { background: white; padding: 15px; margin-bottom: 20px; border-radius: 8px; }
        input, textarea { width: 100%; margin-top: 5px; padding: 8px; font-size: 16px; }
        button { padding: 10px 20px; background: green; color: white; border: none; border-radius: 5px; }
        .news-item { background: white; padding: 10px; margin-bottom: 10px; border-radius: 6px; }
        img { max-width: 100%; height: auto; margin-top: 5px; }
    </style>
</head>
<body>
    <h1>📝 باخبر ڈیرہ ─ خبر شامل کریں</h1>
    <form method="post">
        <label>سرخی:</label>
        <input type="text" name="title" required>
        <label>تفصیل:</label>
        <textarea name="content" required></textarea>
        <label>تصویر کا لنک (Image URL):</label>
        <input type="text" name="image">
        <button type="submit">محفوظ کریں</button>
    </form>

    <h1>🗞️ تازہ خبریں</h1>
    <?php
    $rows = $db->query("SELECT * FROM news ORDER BY id DESC");
    while ($row = $rows->fetchArray()) {
        echo "<div class='news-item'>";
        echo "<h3>" . htmlspecialchars($row["title"]) . "</h3>";
        echo "<p>" . nl2br(htmlspecialchars($row["content"])) . "</p>";
        if (!empty($row["image"])) {
            echo "<img src='" . htmlspecialchars($row["image"]) . "'>";
        }
        echo "</div>";
    }
    ?>
</body>
</html>
