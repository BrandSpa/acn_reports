function blockquote() {
  $('blockquote').each(function(){
    let text = $(this).text();
    console.log(text);
    let paragraph = document.createElement('p');
    text = "»"+text+"«";
    paragraph.innerText = text;

    $(paragraph).find('br, p').remove();

    $(this).html(paragraph);

  });
}

export default function blockquoteFormat() {
  $.fn.justtext = function(){
    return $(this).clone()
            .children()
            .remove()
            .end()
            .text();
  }
  $(document).on('ready', blockquote());
}
