<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner"
    src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/tsuetate-onsen/tsuetate-onsen.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>熊本県阿蘇郡小国町にある「杖立温泉」は、湧出温度が約98℃の温泉街です。「九州の奥座敷」とも呼ばれ、杖立川沿いの谷間の狭地に大型旅館やこじんまりとした旅館など、様々な20の温泉宿が軒を連ねます。日本でも有数の泉質は塩化物泉を中心とし、街の26箇所に源泉が点在しています。
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
            <td class="r1">東京（羽田）→福岡空港→杖立温泉</td>
            <td class="r2">飛行機→高速バス</td>
            <td class="r3">4時間10分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）→福岡空港→杖立温泉</td>
            <td class="r2">飛行機→高速バス</td>
            <td class="r3">4時間50分</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台）→福岡空港→杖立温泉</td>
            <td class="r2">飛行機→高速バス</td>
            <td class="r3">4時間15分</td>
        </tr>
        <tr>
            <td class="r1">名古屋→福岡空港→杖立温泉</td>
            <td class="r2">飛行機→高速バス</td>
            <td class="r3">3時間50分</td>
        </tr>
        <tr>
            <td class="r1">大阪（関西空港）→福岡空港→杖立温泉</td>
            <td class="r2">飛行機→高速バス</td>
            <td class="r3">3時間40分</td>
        </tr>
        <tr>
            <td class="r1">福岡→杖立温泉</td>
            <td class="r2">高速バス</td>
            <td class="r3">2時間30分</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>鯉のぼり祭り</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/tsuetate-onsen/tsuetate-onsen-koinoborimatsuri.jpg"
                alt="杖立温泉鯉のぼり祭り">
            <p>4月の始めから5月のGWまで行われる「杖立温泉鯉のぼり祭り」は、温泉街沿いの杖立川上空を約3,500匹の鯉のぼりが泳ぐお祭りです。2019年は4月1日（月）〜5月6日（月・祝）に開催され、平成と令和を繋ぐイベントとなりました。河川をまたぐ鯉のぼりの発祥は、杖立温泉といわれています。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>松原ダム</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/tsuetate-onsen/tsuetate-onsen-matsubaradam.jpg"
                alt="松原ダム">
            <p>大分県日田市、一級河川・筑後川の上流部に建設された「松原ダム」は、杖立温泉から約7kmに位置しています。松原ダム遊覧船に乗船すれば、杖立トンネル付近の桟橋から下筌ダムまでの7.5kmのコースを折り返しで楽しむことができます。湖上から雄大な自然を観覧することが可能です。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>日田川開き観光祭</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/tsuetate-onsen/tsuetate-onsen-hitakawabiraki.jpg"
                alt="日田川開き観光祭">
            <p>2019年5月25（土）、5月26日（日）の2日間で行われた「日田川開き観光祭（ひたかわびらきかんこうさい）」は、盛大な花火大会です。約1万発の花火が上空を彩ります。すでに72回の開催を数え、例年20万人を超える観光客で賑わいます。
            </p>
        </div>
    </div>