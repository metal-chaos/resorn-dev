/*
http://dev.classmethod.jp/ria/string-replace-css-and-jquery/
をカスタマイズ利用
*/

(function($) {
  $.fn.textOverflowEllipsis = function(config) {
    var defaults = {
      resize: true,
      numOfCharactersToReduce : 1,
      suffix: '…'
    };

    var options = $.extend(defaults, config);

    var elems = this;

    var TextOverflowEllipsis = {
      init : function($target) {
        if ($target.css('overflow') != 'hidden') {
          $target.css('overflow', 'hidden');
        }

        // オリジナルの文章を取得・保持する
        var html = $target.attr('data-original');
        if (! html) {
          html = $target.html();
          $target.attr('data-original', html);
        }

      },
      execute : function($target) {
        var html = $target.attr('data-original');

        // 対象の要素を、高さにautoを指定し非表示で複製する
        var $clone = $target.clone();
        $clone
          .html(html)
          .css({
            display : 'none',
            position : 'absolute',
            overflow : 'visible',
            maxHeight : 'none'
          })
          .width($target.width())
          .height('auto');

        // 複製した要素を一旦追加
        $target.after($clone);

        // 指定した高さになるまで、1文字ずつ消去していく
        while((html.length > 0) && ($clone.height() > $target.height())) {
          html = html.substr(0, html.length - options.numOfCharactersToReduce);
          $clone.html(html + options.suffix);
        }

        // 文章を入れ替えて、複製した要素を削除する
        $target.html($clone.html());
        $clone.remove();
      },
    };

    // ウィンドウリサイズに追従する
    if (options.resize) {
      var timerId = null;
      var windowWidth = $(window).width();

      $(window).resize(function() {
        if (timerId) {
          clearTimeout(timerId);
        }

        if (windowWidth == $(window).width()) {
          return;
        }

        timerId = setTimeout(function() {
          elems.each(function(index) {
            TextOverflowEllipsis.execute($(this));
          });
        }, 100);
      });
    }

    return this.each(function(index) {
      var $target = $(this);

      TextOverflowEllipsis.init($target);

      TextOverflowEllipsis.execute($target);
    });
  };
})(jQuery);
