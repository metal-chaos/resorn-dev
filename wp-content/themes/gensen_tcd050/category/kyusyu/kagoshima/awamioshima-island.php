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
        <p>奄美大島(単に大島と呼ぶこともあり)は鹿児島県南部の奄美群島の本島です。付属諸島(加計呂麻島、請島、与路島など)を合わせて奄美大島とされる場合もあります。本島は日本の離島としては佐渡島に次ぐ大きさを誇り、面積は約712㎢です。元々は琉球王国に統治されていましたが、慶長14年(1609年)から薩摩藩島津氏の領有地となります。第2次世界大戦後はアメリカの軍政下に置かれますが、1953年に日本に返還されます。島全体に山地が多く、東部海岸はサンゴ礁や海岸段丘が形成されており、南部は谷が沈んだ複雑な地形の沈水海岸になっています。気候は亜熱帯性で温暖ですが、降水量が年間約3000㎜と非常に多くなっています。奄美は最寒月の1月でも平均気温が14℃もあり、冬でも降雪や降霜がありません。サトウキビや黒砂糖、大島紬、毒ヘビのハブで有名です。また、ソテツやガジュマル、ハイビスカス，リュウゼツランなどの亜熱帯性植物が茂り、アマミノクロウサギ(国指定特別天然記念物)やルリカケス(国指定天然記念物)が生息しています。
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
            <td class="r1">東京（羽田）→奄美大島空港</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間30分</td>
        </tr>
        <tr>
            <td class="r1">札幌（新千歳）→奄美大島空港(羽田空港、鹿児島空港経由)</td>
            <td class="r2">飛行機</td>
            <td class="r3">4時間</td>
        </tr>
        <tr>
            <td class="r1">宮城（仙台）→羽田空港(新幹線、東京駅経由)→奄美大島空港(鹿児島空港経由)</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間30分</td>
        </tr>
        <tr>
            <td class="r1">名古屋（中部国際空港）→奄美大島空港(羽田空港、鹿児島空港経由)</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間15分</td>
        </tr>
        <tr>
            <td class="r1">大阪（関空）→奄美大島空港(鹿児島空港経由)</td>
            <td class="r2">飛行機</td>
            <td class="r3">2時間</td>
        </tr>
        <tr>
            <td class="r1">福岡（福岡空港）→奄美大島空港(鹿児島空港経由)</td>
            <td class="r2">飛行機</td>
            <td class="r3">1時間45分</td>
        </tr>
    </table>
    <h3 class="midashi"><?php echo esc_html($queried_object->name); ?>の観光名所</h3>
    <div class="archive_row">
        <div class="archive_col archive_col-3">
            <h4>ホノホシ海岸</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_1.jpg" alt="ホノホシ海岸">
            <p>奄美大島の南端の岬に、ある伝説を抱えた「ホノホシ海岸」があります。海岸の一面に真ん丸の形をした小石が敷きつめられており、景観は圧倒的です。丸い形の理由は長年に渡って周辺の荒々しい海流の波にもまれたためで、カツオや伊勢エビ、タイなどが釣れる最良の釣り場をもたらしています。
            </p>
            <p>実は、ホノホシ海岸の伝説というのは、この丸い石と海岸の霊に関係があります。ホノホシ海岸の丸い石を勝手に持ち帰ると、夜な夜な石が動き出します。そして、石を持ち帰った人には様々な不幸な出来事を起こります。単なる迷信にしか過ぎませんが、丸い石はホノホシ海岸の象徴でもあるので、持ち帰らずに眺めるだけにしておくのが訪問者のマナーです。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>マテリヤの滝</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_2.jpg" alt="マテリヤの滝">
            <p>奄美大島の西側に位置する大和村には昔から聖地とされている滝があります。それは、森林公園の奄美フォレストポリスの片隅にある「マテリヤの滝」です。滝までの細い山道は辺り一面に木が生い茂っており、陽が入らないことで昼間でも薄暗くなっています。山道を歩き続けると急に空が開ける場所があり、陽の光を浴びて輝きを放つ滝壺が現れます。水面に映る陽の光の幻想的な美しさから、この滝が『マテリヤ・ヌ・コモリ』(本当に美しい太陽の滝壺)と名付けられました。滝自体は小さなものでしかありませんが、落ちる水の量が多いため、マイナスイオンが全身に降りかかります。なお道中、思勝湾を一望できる絶景スポットがあります。
            </p>
        </div>
        <div class="archive_col archive_col-3">
            <h4>マングローブ原生林</h4>
            <img src="<?php
                echo $upload_dir['baseurl'];
                echo read_category_template();
            ?>/sub_3.jpg" alt="マングローブ原生林">
            <p>奄美大島の住用にはメヒルギとオヒルギで構成されたマングローブがあります。住用は役勝川と住用川の合流する河口域にあり、広大なマングローブ原生林に覆われています。その規模は沖縄の西表島に次ぐ大きさであり、国定公園特別保護区に指定されています。なお、マングローブとは熱帯や亜熱帯の湿地、干潟に生息する植物の総称のことです。
            </p>
            <p>マングローブのジャングルの雄大さをまじかに堪能できるのが、カヌーでのツーリングです。入り組んだ水路をカヌーで進むツーリングは、まるで冒険家になったような気分を味わえます。また、ガイドさんの説明が好奇心をそそらせます。
            </p>
        </div>
    </div>