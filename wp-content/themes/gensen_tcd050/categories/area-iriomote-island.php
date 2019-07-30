<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner"
    src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/okinawa/iriomote-island/iriomote-island.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>西表島は、石垣島や竹富島、小浜島などで八重山諸島と呼ばれています。名物には上原港に位置する「パーラー美々」では新鮮でとても甘いマンゴーの直営店であり、非常に高品質なマンゴーを食べる事ができるのです。また「ピナイサーラの滝」は55ｍ物落差を誇る日本一落差の激しい滝として有名で、非現実的な光景を楽しむことができます。
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
            <td class="r1">東京（羽田）</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間50分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">4時間50分</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台）</td>
            <td class="r2">飛行機</td>
            <td class="r3">4時間25分</td>
        </tr>
        <tr>
            <td class="r1">名古屋</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間30分</td>
        </tr>
        <tr>
            <td class="r1">大阪（関西空港）</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間20分</td>
        </tr>
        <tr>
            <td class="r1">福岡</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>ジャングルトレッキング</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/okinawa/iriomote-island/jungle-trekking.jpg"
                alt="ジャングルトレッキング">
            <p>文字通りジャングルのような森であり、この場所を探索するツアーに参加した場合にはトレッキングやカヤックを体験することができます。また地元でとれた食材を使用した美味な食事をとることもできるのでとても魅力的です。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>星砂の浜</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/okinawa/iriomote-island/hosizunanohama.jpg"
                alt="星砂の浜">
            <p>ここに存在する白浜の砂は星形をしています。これらは珊瑚や特殊な虫の死骸が砕けてこのような形になっていると言われており、顕微鏡で見ると星の形をしているのです。持ち帰ることはNGですが、少しだけ特殊な体験をしたいときにおすすめです。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>バラス島</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/okinawa/iriomote-island/barasu-island.jpg"
                alt="バラス島">
            <p>この海の特徴は何と言ってもコバルトブルーの海模様!非常に透明度のたかい海となっているので神秘的な光景を楽しむことができますし、この海で泳いで遊ぶこともできます。
            </p>
        </div>
    </div>