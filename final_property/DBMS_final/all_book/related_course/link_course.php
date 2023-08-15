<?php
// 连接到数据库
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbms_final";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接数据库失败: " . $conn->connect_error);
}

// 执行 SQL 查询
$sql = "SELECT * FROM description";
$result = $conn->query($sql);

// 创建 XML 文档
$xmlDoc = new DOMDocument('1.0', 'UTF-8');

// 创建根元素
$root = $xmlDoc->createElement('data');
$xmlDoc->appendChild($root);

// 处理查询结果
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // 创建子元素
        $item = $xmlDoc->createElement('item');

        // 将每列数据作为子元素添加到子元素中
        foreach ($row as $column => $value) {
            $child = $xmlDoc->createElement($column, $value);
            $item->appendChild($child);
        }

        // 将子元素添加到根元素中
        $root->appendChild($item);
    }
}

// 保存 XML 文件
$xmlDoc->formatOutput = true;
$xmlDoc->save('output.xml');

// 关闭数据库连接
$conn->close();
?>
<script>
    // alert("Course review added!");
    // window.location.href="../all_book/related_course/link_course.php";
    window.location.href = "../../all_course/Home.php";
</script>

