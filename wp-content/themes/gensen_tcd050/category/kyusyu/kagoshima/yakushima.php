<?php
    $queried_object = get_queried_object();
    $upload_dir = wp_upload_dir();
?>
</div>
<img class="archive_heading_banner" src="<?php
        echo $upload_dir['baseurl'];
        echo read_category_template();
    ?>/main.jpg"
    alt="<?php  echo $queried_object -> name; ?>の風景">
<div class="inner">
    <div class="archive_heading_wrap">
        <p>屋久島は鹿児島県大隅半島南部にある佐多岬の南方約60kmに位置する円形の島で、面積は約504㎢、人口は約1万3千人です。屋久島は何と言っても、樹齢2千年を超える「縄文杉」を始めとした屋久杉で有名な島であり、1993年に世界遺産の自然遺産に登録されました。2005年にはアカウミガメの産卵で知られる北西部の永田浜がラムサール条約(特に水鳥の生息地として国際的に重要な湿地を保護する条約)に登録されました。
            屋久島の大部分は白亜紀層を含む花崗岩からなる険しい山地であり、島の90％が山林で形成されています。九州地方最高峰の宮之浦岳や永田岳、黒味岳の屋久三山を始めとして、1000m以上の高峰が多くそびえ、冬には積雪することもあります。年間の降水量が多く、また気温の高い亜熱帯気候になっており、その気候からポンカンやパイナップル、サトウキビが生産さてれています。
            屋久島の北部に宮之浦港と屋久島空港があり、鹿児島本島と結ばれています。南岸には尾之間温泉や平内海中温泉、湯泊温泉などがあり、島の約40％が屋久島国立公園に属しています。
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
            <td class="r1">東京（羽田）→屋久島空港(鹿児島空港経由)</td>
            <td class="r2">飛行機</td>
            <td class="r3">3時間</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）→屋久島空港(羽田空港、鹿児島空港経由)</td>
            <td class="r2">飛行機</td>
            <td class="r3">4時間</td>
        </tr>
        <tr>
            <td class="r1">仙台→羽田空港(新幹線、東京駅経由)→屋久島空港(鹿児島空港経由)</td>
            <td class="r2">新幹線→飛行機</td>
            <td class="r3">5時間</td>
        </tr>
        <tr>
            <td class="r1">名古屋（中部国際空港）→屋久島空港(羽田空港、鹿児島空港経由)</td>
            <td class="r2">飛行機</td>
            <td class="r3">3時間15分</td>
        </tr>
        <tr>
            <td class="r1">大阪（関空）→屋久島空港(鹿児島空港経由)</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間</td>
        </tr>
        <tr>
            <td class="r1">福岡（福岡空港）→屋久島空港</td>
            <td class="r2">飛行機</td>
            <td class="r3">1時間</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>縄文杉トレッキングコース</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_1.jpg" alt="縄文杉トレッキングコース">
            <p>屋久島には雄大な縄文杉の景観を堪能できるトレッキングコースが設けられています。実は、このトレッキングコース内に女性に人気のスポットがあり、それが「ウィルソン株」という切り株です。切り株とはいえ、中に大人が数十人も入れるほどの大きな空間があります。
            </p>
            <p>ウィルソン株が女性に人気になっているのは、切り株の穴から見える空の形が「ハート型」をしているからです。そのハートを写真に撮ると恋愛が成就するという噂があり、女性にとってパワースポットになっています。切り株の中にこのハートをきれいに映せるベストポイントがあり、誰かが分かりやすいよう印として石が置いてあります。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>益救神社</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_2.jpg" alt="益救神社">
            <p>屋久島の代表的なパワースポットは縄文杉ですが、もう一つ「益救神社(やくじんじゃ)」も地元では親しまれています。大同元年(806年)の建立以降、種子島・屋久島両島の鎮守とされており、醍醐天皇(即位897～930年)の時代にはすでに掖玖島(やくしま)の名神として、史書に益救神社の名が載っています。静かで神秘的な神社です。
            </p>
            <p>鳥居のそばにはソテツの木が植えられており、いかにも南国の神社という風情です。境内の左側にガジュマルの木があり、その前にある江戸の天保時代に造られた2つの金剛力士(阿形と吽形)の石像が町の文化財になっています。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>千尋の滝</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_3.jpg" alt="千尋の滝">
            <p>屋久島を流れる鯛之川の上流に行くと、「千尋の滝(せんぴろのたき)」という落差60mもある豪快な滝が現れます。滝の左側にある滑らかな肌をした花崗岩が一枚岩で迫力があります。長さが250mで、幅は300mもあり、超高層ビルの壁面を想像させます。
            </p>
            <p>
            千尋という名前は、人の両手を広げた長さが一尋(ひとひろ)と呼ばれていることから、滝の岩盤はその1000倍もあるという膨大さを表す意味を込めて付けられました。駐車場から滝の見える展望台へは遊歩道が備わっていますが、いかにも屋久島らしく苔が生え、木のトンネルの中を抜けていきます。
            </p>
        </div>
    </div>