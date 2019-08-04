<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner"
    src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/oda-onsen/oda-onsen.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>小国郷の中で最も歴史の浅い「小田温泉」は、山間にひっそり佇む温泉地です。昭和50年に初めて開湯された温泉の特徴は、肌に良いと言われているメタケイ酸が多く含まれており、怪我などが原因の身体の痛みにも効くと言われています。
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
            <td class="r3">2時間5分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間30分</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台）</td>
            <td class="r2">飛行機</td>
            <td class="r3">1時間25分</td>
        </tr>
        <tr>
            <td class="r1">名古屋</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間25分</td>
        </tr>
        <tr>
            <td class="r1">大阪（関西空港）</td>
            <td class="r2">飛行機</td>
            <td class="r3">1時間15分</td>
        </tr>
        <tr>
            <td class="r1">福岡→嬉野温泉バスセンター</td>
            <td class="r2">バスまたはJR（黒川温泉直行）</td>
            <td class="r3">2時間15分</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>黒川温泉</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/oda-onsen/oda-onsen-kurokawa-onsen.jpg"
                alt="黒川温泉">
            <p>黒川温泉は自然豊かな景色に囲まれているので、心地よく入浴することができます。また、切り傷などに効くと言われている硫黄温泉や、アトピーなどの皮膚炎にも良いと言われている薬師湯に入ることができます。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>夫婦滝</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/oda-onsen/oda-onsen-fufutaki.jpg"
                alt="夫婦滝">
            <p>夫婦滝は縁結びに良いと言われており、結婚に踏み出せないカップルなどには人気の場所です。また緑豊かな森林が周りにあるので、心を浄化してくれると若い男女からは絶賛の場所です。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>山あいの宿　山みず木</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/oda-onsen/oda-onsen-yamamizuki.jpg"
                alt="山あいの宿　山みず木">
            <p>温泉街から少し距離がありますが、山あいに位置しているので周りの音を気にせずに入浴できます。露天風呂の近くには川が流れており、川のせせらぎを聴きながら入浴できます。また、大自然の中で温泉に入っている気分になるので、ストレスが溜まっている方におすすめです。
            </p>
        </div>
    </div>