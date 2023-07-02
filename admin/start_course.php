<?php
include("../../conn.php");
@session_start();
header("Cache-control:private");

// 获取课程ID（通过GET参数）
$courseID = $_GET['id'];

// 查询数据库，获取考试信息
$sql = "SELECT start_time, end_time FROM exams WHERE cou_id = '$courseID'";
$result = $db->query($sql);

// 判断是否获取到考试信息
if ($result->num_rows > 0) {
    $exam = $result->fetch_assoc();
    $startTime = strtotime($exam['start_time']); // 考试开始时间
    $endTime = strtotime($exam['end_time']); // 考试结束时间
    $current_time = time(); // 当前时间

    // 检查当前时间是否在考试时间范围内
    if ($current_time >= $startTime && $current_time <= $endTime) {
        // 当前时间符合考试时间，开始显示题目表单和提交答案
        echo "<h1>考试题目</h1>";
        echo "<form action='submit_answers.php' method='post'>";

        // 查询数据库，获取该课程的题目信息
        $questionSql = "SELECT * FROM questions WHERE cou_id = '$courseID'";
        $questionResult = $db->query($questionSql);

        // 判断是否获取到题目信息
        if ($questionResult->num_rows > 0) {
            // 遍历题目信息
            while ($row = $questionResult->fetch_assoc()) {
                echo "<h3>题目编号: " . $row['que_id'] . "</h3>";
                echo "<p>题目描述: " . $row['question'] . "</p>";

                // 判断题目类型
                if ($row['answer'] == 0) {
                    // 简答题
                    echo "<textarea name='answer_" . $row['que_id'] . "' rows='4' cols='50' placeholder='请输入您的答案'></textarea>";
                } else {
                    // 选择题
                    echo "<input type='radio' name='answer_" . $row['que_id'] . "' value='A' />A";
                    echo "<input type='radio' name='answer_" . $row['que_id'] . "' value='B' />B";
                    echo "<input type='radio' name='answer_" . $row['que_id'] . "' value='C' />C";
                    echo "<input type='radio' name='answer_" . $row['que_id'] . "' value='D' />D";
                }
            }

            // 添加课程ID的隐藏输入项
            echo "<input type='hidden' name='courseID' value='" . $courseID . "' />";

            // 提交按钮
            echo "<br /><br /><input type='submit' value='提交答案' />";
            echo "</form>";
        } else {
            // 题目不存在
            echo "没有找到相关题目。";
        }
    } else {
        // 当前时间不在考试时间范围内，提示考试未开始
        echo "<script>alert('考试未开始！');</script>";
    }
} else {
    // 考试信息不存在
    echo "没有找到相关考试。";
}

// 检查是否所有题目都已完成
if (isset($_POST['courseID'])) {
    $courseID = $_POST['courseID'];

    // 查询数据库，获取该课程的题目数量
    $questionCountSql = "SELECT COUNT(*) AS total FROM questions WHERE cou_id = '$courseID'";
    $questionCountResult = $db->query($questionCountSql);
    $questionCount = $questionCountResult->fetch_assoc()['total'];

    // 检查已提交的答案数量是否与题目数量相等
    if ($questionCount == count($_POST) - 1) {
        // 所有题目都已完成，考试结束，跳转至 already.php
        header("Location: already.php");
        exit;
    }
}

// 检查考试时间是否结束
if ($current_time > $endTime) {
    // 考试时间结束，跳转至 already.php
    header("Location: already.php");
    exit;
}
?>