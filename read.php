<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<table class="table1">
    <tr>
        <th>名前</th>
        <th>年齢</th>
        <th>メールアドレス</th>
        <th>趣味</th>
    </tr>  
    <div style="position:relative;width:50%;height:70%;">
    <canvas id="barChart"></canvas>
</div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<?php
// ファイルを変数に格納
$filename = 'data/data.txt';
 
// fopenでファイルを開く（'r'は読み込みモードで開く）
$fp = fopen($filename, 'r');
 
// whileで行末までループ処理
?><script>
    let json_data = [];
    let data1 = "";
</script><?php
while (!feof($fp)) {
  // fgetsでファイルを読み込み、変数に格納
  $txt = fgets($fp);
  $data = explode(",",$txt);
  if(empty($txt)){
    continue;
  }
  $data1 = str_replace("\n", "", $data );
  $array = ['datetime'=>$data1[0], 'name'=>$data1[1], 'age'=>$data1[2], 'mail'=>$data1[3], 'hobby'=>$data1[4]];
  $json=json_encode($array);
//   echo $json;
  ?>
  <script>
    data1 = JSON.parse('<?=$json?>'); //JSON文字列→配列に変換
    // console.log(data1);
    json_data.push(data1);
    // data1 = "";
    // console.log(json_data);
  </script>
    <tr>
        <td><?=$data[1]?></td>
        <td><?=$data[2]?></td>
        <td><?=$data[3]?></td>
        <td><?=$data[4]?></td>
    </tr>
<?php
} 
 // fcloseでファイルを閉じる
 fclose($fp);
?>
<script>
    console.log(json_data);
    let ob = Object.keys(json_data);
    // console.log(ob);[0,1]
    // ob.forEach((key) => console.log(json_data[key].age))
    ob.forEach((key) => console.log(json_data[key].age))
    let data = new Array(json_data.length);
    let count1=0;
    let count2=0;
    let count3=0;
    let count4=0;
    let count5=0;
    let count6=0;
    let count7=0;
    let count8=0;
    let count9=0;
    let count10=0;
    for(let i=0; i<json_data.length; i++){
        data[i] = json_data[i].age;
        if(data[i]<=10){
            count1 += 1;
        }else if(data[i]>10 && data[i]<=20){
            count2 += 1;
        }else if(data[i]>20 && data[i]<=30){
            count3 += 1;
        }else if(data[i]>30 && data[i]<=40){
            count4 += 1;
        }else if(data[i]>40 && data[i]<=50){
            count5 += 1;
        }else if(data[i]>50 && data[i]<=60){
            count6 += 1;
        }else if(data[i]>60 && data[i]<=70){
            count7 += 1;
        }else if(data[i]>70 && data[i]<=80){
            count8 += 1;
        }else if(data[i]>80 && data[i]<=90){
            count9 += 1;
        }else{
            count10 += 1;
        }
    }
    let barCtx = document.getElementById("barChart");
    let barConfig = {
    type: 'bar',
    data: {
        labels: ['0-10', '11-20', '21-30', '31-40', '41-50', '51-60', '61-70', '71-80', '81-90', '91-100'],
        datasets: [{
            data: [count1,count2,count3,count4,count5,count6,count7,count8,count9,count10],
            // label: ['0-10','10-20','20-30', '30-40', '40-50', '50-60', '60-70', '70-80', '80-90', '90-100'],
            label:"年齢分布",
            backgroundColor: ['#ff0000','#ffff00','#008000','#800080','#ffa500','#ff0000','#0000ff','#ffff00','#008000','#800080'],
            borderWidth: 1,
        }]
    },
    options: {
        scales: {
            x: {  // x軸設定
                barPercentage: 0.6,  // バーの幅を調整
                categoryPercentage: 0.8,  // バーの幅を調整
            },
            y: {  // y軸設定
                min: 0,
                max: 10,
            }
        }
    }
};
        let barChart = new Chart(barCtx, barConfig);



        // Wordcloud
//         import { Chart } from 'chart.js';
//         import { WordCloudController, WordElement } from 'chartjs-chart-wordcloud';
//         Chart.register(WordCloudController, WordElement);

// new Chart(ctx, {
//   type: WordCloudController.id,
//   data: {
//     // text
//     labels: ['Hello', 'world', 'normally', 'you', 'want', 'more', 'words', 'than', 'this'],
//     datasets: [
//       {
//         label: 'DS',
//         // size in pixel
//         data: [90, 80, 70, 60, 50, 40, 30, 20, 10],
//       },
//     ],
//   },
//   options: {},
// });
</script>
</table>
</body>
</html>
