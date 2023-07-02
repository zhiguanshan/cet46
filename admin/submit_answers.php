<?php
include("../../conn.php");
@session_start();
header("Cache-control:private");

// 获取课程ID（通过POST参数）
$courseID = $_POST['courseID'];

// 查询数据库，获取该课程的题目信息
$sql = "SELECT * FROM questions WHERE cou_id = '$courseID'";
$result = $db->query($sql);

// 判断是否获取到题目信息
if ($result->num_rows > 0) {
    // 遍历题目信息
    while ($row = $result->fetch_assoc()) {
        $questionID = $row['que_id'];
        $answer = $_POST['answer_' . $questionID];

        // 保存答案到数据库（假设有一个answers表）
        $insertSql = "INSERT INTO answers (course_id, question_id, answer) VALUES ('$courseID', '$questionID', '$answer')";
        $db->query($insertSql);
    }

    // 计算成绩等其他逻辑操作
    // ...

    // 完成答题，跳转或输出相应信息
    echo "答题提交成功！";
} else {
    echo "没有找到相关题目。";
}
?>