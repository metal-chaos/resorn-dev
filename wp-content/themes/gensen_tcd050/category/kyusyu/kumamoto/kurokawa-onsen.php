<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner"
    src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/kurokawa-onsen/kurokawa-onsen.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>黒川温泉は南小国町にある温泉街です。温泉街ということもあり露天風呂、混浴風呂など色々な温泉が存在します。温泉街には色々なサイトで四つ星を超える旅館が多数存在します。他にもお酒やスイーツなどのお土産屋さんも存在します。
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
            <td class="r2">飛行機→バス</td>
            <td class="r3">3時間55分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">5時間30分</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台）</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">4時間55分</td>
        </tr>
        <tr>
            <td class="r1">名古屋</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">3時間25分</td>
        </tr>
        <tr>
            <td class="r1">大阪（関西空港）</td>
            <td class="r2">飛行機→バス</td>
            <td class="r3">3時間15分</td>
        </tr>
        <tr>
            <td class="r1">福岡</td>
            <td class="r2">バス</td>
            <td class="r3">2時間37分</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>阿弥陀杉</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/kurokawa-onsen/kurokawa-onsen-amidasugi.jpg"
                alt="阿弥陀杉">
            <p>阿弥陀杉は樹高38メートル、樹齢1300年を超える大きな杉の木です。大きな幹の途中から無数の幹が枝分かれしていてその姿が阿弥陀仏に似ていることからその名前を名付けられました。過去に起こった台風により大半が無くなりましたがそれでも驚くほど大きな木です。無くなった大半の部分は町の図書館に飾られています。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>下城滝</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/kurokawa-onsen/kurokawa-onsen-shimonjonotaki.jpg"
                alt="下城滝">
            <p>下城滝は下城大イチョウから見ることが出来る落差49メートルの大きな滝です。阿蘇のカルデラ噴火によって出来た火砕流が降り積もって出来たと言われています。滝の裏側には空洞みたいなものがあります。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>鍋ケ滝</h4>
            <img src="<?php  echo $upload_dir['baseurl']; ?>/categories/kyusyu/kumamoto/kurokawa-onsen/kurokawa-onsen-nabegataki.jpg"
                alt="鍋ケ滝">
            <p>鍋ケ滝も同じく阿蘇のカルデラ噴火によって出来た滝です。滝は裏側が透けて見えるほどの少ない水量で流れています。そしてこの滝は裏側にも行く事ができ、裏側からも滝の流れる姿を見ることが出来ます。春になると夜間のライトアップも施されます。
            </p>
        </div>
    </div>