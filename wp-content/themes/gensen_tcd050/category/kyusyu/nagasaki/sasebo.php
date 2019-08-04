<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner"
    src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/nagasaki/sasebo/sasebo.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>佐世保は長崎県北部に位置し、佐世保湾や大村湾に面しています。明治初期までは一寒村に過ぎませんでしたが、1886年に海軍基地、1890年に海軍工廠が設置されたことで、急速に発展します。現在でもアメリカ軍基地や自衛隊基地が置かれており、基地の町の性格が色濃くなっています。1992年3月、大村湾の埋立地にハウステンボスが開園します。佐世保市の九十九島一帯は宇久島とともに西海国立公園に、市の北部は北松県立自然公園に属しています。
        </p>
    </div>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>へのアクセス・所要時間</h3>
    <table class="archive_heading_table">
        <tr>
            <th class="r1">出発地</th>
            <th class="r2">手段</th>
            <th class="r3">所要時間</th>
        </tr>
        <tr>
            <td class="r1">東京（羽田）→長崎空港→佐世保駅</td>
            <td class="r2">飛行機→空港バス</td>
            <td class="r3">3時間15分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）→長崎空港→佐世保駅</td>
            <td class="r2">飛行機→空港バス</td>
            <td class="r3">5時間</td>
        </tr>
        <tr>
            <td class="r1">仙台（仙台空港）→福岡空港→佐世保駅</td>
            <td class="r2">飛行機→西鉄高速バス（筑紫野経由）</td>
            <td class="r3">4時間</td>
        </tr>
        <tr>
            <td class="r1">名古屋（中部国際空港）→長崎空港→佐世保駅</td>
            <td class="r2">飛行機→空港バス</td>
            <td class="r3">3時間</td>
        </tr>
        <tr>
            <td class="r1">大阪（関西空港）→福岡空港→佐世保駅</td>
            <td class="r2">飛行機→西鉄高速バス（筑紫野経由）</td>
            <td class="r3">3時間15分</td>
        </tr>
        <tr>
            <td class="r1">福岡（博多駅）→佐世保駅</td>
            <td class="r2">JR特急</td>
            <td class="r3">2時間</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>九十九島</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/nagasaki/sasebo/sasebo-tsukumoto.jpg"
                alt="九十九島">
            <p>九十九島とは、佐世保港から北へ約25キロメートルに渡って点在する島々のことであり、島の密度は日本一です。「九十九」とはなっていますが、実際の数は208あります。ハリウッド映画「ラストサムライ」のロケ地にもなった石岳展望台や、菜の花やコスモスなどの季節折々の花を楽しめる展海峰など、8つの展望所があります。各展望所から見るリアス式海岸の景観は圧巻です。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>西海橋公園</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/nagasaki/sasebo/sasebo-saikaibashipark.jpg"
                alt="西海橋公園">
            <p>佐世保市と西海市に挟まれた針尾瀬戸には「西海橋」と「新西海橋（第二西海橋）」が架かっており、その絶景を望める公園が「西海橋公園」です。西海橋から新西海橋（歩道橋）、ウォークデッキなどを散策する「回遊コース」では、間近に大自然の海を見ることができ、その迫力を堪能できます。また、公園ではアスレチックを楽しんだり、桜やツツジの花を鑑賞できたりします。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>ハウステンボス</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/category/kyusyu/nagasaki/sasebo/sasebo-huis-ten-bosch.jpg"
                alt="ハウステンボス">
            <p>ヨーロッパをテーマにしたテーマパークです。園内にはヨーロッパ風の洒落たホテルや、世界初のロボットホテル「変なホテル」があり、心が刺激されます。また、船が行き交う運河やアミューズメントコーナー、最新のテクノロジーを駆使した「エコシティー」などの施設が充実しており、1日居ても飽きないほど楽しめます。
            </p>
        </div>
    </div>