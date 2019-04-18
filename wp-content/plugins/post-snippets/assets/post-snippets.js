jQuery(document).ready(function($)
{
  /**
   * Loops through all snippets when page has loaded.
   */
  $("input[name$='_title']").each(function(index)
  {
    validateTitle($(this).prop('name'));
  });

  /**
   * Listens for title text input change events.
   */
  $("input[name$='_title']").change(function (e)
  {
    validateTitle(e.target.name);
  });

  /**
   * Listens for shortcode checkbox change events.
   */
  $("input[name$='_shortcode']").change(function (e)
  {
    validateTitle(e.target.name);
  });

  /**
   * Handle title validation and managing CSS classes.
   *
   * @param  string name
   *
   * @return void
   */
  function validateTitle(name)
  {
    // Extract the snippet index number
    var index = name.substring(0, name.indexOf('_'));

    var element = $("input[name$='"+index+"_title']");
    var title = $("input[name$='"+index+"_title']").val();

    $(element).removeClass('post-snippets-invalid');
    $(element).next().remove('p');

    if ($('#'+index+'_shortcode').prop('checked') && !isTitleValid(title)) {
      $(element).addClass('post-snippets-invalid');
      $(element).after("<p><em><font color='red'>"+post_snippets.invalid_shortcode+"</font></em></p>");
    }
  }

  /**
   * Determine if a title is shortcode valid.
   *
   * @param  string  title
   *
   * @return boolean
   */
  function isTitleValid(title)
  {
    return !Boolean(title.match(/[<>&/\[\]\x00-\x20]/gi));
  }
});
